<?php

use yii\db\Migration;

class m170222_114820_gratter_extra extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable("{{%gratter_extra}}", [
            'id' => $this->primaryKey(),
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170222_114820_gratter_extra cannot be reverted.\n";

        return $this->dropTable("{{%gratter_extra}}");
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
