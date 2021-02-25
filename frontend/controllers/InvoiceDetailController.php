<?php


namespace frontend\controllers;

use yii\rest\ActiveController;
use frontend\api_res\InvoiceDetail;

/**
 * Description of InvoiceDetailController
 *
 * @author darko
 */
class InvoiceDetailController extends ActiveController {
    
    public $modelClass = InvoiceDetail::class;
    
}
