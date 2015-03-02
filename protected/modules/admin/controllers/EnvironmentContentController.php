<?php

class EnvironmentContentController extends Controller
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','CheckSlug'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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
		$model=new EnvironmentContent;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['EnvironmentContent']))
		{
			$model->attributes=$_POST['EnvironmentContent'];
			if($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('create',array(
			'model'=>$model,
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['EnvironmentContent']))
		{
			$model->attributes=$_POST['EnvironmentContent'];
			if($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
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
		$dataProvider=new CActiveDataProvider('EnvironmentContent');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new EnvironmentContent('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EnvironmentContent']))
			$model->attributes=$_GET['EnvironmentContent'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Ckeck slug unique
	 */
	public function actionCheckSlug()
	{
		if(isset($_POST['slug'])){
			
			$lang_id				= $_POST['lang_id'];
			$slug					= $_POST['slug'];
			$primary_table_flag		= $_POST['primary_table_flag'];
			$primary_table_id		= $_POST['primary_table_id'];
			
			if($primary_table_id == 0){
				$arr = EnvironmentContent::model()->findAll(array('condition'=>"`language_id` = $lang_id AND `env_title_slug` = '$slug' AND `primary_table_flag` = $primary_table_flag"));
			}else{
				$arr = EnvironmentContent::model()->findAll(array('condition'=>"`language_id` = $lang_id AND `env_title_slug` = '$slug' AND `primary_table_flag` = $primary_table_flag and primary_table_id!=$primary_table_id"));
			}
			//EnvironmentContent::model()->findAll(array('condition'=>"primary_table_id=$id and primary_table_flag=5"));
			if(count($arr) >= 1){
				echo 'false';
			}else{
				echo 'true';
			}
		}
	}
	
	
	
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return EnvironmentContent the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=EnvironmentContent::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param EnvironmentContent $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='environment-content-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
