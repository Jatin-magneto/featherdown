<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<div id="page-wrapper">
<div class="navbar-ex1-collapse">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
		//	'title'=>'Operations',
		)); 
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'encodeLabel'=>false,
			'htmlOptions'=>array('class'=>'nav navbar-nav side-nav'),
		));
		$this->endWidget();
	?>
	</div><!-- sidebar -->
</div>
<div class="container-fluid">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>

</div>

<?php $this->endContent(); ?>


