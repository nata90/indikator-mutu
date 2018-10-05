<?php
/* @var $this IndikatorController */
/* @var $model Indikator */

$this->breadcrumbs=array(
	'Indikators'=>array('index'),
	'Manage',
);

/*$this->menu=array(
	// array('label'=>'Daftar Indikator', 'url'=>array('index')),
	array('label'=>'Buat Indikator', 'url'=>array('create')),
);*/

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

<h1>Grafik Indikator</h1>

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
		
		'uraian_ind',
		array(
			'header'=>'Opsi',
			'value'=>'Indikator::getButtonGrafik($data->id_indikator)',
			'type'=>'raw',
			'htmlOptions'=>array(
				'style'=>'text-align:center'
			),
		),
		/*array(
			'class'=>'CButtonColumn',
			'template' => '{view}',
			'buttons' => array(
						
						'view' => array(
							'url' => 'Yii::app()->createUrl("grafik/grafik", array("id"=>$data->id_indikator))'
						),
						 
					)

		),*/
	),
)); ?>
