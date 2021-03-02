<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%invoice}}`.
 */
class m210223_132310_create_invoice_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%invoice}}', [
            'id' => $this->primaryKey(),
            'date' => $this->date()->notNull(),
            'document' => $this->string(100)->notNull(),
            'customer_name' => $this->string(50)->notNull(),
            'customer_address' => $this->string(255)->notNull(),
            'value' => $this->decimal(14, 2),
            'note' => $this->string(100),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer()
        ]);
        $this->addForeignKey('fk_invoice_user_created_by', '{{%invoice}}', 'created_by', '{{%user}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_invoice_user_created_by', '{{%invoice}}');
        $this->dropTable('{{%invoice}}');
    }
}
