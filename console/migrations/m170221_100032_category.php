<?php

use yii\db\Migration;

class m170221_100032_category extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'date' => $this->string()->defaultValue(NULL),
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170221_100032_category cannot be reverted.\n";

        return $this->dropTable('{{%category}}');
    }
}
