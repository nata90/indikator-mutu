<?php
/* @var $this IndikatorController */
/* @var $model Indikator */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'indikator-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><span class="required">*</span> Harus diisi.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Area Indikator'); ?>
		<?php echo $form->textField($model,'area_ind',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'area_ind'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Uraian Indikator'); ?>
		<?php echo $form->textField($model,'uraian_ind',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'uraian_ind'); ?>
	</div>

	<?php /* <div class="row">
		<?php echo $form->labelEx($model,'id_klp'); ?>
		<?php echo $form->textField($model,'id_klp'); ?>
		<?php echo $form->error($model,'id_klp'); ?>
	</div> */ ?>

	<div class="row">
	<?php echo $form->labelEx($model,'Kelompok Indikator'); ?>
	<?php echo $form->dropDownList($model,'id_klp', CHtml::listData(KlpArea::model()->findAll(), 'id_klp', 'nama_klp'),   array('empty'=>'Pilih Kelompok'))?>
	</div>
	
	<?php /* <div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div> */ ?>

	<div class="row">
	<?php echo $form->labelEx($model,'Status'); ?>
	<?php echo $form->dropDownList($model, 'status', array('1' => 'Aktif', '2' => 'Non Aktif'), array('empty' => 'Pilih Status')); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'standar'); ?>
		<?php echo $form->textField($model,'standar',array('size'=>3,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'standar'); ?>
	</div>
		
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->