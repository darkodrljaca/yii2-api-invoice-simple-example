<?php


namespace frontend\controllers;

use yii\data\ActiveDataProvider;
use frontend\api_res\InvoiceDetail;
use common\models\Invoice;
use Yii;

/**
 * Description of InvoiceDetailController
 *
 * @author darko
 */
class InvoiceDetailController extends ActiveUnifier {
    
    public $modelClass = InvoiceDetail::class;
    
    
    
    public function actions() {
        
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        
        unset($actions['create']);
        
        
        return $actions;
        
    }
    
    public function prepareDataProvider() {
        
        return new ActiveDataProvider([
            'query' => $this->modelClass::find()->andWhere(['invoice_id' => \Yii::$app->request->get('invoice_id')])
        ]);
        
    }
    
    public function actionCreate()
    {

            $model = new \common\models\InvoiceDetail();
            $response = array();
            $response["success"] = false;  
            $response["message"] = "Failed to save Record"; 

            if ($model->load(\Yii::$app->getRequest()->getBodyParams(), '')) {
                    if($model->save()){
                        $modelInvoice = Invoice::find()->where(['id' => $model->invoice_id])->one();        
                        $invoiceDetails = InvoiceDetail::find()->andWhere(['invoice_id' => $model->invoice_id])->all();
                        $value = 0;
                        if($invoiceDetails) {
                            foreach ($invoiceDetails as $invoiceDetail) {
                                $value += $invoiceDetail['quantity'] * $invoiceDetail['price'];
                            }
                            $modelInvoice->value = $value;
                        } else {
                            $modelInvoice->value = $model->quantity * $model->price;
                        }                                                
                        if($modelInvoice->save()) {
                            $response["success"] = true;
			    $response["message"] = "Saved Record"; 
                        }                            
                    }
            }
            return ($response); 
    }

    
    
    
    
    
}
