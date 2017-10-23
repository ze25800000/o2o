<?php

namespace app\common\model;


use think\Model;

class BaseModel extends Model {
    protected $autoWriteTimestamp = true;

    public function add($data) {
        $data['status'] = 1;
        $this->save();
        return $this->id;
    }
}