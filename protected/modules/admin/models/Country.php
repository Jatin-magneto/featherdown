<?php

/**
 * This is the model class for table "tbl_country".
 *
 * The followings are the available columns in table 'tbl_country':
 * @property integer $country_id
 * @property string $country_name
 * @property string $country_slug
 * @property string $country_abbreviation
 * @property string $country_flag
 * @property string $environments
 * @property string $isactive
 * @property string $created_on
 * @property string $created_by
 * @property string $updated_on
 * @property string $updated_by
 *
 * The followings are the available model relations:
 * @property Province[] $provinces
 */
class Country extends CActiveRecord
{
	public $created;
	public $updated;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_country';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('country_name, country_slug, environments, isactive', 'required'),
			array('country_slug', 'unique', 'className' => 'Country', 'attributeName' => 'country_slug', 'message'=>'This slug is already in use'),
			array('country_abbreviation', 'length', 'max'=>5),
			array('country_name, country_slug', 'length', 'max'=>50),
			array('country_flag', 'length', 'max'=>500),
			array('isactive', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('country_id, country_name, country_slug, country_abbreviation, country_flag, environments, isactive, created, updated', 'safe', 'on'=>'search'),
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
			'provinces' => array(self::HAS_MANY, 'Province', 'country_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'country_id' => 'Country',
			'country_name' => 'Country Name',
			'country_slug' => 'Country Slug',
			'country_abbreviation' => 'Abbreviation',
			'country_flag' => 'Country Flag',
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

		$criteria->compare('country_id',$this->country_id);
		$criteria->compare('country_name',$this->country_name,true);
		$criteria->compare('country_slug',$this->country_slug,true);
		$criteria->compare('country_abbreviation',$this->country_abbreviation,true);
		$criteria->compare('country_flag',$this->country_flag,true);
		$criteria->compare('environments',$this->environments,true);
		$criteria->compare('isactive',$this->isactive,true);		
		$criteria->compare('updated_on',$this->updated_on,true);
		$criteria->compare('updated_by',$this->updated_by,true);
		$criteria->compare('CONCAT(created_on,created_by)',$this->created,true);
		$criteria->compare('CONCAT(updated_on,updated_by)',$this->updated,true);
		
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
	 * @return Country the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
