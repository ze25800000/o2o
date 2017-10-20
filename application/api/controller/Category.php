<?php

namespace app\api\controller;


use think\Controller;

class Category extends Controller {
    private $obj;

    public function _initialize() {
        $this->obj = model("Category");
    }

    public function getCategoryByParentId() {
        $id = input('post.id','intval');
        if (!$id) {
            $this->error('ID不合法');
        }
        //通过id获取二级城市
        $Category = $this->obj->getNormalCategoryByParentId($id);
        if (!$Category) {
            return show(0, 'error');
        }
        return show(1, 'success', $Category);
    }
}
