<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%companies}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%categories}}`
 */
class m200803_114550_create_companies_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%companies}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(12)->comment('Идентификатор категории'),
            'name' => $this->string(30)->comment('Название'),
        ]);

        // creates index for column `category_id`
        $this->createIndex(
            '{{%idx-companies-category_id}}',
            '{{%companies}}',
            'category_id'
        );

        // add foreign key for table `{{%categories}}`
        $this->addForeignKey(
            '{{%fk-companies-category_id}}',
            '{{%companies}}',
            'category_id',
            '{{%categories}}',
            'id',
            'SET NULL'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%categories}}`
        $this->dropForeignKey(
            '{{%fk-companies-category_id}}',
            '{{%companies}}'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            '{{%idx-companies-category_id}}',
            '{{%companies}}'
        );

        $this->dropTable('{{%companies}}');
    }
}
