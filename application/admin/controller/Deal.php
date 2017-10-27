<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/26
 * Time: 16:39
 */

namespace app\admin\controller;


use think\Controller;

class Deal extends Controller {
    private $obj;

    public function _initialize() {
        $this->obj = model("Deal");
    }

    public function index() {
        $data = input('get.');
        if (!empty($data['category_id'])) {
            $sdata['category_id'] = $data['category_id'];
        }
        $categorys = model('Category')->getNormalCategoryByParentId();
        $citys     = model('City')->getNormalCitys();
        return $this->fetch('', [
            'categorys' => $categorys,
            'citys'     => $citys
        ]);
    }
}