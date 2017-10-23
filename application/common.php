<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function status($status) {
    if ($status == 1) {
        $str = "<span class='label label-success radius'>正常</span>";
    } elseif ($status == 0) {
        $str = "<span class='label label-danger radius'>待审</span>";

    } else {
        $str = "<span class='label label-danger radius'>删除</span>";
    }
    return $str;
}

/**
 * @param $url
 * @param int $type 0:get 1:post
 * @param array $data
 */
function doCurl($url, $type = 0, $data = []) {
    //初始化
    $ch = curl_init();
    //设置选项
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//如果成功只返回结果，不把内容输出
    curl_setopt($ch, CURLOPT_HEADER, 0);//不需要header头
    if ($type == 1) {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }
    //执行并获取
    $output = curl_exec($ch);
    //释放curl句柄
    curl_close($ch);
    return $output;
}

/**通用分页样式
 * @param $obj
 */
function pagination($obj) {
    if (!$obj) {
        return '';
    }
    return '<div class="cl pd-5 bg-1 bk-gray mt-20 tp5-o2o">'.$obj->render().'</div>';
}