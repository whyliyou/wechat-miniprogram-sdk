<?php
/**
 * @author: whyly
 * @date: 2020-04-23
 */

namespace Whyly\MiniProgram\Api;
 
class ApiUrl 
{
    //get session_key and access_token by appid and secret
    const SESSION_KEY = 'https://api.weixin.qq.com/sns/jscode2session';
    const ACCESS_TOKEN = 'https://api.weixin.qq.com/cgi-bin/token';
  
    //get qrcode
    const QRCODE_A = 'https://api.weixin.qq.com/wxa/getwxacode';
    const QRCODE_B = 'https://api.weixin.qq.com/wxa/getwxacodeunlimit';
    const QRCODE_C = 'https://api.weixin.qq.com/cgi-bin/wxaapp/createwxaqrcode';
  
    //send custom message
    const CUSTOM_MSG_SEND = 'https://api.weixin.qq.com/cgi-bin/message/custom/send';
    const CUSTOM_TEMP_MEDIA_UPLOAD = 'https://api.weixin.qq.com/cgi-bin/media/upload';
    const CUSTOM_TEMP_MEDIA = 'https://api.weixin.qq.com/cgi-bin/media/get';
  
    //send subscribe message 
    const SUBSCRIBE_MSG_SEND = 'https://api.weixin.qq.com/cgi-bin/message/subscribe/send';
  
    //analysis
    const ANALYSIS_DAILY_RETAIN = 'https://api.weixin.qq.com/datacube/getweanalysisappiddailyretaininfo';
    const ANALYSIS_MONTHLY_RETAIN = 'https://api.weixin.qq.com/datacube/getweanalysisappidmonthlyretaininfo';
    const ANALYSIS_WEEKLY_RETAIN = 'https://api.weixin.qq.com/datacube/getweanalysisappidweeklyretaininfo';
    const ANALYSIS_DAILY_SUMMARY = 'https://api.weixin.qq.com/datacube/getweanalysisappiddailysummarytrend';
    const ANALYSIS_DAILY_VISIT_TREND = 'https://api.weixin.qq.com/datacube/getweanalysisappiddailyvisittrend';
    const ANALYSIS_MONTHLY_VISIT_TREND = 'https://api.weixin.qq.com/datacube/getweanalysisappidmonthlyvisittrend';
    const ANALYSIS_WEEKLY_VISIT_TREND = 'https://api.weixin.qq.com/datacube/getweanalysisappidweeklyvisittrend';
    const ANALYSIS_USER_PORTRAIT = 'https://api.weixin.qq.com/datacube/getweanalysisappiduserportrait';
    const ANALYSIS_VISIT_DISTRIBUTION = 'https://api.weixin.qq.com/datacube/getweanalysisappidvisitdistribution';
    const ANALYSIS_VISIT_PAGE = 'https://api.weixin.qq.com/datacube/getweanalysisappidvisitpage';
}
?>