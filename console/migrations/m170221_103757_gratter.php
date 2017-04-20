<?php

use yii\db\Migration;

class m170221_103757_gratter extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%gratter}}', [
            'id' => $this->primaryKey(),
            'text' => $this->text()->notNull(),
            'category_id' => $this->integer()->defaultValue(NULL),
            'created_at' => $this->string()->notNull(),
            'updated_at' => $this->string()->notNull(),
        ], $tableOptions);

        $this->createIndex('idx-gratter-category_id', 'gratter', 'category_id');

        $this->addForeignKey(
            'fk-gratter-category_id',
            'gratter',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );

    }

    public function down()
    {
        echo "m170221_094835_gretter cannot be reverted.\n";

        return $this->dropTable('{{%gratter}}');
    }
}
