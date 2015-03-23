<div class="login  messageBox">
	<div class="logo">
		<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/featherdown-white.png" alt=""/>
	</div>
	
	<div class="content">
	<div class="messages">
		<?php
			foreach(Yii::app()->user->getFlashes() as $key => $message) {
				echo '<div>'. $message . "</div> \n";
			}
		?>
	</div>
	<div class="form-actions">
		<a href="javascript:void(0)" class="btn btn-success pull-right">Login to your account </a>
	</div>
	</div>	
</div>
