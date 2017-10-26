<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/23
 * Time: 11:07
 */

namespace app\common\model;


use think\Model;

class BisLocation extends BaseModel {
    public function getNormalLocationByBisId($bisId) {
        $data = [
            'bis_id' => $bisId,
            'status' => 1
        ];
        $result = $this->where($data)
            ->order('id', 'desc')
            ->select();
        return $result;
    }
}