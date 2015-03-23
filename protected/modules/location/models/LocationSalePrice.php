<?php

/**
 * This is the model class for table "tbl_location_sale_price".
 *
 * The followings are the available columns in table 'tbl_location_sale_price':
 * @property integer $location_sale_price_id
 * @property integer $locale_id
 * @property integer $location_id
 * @property integer $location_product_id
 * @property double $location_sale_price
 */
class LocationSalePrice extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_location_sale_price';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('location_sale_price', 'required'),
			array('location_sale_price', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('location_sale_price_id, locale_id, location_id, location_product_id, location_sale_price', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'location_sale_price_id' => 'Sale Price',
			'locale_id' => 'Locale',
			'location_id' => 'Location',
			'location_product_id' => 'Location Product',
			'location_sale_price' => 'Location Sale Price',
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

		$criteria->compare('location_sale_price_id',$this->location_sale_price_id);
		$criteria->compare('locale_id',$this->locale_id);
		$criteria->compare('location_id',$this->location_id);
		$criteria->compare('location_product_id',$this->location_product_id);
		$criteria->compare('location_sale_price',$this->location_sale_price);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LocationSalePrice the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
