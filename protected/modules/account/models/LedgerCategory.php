<?php

/**
 * This is the model class for table "tbl_ledger_category".
 *
 * The followings are the available columns in table 'tbl_ledger_category':
 * @property integer $ledger_category_id
 * @property integer $product_category_id
 * @property integer $sales_group_id
 * @property integer $purchase_group_id
 * @property integer $ledger_sales
 * @property integer $ledger_purchase
 * @property integer $ledger_payment
 * @property string $isactive
 * @property string $created_on
 * @property string $created_by
 * @property string $updated_on
 * @property string $updated_by
 *
 * The followings are the available model relations:
 * @property Ledger $ledgerPayment
 * @property Ledger $ledgerPurchase
 * @property Ledger $ledgerSales
 * @property TaxGroup $purchaseGroup
 * @property TaxGroup $salesGroup
 */
class LedgerCategory extends CActiveRecord
{
	public $salesgroup;
	public $purchasegroup;
	public $ledgersales;
	public $ledgerpurchase;
	public $ledgerpayment;
	public $created;
	public $updated;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_ledger_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_category_id,sales_group_id, purchase_group_id, ledger_sales, ledger_purchase, ledger_payment, isactive', 'required'),
			array('sales_group_id, purchase_group_id, ledger_sales, ledger_purchase, ledger_payment', 'numerical', 'integerOnly'=>true),
			array('isactive', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('salesgroup,purchasegroup,ledgersales,ledgerpurchase,ledgerpayment,created,updated,ledger_category_id,product_category_id, sales_group_id, purchase_group_id, ledger_sales, ledger_purchase, ledger_payment, isactive, created_on, created_by, updated_on, updated_by', 'safe', 'on'=>'search'),
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
			'ledgerPayment' => array(self::BELONGS_TO, 'Ledger', 'ledger_payment'),
			'ledgerPurchase' => array(self::BELONGS_TO, 'Ledger', 'ledger_purchase'),
			'ledgerSales' => array(self::BELONGS_TO, 'Ledger', 'ledger_sales'),
			'purchaseGroup' => array(self::BELONGS_TO, 'TaxGroup', 'purchase_group_id'),
			'salesGroup' => array(self::BELONGS_TO, 'TaxGroup', 'sales_group_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ledger_category_id' => 'Ledger Category',
			'product_category_id'=>'Product Category',
			'sales_group_id' => 'Sales Group',
			'purchase_group_id' => 'Purchase Group',
			'ledger_sales' => 'Ledger Sales',
			'ledger_purchase' => 'Ledger Purchase',
			'ledger_payment' => 'Ledger Payment',
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
		
		$criteria->with = array('ledgerPayment','ledgerPurchase','ledgerSales','purchaseGroup','salesGroup');
		
		$criteria->compare('purchaseGroup.title',$this->purchasegroup,true);
		$criteria->compare('salesGroup.title',$this->salesgroup,true);
		$criteria->compare('ledgerPayment.ledger_title',$this->ledgerpayment,true);
		$criteria->compare('ledgerPurchase.ledger_title',$this->ledgerpurchase,true);
		$criteria->compare('ledgerSales.ledger_title',$this->ledgersales,true);
		
		$criteria->compare('ledger_category_id',$this->ledger_category_id);
		$criteria->compare('sales_group_id',$this->sales_group_id);
		$criteria->compare('purchase_group_id',$this->purchase_group_id);
		$criteria->compare('ledger_sales',$this->ledger_sales);
		$criteria->compare('ledger_purchase',$this->ledger_purchase);
		$criteria->compare('ledger_payment',$this->ledger_payment);
		$criteria->compare('isactive',$this->isactive,true);
		$criteria->compare('created_on',$this->created_on,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('updated_on',$this->updated_on,true);
		$criteria->compare('updated_by',$this->updated_by,true);
		$criteria->compare('CONCAT(t.created_on,t.created_by)',$this->created,true);
		$criteria->compare('CONCAT(t.updated_on,t.updated_by)',$this->updated,true);
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'attributes'=>array(
					'countryname'=>array(
						'asc'=>'purchasegroup.title',
						'desc'=>'purchasegroup.title DESC',
					),
					'province'=>array(
						'asc'=>'salesgroup.title',
						'desc'=>'salesgroup.title DESC',
					),
					'countryname'=>array(
						'asc'=>'ledgerpayment.ledger_title',
						'desc'=>'ledgerpayment.ledger_title DESC',
					),
					'province'=>array(
						'asc'=>'ledgerpurchase.ledger_title',
						'desc'=>'ledgerpurchase.ledger_title DESC',
					),
					'province'=>array(
						'asc'=>'ledgersales.ledger_title',
						'desc'=>'ledgersales.ledger_title DESC',
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
	 * @return LedgerCategory the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
