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
        return['created_at', 'updated_at', 'created_by'];
    }
    
}
