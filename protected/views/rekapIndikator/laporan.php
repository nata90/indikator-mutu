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
$baseUrl = Yii::app()->request->baseUrl;
Yii::app()->clientScript->registerScript('search', "
var baseUrl = '$baseUrl';
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

$('#tgl_edit').click(function(){
	var tgl  = $('#date').val();
	window.location.href = baseUrl+'/index.php?r=rekapindikator/laporan&tgl=1-'+tgl;
});
");
?>

<h1>Rekap Indikator Mutu</h1>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>


<?php
$KlpArea = CHtml::listData(KlpArea::model()->findAll(),'id_klp','nama_klp');

if(isset($_GET['tgl'])){
	$timestamp = strtotime("last day of".$_GET['tgl']);
	$m = date('m',strtotime($_GET['tgl']));
	$y = date('Y',strtotime($_GET['tgl']));
	$dt = date('d',strtotime($_GET['tgl']));
	$tglnow= date('Y-m', strtotime($_GET['tgl']));
}else {
	$timestamp = strtotime("last day of");
	$m = date('m');
	$y = date('Y');
	$dt = date('d');
	$tglnow= date('Y-m-d');
} 

echo '<input type="text" id="date" value="'. date('m-Y', strtotime($tglnow)) .'">';
echo '<input type="button" id="tgl_edit" value="lihat">';
if(isset($_GET['tgl']))
	echo '<a href="'. Yii::app()->createUrl('RekapIndikator/rekaplaporan2', array('tgl'=>$_GET['tgl'])) .'"><input type="button" id="tgl_edit" value="Download"></a>';
else 
	echo '<a href="'. Yii::app()->createUrl('RekapIndikator/rekaplaporan2') .'"><input type="button" id="tgl_edit" value="Download"></a>';

$indikator = Indikator::model()->findAll(array(
		'order'=>'id_klp ASC',
	));
$dataPj = PjData::model()->model()->findAll();



$dataPersen = RekapIndikator::model()->findAll(array(
		'condition'=>'MONTH(tgl)=:m AND YEAR(tgl)=:y',
		'params'=>array(':m'=>$m, ':y'=>$y),
	));

// foreach($dataPj as $val){
	// echo 'a';
	foreach($dataPersen as $item){
		$n[$item->idIndSatker->idIndikator->id_indikator][$item->idIndSatker->idPjdata->id_pjdata][] = $item->numerator;
		$d[$item->idIndSatker->idIndikator->id_indikator][$item->idIndSatker->idPjdata->id_pjdata][] = $item->denumerator;
		$aa[] = $item->numerator;
	}	
	
// }	
?>


<table border="2px">
	<tr >
		<td width="50px">Indikator mutu kars</td>
		<?php /* <td>klp</td> */?>
		<td width="50px">PIC</td>
		<?php foreach($dataPj as $item){
			echo '<td width="50px">'.$item->nama_pjdata.'</td>';
			$arrPjId[$item->id_pjdata] = $item->id_pjdata;
		}?>
		<td>Total</td>
		<td>Target</td>
	</tr>
	<?php 
	foreach($indikator as $val){
		// $a[$val->id_klp] = $val->id_klp;
		$dataPic = IndSatker::model()->findAll(array(
			'with'=>'idSatker',
			'select'=>'id_indikator, id_pjdata',
			'condition'=>'id_indikator =:id',
			'params'=>array(':id'=>$val->id_indikator),
		));
		//$picArr = array();
		foreach($dataPic as $val2){
			$a[$val->id_klp][$val->id_indikator] =  $val->uraian_ind;
		}
	}
	
	foreach($a as $key=>$val){ ?>
		<tr>
			<td bgcolor="yellow" colspan="24"><?php echo '<b>'.$KlpArea[$key].'<b>';?></td>
		</tr>
	<?	foreach($val as $key2=>$item){ ?>
			<tr>
				<td width="50px"><?php echo $item;?></td>
			<?php 	$dataPic = IndSatker::model()->findAll(array(
					'with'=>'idSatker',
					'select'=>'id_indikator, id_pjdata',
					'condition'=>'id_indikator =:id',
					'params'=>array(':id'=>$key2),
				));
				$picArr = array();
				foreach($dataPic as $val2){
					//$picArr[] =  $val2->idPjdata->nama_pjdata;
					$picArr[$val2->idSatker->idUnit->inisial] =  $val2->idSatker->idUnit->inisial;
				}
				$picList = implode(', ', $picArr);
				?>
				<td><?php echo $picList;?></td>
				
				<?php foreach($arrPjId as $key){
					$totalN = '';
					foreach($n[$key2][$key] as $key3){
						$totalN += $key3;
					}
					$totalD = '';
					foreach($d[$key2][$key] as $key3){
						$totalD += $key3;
					}
					
					if($totalN == '' && $totalD == ''){
						echo '<td></td>';
					}else {
						echo '<td>'.round(($totalN / $totalD) * 100) .'%</td>';
					}
				}
				echo '<td></td>';
				echo '<td></td>';
				?>
				
				
				
				
				
				
			</tr>
	<?	}
		
	}

	/* foreach($indikator as $val){?>
		<tr>
		<td width="50px"><?php echo $val->uraian_ind;?></td>
		<?// <td><?php echo $val->id_klp ;?></td> ?>
		<?php 
		$dataPic = IndSatker::model()->findAll(array(
			'with'=>'idSatker',
			'select'=>'id_indikator, id_pjdata',
			'condition'=>'id_indikator =:id',
			'params'=>array(':id'=>$val->id_indikator),
		));
		$picArr = array();
		foreach($dataPic as $val2){
			//$picArr[] =  $val2->idPjdata->nama_pjdata;
			$picArr[$val2->idSatker->idUnit->inisial] =  $val2->idSatker->idUnit->inisial;
		}
		$picList = implode(', ', $picArr);
		?>
		<td><?php echo $picList;?></td>
		
		<?php foreach($arrPjId as $key){
			$totalN = '';
			foreach($n[$val->id_indikator][$key] as $key2){
				$totalN += $key2;
			}
			$totalD = '';
			foreach($d[$val->id_indikator][$key] as $key2){
				$totalD += $key2;
			}
			
			if($totalN == '' && $totalD == ''){
				echo '<td></td>';
			}else {
				echo '<td>'.round(($totalN / $totalD) * 100) .'%</td>';
			}
		}
		echo '<td></td>';
		echo '<td></td>';
		?>
		</tr>
	<?php 
	
	} */
	?>
</table>



<?/* <table border="2px">
	<tr >
		<td width="50px">Indikator mutu kars</td>
		<?php // <td>klp</td> ?>
		<td width="50px">PIC</td>
		<?php foreach($dataPj as $item){
			echo '<td width="50px">'.$item->nama_pjdata.'</td>';
			$arrPjId[$item->id_pjdata] = $item->id_pjdata;
		}?>
		<td>Total</td>
		<td>Target</td>
	</tr>
	<?php 
	foreach($indikator as $val){
		// $a[$val->id_klp] = $val->id_klp;
		$dataPic = IndSatker::model()->findAll(array(
			'with'=>'idSatker',
			'select'=>'id_indikator, id_pjdata',
			'condition'=>'id_indikator =:id',
			'params'=>array(':id'=>$val->id_indikator),
		));
		$picArr = array();
		foreach($dataPic as $val2){
			$a[$val->id_klp][$val->uraian_ind] =  $val->uraian_ind;
		}
	}
	
	
	
	print_r($a);
	exit();
	foreach($indikator as $val){?>
		<tr>
		<td width="50px"><?php echo $val->uraian_ind;?></td>
		<?// <td><?php echo $val->id_klp ;?></td> ?>
		<?php 
		$dataPic = IndSatker::model()->findAll(array(
			'with'=>'idSatker',
			'select'=>'id_indikator, id_pjdata',
			'condition'=>'id_indikator =:id',
			'params'=>array(':id'=>$val->id_indikator),
		));
		$picArr = array();
		foreach($dataPic as $val2){
			//$picArr[] =  $val2->idPjdata->nama_pjdata;
			$picArr[$val2->idSatker->idUnit->inisial] =  $val2->idSatker->idUnit->inisial;
		}
		$picList = implode(', ', $picArr);
		?>
		<td><?php echo $picList;?></td>
		
		<?php foreach($arrPjId as $key){
			$totalN = '';
			foreach($n[$val->id_indikator][$key] as $key2){
				$totalN += $key2;
			}
			$totalD = '';
			foreach($d[$val->id_indikator][$key] as $key2){
				$totalD += $key2;
			}
			
			if($totalN == '' && $totalD == ''){
				echo '<td></td>';
			}else {
				echo '<td>'.round(($totalN / $totalD) * 100) .'%</td>';
			}
		}
		echo '<td></td>';
		echo '<td></td>';
		?>
		</tr>
	<?php 
	
	}
	?>
</table>
 */?>

<?/* <table border="2px">
	<tr>
		<td>Indikator mutu kars</td>
		<td>PIC</td>
		<td>IRNA A</td>
		<td>IRNA B</td>
	</tr>
</table> */?>
	

