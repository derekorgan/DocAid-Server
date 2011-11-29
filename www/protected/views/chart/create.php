<?php
$this->breadcrumbs=array(
	'Charts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Chart', 'url'=>array('index')),
	array('label'=>'Manage Chart', 'url'=>array('admin')),
);
?>

<h1>Create Chart</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>