<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/23
 * Time: 11:07
 */

namespace app\common\model;


use think\Model;

class Bis extends Model {
    protected $autoWriteTimestamp = true;

    public function add($data) {
        $data['status'] = 1;
        $this->save();
        return $this->id;
    }
}