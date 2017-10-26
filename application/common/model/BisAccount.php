<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/23
 * Time: 11:07
 */

namespace app\common\model;


use think\Model;

class BisAccount extends BaseModel {
    public function updateById($date, $id) {
        //过滤数据表中非数据库中的数据
        return $this->allowField(true)->save($date, ['id' => $id]);

    }
}