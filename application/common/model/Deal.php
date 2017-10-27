<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/27
 * Time: 17:24
 */

namespace app\common\model;


class Deal extends BaseModel {
    public function getNormalDeals($data = []) {
        $data['status'] = 1;
        $order          = ['id' => 'desc'];
        $result         = $this->where($data)->order($order)->paginate();
        return $result;
    }
}