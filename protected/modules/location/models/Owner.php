<?php

/**
 * This is the model class for table "tbl_location_owner".
 *
 * The followings are the available columns in table 'tbl_location_owner':
 * @property string $owner_id
 * @property string $username
 * @property string $password
 * @property integer $locale_id
 * @property string $isactive
 * @property string $gender
 * @property string $pre_name
 * @property string $initials
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $addr_title
 * @property string $addr_street
 * @property string $addr_street_2
 * @property string $addr_street_no
 * @property string $addr_street_no_sufx
 * @property string $addr_postal_code
 * @property string $addr_city_id
 * @property string $addr_state_id
 * @property string $addr_country_id
 * @property string $inv_title
 * @property string $inv_street
 * @property string $inv_street_2
 * @property string $inv_street_no
 * @property string $inv_street_no_sufx
 * @property string $inv_postal_code
 * @property string $inv_city_id
 * @property string $inv_state_id
 * @property string $inv_country_id
 * @property string $bsn
 * @property string $dob
 * @property integer $phone
 * @property integer $mobile
 * @property integer $fax
 * @property string $website
 * @property string $email
 * @property string $newsletter
 * @property string $brochure
 * @property string $remarks
 * @property string $last_login
 * @property string $environments
 * @property integer $default_env_id
 * @property string $default_env_only
 * @property string $creditorid
 * @property string $accountview_costid
 * @property string $last_invoiceid
 * @property string $created_on
 * @property string $created_by
 * @property string $updated_on
 * @property string $updated_by
 */
class Owner extends CActiveRecord
{
	public $created, $updated, $repeat_password;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_location_owner';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, locale_id, isactive, gender, first_name, last_name, addr_title, addr_street, addr_postal_code, addr_city_id, addr_state_id, addr_country_id, inv_title, inv_street, inv_postal_code, inv_city_id, inv_state_id, inv_country_id, mobile, email, newsletter, brochure, environments, default_env_id, default_env_only, creditorid, accountview_costid', 'required'),
			array('password, repeat_password', 'required', 'on' => 'insert'),
			array('password, repeat_password', 'length', 'min'=>6),
			array('email', 'email'),
			array('dob', 'safe'),
			array('password, repeat_password', 'safe', 'on' => 'update'),
			array('repeat_password', 'compare', 'compareAttribute'=>'password', 'on' => 'insert'),
			array('username', 'unique', 'className' => 'Owner', 'attributeName' => 'username', 'message'=>'This user name is already taken'),
			array('email', 'unique', 'className' => 'Owner', 'attributeName' => 'email', 'message'=>'This e-mail is already in use'),
			array('locale_id, phone, mobile, fax, default_env_id', 'numerical', 'integerOnly'=>true),
			array('username, password, first_name, middle_name, last_name, addr_title, addr_street, addr_street_2, inv_title, inv_street, inv_street_2, bsn, creditorid, accountview_costid, last_invoiceid, created_by, updated_by', 'length', 'max'=>255),
			array('isactive, gender, newsletter, brochure, default_env_only', 'length', 'max'=>1),
			array('pre_name, initials, addr_street_no, addr_street_no_sufx, addr_postal_code, inv_street_no, inv_street_no_sufx, inv_postal_code, website, email', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('owner_id, username, password, locale_id, isactive, gender, pre_name, initials, first_name, middle_name, last_name, addr_title, addr_street, addr_street_2, addr_street_no, addr_street_no_sufx, addr_postal_code, addr_city_id, addr_state_id, addr_country_id, inv_title, inv_street, inv_street_2, inv_street_no, inv_street_no_sufx, inv_postal_code, inv_city_id, inv_state_id, inv_country_id, bsn, dob, phone, mobile, fax, website, email, newsletter, brochure, remarks, last_login, environments, default_env_id, default_env_only, creditorid, accountview_costid, last_invoiceid, created_on, created_by, updated_on, updated_by, created, updated', 'safe', 'on'=>'search'),
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
			'owner_id' => 'Owner',
			'username' => 'Username',
			'password' => 'Password',
			'repeat_password' => 'Password (confirm)',
			'locale_id' => 'Locale',
			'isactive' => 'Is Active',
			'gender' => 'Gender',
			'pre_name' => 'Title (Pre)',
			'initials' => 'Initials',
			'first_name' => 'First Name',
			'middle_name' => 'Middle Name',
			'last_name' => 'Last Name',
			'addr_title' => 'Title',
			'addr_street' => 'Street',
			'addr_street_2' => 'Street 2',
			'addr_street_no' => 'Street Number',
			'addr_street_no_sufx' => 'Street Number Suffix',
			'addr_postal_code' => 'Postal Code',
			'addr_city_id' => 'City',
			'addr_state_id' => 'State',
			'addr_country_id' => 'Country',
			'inv_title' => 'Title',
			'inv_street' => 'Street',
			'inv_street_2' => 'Street 2',
			'inv_street_no' => 'Street Number',
			'inv_street_no_sufx' => 'Street Number Suffix',
			'inv_postal_code' => 'Postal Code',
			'inv_city_id' => 'City',
			'inv_state_id' => 'State',
			'inv_country_id' => 'Country',
			'bsn' => 'BSN',
			'dob' => 'Birthdate',
			'phone' => 'Phone',
			'mobile' => 'Phone (mobile)',
			'fax' => 'Fax',
			'website' => 'Website',
			'email' => 'E-mail',
			'newsletter' => 'E-mail Newsletter',
			'brochure' => 'Brochure',
			'remarks' => 'Remarks',
			'last_login' => 'Last Login',
			'environments' => 'Environments',
			'default_env_id' => 'Default Environment',
			'default_env_only' => 'Default Environment Only',
			'creditorid' => 'Creditor ID',
			'accountview_costid' => 'Account view Cost ID',
			'last_invoiceid' => 'Last Invoice ID',
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

		$criteria->compare('owner_id',$this->owner_id,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('locale_id',$this->locale_id);
		$criteria->compare('isactive',$this->isactive,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('pre_name',$this->pre_name,true);
		$criteria->compare('initials',$this->initials,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('middle_name',$this->middle_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('addr_title',$this->addr_title,true);
		$criteria->compare('addr_street',$this->addr_street,true);
		$criteria->compare('addr_street_2',$this->addr_street_2,true);
		$criteria->compare('addr_street_no',$this->addr_street_no,true);
		$criteria->compare('addr_street_no_sufx',$this->addr_street_no_sufx,true);
		$criteria->compare('addr_postal_code',$this->addr_postal_code,true);
		$criteria->compare('addr_city_id',$this->addr_city_id,true);
		$criteria->compare('addr_state_id',$this->addr_state_id,true);
		$criteria->compare('addr_country_id',$this->addr_country_id,true);
		$criteria->compare('inv_title',$this->inv_title,true);
		$criteria->compare('inv_street',$this->inv_street,true);
		$criteria->compare('inv_street_2',$this->inv_street_2,true);
		$criteria->compare('inv_street_no',$this->inv_street_no,true);
		$criteria->compare('inv_street_no_sufx',$this->inv_street_no_sufx,true);
		$criteria->compare('inv_postal_code',$this->inv_postal_code,true);
		$criteria->compare('inv_city_id',$this->inv_city_id,true);
		$criteria->compare('inv_state_id',$this->inv_state_id,true);
		$criteria->compare('inv_country_id',$this->inv_country_id,true);
		$criteria->compare('bsn',$this->bsn,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('phone',$this->phone);
		$criteria->compare('mobile',$this->mobile);
		$criteria->compare('fax',$this->fax);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('newsletter',$this->newsletter,true);
		$criteria->compare('brochure',$this->brochure,true);
		$criteria->compare('remarks',$this->remarks,true);
		$criteria->compare('last_login',$this->last_login,true);
		$criteria->compare('environments',$this->environments,true);
		$criteria->compare('default_env_id',$this->default_env_id);
		$criteria->compare('default_env_only',$this->default_env_only,true);
		$criteria->compare('creditorid',$this->creditorid,true);
		$criteria->compare('accountview_costid',$this->accountview_costid,true);
		$criteria->compare('last_invoiceid',$this->last_invoiceid,true);
		$criteria->compare('created_on',$this->created_on,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('updated_on',$this->updated_on,true);
		$criteria->compare('updated_by',$this->updated_by,true);
		
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
	 * @return Owner the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
