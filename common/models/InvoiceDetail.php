<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "invoice_detail".
 *
 * @property int $id
 * @property string $item
 * @property int $quantity
 * @property float $price
 * @property string|null $note
 * @property int|null $invoice_id
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 *
 * @property Invoice $invoice
 * @property User $createdBy
 */
class InvoiceDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'invoice_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item', 'quantity', 'price'], 'required'],
            [['quantity', 'invoice_id', 'created_at', 'updated_at', 'created_by'], 'integer'],
            [['price'], 'number'],
            [['item'], 'string', 'max' => 50],
            [['note'], 'string', 'max' => 100],
            [['invoice_id'], 'exist', 'skipOnError' => true, 'targetClass' => Invoice::className(), 'targetAttribute' => ['invoice_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item' => 'Item',
            'quantity' => 'Quantity',
            'price' => 'Price',
            'note' => 'Note',
            'invoice_id' => 'Invoice ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
        ];
    }

    /**
     * Gets query for [[Invoice]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInvoice()
    {
        return $this->hasOne(Invoice::className(), ['id' => 'invoice_id']);
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
}
