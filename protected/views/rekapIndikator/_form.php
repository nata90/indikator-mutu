<?php
/* @var $this RekapIndikatorController */
/* @var $model RekapIndikator */
/* @var $form CActiveForm */
?>

<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'rekap-indikator-form',
		'enableAjaxValidation'=>false,
	)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
	<?php echo $form->labelEx($model,'indikator satker'); ?>
	<?php
	$listIndikatorArr = isset($listIndikatorArr) ? $listIndikatorArr : '';
	echo $form->dropDownList($model,'id_ind_satker', $listIndikatorArr, array('empty'=>'Pilih Indikator'))?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'Tanggal'); ?>
		<?php //echo $form->textField($model,'tgl'); ?>
		<?php
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'name'=>'RekapIndikator[tgl]',
			'value'=>$model->tgl,
			// additional javascript options for the date picker plugin
			'options'=>array(
				'showAnim'=>'fold',
				'dateFormat'=>'yy-mm-dd',
                'changeMonth'=> 'true',
                'changeYear'=> 'true',
			),
			'htmlOptions'=>array(
				'style'=>'height:20px;'
			),
		));
		?>
		<?php echo $form->error($model,'tgl'); ?>
    </div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'numerator'); ?>
		<?php echo $form->textField($model,'numerator'); ?>
		<?php echo $form->error($model,'numerator'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'denumerator'); ?>
		<?php echo $form->textField($model,'denumerator'); ?>
		<?php echo $form->error($model,'denumerator'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->