<?php

class LocationController extends Controller
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
				'actions'=>array('admin','delete','deleterec','addProduct','updateLocation','deleteProduct','exportProduct'),
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
		$model=new Location;
		$model2 = new EnvironmentContent;
		$model_lp = new LocationProduct;
		$model_ls = new LocationSalePrice;
		

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Location']))
		{
			$model->attributes=$_POST['Location'];
			
			$model->created_on = new CDbExpression('NOW()');
			$model->created_by = Yii::app()->user->username;
			$model->updated_on = new CDbExpression('NOW()');
			$model->updated_by = Yii::app()->user->username;
			
			if(CUploadedFile::getInstance($model,'image') != ''){
				$model->image 		= CUploadedFile::getInstance($model,'image');
				$save				= $model->image;
				$name 				= 'images/location/'.uniqid().'_'.$model->image;
				$model->image		= $name;
			}else{
				$model->image 		= '';
			}
			
			$model->environments = implode(',',$model->environments);
			
			if($model->save()){
				if(CUploadedFile::getInstance($model,'image') != '')
					$save->saveAs($name);
					
				$id = $model->getPrimaryKey();
				Functions::insertEnvironmentContent($_POST['EnvironmentContent'],$id,'9');
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
			'model_lp'=>$model_lp,
			'model_ls'=>$model_ls,
		));
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionAddProduct()
	{
		//pre($_POST);
		if(isset($_POST['LocationProduct']['location_product_id'])){
			$model=LocationProduct::model()->findByPk($_POST['LocationProduct']['location_product_id']);	
		}else{
			$model=new LocationProduct;
		}
		
		if(isset($_POST['LocationSalePrice'])){
			$price_arr = $_POST['LocationSalePrice'];
		}
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['LocationProduct']))
		{
			$model->attributes=$_POST['LocationProduct'];
			
			$location_id = $model->location_id	= $_POST['location'];
			
			if($model->stock_from != ''){
				$model->stock_from	= customDateFormat('m-d-Y','Y-m-d',$model->stock_from);
			}
			if($model->stock_till != ''){
				$model->stock_till	= customDateFormat('m-d-Y','Y-m-d',$model->stock_till);
			}
			
			$model->available_days = implode(',',$model->available_days);
			$model->sale_type_id = implode(',',$model->sale_type_id);
			
			$model->created_on 	= new CDbExpression('NOW()');
			$model->created_by 	= Yii::app()->user->username;
			$model->updated_on 	= new CDbExpression('NOW()');
			$model->updated_by 	= Yii::app()->user->username;
			//pre($_POST);
			if($model->save()){
				$id = $model->getPrimaryKey();
				LocationSalePrice::model()->deleteAll(array('condition'=>"location_product_id = $id and location_id=$location_id"));
				foreach($price_arr as $key => $val){
					$price = new LocationSalePrice;
					$price->locale_id = $key;
					$price->location_id = $_POST['location'];
					$price->location_product_id = $id;
					$price->location_sale_price = $val['location_sale_price'];
					if(!$price->save()){
						pre($price->getErrors());
					}
				}
				
				Yii::app()->user->setFlash('info', "Record has been inserted successfully.");
				$this->redirect(array('update','id'=>$_POST['location'],'#'=>'locationProductsTab'));
			}
		}
	}
	
	/**
	* Exports a particular model.
	* If deletion is successful, the browser will be redirected to the 'admin' page.
	* @param integer $id the ID of the model to be deleted
	*/
	public function actionExportProduct()
	{
		$location_id = $_GET['l_id'];
		if(isset($_GET['id'])){
			$id = str_replace('-',',',rtrim($_GET['id'],'-'));
			$product_data = LocationProduct::model()->findAll(array('condition'=>"location_product_id IN ($id) and location_id = $location_id"));
		}else{
			$product_data = LocationProduct::model()->findAll(array('condition'=>"location_id = $location_id"));
		}
		
		$location_product_0 = array('product_id'=>'product',
									'sale_type_id'=>'saletype',
									'stock_from'=>'from',
									'stock_till'=>'until',
									'total_qty'=>'quantity',
									'available_days'=>'weekday',
									'available_nights'=>'nights',
									'available_type'=>'stay_type',
									'available_special_type_id'=>'special_stay_type');
		
		$location_product_2 = array('sale_price_unit_id'=>'price_unit',
									'sale_percentage'=>'percentage',
									'purchase_price'=>'purchase_price',
									'purchase_price_unit_id'=>'purchase_price_unit',
									'purchase_percentage'=>'purchase_percentage',
									'sale_max_qty'=>'max_quantity',
									'sale_max_unit_id'=>'max_quantity_unit',
									'is_manadatory'=>'mandatory',
									'primary_status'=>'primary_process',
									'secondary_status'=>'secondary_process');
		
		$location_sale_type = CHtml::listData(LocationSaleType::model()->findAll(),'location_sale_type_id','location_sale_type');
		$location_stay_type = CHtml::listData(LocationStayType::model()->findAll(),'location_stay_type_id','location_stay_type');
		$location_special_type = CHtml::listData(LocationSpecialType::model()->findAll(),'location_special_type_id','location_special_type');
		$location_unit = CHtml::listData(LocationUnit::model()->findAll(),'location_unit_id','location_unit');
		$locale = CHtml::listData(Locale::model()->findAll(),'locale_id','locale');
		
		Yii::import('ext.phpexcel.XPHPExcel');
		$objPHPExcel= XPHPExcel::createPHPExcel();
		$objPHPExcel->getProperties()->setCreator("Featherdown");
		
		$row = 1;
		$col = 0;
		
		$objPHPExcel->setActiveSheetIndex(0);

		foreach($location_product_0 as $key=>$value) {
		    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $value);
		    $col++;
		}
		foreach($locale as $key=>$value) {
		    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $value." Price");
		    $col++;
		}
		foreach($location_product_2 as $key=>$value) {
		    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $value);
		    $col++;
		}
		
		$row = 2;
		foreach($product_data as $key=>$value){
			$col = 0;
			
			$location_product_id = $value->location_product_id;
			$location_id = $value->location_id;
			$product_id = $value->product_id;
			
			$name = Product::model()->findall(array('condition'=>"product_id = $product_id",'select'=>'title'));
			
            $name = $name[0]->title;
			
			$location_product_price_data = LocationSalePrice::model()->findAll(array('condition'=>"location_product_id=$location_product_id and location_id = $location_id"));
			
			foreach($location_product_0 as $k=>$v) {
				if($k == 'product_id'){
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $name);	
				}else if($k == 'sale_type_id'){
					$sale_type = explode(',',$value->sale_type_id);
					$types = array();
					foreach($sale_type as $s_t){
					  $types[] = $location_sale_type[$s_t];
					}
					$types = implode(',',$types);
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $types);	
				}else if($k == 'stock_from' || $k == 'stock_till'){
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, customDateFormat('Y-m-d','m-d-Y',($value->$k !='0000-00-00')?$value->$k:''));	
				}else if($k == 'available_type'){
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $location_stay_type[$value->available_type]);	
				}else if($k == 'available_special_type_id'){
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $location_special_type[$value->available_special_type_id]);	
				}else{
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $value->$k);	
				}
			    
			    $col++;
			}
			
			foreach($locale as $key=>$val) {
				$flag = 0;
				foreach($location_product_price_data as $ke=>$va) {
					if($key == $va->locale_id){
						$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $va->location_sale_price);
						$flag = 1;
					}
				}
				if($flag == 0){
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, '');
				}
				$col++;
			}
			
			foreach($location_product_2 as $k=>$v) {
			    
				if($k == 'sale_price_unit_id'){
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $location_unit[$value->sale_price_unit_id]);	
				}else if($k == 'sale_max_unit_id'){
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $location_unit[$value->sale_max_unit_id]);	
				}else if($k == 'purchase_price_unit_id'){
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $location_unit[$value->purchase_price_unit_id]);	
				}else{
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $value->$k);
				}
			    $col++;
			}
		   $row++;
		}
		
		// Redirect output to a client's web browser (Excel5)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="location_product.xls"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');
		 
		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0
		 
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		Yii::app()->end();
		
		$this->redirect(array('update','id'=>$_GET['l_id'],'#'=>'locationProductsTab'));
	}
	
	/**
	* Deletes a particular model.
	* If deletion is successful, the browser will be redirected to the 'admin' page.
	* @param integer $id the ID of the model to be deleted
	*/
	public function actionDeleteProduct()
	{
		try{
			$id = str_replace('-',',',rtrim($_GET['id'],'-'));
			$location_id = $_GET['l_id'];
			LocationProduct::model()->deleteAll("location_product_id IN ($id)");
			LocationSalePrice::model()->deleteAll(array('condition'=>"location_product_id = $id and location_id=$location_id"));
			Yii::app()->user->setFlash('info', "Record has been deleted successfully.");
			$this->redirect(array('update','id'=>$_GET['l_id'],'#'=>'locationProductsTab'));
		}catch(CDbException $e){
			//You can have nother error handling
			Yii::app()->user->setFlash('error', "Can not delete this record(s). Foreign constraint violation.");
			$this->redirect(array('update','id'=>$_GET['l_id'],'#'=>'locationProductsTab'));
		}
	}
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdateLocation()
	{
		$location_product_id = $_POST['location_product_id'];
		$location_id = $_POST['location_id'];
		
		$location_product_data = LocationProduct::model()->findAll(array('condition'=>"location_product_id=$location_product_id"));
		$location_product_data = $location_product_data[0];
		
		$location_product_price_data = LocationSalePrice::model()->findAll(array('condition'=>"location_product_id=$location_product_id and location_id = $location_id"));
		
		$data = array();
		
		foreach($location_product_data as $key=>$val){
			$data['productData'][$key]=$val;
		}
		
		foreach($location_product_price_data as $k=>$v){
			foreach($v as $key=>$val){
				$data['productPrice'][$k][$key]=$val;
			}
		}
		
		echo $data = json_encode($data);
	}
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id,$activeTab=true)
	{
		$model=$this->loadModel($id);
		$model2=EnvironmentContent::model()->findAll(array('condition'=>"primary_table_id=$id and primary_table_flag=9"));
		$model->environments = explode(',',$model->environments);
		
		$model_lp = new LocationProduct;
		$model_ls = new LocationSalePrice;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['Location']))
		{
			$old_image = $model->image;
			$model->attributes=$_POST['Location'];
			
			$image = CUploadedFile::getInstance($model,'image');
			$image_name = 'images/product/'.uniqid().'_'.$image;
			
			if ( (is_object($image) && get_class($image)==='CUploadedFile')){
			    $model->image = $image_name;
			}else{
				$model->image = $old_image;
				
			}
			
			$model->updated_on = new CDbExpression('NOW()');
			$model->updated_by = Yii::app()->user->username;
			$model->environments = implode(',',$model->environments);
			
			if($model->save()){
				
				if (is_object($image)){
					
					if (file_exists($old_image))
						unlink($old_image);
					
					$image->saveAs($image_name);
				}
				
				$id = $model->getPrimaryKey();
				Functions::updateEnvironmentContent($_POST['EnvironmentContent'],$id,'9');
				Yii::app()->user->setFlash('info', "Record has been updated successfully.");
				$this->redirect(array('admin'));
			}
		}
			
		$this->render('update',array(
			'model'=>$model,
			'model2'=>$model2,
			'model_lp'=>$model_lp,
			'model_ls'=>$model_ls,
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
			SaleChannelType::model()->deleteAll("location_id IN ($id)");
			Functions::deleteEnvironmentContent($id,'9');
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
		$dataProvider=new CActiveDataProvider('Location');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Location('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Location']))
			$model->attributes=$_GET['Location'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Location the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Location::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Location $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='location-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
