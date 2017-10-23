<?php

function bisRegister($status) {
    if ($status == 1) {
        $str = '入驻申请成功';
    } elseif ($status == 0) {
        $str = '待审核，审核后平台方会发送邮件通知，请关注邮件';
    } elseif ($status == 2) {
        $str = '您提交的材料不符合条件请重新提交';
    } else {
        $str = '该申请已被删除';
    }
    return $str;
}