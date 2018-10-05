<?php
/* @var $this IndSatkerController */
/* @var $model IndSatker */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_ind_satker'); ?>
		<?php echo $form->textField($model,'id_ind_satker'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_indikator'); ?>
		<?php echo $form->textField($model,'id_indikator'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_satker'); ?>
		<?php echo $form->textField($model,'id_satker'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->