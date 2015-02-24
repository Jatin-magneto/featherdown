<?php

/**
 * This is the model class for table "tbl_currency".
 *
 * The followings are the available columns in table 'tbl_currency':
 * @property integer $currency_id
 * @property string $currency_name
 * @property string $currency_slug
 * @property string $currency_abrv
 * @property string $currency_symbol
 * @property string $isactive
 * @property string $created_on
 * @property string $created_by
 * @property string $updated_on
 * @property string $updated_by
 */
class Currency extends CActiveRecord
{
		public $created, $updated;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_currency';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('currency_name, currency_slug, currency_abrv, currency_symbol, isactive', 'required'),
			array('currency_slug', 'unique', 'className' => 'Currency', 'attributeName' => 'currency_slug', 'message'=>'This slug is already in use'),
			array('currency_name, currency_slug, currency_abrv, currency_symbol, created_by, updated_by', 'length', 'max'=>255),
			array('isactive', 'length', 'max'=>1),
			array('created_on, updated_on', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('currency_id, currency_name, currency_slug, currency_abrv, currency_symbol, isactive, created, updated', 'safe', 'on'=>'search'),
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
			'currency_id' => 'Currency',
			'currency_name' => 'Currency Name',
			'currency_slug' => 'Currency Slug',
			'currency_abrv' => 'Currency Abbreviation',
			'currency_symbol' => 'Currency Symbol',
			'isactive' => 'Is Active',
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

		$criteria->compare('currency_id',$this->currency_id);
		$criteria->compare('currency_name',$this->currency_name,true);
		$criteria->compare('currency_slug',$this->currency_slug,true);
		$criteria->compare('currency_abrv',$this->currency_abrv,true);
		$criteria->compare('currency_symbol',$this->currency_symbol,true);
		$criteria->compare('isactive',$this->isactive,true);
		$criteria->compare('CONCAT(t.created_on,t.created_by)',$this->created,true);
		$criteria->compare('CONCAT(t.updated_on,t.updated_by)',$this->updated,true);
		
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
	 * @return Currency the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
