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

    public function map() {
        return \Map::staticimage('锡林浩特市西苑小区');
    }

    public function welcome() {
        \phpmailer\Email::send('1726249137@qq.com', 'o2o_tp5', 'hello world fuck the world');
        return "邮件发送成功";
    }
}
