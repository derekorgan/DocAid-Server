<?php
$this->breadcrumbs=array(
	'Charts'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Chart', 'url'=>array('index')),
	array('label'=>'Create Chart', 'url'=>array('create')),
	array('label'=>'View Chart', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Chart', 'url'=>array('admin')),
);
?>

<h1>Update Chart <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>