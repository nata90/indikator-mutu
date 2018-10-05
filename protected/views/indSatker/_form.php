<?php
/* @var $this IndSatkerController */
/* @var $model IndSatker */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ind-satker-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><span class="required">*</span> harus diisi.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php /* <div class="row">
		<?php echo $form->labelEx($model,'id_indikator'); ?>
		<?php echo $form->textField($model,'id_indikator'); ?>
		<?php echo $form->error($model,'id_indikator'); ?>
	</div> */ ?>
	
	
	<div class="row">
		<?php echo $form->labelEx($model,'Nama Satuan Kerja'); ?>
		<?php echo $form->dropDownList($model,'id_satker',$listSatker); ?>
		<?php echo $form->error($model,'id_satker'); ?>
	</div>
	
	<div class="row">
	<?php echo $form->labelEx($model,'Penanggung Jawab Laporan'); ?>
	<?php echo $form->dropDownList($model,'id_pjdata', CHtml::listData(PjData::model()->findAll(), 'id_pjdata', 'nama_pjdata'),   array('empty'=>'Pilih Penanggung Jawab'))?>
	<?php echo $form->error($model,'id_pjdata'); ?>
	</div>
	
	
	<?php 
	if($model->isNewRecord){ ?>
		<div class="row">
			<?php echo $form->labelEx($model,'Daftar Indikator'); ?>
			<?php echo $form->checkBoxList($model,'id_indikator',CHtml::listData(indikator::model()->findAll(array('condition'=>'status = 1', 'order'=>'uraian_ind ASC')),'id_indikator', 'uraian_ind'), array('template'=>'<table><tr><td >{input}</td><td>{label}</td></tr></table>')); ?>
			<?php echo $form->error($model,'id_indikator'); ?>
		</div>
	<?php }else { ?>
		<div class="row">
			<?php echo $form->labelEx($model,'Daftar Indikator'); ?>
			<?php echo $form->dropDownList($model,'id_indikator',CHtml::listData(indikator::model()->findAll(array('condition'=>'status = 1', 'order'=>'uraian_ind ASC')),'id_indikator', 'uraian_ind')); ?>
			<?php echo $form->error($model,'id_indikator'); ?>
		</div>
	<?php }
	?>
		
		
	<!-- </div>
	<div class="row">
	<?php echo $form->labelEx($model,'indikator'); ?>
	<?php echo $form->dropDownList($model,'id_indikator', CHtml::listData(indikator::model()->findAll(), 'id_indikator', 'uraian_ind'),   array('empty'=>'Pilih Indikator'))?>
	</div> -->

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->