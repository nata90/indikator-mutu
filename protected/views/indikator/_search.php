<?php
/* @var $this IndikatorController */
/* @var $model Indikator */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_indikator'); ?>
		<?php echo $form->textField($model,'id_indikator'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'area_ind'); ?>
		<?php echo $form->textField($model,'area_ind',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'uraian_ind'); ?>
		<?php echo $form->textField($model,'uraian_ind',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_klp'); ?>
		<?php echo $form->textField($model,'id_klp'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->