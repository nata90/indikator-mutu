<?php
/* @var $this IndSatkerController */
/* @var $model IndSatker */

$this->breadcrumbs=array(
	'Ind Satkers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Daftar Indikator Satker', 'url'=>array('index')),
	array('label'=>'Atur Indikator Satker', 'url'=>array('admin')),
);
?>

<h1>Buat Indikator per Satker</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'listSatker'=>$listSatker)); ?>