<?php

class UserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */


	

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // deny all users
				'actions'=>array('login','forgotpwd'),
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
		$model=new Supplier;
		
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);
		
		if(isset($_POST['Supplier']))
		{
			$model->attributes=$_POST['Supplier'];
			
			$model->created_on	= new CDbExpression('NOW()');
			$model->created_by	= Yii::app()->user->username;
			$model->updated_on 	= new CDbExpression('NOW()');
			$model->updated_by 	= Yii::app()->user->username;
			
			$model->environments	= implode(',',$model->environments);
			
			$model->password 	= md5($model->password);
			$model->repeat_password 	= md5($model->repeat_password);
			
			if($model->dob != ''){
				$model->dob 	= customDateFormat('m-d-Y','Y-m-d',$model->dob);
			}
			
			if($model->save()){
				Yii::app()->user->setFlash('info', "Record has been inserted successfully.");
				$this->redirect(array('admin'));
			}
		}
		
		if($model->dob != ''){
			$model->dob 	= customDateFormat('m-d-Y','Y-m-d',$model->dob);
		}
		
		if(isset($model->password)){
			$model->password = '';
		}
		
		if(isset($model->repeat_password)){
			$model->repeat_password = '';
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
		$model->environments = explode(',',$model->environments);
		
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);
		
		if(isset($_POST['Supplier']))
		{
			$old_password = $model->password;
			if($_POST['Supplier']['password'] == ''){
				$_POST['Supplier']['password'] = $old_password;
			}else{
				$_POST['Supplier']['password'] = md5($_POST['Supplier']['password']);
			}
			
			$model->attributes=$_POST['Supplier'];
			
			$model->updated_on = new CDbExpression('NOW()');
			$model->updated_by = Yii::app()->user->username;
			
			$model->environments = implode(',',$model->environments);
			
			if($model->dob != ''){
				$model->dob 	= customDateFormat('m-d-Y','Y-m-d',$model->dob);
			}
			
			if($model->save()){
				Yii::app()->user->setFlash('info', "Record has been updated successfully.");
				$this->redirect(array('admin'));
			}
		}
		
		$model->password = '';
		
		if($model->dob != '0000-00-00'){
			$model->dob = customDateFormat('Y-m-d','m-d-Y',$model->dob);
		}else{
			$model->dob = '';
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
	public function actionDeleterec()
	{
		try{
			$id = str_replace('-',',',rtrim($_GET['id'],'-'));
			Product::model()->deleteAll("supplier_id IN ($id)");
			Yii::app()->user->setFlash('info', "Record has been deleted successfully.");
			$this->redirect(array('admin'));
		}catch(CDbException $e){
			//You can have nother error handling
			Yii::app()->user->setFlash('error', "Can not delete this record(s). Foreign constraint violation.");
			$this->redirect(array('admin'));
		}
	}
	
	public function actionForgotpwd(){
		
		$model					= new Supplier;
		$rnd 					= Yii::app()->request->getParam('rnd');			
		$criteria 				= new CDbCriteria;
		$criteria->select		= "supplier_id";
		$criteria->condition	= " random_str = '$rnd' ";
		$active_emails 			= Supplier::model()->findAll($criteria);
		
		if(isset($_POST['Supplier'])) {
			
			$password	= md5($_POST['Supplier']['password']);
			$sql		= " UPDATE tbl_supplier SET password = '$password', random_str = '' WHERE supplier_id = ".Yii::app()->session['reset_user_id'];			
			
			if(Common::model()->executeQuery($sql)){
				Yii::app()->user->setFlash('info', "Password has been reset successfully.");
				unset(Yii::app()->session['reset_user_id']);
				$this->redirect(array('message'));
			}
		}
		
		if(isset($active_emails[0]['supplier_id'])) {
			Yii::app()->session['reset_user_id'] = $active_emails[0]['supplier_id'];
			$message			= '';			
		} else {			
			Yii::app()->user->setFlash('info', "Sorry, you haven't requested to reset password.");
			$this->redirect(array('message'));
		}
		
		$this->render('forgotpwd',array(			
			'message' 	=> $message,
			'model'		=> $model
		));
	}
	
	/**
	 * Displays the message on page
	 */
	public function actionMessage(){
		$this->render('message');
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
		$dataProvider=new CActiveDataProvider('Supplier');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Supplier('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Supplier']))
			$model->attributes=$_GET['Supplier'];
			
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Supplier the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Supplier::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Supplier $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='supplier-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
