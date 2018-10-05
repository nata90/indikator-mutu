<?php
/* @var $this SatkerController */
/* @var $model Satker */

$this->breadcrumbs=array(
	'Satkers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Daftar Satker', 'url'=>array('index')),
	array('label'=>'Pengaturan Satker', 'url'=>array('admin')),
);
?>

<h1>Buat Satuan Kerja</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>