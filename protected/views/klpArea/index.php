<?php
/* @var $this KlpAreaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Klp Areas',
);

$this->menu=array(
	array('label'=>'Buat Kelompok Area', 'url'=>array('create')),
	array('label'=>'Atur Kelompok Area', 'url'=>array('admin')),
);
?>

<h1>Kelompok Area</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
