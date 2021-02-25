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
        return['created_at', 'updated_at', 'created_by'];
    }
    
}
