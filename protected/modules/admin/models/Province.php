<?php

/**
 * This is the model class for table "tbl_province".
 *
 * The followings are the available columns in table 'tbl_province':
 * @property integer $province_id
 * @property string $province_name
 * @property integer $country_id
 * @property string $province_slug
 * @property string $province_abbreviation
 * @property string $environments
 * @property string $isactive
 * @property string $created_on
 * @property string $created_by
 * @property string $updated_on
 * @property string $updated_by
 *
 * The followings are the available model relations:
 * @property City[] $cities
 * @property Country $country
 */
class Province extends CActiveRecord
{
	public $countryname;
	public $created;
	public $updated;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_province';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('province_name, country_id, province_slug, environments, isactive', 'required'),
			array('province_slug', 'unique', 'className' => 'Province', 'attributeName' => 'province_slug', 'message'=>'This slug is already in use'),
			array('country_id', 'numerical', 'integerOnly'=>true),
			array('province_abbreviation', 'length', 'max'=>5),
			array('province_name, province_slug', 'length', 'max'=>50),
			array('isactive', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('province_id, province_name, country_id, countryname, province_slug, province_abbreviation, environments, isactive, created, updated', 'safe', 'on'=>'search'),
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
			'cities' => array(self::HAS_MANY, 'City', 'state_id'),
			'country' => array(self::BELONGS_TO, 'Country', 'country_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'province_id' => 'Province',
			'province_name' => 'Province Name',
			'country_id' => 'Country',
			'province_slug' => 'Province Slug',
			'province_abbreviation' => 'Province Abbreviation',
			'environments' => 'Environments',
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
		
		$criteria->with = array('country');
		$criteria->compare('country.country_name',$this->countryname,true);

		$criteria->compare('province_id',$this->province_id);
		$criteria->compare('province_name',$this->province_name,true);
		$criteria->compare('country_id',$this->country_id);
		$criteria->compare('province_slug',$this->province_slug,true);
		$criteria->compare('province_abbreviation',$this->province_abbreviation,true);
		$criteria->compare('environments',$this->environments,true);
		$criteria->compare('isactive',$this->isactive,true);
		$criteria->compare('CONCAT(t.created_on,t.created_by)',$this->created,true);
		$criteria->compare('CONCAT(t.updated_on,t.updated_by)',$this->updated,true);
		
		$environment_cond = Yii::app()->session['environment_cond'];
		$criteria->addCondition($environment_cond);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'attributes'=>array(
					'countryname'=>array(
						'asc'=>'country.country_name',
						'desc'=>'country.country_name DESC',
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
	 * @return Province the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
