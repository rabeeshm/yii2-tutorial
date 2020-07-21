<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m200720_021034_create_product_table extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'slug' => Schema::TYPE_STRING,
            'product_name' => $this->string(512)->notNull(),
            'price' => $this->decimal()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        $this->dropTable('{{%product}}');
    }

    public function up() {
        $this->addColumn('product', 'slug', 'VARCHAR(64) AFTER id');
    }

}
