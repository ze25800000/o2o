<?php

namespace app\admin\controller;

use think\Controller;

class Category extends Controller {
    public function index() {
        return $this->fetch();
    }

    public function add() {
        $categorys = model('Category')->getNormalFirstCategory();
        return $this->fetch('', [
            'categorys' => $categorys
        ]);
    }

    public function save() {
        $data     = input('post.');
        $validate = validate('Category');
        if (!$validate->scene('add')->check($data)) {
            $this->error($validate->getError());
        }
        $res = model('Category')->add($data);
        if ($res) {
            $this->success('新增成功');
        } else {
            $this->error('新增失败');
        }
    }
}
