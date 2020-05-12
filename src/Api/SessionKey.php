<?php
/**
 * @author: whyly
 * @date: 2020-04-23
 */

namespace Whyly\MiniProgram\Api;

class SessionKey extends BaseApi
{
    public function get($code)
    {
        $url = ApiUrl::SESSION_KEY;
        $param = array(
            'appid' => $this->appid,
            'secret' => $this->secret,
            'js_code' => $code,
            'grant_type' => 'authorization_code'
        );
        
        return $this->sendHttpRequest($url, $param, null, false);
    }
}
?>