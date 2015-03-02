<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
		<?php if(!Yii::app()->user->isGuest) { ?>
        <span style="float: right;margin-top: -35px;margin-right: 10px;">
            <?php $list = CHtml::listData(Environment::model()->findAll(),'environment_id','env_title'); ?>
            <?php echo CHtml::dropDownList('environment',Yii::app()->session['environment_id'],$list,array(
                        'empty' => 'select environment',
                        'ajax' => array(
                        'type'=>'POST',
                        'url'=>CController::createUrl('/site/changeEnv'),
                        'data' => array('environment_id'=>'js:this.value'),
                        'success' =>'js:function(){ location.reload(); }'
                        ))); ?>
        </span>
        <?php } ?>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
                array('label'=>'Language', 'url'=>array('/language/admin'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Environment', 'url'=>array('/admin/environment/admin'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Payment type', 'url'=>array('/admin/paymentType/admin'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Sale Type', 'url'=>array('/admin/saleType/admin'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Sale Channel Type', 'url'=>array('/admin/saleChannelType/admin'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Booking Payment Rules', 'url'=>array('/admin/bookingPaymentRules/admin'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Country', 'url'=>array('/admin/country/admin'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Province', 'url'=>array('/admin/province/admin'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'City', 'url'=>array('/admin/city/admin'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
    
	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
