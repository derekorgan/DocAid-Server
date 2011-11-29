<?php
$this->breadcrumbs=array(
	'Beds',
);

$this->menu=array(
	array('label'=>'Create Bed', 'url'=>array('create')),
	array('label'=>'Manage Bed', 'url'=>array('admin')),
);
?>

<h1>Beds</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
