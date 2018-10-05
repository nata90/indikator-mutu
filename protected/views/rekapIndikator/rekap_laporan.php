

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

echo '<h1>Rekap Indikator Mutu '. $m .'/'. $y .'</h1>';

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
	?>
</table>

