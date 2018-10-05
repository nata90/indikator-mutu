<?php
/* @var $this SatkerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Satkers',
);

$this->menu=array(
	array('label'=>'Buat Satker', 'url'=>array('create')),
	array('label'=>'Pengaturan Satker', 'url'=>array('admin')),
);
?>

<h1>Daftar Satuan Kerja</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
