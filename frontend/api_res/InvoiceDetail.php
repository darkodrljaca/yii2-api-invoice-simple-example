<?php

namespace frontend\api_res;

use common\models\InvoiceDetail as InvDet;

/**
 * Description of Invoice
 *
 * @author darko
 */
class InvoiceDetail extends InvDet {
    
    public function fields() {
        return ['id', 'item', 'quantity', 'price', 'note'];
    }
    
    public function extraFields() {
        return['invoice','created_at', 'updated_at', 'created_by'];
    }
    
    
    /**
     * Gets query for [[Invoice]].
     *
     * @return \yii\db\ActiveQuery
     * 
     * Overwritten method to get only specified fields from invoice.
     */
    public function getInvoice()
    {
        return $this->hasOne(Invoice::className(), ['id' => 'invoice_id']);
    }
    
    
}
