<?php
/* @var $this RekapIndikatorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Rekap Indikators',
);

$this->menu=array(
	array('label'=>'Isi Rekapitulasi', 'url'=>array('create')),
	array('label'=>'Atur Rekapitulasi', 'url'=>array('admin')),
);
?>

<h1>Rekap Indikators</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
