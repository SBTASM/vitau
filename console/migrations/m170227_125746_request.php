<?php

use yii\db\Migration;

class m170227_125746_request extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable("{{%request}}", [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'text' => $this->text()->notNull(),
            'username' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'note' => $this->text(),
            'viewed' => $this->boolean()->notNull()->defaultValue(false),
        ], $tableOptions);

        $this->createIndex('idx-request-category_id', 'request', 'category_id');

        $this->addForeignKey(
            'fk-request-category_id',
            'request',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        echo "m170227_125746_request cannot be reverted.\n";

        return $this->dropTable("{{%request}}");
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
