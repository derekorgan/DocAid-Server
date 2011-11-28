<?php
$this->breadcrumbs=array(
	'Charts',
);

$this->menu=array(
	array('label'=>'Create Chart', 'url'=>array('create')),
	array('label'=>'Manage Chart', 'url'=>array('admin')),
);
?>

<h1>Charts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
