<?php
$this->breadcrumbs=array(
	'Beds'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Bed', 'url'=>array('index')),
	array('label'=>'Create Bed', 'url'=>array('create')),
	array('label'=>'Update Bed', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Bed', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Bed', 'url'=>array('admin')),
);
?>

<h1>View Bed #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'room_id',
		'patient_id',
		'name',
		'mac',
	),
)); ?>
