<?php
$this->breadcrumbs=array(
	'Patients'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Patient', 'url'=>array('index')),
	array('label'=>'Create Patient', 'url'=>array('create')),
	array('label'=>'Update Patient', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Patient', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Patient', 'url'=>array('admin')),
);
?>

<h1>View Patient #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'dob',
		'sex',
		'bed_id',
	),
)); ?>
