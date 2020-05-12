<?php
/**
 * @author: whyly
 * @date: 2020-04-23
 */

namespace Whyly\MiniProgram\Api;

use Exception;

class BaseApi
{
    protected $appid;
    protected $secret;
  
    public function __construct($appid, $secret)
    {
        $this->appid = $appid;
        $this->secret = $secret;
    }
  
    public function getAccessToken()
    {
        $token = $this->getCacheToken();
        if (!empty($token))
        {
            return $token;
        }
        
        //重新获取access_token，并写入缓存文件
        $url = ApiUrl::ACCESS_TOKEN;
        $param = array(
            'grant_type'  => 'client_credential',
            'appid'  => $this->appid,
            'secret'  => $this->secret,
        );
        
        $res = $this->sendHttpRequest($url, $param, null, false);
        if (empty($res['access_token']))
        {
            throw new Exception('getAccessToken fail');
        }
        
        $new_token = array(
            'accessToken' => $res['access_token'],
            'expireTime' => time() + $res['expires_in']
        );
        Cache::setData(json_encode($new_token)); //新获取的access_token存入缓存文件
        
        return $res['access_token'];
    }
    
    /**
     * 获取缓存文件中的access_token数据，失败或过期返回false
     */
    private function getCacheToken()
    {
        $token_str = Cache::getData(); //先从缓冲中取数据
        
        if (empty($token_str))
        {
            return false;
        }
        
        $token = json_decode($token_str, true);
        if ($token['expireTime'] < time()) //过期
        {
            return false;
        }
        
        return $token['accessToken'];
    }
    
    public function sendRequestWithToken($url, $body_param = null, $url_param = null, $is_post = true)
    {
        $param = array(
            'access_token' => $this->getAccessToken()
        );
        
        if (!is_null($url_param) && is_array($url_param))
        {
            $param = array_merge($param, $url_param);
        }
        
        return $this->sendHttpRequest($url, $param, $body_param, $is_post);
    }
    
    public function sendHttpRequest($url, $url_param = null, $body_param = null, $is_post = true)
    {
        if (!empty($url_param))
        {
            $url_param = '?'.http_build_query($url_param);
        }
        
        if (!empty($body_param))
        {
            $body_param = json_encode($body_param, JSON_UNESCAPED_UNICODE);
        }
        $l_url = $url.$url_param;
        var_dump($l_url);
        echo "<br>";
        var_dump($body_param);
        echo "<br>";
        $ch = curl_init($url.$url_param);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        if ($is_post)
        {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $body_param);
        }
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        $data = curl_exec($ch);
        curl_close($ch);
        
        if (empty($data))
        {
            throw new Exception('sendHttpRequest fail');
        }
        $array_data = json_decode($data, true); //无法被解码则返回NULL
        
        return empty($array_data) ? $data : $array_data;
    }
    
    public function uploadFileWithToken($url, $url_param, $filename_with_full_path)
    {
        $param = array(
            'access_token' => $this->getAccessToken()
        );
        
        if (!is_null($url_param) && is_array($url_param))
        {
            $param = array_merge($param, $url_param);
        }
        
        return $this->uploadFileRequest($url, $filename_with_full_path, $param);
    }
    
    public function uploadFileRequest($url, $filename_with_full_path, $url_param = null)
    {
        if (!empty($url_param))
        {
            $url_param = '?'.http_build_query($url_param);
        }
        
        if (function_exists('curl_file_create')) //php 5.5+
        {
            $cFile = curl_file_create($filename_with_full_path);
        }
        else
        {
            $cFile = '@'.realpath($filename_with_full_path);
        }
        
        $ch = curl_init($url.$url_param);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, array(
            'media' => $cFile
        ));
        //返回的内容作为变量储存，而不是直接输出
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        
        $data = curl_exec($ch);
        
        curl_close($ch);
        
        $array_data = json_decode($data, true); //无法被解码则返回NULL
        
        return empty($array_data) ? $data : $array_data; 
    }
}
?>