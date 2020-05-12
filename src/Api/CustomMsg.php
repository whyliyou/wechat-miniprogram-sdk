<?php
/**
 * @author: whyly
 * @date: 2020-04-23
 */

namespace Whyly\MiniProgram\Api;

class CustomMsg extends BaseApi
{
    /**
     * 发送客服消息给用户
     * - https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/customer-message/customerServiceMessage.send.html
     */
    public function send($touser, $msgtype, $content_array)
    {
        $url = ApiUrl::CUSTOM_MSG_SEND;
        $body_param = array(
            'touser' => $touser,
            'msgtype' => $msgtype,
            $msgtype => $content_array
        );
        
        return $this->sendRequestWithToken($url, $body_param);
    }
    
    /**
     * 把媒体文件上传到微信服务器
     * - https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/customer-message/customerServiceMessage.uploadTempMedia.html
     */
    public function uploadTempMedia($filename_with_full_path, $type = 'image')
    {
        $url = ApiUrl::CUSTOM_TEMP_MEDIA_UPLOAD;
        $url_param = array(
            'type' => $type
        );
        
        return $this->uploadFileWithToken($url, $url_param, $filename_with_full_path);
    }
    
    /**
     * 获取客服消息内的临时素材
     * - https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/customer-message/customerServiceMessage.getTempMedia.html
     */
    public function getTempMedia($media_id)
    {
        $url = ApiUrl::CUSTOM_TEMP_MEDIA;
        $url_param = array(
            'media_id' => $media_id
        );
        
        return $this->sendRequestWithToken($url, null, $url_param, false);
    }
    
}
?>