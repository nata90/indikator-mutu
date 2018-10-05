<?php
/* @var $this RekapIndikatorController */
/* @var $model RekapIndikator */

$this->breadcrumbs=array(
	'Rekap Indikators'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'Daftar Rekapitulasi', 'url'=>array('index')),
	array('label'=>'Lihat Rekapitulasi', 'url'=>array('admin')),
);
?>

<h1>Isi Rekap Indikator</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'listIndikatorArr'=>$listIndikatorArr,)); ?>
