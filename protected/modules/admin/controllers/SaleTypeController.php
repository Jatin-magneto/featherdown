<?php

class SaleTypeController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','deleterec'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
                'actions'=>array('index','view'),
				'users'=>array('*'),
			),
            array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new SaleType;
        $model2 = new EnvironmentContent;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SaleType']))
		{
			$model->attributes=$_POST['SaleType'];
            $user = Yii::app()->user;
            
            $model->created_on = new CDbExpression('NOW()');
            $model->created_by = Yii::app()->user->username;
	    $model->updated_on = new CDbExpression('NOW()');
			$model->updated_by = Yii::app()->user->username;
            
            $model->environments = implode(',',$model->environments);
            
			if($model->save()){
                $id = $model->getPrimaryKey();
                Functions::insertEnvironmentContent($_POST['EnvironmentContent'],$id,'2');
				Yii::app()->user->setFlash('info', "Record has been inserted successfully.");
            	$this->redirect(array('admin')); 
			}
			
		}
		
		if(isset($model->environments)){
			$model->environments = explode(',',$model->environments);
		}

		$this->render('create',array(
			'model'=>$model,
            'model2'=>$model2,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
        $model2=EnvironmentContent::model()->findAll(array('condition'=>"primary_table_id=$id and primary_table_flag=2"));
        $model->environments = explode(',',$model->environments);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SaleType']))
		{
			$model->attributes=$_POST['SaleType'];
            $user = Yii::app()->user;
            
            $model->updated_on = new CDbExpression('NOW()');
            $model->updated_by = Yii::app()->user->username;
            $model->environments = implode(',',$model->environments);
			if($model->save()){
                $id = $model->getPrimaryKey();
                Functions::updateEnvironmentContent($_POST['EnvironmentContent'],$id,'2');
				Yii::app()->user->setFlash('info', "Record has been updated successfully.");
				$this->redirect(array('admin'));
            }
			
		}

		$this->render('update',array(
			'model'=>$model,
            'model2'=>$model2,
		));
	}
	
	/**
	* Deletes a particular model.
	* If deletion is successful, the browser will be redirected to the 'admin' page.
	* @param integer $id the ID of the model to be deleted
	*/
	public function actionDeleterec()
	{
		try{
			$id = str_replace('-',',',rtrim($_GET['id'],'-'));
			SaleType::model()->deleteAll("sale_type_id IN ($id)");
			Functions::deleteEnvironmentContent($id,'2');
			Yii::app()->user->setFlash('info', "Record has been deleted successfully.");
			$this->redirect(array('admin'));
		}catch(CDbException $e){
			//You can have nother error handling
			Yii::app()->user->setFlash('error', "Can not delete this record(s). Foreign constraint violation.");
			$this->redirect(array('admin'));
		}
	}
	
	
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('SaleType');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new SaleType('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SaleType']))
			$model->attributes=$_GET['SaleType'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return SaleType the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=SaleType::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param SaleType $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='sale-type-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
