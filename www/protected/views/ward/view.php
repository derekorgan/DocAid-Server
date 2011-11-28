<?php
$this->breadcrumbs=array(
	'Wards'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Ward', 'url'=>array('index')),
	array('label'=>'Create Ward', 'url'=>array('create')),
	array('label'=>'Update Ward', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ward', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ward', 'url'=>array('admin')),
);
?>

<h1>View Ward #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'hospital_id',
		'name',
		'mac',
	),
)); ?>
