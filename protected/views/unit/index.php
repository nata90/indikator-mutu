<?php
/* @var $this UnitController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Units',
);

$this->menu=array(
	array('label'=>'Buat Unit', 'url'=>array('create')),
	array('label'=>'Pengaturan Unit', 'url'=>array('admin')),
);
?>

<h1>Daftar Unit</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
