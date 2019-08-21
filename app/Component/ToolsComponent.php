<?php
namespace App\Component;
include 'phpqrcode.php';

class ToolsComponent 
{   
    /**
     * curl_tool 支持get与post
     * @param $url   抓取地址
     * @param $type  默认get
     * @param $data  post数据
     * @author fanzhen
     */
    public static function curl_tool($url, $type = 'get', $data = [])
    {
        // 初始化一个 cURL 对象
        $curl = curl_init(); 
        // 设置你需要抓取的URL 
        curl_setopt($curl, CURLOPT_URL, $url);
        // 设置header 响应头是否输出
        curl_setopt($curl, CURLOPT_HEADER, 0); 
        // 设置cURL 参数
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
        if($type == 'post'){
            // post数据
            curl_setopt($curl, CURLOPT_POST, 1); 
            if(!empty($data)){
               curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            }
        }
        // 运行cURL，请求网页 
        $result = curl_exec($curl); 
        // 关闭URL请求 
        curl_close($curl); 
        // 显示获得的数据 
        return $result;
    } 

    /**
     * qrcode
     * @author fanzhen
     */
    public static function qrcode($val)
    {
        $errorCorrectionLevel = 'L';//容错级别 
        $matrixPointSize = 20;//生成图片大小 
        \QRcode::png($val, false, $errorCorrectionLevel, $matrixPointSize, 2);
    } 

    /**
     * uuid
     * @author fanzhen
     */
    public static function uuid()
    {
        return $danhao = date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);       
    }
}
