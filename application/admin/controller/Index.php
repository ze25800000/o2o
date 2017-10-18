<?php

namespace app\admin\controller;

use think\Controller;

class Index extends Controller {
    public function index() {
        return $this->fetch();
    }

    public function test() {
        \Map::getLngLat('锡林浩特市西苑小区');
    }

    public function welcome() {
        return "hello world";
    }
}
