<?php
/**
 * @author: whyly
 * @date: 2020-04-23
 */

namespace Whyly\MiniProgram\Api;

class SubscribeMsg extends BaseApi
{
    /**
     * 发送订阅消息
     */
    public function send($touser, $template_id, $data, $page = null)
    {
        $url = ApiUrl::SUBSCRIBE_MSG_SEND;
        $body_param = array(
            'touser' => $touser,
            'template_id' => $template_id,
            'data' => $data
        );
        if (!empty($page))
        {
            $param['page'] = $page;
        }
        
        return $this->sendRequestWithToken($url, $body_param);
    }
}
?>