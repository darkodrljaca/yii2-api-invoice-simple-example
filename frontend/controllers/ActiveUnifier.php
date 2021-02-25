<?php

namespace frontend\controllers;

use Yii;
use yii\rest\ActiveController as ActCon;
use yii\filters\auth\HttpBearerAuth;
use yii\web\ForbiddenHttpException;

/**
 * Description of ActivUnifier
 *
 * @author darko
 */
class ActiveUnifier extends ActCon {
    
    public function behaviors() {
                
        $behaviors = parent::behaviors();
        $behaviors['authenticator']['only'] = ['create', 'update', 'delete'];
        $behaviors['authenticator']['authMethods'] = [
            HttpBearerAuth::class
        ];
                
        return $behaviors;
        
    }
    
    /**
     * @param Invoice/InvoiceDetail $model
     *      
     */
    
    public function checkAccess($action, $model = null, $params = array()) {
        
        if(in_array($action, ['update', 'delete']) && $model->created_by !== Yii::$app->user->id) {
            throw new ForbiddenHttpException('permission denied');
        }
        
    }
    
    
    
}
