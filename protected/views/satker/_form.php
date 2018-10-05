<?php
/* @var $this SatkerController */
/* @var $model Satker */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'satker-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'id_unit'); ?>
		<?php echo $form->textField($model,'id_unit'); ?>
		<?php echo $form->error($model,'id_unit'); ?>
	</div> -->

	<div class="row">
	<?php echo $form->labelEx($model,'unit'); ?>
	<?php echo $form->dropDownList($model,'id_unit', CHtml::listData(Unit::model()->findAll(), 'id_unit', 'nama_unit'),   array('empty'=>'Pilih Unit'))?>
	</div>
		
	<div class="row">
		<?php echo $form->labelEx($model,'nama_satker'); ?>
		<?php echo $form->textField($model,'nama_satker',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'nama_satker'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->