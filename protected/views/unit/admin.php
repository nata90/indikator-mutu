<?php
/* @var $this UnitController */
/* @var $model Unit */

$this->breadcrumbs=array(
	'Units'=>array('index'),
	'Manage',
);

$this->menu=array(
	// array('label'=>'Daftar Unit', 'url'=>array('index')),
	array('label'=>'Buat Unit', 'url'=>array('create')),
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#unit-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Pengaturan Unit</h1>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'unit-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'header' => 'No',
			'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1'
		),
		//'id_unit',
		'nama_unit',
		'inisial',
		array(
			'class'=>'CButtonColumn',
			'buttons' => array(
					
				'view' => array(
					'label' => 'view',
					'options' => array(
						'rel' => 500, 
						'class' => 'view'
					),
					'click' => 'dialogUpdate',
					'url' => 'Yii::app()->controller->createUrl("view",array("id"=>$data->primaryKey))'),
				'update' => array(
					'label' => 'update',
					'options' => array(
						//'rel' => 500, 
						'class' => 'update'
					),
					//'click' => 'dialogUpdate',
					'url' => 'Yii::app()->controller->createUrl("update",array("id"=>$data->primaryKey))'),
				'delete' => array(
					'label' => 'delete',
					'options' => array(
						//'rel' => 350, 
						'class' => 'delete'
					),
					//'click' => 'dialogUpdate',
					'url' => 'Yii::app()->controller->createUrl("delete",array("id"=>$data->primaryKey))')
			),
			'template' => '{update}{delete}',
		),
	),
)); ?>
