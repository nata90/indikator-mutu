<?php
/* @var $this IndikatorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Indikators',
);

$this->menu=array(
	array('label'=>'Buat Indikator', 'url'=>array('create')),
	array('label'=>'Pengaturan Indikator', 'url'=>array('admin')),
);
?>

<h1>Daftar Indikator</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
