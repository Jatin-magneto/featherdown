<?php

/**
 * This is the model class for table "tbl_product".
 *
 * The followings are the available columns in table 'tbl_product':
 * @property string $product_id
 * @property integer $product_category_id
 * @property integer $ledger_category_id
 * @property string $product_code
 * @property string $title
 * @property integer $allow_max_persons
 * @property integer $allow_max_adults
 * @property string $per_day
 * @property string $per_day_stay
 * @property string $travel_sum
 * @property string $image
 * @property string $isactive
 * @property string $environments
 * @property string $created_by
 * @property string $created_on
 * @property string $updated_by
 * @property string $updated_on
 *
 * The followings are the available model relations:
 * @property AvailableStockInfo[] $availableStockInfos
 * @property BookingDetail[] $bookingDetails
 * @property LocationProduct[] $locationProducts
 * @property ProductCategory $productCategory
 * @property ProductLinked[] $productLinkeds
 */
class Product extends CActiveRecord
{
	public $productcategory, $created, $updated;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_category_id,ledger_category_id,product_code, title, allow_max_persons, allow_max_adults, per_day, per_day_stay, travel_sum, isactive, environments', 'required'),
			array('product_category_id,ledger_category_id, allow_max_persons, allow_max_adults', 'numerical', 'integerOnly'=>true),
			array('image', 'file', 'types'=>'jpg, png','on'=>'insert'),
			//array('image', 'file', 'allowEmpty'=>true,'types'=>'jpg, png','on'=>'update'),
			array('product_code', 'length', 'max'=>50),
			array('title, image', 'length', 'max'=>255),
			array('per_day, per_day_stay, travel_sum, isactive', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('product_id, ledger_category_id ,product_category_id, product_code, title, productcategory, allow_max_persons, allow_max_adults, per_day, per_day_stay, travel_sum, image, isactive, environments, created, updated', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'availableStockInfos' => array(self::HAS_MANY, 'AvailableStockInfo', 'product_id'),
			'bookingDetails' => array(self::HAS_MANY, 'BookingDetail', 'product_id'),
			'locationProducts' => array(self::HAS_MANY, 'LocationProduct', 'product_id'),
			'productCategory' => array(self::BELONGS_TO, 'ProductCategory', 'product_category_id'),
			'productLinkeds' => array(self::HAS_MANY, 'ProductLinked', 'product_id'),
			
			'category' => array(self::BELONGS_TO, 'ProductCategory', 'product_category_id'),
			'ledger' => array(self::BELONGS_TO, 'ledgerCategory', 'ledger_category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'product_id' => 'Product',
			'product_category_id' => 'Product Category',
			'ledger_category_id' => 'Ledger Category',
			'product_code' => 'Product Code',
			'title' => 'Title',
			'allow_max_persons' => 'Max. Persons',
			'allow_max_adults' => 'Max. Adults',
			'per_day' => 'Per Day',
			'per_day_stay' => 'Per Day Of Stay Only',
			'travel_sum' => 'Travel Sum',
			'image' => 'Image',
			'isactive' => 'Is Active',
			'environments' => 'Environments',
			'created_by' => 'Created By',
			'created_on' => 'Created On',
			'updated_by' => 'Updated By',
			'updated_on' => 'Updated On',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		
		$criteria->with = array('productCategory');
		$criteria->compare('productCategory.title',$this->productcategory,true);		

		$criteria->compare('product_id',$this->product_id,true);
		$criteria->compare('product_category_id',$this->product_category_id);
		$criteria->compare('product_code',$this->product_code,true);
		$criteria->compare('t.title',$this->title,true);
		$criteria->compare('allow_max_persons',$this->allow_max_persons);
		$criteria->compare('allow_max_adults',$this->allow_max_adults);
		$criteria->compare('per_day',$this->per_day,true);
		$criteria->compare('per_day_stay',$this->per_day_stay,true);
		$criteria->compare('travel_sum',$this->travel_sum,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('isactive',$this->isactive,true);
		$criteria->compare('environments',$this->environments,true);
		$criteria->compare('CONCAT(t.created_on,t.created_by)',$this->created,true);
		$criteria->compare('CONCAT(t.updated_on,t.updated_by)',$this->updated,true);
		
		$environment_cond = Yii::app()->session['environment_cond'];
	        $criteria->addCondition("$environment_cond");

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'attributes'=>array(
					'productcategory'=>array(
						'asc'=>'productCategory.title',
						'desc'=>'productCategory.title DESC',
					),
					'created'=>array(
						'asc'=>'t.created_on',
						'desc'=>'t.created_on DESC',
					),
					'updated'=>array(
						'asc'=>'t.updated_on',
						'desc'=>'t.updated_on DESC',
					),
					'*',
				),
			),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Product the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
