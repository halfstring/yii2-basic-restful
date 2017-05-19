<?php

namespace app\controllers;

use app\components\BaseController;
use app\models\User;
use yii\data\ActiveDataProvider;

class UserController extends BaseController {

    public $modelClass = 'app\models\User';

    public function actionIndex() {

        $provider = new ActiveDataProvider([
            'query'      => User::find(),
            'pagination' => [
                'pageSize' => $this->pageSize,
            ],
            'sort'       => [
                'defaultOrder' => ['create_at' => SORT_DESC]
            ],
        ]);

        return [
            'data'       => $provider->getModels(),
            'totalCount' => $provider->getTotalCount()
        ];
    }


    public function actionView($id) {
        return User::findOne($id);
    }

    public function actionCreate() {
        $post = \Yii::$app->getRequest()->post();
        $user = new User();
        $user->setAttributes($post);
        if (!$user->save()) {
            return array_values($user->getFirstErrors())[0];
        }

        $user->refresh();
        return $user;
    }


    public function actionUpdate($id) {
        $data = \Yii::$app->getRequest()->getBodyParams();

        $user = User::findOne($id);
        $user->setAttributes($data);
        if (!$user->save()) {
            return array_values($user->getFirstErrors())[0];
        }

        $user->refresh();
        return $user;
    }

    public function actionDelete($id) {
        return User::deleteAll(['id' => $id]);
    }

    public function actionSearch() {
        $keyword = \Yii::$app->request->get('keyword');

        $provider = new ActiveDataProvider([
            'query'      => User::find()->where([
                'LIKE',
                'name',
                $keyword
            ]),
            'pagination' => [
                'pageSize' => $this->pageSize,
            ],
            'sort'       => [
                'defaultOrder' => [
                    'create_at' => SORT_DESC,
                ]
            ],
        ]);

        return [
            'data'       => $provider->getModels(),
            'totalCount' => $provider->getTotalCount()
        ];
    }
}
