<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/26
 * Time: 14:54
 */

namespace app\bis\controller;


class Location extends Base {
    public function index() {
        return $this->fetch();
    }

    public function add() {
        if (request()->isPost()) {
            //门店入库操作
            $data         = input('post.');
            $bisId        = $this->getLoginUser()->bis_id;
            $locationData = [
                'bis_id'        => $bisId,
                'name'          => $data['name'],
                'logo'          => $data['logo'],
                'tel'           => $data['tel'],
                'contact'       => $data['contact'],
                'category_id'   => $data['category_id'],
                'category_path' => $data['category_path'] . ',' . $data['cat'],
                'city_id'       => $data['city_id'],
                'city_path'     => empty($data['se_city_id']) ? $data['city_id'] : $data['city_id'] . ',' . $data['se_city_id'],
                'api_address'   => $data['address'],
                'open_time'     => $data['open_time'],
                'content'       => empty($data['content']) ? '' : $data['content'],
                'is_main'       => 0,//代表总店信息
                'xpoint'        => empty($lnglat['result']['location']['lng']) ? '' : $lnglat['result']['location']['lng'],
                'ypoint'        => empty($lnglat['result']['location']['lat']) ? '' : $lnglat['result']['location']['lat']
            ];
            $locationId   = model('BisLocation')->add($locationData);
        } else {
            $citys     = model('City')->getNormalCitysByParentId();
            $categorys = model('Category')->getNormalCategoryByParentId();
            return $this->fetch('', [
                'citys'     => $citys,
                'categorys' => $categorys
            ]);
        }
    }
}