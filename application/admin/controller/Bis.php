<?php

namespace app\admin\controller;


use think\Controller;

class Bis extends Controller {
    private $obj;

    public function _initialize() {
        $this->obj = model("Bis");
    }

    public function apply() {
        $bis = $this->obj->getBisByStatus();
        return $this->fetch('', [
            'bis' => $bis
        ]);
    }

    public function detail() {
        $id = input('get.id');
        if (empty($id)) {
            $this->error('ID错误');
        }
        //获取一级城市的数据
        $citys        = model('City')->getNormalCitysByParentId();
        $Category     = model('Category')->getNormalCategoryByParentId();
        $bisData      = $this->obj->get($id);
        $locationData = model('BisLocation')->get(['bis_id' => $id, 'is_main' => 1]);
        $accountData  = model('BisAccount')->get(['bis_id' => $id, 'is_main' => 1]);
        return $this->fetch('', [
            'citys'        => $citys,
            'categorys'    => $Category,
            'bisData'      => $bisData,
            'locationData' => $locationData,
            'accountData'  => $accountData
        ]);
    }

    public function status() {
        $data = input('get.');
        /* $validate = validate('Bis');
         if (!$validate->scene('status')->check($data)) {
             $this->error($validate->getError());
         }*/
        $res      = $this->obj->save(['status' => $data['status'], ['id' => $data['id']]]);
        $location = model('BisLocation')->save(['status' => $data['status']], ['bis_id' => $data['id'], 'is_main' => 1]);
        $account  = model('BisAccount')->save(['status' => $data['status']], ['bis_id' => $data['id'], 'is_main' => 1]);
        if ($res && $location && $account) {
            $this->success('状态更新成功');
        } else {
            $this->error('失败');
        }
    }
}