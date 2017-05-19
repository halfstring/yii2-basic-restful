<?php

use yii\db\Migration;

class m170519_012711_init_table extends Migration {

    // Use up()/down() to run migration code without a transaction.
    public function up() {
        $tableOptions = NULL;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable("{{%user}}", [
            'id'        => $this->primaryKey(),
            'name'      => $this->string(50)->comment("用户名称"),
            'age'       => $this->integer(100)->defaultValue(18)->comment("年龄"),
            'mobile'    => $this->string(11)->comment('手机号'),
            'address'   => $this->string(255)->comment('地址'),
            'create_at' => $this->integer(11)->comment("创建时间")
        ], $tableOptions . ' COMMENT "用户表"');

        $this->createIndex('i_user_mobile', "{{%user}}", 'mobile');
    }

    public function down() {
        $this->dropTable("{{%user}}");

        return FALSE;
    }


}
