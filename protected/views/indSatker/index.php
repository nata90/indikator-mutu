<?php
/* @var $this IndSatkerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ind Satkers',
);

$this->menu=array(
	array('label'=>'Buat Indikator Satker', 'url'=>array('create')),
	array('label'=>'Atur Indikator Satker', 'url'=>array('admin')),
);
?>

<h1>Indikator per Satuan Kerja</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
