<?php
/* @var $this IndSatkerController */
/* @var $model IndSatker */

$this->breadcrumbs=array(
	'Ind Satkers'=>array('index'),
	$model->id_ind_satker,
);

$this->menu=array(
	array('label'=>'Daftar Indikator Satker', 'url'=>array('index')),
	array('label'=>'Buat Indikator Satker', 'url'=>array('create')),
	array('label'=>'Ubah Indiaktor Satker', 'url'=>array('update', 'id'=>$model->id_ind_satker)),
	array('label'=>'hapus Indikator Satker', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_ind_satker),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Atur Indikator Satker', 'url'=>array('admin')),
);
?>

<h1>View IndSatker #<?php echo $model->id_ind_satker; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_ind_satker',
		'id_indikator',
		'id_satker',
		'id_pjdata',
	),
)); ?>
