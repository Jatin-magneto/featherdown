<?php

/**
 * This is the model class for table "tbl_city".
 *
 * The followings are the available columns in table 'tbl_city':
 * @property integer $city_id
 * @property string $city_name
 * @property integer $country_id
 * @property integer $state_id
 * @property string $city_slug
 * @property string $city_abbreviation
 * @property string $environments
 * @property string $isactive
 * @property string $created_on
 * @property string $created_by
 * @property string $updated_on
 * @property string $updated_by
 *
 * The followings are the available model relations:
 * @property Province $state
 */
class City extends CActiveRecord
{
	public $province;
	public $countryname;
	public $created;
	public $updated;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_city';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('city_name, state_id, country_id, city_slug, environments, isactive', 'required'),
			array('city_slug', 'unique', 'className' => 'City', 'attributeName' => 'city_slug', 'message'=>'This slug is already in use'),
			array('state_id', 'numerical', 'integerOnly'=>true),
			array('country_id', 'numerical', 'integerOnly'=>true),
			array('city_abbreviation', 'length', 'max'=>5),
			array('city_name, city_slug', 'length', 'max'=>50),
			array('isactive', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('city_id, city_name, state_id, country_id, city_slug, province, countryname, city_abbreviation, environments, isactive, created, updated', 'safe', 'on'=>'search'),
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
			'state' => array(self::BELONGS_TO, 'Province', 'state_id'),
			'country' => array(self::BELONGS_TO, 'Country', 'country_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'city_id' => 'City',
			'city_name' => 'City Name',
			'state_id' => 'Province',
			'country_id' => 'Country',
			'city_slug' => 'City Slug',
			'city_abbreviation' => 'Abbreviation',
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
		$criteria->with = array('state','country');
		$criteria->compare('state.province_name',$this->province,true);
		$criteria->compare('country.country_name',$this->countryname,true);
		
		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('city_name',$this->city_name,true);
		$criteria->compare('state_id',$this->state_id);
		$criteria->compare('country_id',$this->country_id);
		$criteria->compare('city_slug',$this->city_slug,true);
		$criteria->compare('city_abbreviation',$this->city_abbreviation,true);
		$criteria->compare('environments',$this->environments,true);
		$criteria->compare('isactive',$this->isactive,true);
		$criteria->compare('CONCAT(t.created_on,t.created_by)',$this->created,true);
		$criteria->compare('CONCAT(t.updated_on,t.updated_by)',$this->updated,true);
        
	$environment_cond = Yii::app()->session['environment_cond'];
        $criteria->addCondition("$environment_cond");

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'attributes'=>array(
					'countryname'=>array(
						'asc'=>'state.province_name',
						'desc'=>'state.province_name DESC',
					),
					'province'=>array(
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
	 * @return City the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
