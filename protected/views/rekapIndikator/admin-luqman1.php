<?php
/* @var $this RekapIndikatorController */
/* @var $model RekapIndikator */

$this->breadcrumbs=array(
	'Rekap Indikators'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Daftar Rekapitulasi', 'url'=>array('index')),
	array('label'=>'Isi Rekapitulasi', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#rekap-indikator-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Rekap Indikator Mutu</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php /* $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'rekap-indikator-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_rekap',
		'id_ind_satker',
		'tgl',
		'numerator',
		'denumerator',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); */ ?>


<?PHP 
$timestamp = strtotime("last day of");
$total = date("d", $timestamp);
$pertanyaan = RekapIndikator::model()->findAll(array(
		
		'group'=>'id_ind_satker',
	));
?>

<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'rekap-indikator-all-form',
		'enableAjaxValidation'=>false,
	)); ?>

<div style="overflow:auto;width:900px;height:350px;padding:10px;border:0px solid #000000">
	<table class="data" border="1">
<tr>
<?php 
echo '<th>Indikator</th>';
for($i = 1 ; $i<=$total; $i++){
	echo '<th>'.$i.'</th>';
}
echo '<th>Total</th>';
echo '<th>Presentase</th>'
?>
</tr>

<?php 
foreach($pertanyaan as $val){
	
	echo '<tr>';
	echo '<td width="200">'.$val->idIndSatker->idIndikator->uraian_ind.'</td>';
	
	$data = RekapIndikator::model()->findAllByAttributes(array('id_ind_satker'=>$val->id_ind_satker, ));
	$n = array();
	$d = array();
	foreach($data as $item){
				$dateA = date('d', strtotime($item->tgl));
				$n[$dateA] = $item->numerator;
				$d[$dateA] = $item->denumerator;
			
	}
	//print_r($n);
	// print_r($d);
	$ntot = null;
	$dtot = null;
	for($j = 1 ; $j<=$total; $j++){
	
		if(array_key_exists($j,$n)){
			echo '<td>'.$n[$j].'/'.$d[$j].'</td>';
			$ntot += $n[$j];
			$dtot += $d[$j];
			// echo '<td><input type="text" size="3" placeholder="N" value="'.$n[$j].'" readonly="readonly">/<input type="text" size="3" placeholder="D" value="'.$d[$j].'" readonly="readonly"></td>';
		}else{
			if(date('d') == $j){
				/*echo '<form id="rekap-indikator-form" action="/indikatormutu/index.php?r=rekapindikator/create" method="post">';
				$tglnow= date('Y-m-d');
				echo '<td>
				<input type="hidden" name="RekapIndikator[tgl]" value="'.$tglnow.'">
				<input type="text" size="3" placeholder="N" name="RekapIndikator[numerator]">/<input type="text" size="3" name="RekapIndikator[denumerator]" placeholder="D"></td>';
				echo CHtml::submitButton('Simpan');
				*/
			}else if(date('d') < $j){
				echo '<td></td>';
			}else{
				echo '<td></td>';
				//echo '<td><input type="text" size="3" placeholder="N">/<input type="text" size="3" placeholder="D"></td>';
			}
		}	
	}
	echo '<td></td>';
	echo '<td>sum</td>';
	echo '<td>'.
	if($ntot != null && $dtot != null){
		echo ($ntot / $dtot)*100 .'%'; 
	}
	.'</td>';
	echo '</tr>';
}
?>
</table>
</div>
<?php /*echo CHtml::submitButton('Simpan'); */ ?>
<?php $this->endWidget(); ?>
