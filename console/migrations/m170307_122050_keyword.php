<?php

use yii\db\Migration;

class m170307_122050_keyword extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable("{{%keyword}}", [
            'id' => $this->primaryKey(),
            'word' => $this->string()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170307_122050_keyword cannot be reverted.\n";

        return $this->dropTable("{{%keyword}}");
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
