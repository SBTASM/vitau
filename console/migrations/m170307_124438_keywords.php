<?php

use yii\db\Migration;

class m170307_124438_keywords extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable("{{%keywords}}", [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'keyword_id' => $this->integer()->notNull(),
            'gratter_id' => $this->integer()->notNull()
        ], $tableOptions);

        $this->createIndex('idx-keywords-owner_id', 'keywords', 'owner_id');
        $this->createIndex('idx-keywords-keyword_id', 'keywords', 'keyword_id');
        $this->createIndex('idx-keywords-gratter_id', 'keywords', 'gratter_id');

        $this->addForeignKey(
            'fk-keywords-owner_id',
            'keywords',
            'owner_id',
            'category',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-keywords-keyword_id',
            'keywords',
            'keyword_id',
            'keyword',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-keywords-gratter_id',
            'keywords',
            'gratter_id',
            'gratter',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        echo "m170307_124438_keywords cannot be reverted.\n";

        return $this->dropTable("{{%keywords}}");
    }
}
