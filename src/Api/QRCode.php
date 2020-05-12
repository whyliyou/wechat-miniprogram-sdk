<?php
/**
 * @author: whyly
 * @date: 2020-04-23
 */

namespace Whyly\MiniProgram\Api;

class QRCode extends BaseApi
{
    /**
     * 适用于需要的码数量较少的业务场景，小程序码永久有效，有数量限制
     * - https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/qr-code/wxacode.get.html
     */
    public function getQRCodeA($path, $width = null, $auto_color = null, $line_color = null, $is_hyaline = null)
    {
        $url = ApiUrl::QRCODE_A;
        $body_param = array(
            'path' => $path,
            'width' => $width,
            'auto_color' => $auto_color,
            'line_color' => $line_color,
            'is_hyaline' => $is_hyaline
        );
        
        return $this->sendRequestWithToken($url, $body_param);
    }
    
    /**
     * 适用于需要的码数量极多的业务场景，小程序码永久有效，数量暂无限制
     * - https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/qr-code/wxacode.getUnlimited.html
     */
    public function getQRCodeB($scene, $page = null, $width = null, $auto_color = null, $line_color = null, $is_hyaline = null)
    {
        $url = ApiUrl::QRCODE_B;
        $body_param = array(
            'scene' => $scene,
            'width' => $width,
            'auto_color' => $auto_color,
            'line_color' => $line_color,
            'is_hyaline' => $is_hyaline
        );
        
        return $this->sendRequestWithToken($url, $body_param);
    }
    
    /**
     * 适用于需要的码数量较少的业务场景，小程序码永久有效，有数量限制
     * - https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/qr-code/wxacode.createQRCode.html
     */
    public function getQRCodeC($path, $width = null)
    {
        $url = ApiUrl::QRCODE_C;
        $body_param = array(
            'path' => $path,
            'width' => $width
        );
        
        return $this->sendRequestWithToken($url, $body_param);
    }
}
?>