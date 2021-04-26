<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%role}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m210426_165313_create_role_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%role}}', [
            'id' => $this->primaryKey(),
            'r_name' => $this->string(50)->notNull(),
            'created_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-role-created_by}}',
            '{{%role}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-role-created_by}}',
            '{{%role}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-role-updated_by}}',
            '{{%role}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-role-updated_by}}',
            '{{%role}}',
            'updated_by',
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
            '{{%fk-role-created_by}}',
            '{{%role}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-role-created_by}}',
            '{{%role}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-role-updated_by}}',
            '{{%role}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-role-updated_by}}',
            '{{%role}}'
        );

        $this->dropTable('{{%role}}');
    }
}
