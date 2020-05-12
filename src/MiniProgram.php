<?php
/**
 * @author: whyly
 * @date: 2020-04-23
 */

namespace Whyly\MiniProgram;

use Whyly\MiniProgram\Api\Cache;
use Whyly\MiniProgram\Api\SessionKey;
use Whyly\MiniProgram\Api\QRCode;
use Whyly\MiniProgram\Api\SubscribeMsg;
use Whyly\MiniProgram\Api\CustomMsg;
use Whyly\MiniProgram\Api\Analysis;

class MiniProgram
{
    private $appid;
    private $secret;
    private $instances;
    
    public function __construct($appid, $secret, $cache_dir)
    {
        $this->appid = $appid;
        $this->secret = $secret;
        $this->instances = array();
        Cache::init($cache_dir, $appid);
    }
    
    /**
     * 登录凭证，获取session_key、openid
     */
    public function getSessionKey($code)
    {
        if (!isset($this->instances['sessionkey']))
        {
            $this->instances['sessionkey'] = new SessionKey($this->appid, $this->secret);
        }
        
        return $this->instances['sessionkey']->get($code);
    }
    
    /**
     * 小程序码对象
     */
    public function getQRCode()
    {
        if (!isset($this->instances['qrcode']))
        {
            $this->instances['qrcode'] = new QRCode($this->appid, $this->secret);
        }
        
        return $this->instances['qrcode'];
    }
    
    /**
     * 订阅消息对象
     */
    public function getScribeMsg()
    {
        if (!isset($this->instances['subscribe_msg']))
        {
            $this->instances['subscribe_msg'] = new SubscribeMsg($this->appid, $this->secret);
        }
        
        return $this->instances['subscribe_msg'];
    }
    
    /**
     * 客服消息对象
     */
    public function getCustomMsg()
    {
        if (!isset($this->instances['custom_msg']))
        {
            $this->instances['custom_msg'] = new CustomMsg($this->appid, $this->secret);
        }
        
        return $this->instances['custom_msg'];
    }
    
    /**
     * 数据分析
     */
    public function getAnalysis()
    {
        if (!isset($this->instances['analysis']))
        {
            $this->instances['analysis'] = new Analysis($this->appid, $this->secret);
        }
        
        return $this->instances['analysis'];
    }
}
?>