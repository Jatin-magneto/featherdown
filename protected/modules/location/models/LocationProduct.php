<?php

/**
 * This is the model class for table "tbl_location_product".
 *
 * The followings are the available columns in table 'tbl_location_product':
 * @property string $location_product_id
 * @property string $product_id
 * @property string $location_id
 * @property string $stock_from
 * @property string $stock_till
 * @property integer $total_qty
 * @property integer $available_type
 * @property integer $available_special_type_id
 * @property string $available_days
 * @property integer $available_nights
 * @property string $is_manadatory
 * @property integer $sale_price_unit_id
 * @property integer $sale_max_qty
 * @property integer $sale_max_unit_id
 * @property double $sale_percentage
 * @property string $sale_type_id
 * @property string $primary_status
 * @property string $secondary_status
 * @property double $purchase_price
 * @property integer $purchase_price_unit_id
 * @property double $purchase_percentage
 * @property string $created_on
 * @property string $created_by
 * @property string $updated_on
 * @property string $updated_by
 *
 * The followings are the available model relations:
 * @property AvailableStockInfo[] $availableStockInfos
 * @property BookingDetail[] $bookingDetails
 * @property Location $location
 * @property Product $product
 */
class LocationProduct extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_location_product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('primary_status, secondary_status, sale_type_id, sale_percentage, sale_max_unit_id, sale_max_qty, sale_price_unit_id, product_id, available_days, available_nights, is_manadatory, total_qty, available_type, available_special_type_id', 'required'),
			array('total_qty, available_type, available_special_type_id, available_nights, sale_price_unit_id, sale_max_qty, sale_max_unit_id, purchase_price_unit_id', 'numerical', 'integerOnly'=>true),
			array('sale_percentage, purchase_price, purchase_percentage', 'numerical'),
			
			array('stock_from, stock_till, purchase_price, purchase_price_unit_id, purchase_percentage', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('location_product_id, product_id, location_id, stock_from, stock_till, total_qty, available_type, available_special_type_id, available_days, available_nights, is_manadatory, sale_price_unit_id, sale_max_qty, sale_max_unit_id, sale_percentage, sale_type_id, primary_status, secondary_status, purchase_price, purchase_price_unit_id, purchase_percentage, created_on, created_by, updated_on, updated_by', 'safe', 'on'=>'search'),
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
			'availableStockInfos' => array(self::HAS_MANY, 'AvailableStockInfo', 'location_product_id'),
			'bookingDetails' => array(self::HAS_MANY, 'BookingDetail', 'location_product_id'),
			'location' => array(self::BELONGS_TO, 'Location', 'location_id'),
			'product' => array(self::BELONGS_TO, 'Product', 'product_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'location_product_id' => 'Location Product',
			'product_id' => 'Product',
			'location_id' => 'Location',
			'stock_from' => 'From',
			'stock_till' => 'Until',
			'total_qty' => 'Quantity',
			'available_type' => 'Type',
			'available_special_type_id' => 'Special Type',
			'available_days' => 'Days',
			'available_nights' => 'Nights',
			'is_manadatory' => 'Manadatory',
			'sale_price_unit_id' => 'Price Unit',
			'sale_max_qty' => 'Max Quantity',
			'sale_max_unit_id' => 'Maximum Quantity Unit',
			'sale_percentage' => 'Sale Percentage',
			'sale_type_id' => 'Sale Type',
			'primary_status' => 'Primary Process',
			'secondary_status' => 'Secondary Process',
			'purchase_price' => 'Purchase Price',
			'purchase_price_unit_id' => 'Purchase Price Unit',
			'purchase_percentage' => 'Purchase Percentage',
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

		$criteria->compare('location_product_id',$this->location_product_id,true);
		$criteria->compare('product_id',$this->product_id,true);
		$criteria->compare('location_id',$this->location_id,true);
		$criteria->compare('stock_from',$this->stock_from,true);
		$criteria->compare('stock_till',$this->stock_till,true);
		$criteria->compare('total_qty',$this->total_qty);
		$criteria->compare('available_type',$this->available_type);
		$criteria->compare('available_special_type_id',$this->available_special_type_id);
		$criteria->compare('available_days',$this->available_days,true);
		$criteria->compare('available_nights',$this->available_nights);
		$criteria->compare('is_manadatory',$this->is_manadatory,true);
		$criteria->compare('sale_price_unit_id',$this->sale_price_unit_id);
		$criteria->compare('sale_max_qty',$this->sale_max_qty);
		$criteria->compare('sale_max_unit_id',$this->sale_max_unit_id);
		$criteria->compare('sale_percentage',$this->sale_percentage);
		$criteria->compare('sale_type_id',$this->sale_type_id,true);
		$criteria->compare('primary_status',$this->primary_status,true);
		$criteria->compare('secondary_status',$this->secondary_status,true);
		$criteria->compare('purchase_price',$this->purchase_price);
		$criteria->compare('purchase_price_unit_id',$this->purchase_price_unit_id);
		$criteria->compare('purchase_percentage',$this->purchase_percentage);
		$criteria->compare('created_on',$this->created_on,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('updated_on',$this->updated_on,true);
		$criteria->compare('updated_by',$this->updated_by,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LocationProduct the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
