<?php

/**
 * This is the model class for table "tbl_location".
 *
 * The followings are the available columns in table 'tbl_location':
 * @property string $location_id
 * @property integer $location_type_id
 * @property string $title
 * @property string $location_desc
 * @property string $location_address
 * @property string $zip_code
 * @property integer $city_id
 * @property integer $supplier_id
 * @property string $image
 * @property string $url
 * @property string $supplier_form_url
 * @property integer $sort_order
 * @property string $tax_included
 * @property string $latitute
 * @property string $longitude
 * @property string $isactive
 * @property string $environments
 * @property string $created_on
 * @property string $created_by
 * @property string $updated_on
 * @property string $updated_by
 *
 * The followings are the available model relations:
 * @property AvailableStockInfo[] $availableStockInfos
 * @property Booking[] $bookings
 * @property LocationType $locationType
 * @property LocationPdf[] $locationPdfs
 * @property LocationProduct[] $locationProducts
 */
class Location extends CActiveRecord
{
	public $created, $updated;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_location';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('location_type_id,title,location_address,zip_code,tax_included,latitute,longitude,isactive,environments, city_id, supplier_id, sort_order', 'required'),
			array('location_type_id, city_id, supplier_id, sort_order', 'numerical', 'integerOnly'=>true),
			array('title, created_by, updated_by', 'length', 'max'=>255),
			array('image', 'file', 'types'=>'jpg, png','allowEmpty' => true,'on'=>'insert'),
			array('zip_code', 'length', 'max'=>15),
			array('url, supplier_form_url', 'length', 'max'=>50),
			array('tax_included, isactive', 'length', 'max'=>1),
			array('latitute, longitude', 'length', 'max'=>25),
			array('location_desc', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('created,updated,location_id, location_type_id, title, location_desc, location_address, zip_code, city_id, supplier_id, image, url, supplier_form_url, sort_order, tax_included, latitute, longitude, isactive, environments, created_on, created_by, updated_on, updated_by', 'safe', 'on'=>'search'),
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
			'availableStockInfos' => array(self::HAS_MANY, 'AvailableStockInfo', 'location_id'),
			'bookings' => array(self::HAS_MANY, 'Booking', 'location_id'),
			'locationType' => array(self::BELONGS_TO, 'LocationType', 'location_type_id'),
			'locationPdfs' => array(self::HAS_MANY, 'LocationPdf', 'location_id'),
			'locationProducts' => array(self::HAS_MANY, 'LocationProduct', 'location_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'location_id' => 'Location',
			'location_type_id' => 'Location Type',
			'title' => 'Title',
			'location_desc' => 'Location Desc',
			'location_address' => 'Location Address',
			'zip_code' => 'Zip Code',
			'city_id' => 'City',
			'supplier_id' => 'Supplier',
			'image' => 'Image',
			'url' => 'Url',
			'supplier_form_url' => 'Supplier Form Url',
			'sort_order' => 'Sort Order',
			'tax_included' => 'Tax Included',
			'latitute' => 'Latitute',
			'longitude' => 'Longitude',
			'isactive' => 'Is Active',
			'environments' => 'Environments',
			'created_on' => 'Created On',
			'created_by' => 'Created By',
			'updated_on' => 'Updated On',
			'updated_by' => 'Updated By',
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

		$criteria->compare('location_id',$this->location_id,true);
		$criteria->compare('location_type_id',$this->location_type_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('location_desc',$this->location_desc,true);
		$criteria->compare('location_address',$this->location_address,true);
		$criteria->compare('zip_code',$this->zip_code,true);
		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('supplier_id',$this->supplier_id);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('supplier_form_url',$this->supplier_form_url,true);
		$criteria->compare('sort_order',$this->sort_order);
		$criteria->compare('tax_included',$this->tax_included,true);
		$criteria->compare('latitute',$this->latitute,true);
		$criteria->compare('longitude',$this->longitude,true);
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
	 * @return Location the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
