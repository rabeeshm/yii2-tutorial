<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_details}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m200813_121132_create_user_details_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_details}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(16)->notNull(),
            'user_id' => $this->integer(11),
            'street' => $this->string(16),
            'city' => $this->string(16),
            'zip' => $this->integer(11)->notNull(),
            'state' => $this->string(16),
            'country' => $this->string(16),
            'delivery_type' => $this->integer(11),
            'created_by' => $this->integer(11),
            'created_at' => $this->string(16),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-user_details-user_id}}',
            '{{%user_details}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-user_details-user_id}}',
            '{{%user_details}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-user_details-created_by}}',
            '{{%user_details}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-user_details-created_by}}',
            '{{%user_details}}',
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
            '{{%fk-user_details-user_id}}',
            '{{%user_details}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-user_details-user_id}}',
            '{{%user_details}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-user_details-created_by}}',
            '{{%user_details}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-user_details-created_by}}',
            '{{%user_details}}'
        );

        $this->dropTable('{{%user_details}}');
    }
}
