<?php


namespace frontend\controllers;

use yii\data\ActiveDataProvider;
use frontend\api_res\InvoiceDetail;

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
        
        return $actions;
        
    }
    
    public function prepareDataProvider() {
        
        return new ActiveDataProvider([
            'query' => $this->modelClass::find()->andWhere(['invoice_id' => \Yii::$app->request->get('invoice_id')])
        ]);
        
    }
    
    
    
}
