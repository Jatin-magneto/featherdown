<?php

/**
 * This is the model class for table "tbl_booking_payment_rules".
 *
 * The followings are the available columns in table 'tbl_booking_payment_rules':
 * @property integer $payment_rule_id
 * @property integer $title
 * @property integer $template_id
 * @property integer $request_send_before
 * @property string $start_date
 * @property string $end_date
 * @property integer $start_day
 * @property integer $end_day
 * @property string $environments
 * @property string $isactive
 * @property string $created_on
 * @property string $created_by
 * @property string $updated_on
 * @property string $updated_by
 */
class BookingPaymentRules extends CActiveRecord
{
	public $created, $updated;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_booking_payment_rules';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('template_id, title,request_send_before, start_date, end_date,start_day, end_day, environments, isactive', 'required'),
			array('template_id, request_send_before, start_day, end_day, isactive', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('payment_rule_id,title, template_id, request_send_before, start_date, end_date,start_day, end_day, environments, isactive, created, updated', 'safe', 'on'=>'search'),
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
			'title' => 'Rule Name',
			'payment_rule_id' => 'Payment Rule',
			'template_id' => 'Email Template',
			'request_send_before' => 'Mail Send Before Days',
			'start_date' => 'Rule Start Date',
			'end_date' => 'Rule End Date',
			'start_day' => 'Before Day From',
			'end_day' => 'Before Day To',
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

		$criteria->compare('payment_rule_id',$this->payment_rule_id);
		$criteria->compare('title',$this->title);
		$criteria->compare('template_id',$this->template_id);
		$criteria->compare('request_send_before',$this->request_send_before);
		$criteria->compare('start_date',$this->start_date);
		$criteria->compare('end_date',$this->end_date);
		$criteria->compare('start_day',$this->start_day);
		$criteria->compare('end_day',$this->end_day);
		$criteria->compare('environments',$this->environments,true);
		$criteria->compare('isactive',$this->isactive);
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
	 * @return BookingPaymentRules the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	} 
}
