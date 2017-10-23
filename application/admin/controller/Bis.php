<?php

namespace app\admin\controller;


use think\Controller;

class Bis extends Controller {
    private $obj;

    public function _initialize() {
        $this->obj = model("Bis");
    }

    public function apply() {
        $bis = $this->obj->getBisByStatus();
        return $this->fetch('', [
            'bis' => $bis
        ]);
    }
}