<?php
/**
 * @author: whyly
 * @date: 2020-04-23
 */

namespace Whyly\MiniProgram\Api;

class Cache
{
    private static $cacheDir;
    private static $cacheFile;
    
    public static function init($cache_dir, $filename)
    {
        self::$cacheDir = $cache_dir;
        self::$cacheFile = $cache_dir."{$filename}.json";
    }
    
    /**
     * 读取缓存文件数据
     */
    public static function getData()
    {
        $path = self::$cacheFile;
        
        if (file_exists($path))
        {
            return file_get_contents($path);
        }
        
        return false;
    }
    
    /**
     * 将数据保存进文件
     */
    public static function setData($data)
    {
        $path = self::$cacheFile;
        if (!file_exists(self::$cacheDir))
        {
            mkdir(self::$cacheDir);
        }
        return file_put_contents($path, $data);
    }
}
?>