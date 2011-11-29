<?php
$this->breadcrumbs=array(
	'Wards',
);

$this->menu=array(
	array('label'=>'Create Ward', 'url'=>array('create')),
	array('label'=>'Manage Ward', 'url'=>array('admin')),
);
?>

<h1>Wards</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
