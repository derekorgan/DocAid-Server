<?php
$this->breadcrumbs=array(
	'Beds'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Bed', 'url'=>array('index')),
	array('label'=>'Create Bed', 'url'=>array('create')),
	array('label'=>'View Bed', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Bed', 'url'=>array('admin')),
);
?>

<h1>Update Bed <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>