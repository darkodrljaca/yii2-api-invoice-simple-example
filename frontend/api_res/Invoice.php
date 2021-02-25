<?php

namespace frontend\api_res;

use common\models\Invoice as Inv;

/**
 * Description of Invoice
 *
 * @author darko
 */
class Invoice extends Inv {
    
    public function fields() {
        return ['id', 'date', 'document', 'customer_name', 'customer_address'];
    }
    
    public function extraFields() {
        return['invoiceDetails', 'created_at', 'updated_at', 'created_by'];
    }
    
    /**
     * Gets query for [[InvoiceDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInvoiceDetails()
    {
        return $this->hasMany(InvoiceDetail::class, ['invoice_id' => 'id']);
    }
    
}
