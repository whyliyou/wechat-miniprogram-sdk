# wechat-miniprogram-sdk
微信小程序服务端SDK



## 安装

```
composer require whyly/wechat-miniprogram-sdk
```

## 用法

1. 创建小程序对象

   ```
   require_once './vendor/autoload.php';
   
   use Whyly\MiniProgram\MiniProgram;
   
   $appid = 'xxxxx';
   $secret = 'xxxxxxx';
   $cache_dir = './cache/'; //缓存access_token
   $mp = new MiniProgram($appid, $secret, $cache_dir);
   ```

2. 通过code得到session_key、openid

   ```
   //$code通过小程序的wx.login获取
   $rs_sessionkey = $mp->getSessionKey($code);
   ```

   

3. 二维码

   ```
   $qr = $mp->getQRCode();
   $rs_qr = $qr->getQRCodeB('a=1');
   $img = file_put_contents($cache_dir.'qr.png', $rs_qr);
   ```

4. 订阅消息

   ```
   $scribe_msg = $mp->getScribeMsg();
   $rs_scribe = $scribe_msg->send($openid, $template_id, array(
       'character_string1' => array('value' => 'T878772'),
       'name11' => array('value' => '李四'),
       'phone_number12' => array('value' => '13978786576'),
       'thing5' => array('value' => '风扇不转了。')
   ));
   ```

   

5. 客服消息

   ```
   $rs_custom = $custom_msg->send($openid, 'text', array(
       'content' => '客服消息测试'
   ));
   ```

   

6. 上传素材

   ```
   $custom_msg = $mp->getCustomMsg();
   $rs_upload = $custom_msg->uploadTempMedia('/var/www/logo.png');
   ```

   

7. 获取素材

   ```
   $rs_media = $custom_msg->getTempMedia($media_id);
   ```

   

8. 数据分析

   ```
   $analysis = $mp->getAnalysis();
   
   $analysis->getVisitPage('20200508', '20200508');
   ...
   ```

   