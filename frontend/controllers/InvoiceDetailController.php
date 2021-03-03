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
        unset($actions['update']);
        
        
        return $actions;
        
    }
    
    public function prepareDataProvider() {
        
        return new ActiveDataProvider([
            'query' => $this->modelClass::find()->andWhere(['invoice_id' => \Yii::$app->request->get('invoice_id')])
        ]);
        
    }
    
    protected function updateInvoiceValue($id, $quantity, $price) {
            $modelInvoice = Invoice::find()->where(['id' => $id])->one();        
            $invoiceDetails = InvoiceDetail::find()->andWhere(['invoice_id' => $id])->all();
            $value = 0;
            if($invoiceDetails) { // if the invoice has details
                foreach ($invoiceDetails as $invoiceDetail) {
                    $value += $invoiceDetail['quantity'] * $invoiceDetail['price'];
                }
                $modelInvoice->value = $value;
            } else { 
                $modelInvoice->value = $quantity * $price;
            }                                                
            if($modelInvoice->save()) {
                return true;
            }
            
            return false;
            
    }
    
    public function actionCreate()
    {

            $model = new \common\models\InvoiceDetail();
            $response = array();
            $response["success"] = false;  
            $response["message"] = "Failed to save Record"; 

            if ($model->load(\Yii::$app->getRequest()->getBodyParams(), '')) {
                    if($model->save() && 
                            $this->updateInvoiceValue($model->invoice_id, $model->quantity, $model->price)){                        
                        $response["success"] = true;
                        $response["message"] = "Saved Record";
                    }
            }
            return ($response); 
    }

    public function actionUpdate($id) {
        
            $model = $this->findModel($id);
            $response = array();
            $response["success"] = false;  
            $response["message"] = "Failed to save Record"; 
            if ($model->load(\Yii::$app->getRequest()->getBodyParams(), '')) {
                    if($model->save() && 
                            $this->updateInvoiceValue($model->invoice_id, $model->quantity, $model->price)){                        
                        $response["success"] = true;
                        $response["message"] = "Saved Record";
                    }
            }
            return ($response);
                
    }
    
    protected function findModel($id)
    {
        if (($model = InvoiceDetail::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    
    
    
}
