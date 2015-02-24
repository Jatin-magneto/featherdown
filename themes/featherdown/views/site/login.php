<!-- Login
================================================== -->
	<div class="logo">
        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/featherdown-white.png" alt=""/>
    </div>
	<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<!--<form class="login-form" action="" method="post">-->
    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
	'validateOnSubmit'=>true,
	),'htmlOptions'=>array(
                          'class'=>'login-form',
                        )
)); ?>
		<h3 class="form-title">Login to your account</h3>
		<div class="form-group">
			<div class="input-icon">
				<i class="fa fa-user"></i>
                		<?php echo $form->textField($model,'username',array('class'=>'form-control placeholder-no-fix','placeholder'=>"Username")); ?>
                		
				<!--<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username"/>-->
                <?php echo $form->error($model,'username'); ?>
			</div>
		</div>
		<div class="form-group">
			<div class="input-icon">
				<i class="fa fa-lock"></i>
                <?php echo $form->passwordField($model,'password',array('class'=>'form-control placeholder-no-fix','placeholder'=>"Password")); ?>
				<!--<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"/>-->
                <?php echo $form->error($model,'password'); ?>
			</div>
		</div>
		<div class="form-actions">
			<!--<label class="checkbox">
			<input type="checkbox" name="remember" value="1"/> Remember me </label>-->
			<!--<button type="submit" class="btn btn-success pull-right" formaction="index.html">-->
            <?php echo CHtml::submitButton('Login',array('class'=>'btn btn-success pull-right')); ?>
			<!--Login </button>-->
		</div>
		<div class="create-account">
			<p>
				 Don't have an account yet ?&nbsp; <a id="register-btn" href="sign-up.html">Create an account</a>
			</p>
		</div>
<?php $this->endWidget(); ?>
	<!-- END LOGIN FORM -->
    
 	</div> 
    <div class="copyright"> 2015 &copy; featherdown.co.uk. All Copyrights Reserved. </div> 
<!-- /.Login --> 