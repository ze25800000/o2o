<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/26
 * Time: 11:35
 */

namespace app\bis\controller;


use think\Controller;

class Base extends Controller {
    private $account;

//    public function _initialize() {
//        // 判断用户是否登录
//        $isLogin = $this->isLogin();
//        if (!$isLogin) {
//            $this->redirect(url('login/index'));
//        }
//    }

    public function isLogin() {
        $user = $this->getLoginUser();
        if ($user && $user->id) {
            return true;
        }
        return false;
    }

    public function getLoginUser() {
        if (!$this->account) {
            $this->account = session('bisAccount', '', 'bis');
        }
        return $this->account;
    }
}