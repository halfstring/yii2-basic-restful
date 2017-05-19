<?php

use yii\db\Migration;

class m170519_022103_loadTestData extends Migration
{
    public function safeUp()
    {

    }

    public function safeDown()
    {
        echo "m170519_022103_loadTestData cannot be reverted.\n";

        return false;
    }

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $cols = [
            'name',
            'age',
            'mobile',
            'address'
        ];


        $rows = [];
        for ($i = 0; $i < 10; $i++) {
            $rows[] = ['张' . $i, 25 + $i, '1380000000' . $i, '帝都XX东路30' . $i . '号'];
        }


        $this->batchInsert(\app\models\User::tableName(), $cols, $rows);
    }

    public function down()
    {
        echo "m170519_022103_loadTestData cannot be reverted.\n";

        return false;
    }
}
