<?php
/* @var $this RekapIndikatorController */
/* @var $model RekapIndikator */

$this->breadcrumbs=array(
	'Rekap Indikators'=>array('index'),
	'Manage',
);

/* $this->menu=array(
	array('label'=>'Daftar Rekapitulasi', 'url'=>array('index')),
	array('label'=>'Isi Rekapitulasi', 'url'=>array('create')),
); */

$status = Yii::app()->user->idsatker == 2 ? 1 : 0; //1=admin , 0=umum
$baseUrl = Yii::app()->request->baseUrl;

Yii::app()->clientScript->registerScript('search', "
var baseUrl = '$baseUrl';
var status = '$status';

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


if(status == 1){ //admin
	$('#filter').click(function(){
		var satker  = $('#level').val();
		var tgl  = $('#date').val();
		window.location.href = baseUrl+'/index.php?r=RekapIndikator/admin&idsat='+satker+'&tgl='+tgl;
	});


	$('#tgl_edit').click(function(){
		var tgl  = $('#date').val();
		var satker  = $('#level').val();
		window.location.href = baseUrl+'/index.php?r=RekapIndikator/admin&tgl='+tgl+'&idsat='+satker;
	});
	
}else {
	$('#filter').click(function(){
		var satker  = $('#level').val();
		window.location.href = baseUrl+'/index.php?r=RekapIndikator/admin&idsat='+satker;
	});


	$('#tgl_edit').click(function(){
		var tgl  = $('#date').val();
		window.location.href = baseUrl+'/index.php?r=RekapIndikator/admin&tgl='+tgl;
	});
	
}




");


?>

<h1>Rekap Indikator Mutu</h1>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
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

</br>
<?php
$arr = array('a','b');
if(isset($_GET['idsat'])){
	$idsat = $_GET['idsat'];
}else {
	$idsat = '';
}



if(isset($_GET['tgl'])){
	$timestamp = strtotime("last day of".$_GET['tgl']);
	$m = date('m',strtotime($_GET['tgl']));
	$y = date('Y',strtotime($_GET['tgl']));
	$dt = date('d',strtotime($_GET['tgl']));
	$tglnow= date('Y-m-d', strtotime($_GET['tgl']));
}else {
	$timestamp = strtotime("last day of");
	$m = date('m');
	$y = date('Y');
	$dt = date('d');
	$tglnow= date('Y-m-d');
}



$dataCek = IndSatker::model()->findAll(array(
				// 'condition'=>,
				'group'=>'id_satker'
			)); 
foreach($dataCek as $val){
	$listidsatkerArr[] = $val->id_satker;	
}
$listidsatker2 = implode(',', $listidsatkerArr);

$listSatker = Chtml::listData(Satker::model()->findAll(array('condition'=>'id_satker IN ('. $listidsatker2 .')')), 'id_satker', 'nama_satker');
$listSatker[1] = 'Semua Satker';
if(Yii::app()->user->idsatker == 2 ){
	echo Chtml::dropDownList('level', $idsat, $listSatker ,array('empty'=>'Pilih Salah Satu'));
?>
<input type="button" id="filter" value="Cari">
<?php 
}//else {
	echo Chtml::textField('date', date('d-m-Y', strtotime($tglnow)));
	echo '<input type="button" id="tgl_edit" value="Ubah">';
	if(isset($_GET['tgl']) && isset($_GET['idsat']))
		echo '<a href="'. Yii::app()->createUrl('RekapIndikator/rekapnew', array('tgl'=>$_GET['tgl'], 'idsat'=>$_GET['idsat'])) .'"><input type="button" id="tgl_edit" value="Download"></a>';
	else if(isset($_GET['tgl']))
		echo '<a href="'. Yii::app()->createUrl('RekapIndikator/rekapnew', array('tgl'=>$_GET['tgl'])) .'"><input type="button" id="tgl_edit" value="Download"></a>';
	else 
		echo '<a href="'. Yii::app()->createUrl('RekapIndikator/rekapnew') .'"><input type="button" id="tgl_edit" value="Download"></a>';
//}

$total = date("d", $timestamp);


/* $pertanyaan = RekapIndikator::model()->findAll(array(
				'condition'=>'id_ind_satker IN ('.$listIdSatker.')',
				'group'=>'id_ind_satker',
	)); */
	
if($listIdSatker != null){
	$pertanyaan = IndSatker::model()->findAll(array(
				'condition'=>'id_ind_satker IN ('.$listIdSatker.')',
			));
}
?>

<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'rekap-indikator-all-form',
		'enableAjaxValidation'=>false,
	)); ?>

<?php /* <div style="overflow:auto;width:100%;height:350px;padding:10px;border:0px solid #000000"> */?>
<div style="overflow:auto;width:100%;padding:10px;border:0px solid #000000">
	<table class="data" border="1">
		<tr>
		<?php 
			echo '<th>No.</th>';
			echo '<th>Indikator</th>';
				for($i = 1 ; $i<=$total; $i++){
					echo '<th>'.$i.'</th>';
				}
			echo '<th>Total</th>';
			echo '<th>Presentase</th>';
			echo '<th>standar</th>';
			// echo '<th>Grafik</th>'
		?>
		</tr>

<?php
if($listIdSatker != null){
	$no = 1;
	foreach($pertanyaan as $val){
		
		echo '<tr height="50px">';
		echo '<td width="10">'.$no.'</td>';
		echo '<td width="200px">'.$val->idIndikator->uraian_ind.'</td>';
		
		//$data = RekapIndikator::model()->findAllByAttributes(array('id_ind_satker'=>$val->id_ind_satker, ));
		$data = RekapIndikator::model()->findAll(array(
			'condition'=>'id_ind_satker=:id AND MONTH(tgl)=:m AND YEAR(tgl)=:y',
			'params'=>array(':id'=>$val->id_ind_satker, ':m'=>$m, ':y'=>$y),
		));
		$n = array();
		$d = array();
		foreach($data as $item){
					$dateA = date('j', strtotime($item->tgl));
					$n[$dateA] = $item->numerator;
					$d[$dateA] = $item->denumerator;
				
		}
		$totalN = null;
		$totalD = null;
		// print_r($n);
		// print_r($d);
		for($j = 1 ; $j<=$total; $j++){
		
			if(array_key_exists($j,$n)){
				if($dt == $j){
					echo '<td width="20px">
					<input type="hidden" name="tgl" value="'.$tglnow.'" >
					<input type="text" size="3" placeholder="N" name="RekapIndikator['.$val->id_ind_satker.'][numerator]" size="3" value="'.$n[$j].'">
					</br>
					<input type="text" width="35px" name="RekapIndikator['.$val->id_ind_satker.'][denumerator]" placeholder="D" size="3" value="'.$d[$j].'"></td>';
					$totalN += $n[$j];
					$totalD += $d[$j];
				}else {
					echo '<td width="20px">'.$n[$j].'</br>'.$d[$j].'</td>';
					$totalN += $n[$j];
					$totalD += $d[$j];
				}
				
				// echo '<td><input type="text" size="3" placeholder="N" value="'.$n[$j].'" readonly="readonly">/<input type="text" size="3" placeholder="D" value="'.$d[$j].'" readonly="readonly"></td>';
			}else{
				//if(date('d') == $j){
				if($dt == $j){
					echo '<td width="20px">
					<input type="hidden" name="tgl" value="'.$tglnow.'" >
					
					<input type="text" size="3" placeholder="N" name="RekapIndikator['.$val->id_ind_satker.'][numerator]" size="3">
					</br>
					<input type="text" width="35px" name="RekapIndikator['.$val->id_ind_satker.'][denumerator]" placeholder="D" size="3"></td>';
					
				}else if(date('d') < $j){
					echo '<td width="20px"></td>';
				}else{
					echo '<td width="20px"></td>';
					//echo '<td><input type="text" size="3" placeholder="N">/<input type="text" size="3" placeholder="D"></td>';
				}
			}	
		}
		//echo '<td></td>';
		echo '<td>'.$totalN .'</br>'. $totalD.'</td>';
		$persen = ($totalN / $totalD) * 100;
		$bgcolor = $val->idIndikator->standar > round($persen) ? 'red':'';
		echo '<td bgcolor="'.$bgcolor.'">'.round($persen).'%</td>';
		echo '<td>'.$val->idIndikator->standar.' %</td>';
		/* echo '<td><a class="btn btn-small btn-primary test-popup-link" href="<?php echo Yii::app()->baseUrl; ?>/kanal_kab/grafik_penduduk/<?php echo $id; ?>">Grafik</a></td>'; */
		echo '</tr>';
		$no++;
	}
}
?>
</table>
</div>
<div class="" align="center">
	<?php echo CHtml::submitButton('simpan'); ?>
</div>
<?php /*echo CHtml::submitButton('Simpan'); */ ?>
<?php $this->endWidget(); ?>

