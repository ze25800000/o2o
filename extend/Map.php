<?php

class Map {
    /**根据地址来获取经纬度
     * @param $address
     */
    public static function getLngLat($address) {
//http://api.map.baidu.com/geocoder/v2/?callback=renderOption&output=json&address=北京市海淀区上地10街10号&city=北京市&ak=您的ak
        $data = [
            'address' => $address,
            'ak'      => config('map.ak'),
            'output'  => 'json'
        ];
        $url  = config('map.baidu_map_url') . config('map.geocoder') . '?' . http_build_query($data);
        dump($url);
        //1,file_get_contents($url)
        //2,curl
        $result = doCurl($url);
        dump($result);
        exit();
    }
}