<?php

namespace app\bis\controller;


use think\Controller;

class Login extends Controller {
    public function index() {
        if (request()->isPost()) {
            $data = input('post.');
            $ret  = model('BisAccount')->get(['username' => $data['username']]);
            if (!$ret || $ret->status != 1) {
                $this->error('该用户不存在，或者用户未被审核通过');
            }
            if ($ret || $ret->status != 1) {
                $this->error('该用户不存在，获取用户未被审核通过');
            }
            if ($ret->password != md5($data['password'] . $ret->code)) {
                $this->error('密码不正确');
            }
            model('BisAccount')->updateById(['last_login_time' => time()], $ret->id);
            //bis是作用域
            session('bisAccount', $ret, 'bis');
            $this->success('登录成功', url('index/index'));
        } else {
            return $this->fetch();
        }
    }
}