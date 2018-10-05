<?php
/* @var $this RekapIndikatorController */
/* @var $model RekapIndikator */

$this->breadcrumbs=array(
	'Rekap Indikators'=>array('index'),
	$model->id_rekap,
);

$this->menu=array(
	array('label'=>'Daftar Rekap Indikator', 'url'=>array('index')),
	array('label'=>'Buat Rekap Indikator', 'url'=>array('create')),
	array('label'=>'Ubah Rekap Indikator', 'url'=>array('update', 'id'=>$model->id_rekap)),
	array('label'=>'Hapus Rekap Indikator', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_rekap),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Atur Rekap Indikator', 'url'=>array('admin')),
);
?>

<h1>View RekapIndikator #<?php echo $model->id_rekap; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_rekap',
		'id_ind_satker',
		'tgl',
		'numerator',
		'denumerator',
	),
)); ?>
