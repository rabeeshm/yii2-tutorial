<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ingredients}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m200813_114045_create_ingredients_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ingredients}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(16)->notNull(),
            'unit_price' => $this->decimal(2,2)->notNull(),
            'created_by' => $this->integer(11),
            'created_at' => $this->string(16),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-ingredients-created_by}}',
            '{{%ingredients}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-ingredients-created_by}}',
            '{{%ingredients}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-ingredients-created_by}}',
            '{{%ingredients}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-ingredients-created_by}}',
            '{{%ingredients}}'
        );

        $this->dropTable('{{%ingredients}}');
    }
}
