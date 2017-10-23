<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/23
 * Time: 11:07
 */

namespace app\common\model;


class Bis extends BaseModel {

    /**通过状态获取商家数据
     * @param $status
     */
    public function getBisByStatus($status = 1) {
        $order = [
            'id' => 'desc'
        ];
        $data  = [
            'status' => $status
        ];
        return $this->where($data)->order($order)->paginate(5);

    }
}