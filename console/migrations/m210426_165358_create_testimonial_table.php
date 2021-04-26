<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%testimonial}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m210426_165358_create_testimonial_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%testimonial}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(128)->notNull(),
            'description' => $this->string(256)->notNull(),
            'created_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-testimonial-created_by}}',
            '{{%testimonial}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-testimonial-created_by}}',
            '{{%testimonial}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-testimonial-updated_by}}',
            '{{%testimonial}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-testimonial-updated_by}}',
            '{{%testimonial}}',
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
            '{{%fk-testimonial-created_by}}',
            '{{%testimonial}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-testimonial-created_by}}',
            '{{%testimonial}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-testimonial-updated_by}}',
            '{{%testimonial}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-testimonial-updated_by}}',
            '{{%testimonial}}'
        );

        $this->dropTable('{{%testimonial}}');
    }
}
