<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/26
 * Time: 15:20
 */

namespace app\bis\controller;


class Deal extends Base {
    public function index() {
        return $this->fetch();
    }

    public function add() {
//        $bisId = $this->getLoginUser()->bis_id;
        if (request()->isPost()) {
            $data  = input('post.');
            $deals = [
                'bis_id' => $bisId,
                'name' => $data['name'],
                'image' => $data['image'],
                'category_id' => $data['category_id'],

            ];
        } else {

        }

        $citys    = model('City')->getNormalCitysByParentId();
        $Category = model('Category')->getNormalCategoryByParentId();
        return $this->fetch('', [
            'citys'        => $citys,
            'categorys'    => $Category,
            'bislocations' => model('BisLocation')->getNormalLocationByBisId(13)
        ]);
    }

}