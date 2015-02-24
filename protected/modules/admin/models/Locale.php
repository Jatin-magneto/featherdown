<?php

/**
 * This is the model class for table "tbl_locale".
 *
 * The followings are the available columns in table 'tbl_locale':
 * @property integer $locale_id
 * @property integer $country_id
 * @property integer $currency_id
 * @property integer $language_id
 * @property string $environments
 * @property string $locale
 * @property string $locale_slug
 * @property string $date_format
 * @property string $date_short
 * @property string $date_long
 * @property string $locale_pricing
 * @property string $isactive
 * @property string $created_on
 * @property string $created_by
 * @property string $updated_on
 * @property string $updated_by
 */
class Locale extends CActiveRecord
{
	public $country_name, $currency_name, $created, $updated;
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_locale';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('country_id, currency_id, language_id, locale, locale_slug, date_format, date_short, date_long, environments, locale_pricing', 'required'),
			array('locale_slug', 'unique', 'className' => 'Locale', 'attributeName' => 'locale_slug', 'message'=>'This slug is already in use'),
			array('country_id, currency_id, language_id', 'numerical', 'integerOnly'=>true),
			array('locale, locale_slug, created_by, updated_by', 'length', 'max'=>255),
			array('date_format, date_short, date_long', 'length', 'max'=>15),
			array('locale_pricing', 'length', 'max'=>10),
			array('isactive', 'length', 'max'=>1),
			array('environments, created_on, updated_on', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('locale_id, country_name, currency_name, language_id, environments, locale, locale_slug, date_format, date_short, date_long, locale_pricing, isactive, created, updated', 'safe', 'on'=>'search'),
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
			'country' => array(self::BELONGS_TO, 'Country',  'country_id'),
			'currency' => array(self::BELONGS_TO, 'Currency', 'currency_id'),
			//'language' => array(self::BELONGS_TO, 'Language', 'language_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'locale_id' => 'Locale',
			'country_id' => 'Country',
			'currency_id' => 'Currency',
			'language_id' => 'Language',
			'environments' => 'Environments',
			'locale' => 'Locale',
			'locale_slug' => 'Locale Slug',
			'date_format' => 'Date Format',
			'date_short' => 'Date Short',
			'date_long' => 'Date Long',
			'locale_pricing' => 'Locale Pricing',
			'isactive' => 'Isactive',
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
		$criteria->with = array('country','currency');
		$criteria->compare('country.country_name',$this->country_name,true);
		$criteria->compare('currency.currency_name',$this->currency_name,true);

		$criteria->compare('locale_id',$this->locale_id);
		$criteria->compare('country_id',$this->country_id);
		$criteria->compare('currency_id',$this->currency_id);
		$criteria->compare('language_id',$this->language_id);
		$criteria->compare('environments',$this->environments,true);
		$criteria->compare('locale',$this->locale,true);
		$criteria->compare('locale_slug',$this->locale_slug,true);
		$criteria->compare('date_format',$this->date_format,true);
		$criteria->compare('date_short',$this->date_short,true);
		$criteria->compare('date_long',$this->date_long,true);
		$criteria->compare('locale_pricing',$this->locale_pricing,true);
		$criteria->compare('isactive',$this->isactive,true);
		$criteria->compare('CONCAT(t.created_on,t.created_by)',$this->created,true);
		$criteria->compare('CONCAT(t.updated_on,t.updated_by)',$this->updated,true);
		
		$environment_cond = Yii::app()->session['environment_cond'];
		$criteria->addCondition("$environment_cond");

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'attributes'=>array(
					'country_name'=>array(
						'asc'=>'country.country_name',
						'desc'=>'country.country_name DESC',
					),
					'currency_name'=>array(
						'asc'=>'currency.currency_name',
						'desc'=>'currency.currency_name DESC',
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
	 * @return Locale the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
