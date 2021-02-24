<?php

namespace frontend\controllers;

use yii\rest\ActiveController;
use frontend\api_res\Invoice;

/**
 * Description of InvoiceController
 *
 * @author darko
 */
class InvoiceController extends ActiveController {
    
    public $modelClass = Invoice::class;
    
}
