<?php

namespace frontend\controllers;

use frontend\api_res\Invoice;

/**
 * Description of InvoiceController
 *
 * @author darko
 */
class InvoiceController extends ActiveUnifier {
    
    public $modelClass = Invoice::class;        
    
}
