<?php
/* @var $this PjDataController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pj Datas',
);

$this->menu=array(
	array('label'=>'Create PjData', 'url'=>array('create')),
	array('label'=>'Manage PjData', 'url'=>array('admin')),
);
?>

<h1>Pj Datas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
