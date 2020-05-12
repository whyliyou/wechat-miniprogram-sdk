<?php
/**
 * @author: whyly
 * @date: 2020-04-23
 */

namespace Whyly\MiniProgram\Api;

class Analysis extends BaseApi
{
    /**
     * 获取用户访问小程序日留存
     * - https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/data-analysis/visit-retain/analysis.getDailyRetain.html
     */
    public function getDailyRetain($begin_date, $end_date)
    {
        $url = ApiUrl::ANALYSIS_DAILY_RETAIN;
        $body_param = array(
            'begin_date' => $begin_date,
            'end_date' => $end_date
        );
        
        return $this->sendRequestWithToken($url, $body_param);
    }
    
    /**
     * 获取用户访问小程序月留存
     * - https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/data-analysis/visit-retain/analysis.getMonthlyRetain.html
     */
    public function getMonthlyRetain($begin_date, $end_date)
    {
        $url = ApiUrl::ANALYSIS_MONTHLY_RETAIN;
        $body_param = array(
            'begin_date' => $begin_date,
            'end_date' => $end_date
        );
        
        return $this->sendRequestWithToken($url, $body_param);
    }
    
    /**
     * 获取用户访问小程序周留存
     * - https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/data-analysis/visit-retain/analysis.getWeeklyRetain.html
     */
    public function getWeeklyRetain($begin_date, $end_date)
    {
        $url = ApiUrl::ANALYSIS_WEEKLY_RETAIN;
        $body_param = array(
            'begin_date' => $begin_date,
            'end_date' => $end_date
        );
        
        return $this->sendRequestWithToken($url, $body_param);
    }
    
    /**
     * 获取用户访问小程序数据概况
     * - https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/data-analysis/analysis.getDailySummary.html
     */
    public function getDailySummary($begin_date, $end_date)
    {
        $url = ApiUrl::ANALYSIS_DAILY_SUMMARY;
        $body_param = array(
            'begin_date' => $begin_date,
            'end_date' => $end_date
        );
        
        return $this->sendRequestWithToken($url, $body_param);
    }
    
    /**
     * 获取用户访问小程序数据日趋势
     * - https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/data-analysis/visit-trend/analysis.getDailyVisitTrend.html
     */
    public function getDailyVisitTrend($begin_date, $end_date)
    {
        $url = ApiUrl::ANALYSIS_DAILY_VISIT_TREND;
        $body_param = array(
            'begin_date' => $begin_date,
            'end_date' => $end_date
        );
        
        return $this->sendRequestWithToken($url, $body_param);
    }
    
    /**
     * 获取用户访问小程序数据月趋势
     * - https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/data-analysis/visit-trend/analysis.getMonthlyVisitTrend.html
     */
    public function getMonthlyVisitTrend($begin_date, $end_date)
    {
        $url = ApiUrl::ANALYSIS_MONTHLY_VISIT_TREND;
        $body_param = array(
            'begin_date' => $begin_date,
            'end_date' => $end_date
        );
        
        return $this->sendRequestWithToken($url, $body_param);
    }
    
    /**
     * 获取用户访问小程序数据周趋势
     * - https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/data-analysis/visit-trend/analysis.getWeeklyVisitTrend.html
     */
    public function getWeeklyVisitTrend($begin_date, $end_date)
    {
        $url = ApiUrl::ANALYSIS_WEEKLY_VISIT_TREND;
        $body_param = array(
            'begin_date' => $begin_date,
            'end_date' => $end_date
        );
        
        return $this->sendRequestWithToken($url, $body_param);
    }
    
    /**
     * 获取小程序新增或活跃用户的画像分布数据
     * - https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/data-analysis/analysis.getUserPortrait.html
     */
    public function getUserPortrait($begin_date, $end_date)
    {
        $url = ApiUrl::ANALYSIS_USER_PORTRAIT;
        $body_param = array(
            'begin_date' => $begin_date,
            'end_date' => $end_date
        );
        
        return $this->sendRequestWithToken($url, $body_param);
    }
    
    /**
     * 获取用户小程序访问分布数据
     * - https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/data-analysis/analysis.getVisitDistribution.html
     */
    public function getVisitDistribution($begin_date, $end_date)
    {
        $url = ApiUrl::ANALYSIS_VISIT_DISTRIBUTION;
        $body_param = array(
            'begin_date' => $begin_date,
            'end_date' => $end_date
        );
        
        return $this->sendRequestWithToken($url, $body_param);
    }
    
    /**
     * 访问页面
     * - https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/data-analysis/analysis.getVisitPage.html
     */
    public function getVisitPage($begin_date, $end_date)
    {
        $url = ApiUrl::ANALYSIS_VISIT_PAGE;
        $body_param = array(
            'begin_date' => $begin_date,
            'end_date' => $end_date
        );
        
        return $this->sendRequestWithToken($url, $body_param);
    }
}
?>