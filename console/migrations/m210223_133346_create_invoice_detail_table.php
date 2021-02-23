<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%invoice_detail}}`.
 */
class m210223_133346_create_invoice_detail_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%invoice_detail}}', [
            'id' => $this->primaryKey(),
            'item' => $this->string(50)->notNull(),
            'quantity' => $this->integer()->notNull(),
            'price' => $this->decimal()->notNull(),
            'note' => $this->string(100),
            'invoice_id' => $this->integer(),             
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer()
        ]);
        $this->addForeignKey('fk_invoice_detail_user_created_by', '{{%invoice_detail}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk_invoice_detail_invoice_invoice_id', '{{%invoice_detail}}', 'invoice_id', '{{%invoice}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_invoice_detail_user_created_by', '{{%invoice_detail}}');
        $this->dropForeignKey('fk_invoice_detail_invoice_invoice_id', '{{%invoice_detail}}');
        $this->dropTable('{{%invoice_detail}}');
    }
}
