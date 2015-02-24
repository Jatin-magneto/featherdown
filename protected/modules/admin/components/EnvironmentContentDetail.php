<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
Yii::import('zii.widgets.CPortlet');

class EnvironmentContentDetail extends CPortlet
{
    public $primary_table_id;
    public $primary_table_flag;
    public $model2;
    public $form;
    
    
    
    public function getContents(){
        return EnvironmentContent::model()->findEnvironmentContent($this->primary_table_id,$this->primary_table_flag);
    }
    
    protected function renderContent(){
        $this->render('environmentcontent', array('model' => $this->model2, 'form' => $this->form));
    }
}