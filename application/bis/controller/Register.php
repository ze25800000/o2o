<?php

namespace app\bis\controller;


use think\Controller;

class Register extends Controller {
    public function index() {
        //获取一级城市的数据
        $citys    = model('City')->getNormalCitysByParentId();
        $Category = model('Category')->getNormalCategoryByParentId();
        return $this->fetch('', [
            'citys'     => $citys,
            'categorys' => $Category
        ]);
    }

    public function add() {
        if (!request()->isPost()) {
            $this->error('请求错误');
        }
        //获取表单的值
        $data = input('post.');
        //校验数据
        $validate = validate('Bis');
//        if (!$validate->scene('add')->check($data)) {
//            $this->error($validate->getError());
//        }
//        获取经纬度
        $lnglat = \Map::getLngLat($data['address']);
        if (empty($lnglat) || $lnglat['status'] != 0) {
            $this->error('无法获取数据，或者匹配的地址不精确');
        }
        $bisData = [
            'name'         => $data['name'],
            'city_id'      => $data['city_id'],
            'city_path'    => empty($data['se_city_id']) ? $data['city_id'] : $data['city_id'] . ',' . $data['se_city_id'],
            'logo'         => $data['logo'],
            'licence_logo' => $data['licence_logo'],
            'description'  => empty($data['description']) ? '' : $data['description'],
            'bank_info'    => $data['bank_info'],
            'bank_user'    => $data['bank_user'],
            'bank_name'    => $data['bank_name'],
            'faren'        => $data['faren'],
            'faren_tel'    => $data['faren_tel'],
            'email'        => $data['email']
        ];
        $bisId   = model('Bis')->add($bisData);
        echo $bisId;
        exit;
    }
}