<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%event}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m210426_165033_create_event_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%event}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(256)->notNull(),
            'description' => $this->text()->notNull(),
            'host' => $this->integer(11),
            'venue' => $this->string(256)->notNull(),
            'date' => $this->integer(11)->notNull(),
            'time' => $this->string(20)->notNull(),
            'created_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `host`
        $this->createIndex(
            '{{%idx-event-host}}',
            '{{%event}}',
            'host'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-event-host}}',
            '{{%event}}',
            'host',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-event-created_by}}',
            '{{%event}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-event-created_by}}',
            '{{%event}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-event-updated_by}}',
            '{{%event}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-event-updated_by}}',
            '{{%event}}',
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
            '{{%fk-event-host}}',
            '{{%event}}'
        );

        // drops index for column `host`
        $this->dropIndex(
            '{{%idx-event-host}}',
            '{{%event}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-event-created_by}}',
            '{{%event}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-event-created_by}}',
            '{{%event}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-event-updated_by}}',
            '{{%event}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-event-updated_by}}',
            '{{%event}}'
        );

        $this->dropTable('{{%event}}');
    }
}
