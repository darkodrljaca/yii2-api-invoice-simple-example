<?php

namespace frontend\controllers;

use yii\rest\ActiveController;
use yii\filters\auth\HttpBearerAuth;
use frontend\api_res\Invoice;

/**
 * Description of InvoiceController
 *
 * @author darko
 */
class InvoiceController extends ActiveController {
    
    public $modelClass = Invoice::class;
    
    public function behaviors() {
                
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::class
        ];
                
        return $behaviors;
        
    }
    
}
