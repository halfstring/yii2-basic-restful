<?php

namespace app\components;

use yii\rest\ActiveController;

class BaseController extends ActiveController {

    public $pageSize = 20;

    public $serializer = [
        'class'              => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];


    public function actions() {
        $as = parent::actions();
        unset($as['index'], $as['view'], $as['create'], $as['update'], $as['delete']);
        return $as;
    }

    public function afterAction($action, $result) {
        $result = parent::afterAction($action, $result);

        //TOOD 此处规整出口数据格式

        return $result;
    }
}
