<?php
/* @var $this IndikatorController */
/* @var $model Indikator */

$this->breadcrumbs=array(
	'Indikators'=>array('index'),
	'Manage',
);

$this->menu=array(
	// array('label'=>'Daftar Indikator', 'url'=>array('index')),
	array('label'=>'Buat Indikator', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#indikator-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Pengaturan Indikator</h1>

<?php // echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'indikator-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		// 'id_indikator',
		array(
			'header' => 'No',
			'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1'
		),
		'area_ind',
		
		'uraian_ind',
		// 'idKlp.nama_klp',
		array(
			// 'header'=>'Satuan Kerja',
			'name'=>'id_klp',
			'value'=>'$data->idKlp->nama_klp',
			'filter'=>KlpArea::model()->getListAreaklp(),
		),
		//'status',
		array(
			'header'=>'tampil',
			'name'=>'status',
			'value'=>'Utility::getPublishedToImg( $data->status)',
			'type'=>'raw',
			'filter'=>array('0'=>'tidak','1'=>'ya'),
			'htmlOptions'=>array(
				'align'=>'center'
			),
		),
		array(
			//'header'=>'tampil',
			'name'=>'standar',
			'value'=>'$data->standar',
			'htmlOptions'=>array(
				'align'=>'center'
			),


		),
		// 'standar',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
