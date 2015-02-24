<?php
/* @var $this TaxController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Taxes',
);

$this->menu=array(
	array('label'=>'<i class="fa fa-plus-circle"></i> Add Tax', 'url'=>array('create')),
	array('label'=>'<i class="fa fa-cogs"></i> Manage Tax', 'url'=>array('admin')),
);
?>

<h1>Taxes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
