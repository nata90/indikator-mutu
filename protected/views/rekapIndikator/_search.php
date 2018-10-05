<?php
/* @var $this RekapIndikatorController */
/* @var $model RekapIndikator */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_rekap'); ?>
		<?php echo $form->textField($model,'id_rekap'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_ind_satker'); ?>
		<?php echo $form->textField($model,'id_ind_satker'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tgl'); ?>
		<?php echo $form->textField($model,'tgl'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numerator'); ?>
		<?php echo $form->textField($model,'numerator'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'denumerator'); ?>
		<?php echo $form->textField($model,'denumerator'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->