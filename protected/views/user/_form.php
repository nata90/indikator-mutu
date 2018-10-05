<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><span class="required">*</span> Harus diisi.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nip'); ?>
		<?php echo $form->textField($model,'nip',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'nip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_user'); ?>
		<?php echo $form->textField($model,'nama_user',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nama_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jabatan'); ?>
		<?php echo $form->textField($model,'jabatan'); ?>
		<?php echo $form->error($model,'jabatan'); ?>
	</div>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'level'); ?>
		<?php echo $form->textField($model,'level'); ?>
		<?php echo $form->error($model,'level'); ?>
	</div> -->

	<div class="row">
	<?php echo $form->labelEx($model,'level'); ?>
	<?php echo $form->dropDownList($model, 'level', array('1' => 'Admin', '2' => 'User'), array('empty' => 'Pilih Level')); ?>
	</div>
	
	
	
	<!-- <div class="row">
		<?php echo $form->labelEx($model,'id_satker'); ?>
		<?php echo $form->textField($model,'id_satker'); ?>
		<?php echo $form->error($model,'id_satker'); ?>
	</div> -->

	<div class="row">
	<?php echo $form->labelEx($model,'Satker'); ?>
	<?php echo $form->dropDownList($model,'id_satker', CHtml::listData(Satker::model()->findAll(), 'id_satker', 'nama_satker'), array('empty'=>'Pilih Satker'))?>
	</div>
		
	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->