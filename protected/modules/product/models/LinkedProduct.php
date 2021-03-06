<?php

/**
 * This is the model class for table "tbl_linked_product".
 *
 * The followings are the available columns in table 'tbl_linked_product':
 * @property integer $linked_product_id
 * @property string $main_product_id
 * @property string $product_id
 * @property integer $linked_product_quantity
 *
 * The followings are the available model relations:
 * @property Product $product
 * @property Product $mainProduct
 */
class LinkedProduct extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_linked_product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('main_product_id, product_id, linked_product_quantity', 'required'),
			array('linked_product_quantity', 'numerical', 'integerOnly'=>true),
			array('main_product_id, product_id', 'length', 'max'=>18),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('linked_product_id, main_product_id, product_id, linked_product_quantity', 'safe', 'on'=>'search'),
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
			'product' => array(self::BELONGS_TO, 'Product', 'product_id'),
			'mainProduct' => array(self::BELONGS_TO, 'Product', 'main_product_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'linked_product_id' => 'Linked Product',
			'main_product_id' => 'Main Product',
			'product_id' => 'Product',
			'linked_product_quantity' => 'Linked Product Quantity',
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

		$criteria->compare('linked_product_id',$this->linked_product_id);
		$criteria->compare('main_product_id',$this->main_product_id,true);
		$criteria->compare('product_id',$this->product_id,true);
		$criteria->compare('linked_product_quantity',$this->linked_product_quantity);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LinkedProduct the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
