<?php
$this->breadcrumbs=array(
	'Wards'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ward', 'url'=>array('index')),
	array('label'=>'Create Ward', 'url'=>array('create')),
	array('label'=>'View Ward', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Ward', 'url'=>array('admin')),
);
?>

<h1>Update Ward <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>