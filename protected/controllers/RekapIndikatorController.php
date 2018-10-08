<?php

class RekapIndikatorController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','laporan','rekapnew'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','rekap','rekap2','rekaplaporan','rekaplaporan2','adminunit'),
				//'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new RekapIndikator;
		$id_satker=Yii::app()->user->getSatker();
		$listIndikator = IndSatker::model()->findAllByAttributes(array('id_satker'=>$id_satker));
		
		//$listIndikator = IndSatker::model()->findAll();
		if ($listIndikator != null){
			foreach ($listIndikator as $val){
				$listIndikatorArr[$val->id_ind_satker]=$val->idIndikator->uraian_ind;
			}
		} else {
				$listIndikatorArr=array();
		}
				
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RekapIndikator']))
		{
			$model->attributes=$_POST['RekapIndikator'];
			if($model->save())
				$this->redirect(array('create','id'=>$model->id_rekap));
		}

		$this->render('create',array(
			'model'=>$model,
			'listIndikatorArr'=>$listIndikatorArr,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RekapIndikator']))
		{
			$model->attributes=$_POST['RekapIndikator'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_rekap));
		}

		$this->render('update',array(
			'model'=>$model,

		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('RekapIndikator');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{

		if(isset($_GET['idsat'])){
			$idSatker = $_GET['idsat'];
		}else {
			$idSatker = Yii::app()->user->idsatker;
		}
		

		// if(isset($_POST['RekapIndikator']))
		if(isset($_POST['RekapIndikator'])){
			// print_r($_POST);
			// exit();
			foreach($_POST['RekapIndikator'] as $key=>$val){
				$modelNew = RekapIndikator::model()->findByAttributes(array('id_ind_satker'=>$key, 'tgl'=>$_POST['tgl']));
				if($modelNew == null){
					$modelNew = new RekapIndikator;
				}
				$modelNew->numerator = $val['numerator'];
				$modelNew->denumerator = $val['denumerator'];
				$modelNew->id_ind_satker = $key;
				$modelNew->tgl = $_POST['tgl'];
				$modelNew->save();
				
			}
			

		}
		
		
		if($idSatker != 1){
			$modelSatker = IndSatker::model()->findAll(array(
				'with'=>'idIndikator',
				'condition'=>'id_satker=:id AND idIndikator.status=1',
				'params'=>array(':id'=>$idSatker),
				// 'id_satker'=>$idSatker, 'idIndikator.status'=>1
			));
		}else{
			$modelSatker = IndSatker::model()->findAll(array(
				'with'=>'idIndikator',
				'condition'=>'idIndikator.status=1',
			));
		}
		

		
		
		if($modelSatker != null){
			foreach($modelSatker as $val){
				$arrIdSatker[] = $val->id_ind_satker;
			}
			$listIdSatker = implode(',', $arrIdSatker);
		}else {
			$listIdSatker = null;
		}
		
		$model=new RekapIndikator('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['RekapIndikator']))
			$model->attributes=$_GET['RekapIndikator'];
		
		$this->render('admin',array(
			'model'=>$model,
			'listIdSatker'=>$listIdSatker,
		));
	}

	public function actionAdminUnit(){
		$this->layout = 'column1';
		
		if(isset($_GET['idsat'])){
			$idUnit = $_GET['idsat'];
		}else {
			$idUnit = Yii::app()->user->idUnit;
		}
		

		// if(isset($_POST['RekapIndikator']))
		if(isset($_POST['RekapIndikator'])){
			// print_r($_POST);
			// exit();
			foreach($_POST['RekapIndikator'] as $key=>$val){
				$modelNew = RekapIndikator::model()->findByAttributes(array('id_ind_satker'=>$key, 'tgl'=>$_POST['tgl']));
				if($modelNew == null){
					$modelNew = new RekapIndikator;
				}
				$modelNew->numerator = $val['numerator'];
				$modelNew->denumerator = $val['denumerator'];
				$modelNew->id_ind_satker = $key;
				$modelNew->tgl = $_POST['tgl'];
				$modelNew->save();
				
			}
			

		}
		
		
		if($idUnit != 1){
			$modelSatker = IndSatker::model()->findAll(array(
				'with'=>array(
					'idIndikator'=>array('alias'=>'a'),
					'idSatker.idUnit'=>array('alias'=>'b'),
				),
				'condition'=>'b.id_unit =:id AND a.status=1',
				'params'=>array(':id'=>$idUnit),
				// 'id_satker'=>$idSatker, 'idIndikator.status'=>1
			));
		}else{
			$modelSatker = IndSatker::model()->findAll(array(
				'with'=>'idIndikator',
				'condition'=>'idIndikator.status=1',
			));
		}
		

		
		
		if($modelSatker != null){
			foreach($modelSatker as $val){
				$arrIdSatker[] = $val->id_ind_satker;
			}
			$listIdSatker = implode(',', $arrIdSatker);
		}else {
			$listIdSatker = null;
		}
		
		$model=new RekapIndikator('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['RekapIndikator']))
			$model->attributes=$_GET['RekapIndikator'];
		
		$this->render('admin_unit',array(
			'model'=>$model,
			'listIdSatker'=>$listIdSatker,
		));
	}	
	
	
	public function actionLaporan()
	{
		$model=new RekapIndikator('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['RekapIndikator']))
			$model->attributes=$_GET['RekapIndikator'];
		
		$this->render('laporan',array(
			'model'=>$model,
			// 'listIdSatker'=>$listIdSatker,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return RekapIndikator the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=RekapIndikator::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param RekapIndikator $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='rekap-indikator-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionRekap(){
		$timestamp = strtotime("last day of");
		$total = date("d", $timestamp);
		
		for($j = 1 ; $j<=$total; $j++){
			$tglArr[] = $j;
		}
		$tgl = implode(',',$tglArr);
		$idSatker = Yii::app()->user->idsatker;
		
		$modelSatker = IndSatker::model()->findAllByAttributes(array('id_satker'=>$idSatker));
		foreach($modelSatker as $val){
			$arrIdSatker[] = $val->id_ind_satker;
		}
		
		$listIdSatker = implode(',', $arrIdSatker);
		
		$pertanyaan = RekapIndikator::model()->findAll(array(
					'condition'=>'id_ind_satker IN ('.$listIdSatker.')',
					'group'=>'id_ind_satker',
		));
		
		$rows = count($pertanyaan);
		
		if($pertanyaan != null) {
			$data[] = array (
				'No',
				'indikator',
			);
			$data[0] = array_merge($data[0], $tglArr);
			$i = 1;
			
			
			foreach ($pertanyaan as $row) {
				// $partSkor 		 = explode('#', $row->detail_score);
				// $partGrammar	 = explode('*', $partSkor[0]);
				// $partVocabulary	 = explode('*', $partSkor[1]);
				// $partExpression  = explode('*', $partSkor[2]);
				//echo $row->id_rekap;
				
				$data = RekapIndikator::model()->findAllByAttributes(array('id_ind_satker'=>$val->id_ind_satker, ));
				$n = array();
				$d = array();
				foreach($data as $item){
					$dateA = date('d', strtotime($item->tgl));
					$n[$dateA] = $item->numerator;
					$d[$dateA] = $item->denumerator;						
				}
				
				
				
				$dataPertanyaan			= $row->idIndSatker->idIndikator->uraian_ind;
				
				
				for($j = 1 ; $j<=$total; $j++){
	
					//if(array_key_exists($j,$n)){
						$data2[] = $n[$j].'/'.$d[$j];
						// echo '<td><input type="text" size="3" placeholder="N" value="'.$n[$j].'" readonly="readonly">/<input type="text" size="3" placeholder="D" value="'.$d[$j].'" readonly="readonly"></td>';
					/* }else{
						if(date('d') == $j){
							$data2 = array();
						}else if(date('d') < $j){
							$data2 = array();
						}else{
							$data2 = array();
							//echo '<td><input type="text" size="3" placeholder="N">/<input type="text" size="3" placeholder="D"></td>';
						}
					} */	
				}
				
				
				
				
				
				/* $email					= Utility::printDashIfEmpty($row->email);
				$hp						= Utility::printDashIfEmpty($row->biodata->mobile_phone);
				$fullName				= Utility::printDashIfEmpty($row->biodata->complete_name);
				$lastUpdate				= Utility::printDashIfEmpty(date('d-m-Y', strtotime($row->biodata->cv_last_update)));
				$status					= Utility::printDashIfEmpty(CcnJobseeker::statusUpdateCv($row->biodata->cv_last_update) == '0' ? 'Expired':'Uptodate');
				//$status					= Utility::printDashIfEmpty('2');
				$university				= Utility::printDashIfEmpty($row->last_education->university->name);
				$fakultas				= Utility::printDashIfEmpty($row->last_education->univ_name_id == '2641'? ($row->last_education->ccn_major_id == '1' ? '-':$row->last_education->last_major->edu_own_faculty->faculty):'-');
				$jurusan				= Utility::printDashIfEmpty($row->last_education->ccn_major_id == '1' ? $row->last_education->suggest_major : $row->last_education->last_major->name);
				$pekerjaan 				= Utility::printDashIfEmpty(CcnJobseeker::lastExp($row->id)); */
				//$pekerjaan 				= Utility::printDashIfEmpty('1');


				$data3 = array (
					$i++,
					$dataPertanyaan,
				);
				$data = array_combine ($data3, $data2);
				
				/* $data[] = array (
					$i++,
					$dataPertanyaan,
				); */
			}
		}
		print_r($data3);
		print_r($data2);
		print_r($data);
		exit();
		
		// Yii::import('application.extensions.phpexcel.JPhpExcel');
		// $xls = new JPhpExcel('UTF-8', false, 'My Test Sheet');
		// $xls->addArray($data);
		// $xls ->generateXML('rekap_indikator');
	
	
	}
	
	
	
	public function actionRekap2(){		
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
		
		
		$total = date("d", $timestamp);
		for($j = 1 ; $j<=$total; $j++){
			$tglArr[] = $j;
		}
		$tglArr[] = 'total';
		
		$tgl = implode(',',$tglArr);
		
		if(isset($_GET['idsat'])){
			$idSatker = $_GET['idsat'];
		}else{
			$idSatker = Yii::app()->user->idsatker;	
		}
		$modelSatker = IndSatker::model()->findAllByAttributes(array('id_satker'=>$idSatker));
		foreach($modelSatker as $val){
			$arrIdSatker[] = $val->id_ind_satker;
		}
		
		$listIdSatker = implode(',', $arrIdSatker);
		
		$pertanyaan = RekapIndikator::model()->findAll(array(
					'condition'=>'id_ind_satker IN ('.$listIdSatker.')',
					'group'=>'id_ind_satker',
		));
		$rows = count($pertanyaan);
		$data4 = array();
		
		
		if($pertanyaan != null) {
			$data[] = array (
				'No',
				'indikator',
			);
			$data4[0] = array_merge($data[0], $tglArr);
			//$data4[0][]
			$i = 1;
			
			
			foreach ($pertanyaan as $row) {
				echo $row->id_ind_satker;
				
				// $datarekap = RekapIndikator::model()->findAllByAttributes(array('id_ind_satker'=>$val->id_ind_satker, ));
				$datarekap = RekapIndikator::model()->findAll(array(
					'condition'=>'id_ind_satker=:id AND MONTH(tgl)=:m AND YEAR(tgl)=:y',
					'params'=>array(':id'=>$row->id_ind_satker, ':m'=>$m, ':y'=>$y),
				));
				$n = array();
				$d = array();
				foreach($datarekap as $item){
					$dateA = date('j', strtotime($item->tgl));
					$n[$dateA] = $item->numerator;
					$d[$dateA] = $item->denumerator;						
				}
		
				$dataPertanyaan			= $row->idIndSatker->idIndikator->uraian_ind;
				
				$data2 = array();
				$totalN = 0;
				$totalD = 0;
				for($j = 1 ; $j<=$total; $j++){
					
	
					if($n[$j] != '' || $d[$j] != ''){
						$data2[] = $n[$j].' | '.$d[$j];
						$totalN += $n[$j];
						$totalD += $d[$j];
					}else{
						$data2[] = '';
					}	
				}
				$data2[] = round(($totalN / $totalD) * 100) .'%';
								


				$data3 = array (
					$i++,
					$dataPertanyaan,
				);
				$data4[] = array_merge ($data3, $data2);
				
				
			}
		}
		
		
		// print_r($data3);
		// echo '</br>';
		// print_r($data2);
		// print_r($data4);
		// exit();
		
		Yii::import('application.extensions.phpexcel.JPhpExcel');
		$xls = new JPhpExcel('UTF-8', false, 'My Test Sheet');
		$xls->addArray($data4);
		//$objPHPExcel->getActiveSheet()->mergeCells('A1:A3');
		$xls ->generateXML('rekap_indikator');
		
		
	} 
	
	
	public function actionRekapNew(){		
		// Fungsi header dengan mengirimkan raw data excel
		header("Content-type: application/vnd-ms-excel");
		 
		// Mendefinisikan nama file ekspor "hasil-export.xls"
		header("Content-Disposition: attachment; filename=hasil-export.xls"); 
				
		if(isset($_GET['tgl'])){
			$timestamp = strtotime("last day of".$_GET['tgl']);
			$m = date('m',strtotime($_GET['tgl']));
			$f = date('F',strtotime($_GET['tgl']));
			$y = date('Y',strtotime($_GET['tgl']));
			$dt = date('d',strtotime($_GET['tgl']));
			$tglnow= date('Y-m-d', strtotime($_GET['tgl']));
		}else {
			$timestamp = strtotime("last day of");
			$m = date('m');
			$f = date('F');
			$y = date('Y');
			$dt = date('d');
			$tglnow= date('Y-m-d');
		}
		
		$total = date("d", $timestamp);
		for($j = 1 ; $j<=$total; $j++){
			$tglArr[] = $j;
		}
		$tglArr[] = 'total';
		
		$tgl = implode(',',$tglArr);
		
		if(isset($_GET['idsat'])){
			$idSatker = $_GET['idsat']; //kondisi admin
		}else{
			$idSatker = Yii::app()->user->idsatker;	
		}
		$modelSatker = IndSatker::model()->findAllByAttributes(array('id_satker'=>$idSatker));
		foreach($modelSatker as $val){
			$arrIdSatker[] = $val->id_ind_satker;
		}
		
		$listIdSatker = implode(',', $arrIdSatker);
		
		$pertanyaan = RekapIndikator::model()->findAll(array(
					'condition'=>'id_ind_satker IN ('.$listIdSatker.')',
					'group'=>'id_ind_satker',
		));
		$rows = count($pertanyaan);
		$data4 = array();
		
		
		if($pertanyaan != null) {
			$data[] = array (
				'No',
				'indikator',
			);
			$data4[0] = array_merge($data[0], $tglArr);
			//$data4[0][]
			$i = 1;
			
			
			foreach ($pertanyaan as $row) {
				//echo $row->id_ind_satker;
				
				// $datarekap = RekapIndikator::model()->findAllByAttributes(array('id_ind_satker'=>$val->id_ind_satker, ));
				$datarekap = RekapIndikator::model()->findAll(array(
					'condition'=>'id_ind_satker=:id AND MONTH(tgl)=:m AND YEAR(tgl)=:y',
					'params'=>array(':id'=>$row->id_ind_satker, ':m'=>$m, ':y'=>$y),
				));
				$n = array();
				$d = array();
				
			
				foreach($datarekap as $item){
					$dateA = date('j', strtotime($item->tgl));
					$n[$dateA] = $item->numerator;
					$d[$dateA] = $item->denumerator;
				}
				$dataPertanyaan			= $row->idIndSatker->idIndikator->uraian_ind;
				
				$data2 = array();
				$coba = array();
				$totalN = 0;
				$totalD = 0;
				for($j = 1 ; $j<=$total; $j++){
					
	
					if($n[$j] != '' || $d[$j] != ''){
						$data2[] = $n[$j].' | '.$d[$j];
						$totalN += $n[$j];
						$totalD += $d[$j];
					}else{
						$data2[] = '';
					}	
					
					$coba['N'][0]= $dataPertanyaan;
					$coba['N'][]= $n[$j];
					$coba['D'][0]= $dataPertanyaan;
					$coba['D'][]= $d[$j];
				}
				$data2[] = round(($totalN / $totalD) * 100) .'%';
				$standar[]	= $row->idIndSatker->idIndikator->standar;			
	

				$data3 = array (
					$i++,
					$dataPertanyaan,
				);
				$data4[] = array_merge ($data3, $data2);
				
				$coba2[]=$coba; 
			}
		}
		
		// print_r($coba2);
		// print_r($standar);
		// print_r($data2);
		echo '<table border="2px">';
		
		echo '<tr>';
		echo '<td>Bulan</td><td colspan="8">'. $f .' '. $y.'</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td>Satker</td><td colspan="8">'. Satker::model()->findByPk($idSatker)->nama_satker .'</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td>Indikator</td>';
		
		
		for($j = 1 ; $j<=$total; $j++){
			echo '<td>'.$j.'</td>';
		}
		echo '<td>Presentase</td>';
		echo '<td>Standar</td>';
		echo '</tr>';
		
		$stnd = 0;
		foreach($coba2 as $val){
			$totN = 0;
			$totD = 0;
			foreach($val['N'] as $key=>$item){
				if($key != 0){	
					$totN += $item;
					$totD += $val['D'][$key];
				}
			}
			// echo $totN .'---'. $totD .'</br>';
			
			$aa = 0;
			echo '<tr>';
			foreach($val['N'] as $key=>$item){
				
				if($key == 0){	
					echo '<td rowspan="2">'.$item.'</td>';
				}else {
					echo '<td>'.$item.'</td>';
				}
				$aa++; 
			}
			$persen = round(($totN / $totD) * 100);
			$vStandar = $standar[$stnd++]; 
			$bgcolor = $vStandar > $persen ? 'red':'';
			echo '<td rowspan="2" bgcolor="'.$bgcolor.'">'. $persen .'%</td>';
			echo '<td rowspan="2">'.$vStandar.'%</td>';
			echo '</tr> ';
			
			echo '<tr>';
			foreach($val['D'] as $key=>$item){
				if($key == 0){	
					//echo '<td rowspan="2">'.$item.'</td>';
				}else {
					echo '<td>'.$item.'</td>';
				}
				$aa++; 
			}
			echo '</tr> ';
		}
		echo '</table>';
		
	} 
	
	
	
	/* public function actionRekap2(){		
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
		
		
		$total = date("d", $timestamp);
		for($j = 1 ; $j<=$total; $j++){
			$tglArr[] = $j;
		}
		$tglArr[] = 'total';
		
		$tgl = implode(',',$tglArr);
		
		if(isset($_GET['idsat'])){
			$idSatker = $_GET['idsat'];
		}else{
			$idSatker = Yii::app()->user->idsatker;	
		}
		$modelSatker = IndSatker::model()->findAllByAttributes(array('id_satker'=>$idSatker));
		foreach($modelSatker as $val){
			$arrIdSatker[] = $val->id_ind_satker;
		}
		
		$listIdSatker = implode(',', $arrIdSatker);
		
		$pertanyaan = RekapIndikator::model()->findAll(array(
					'condition'=>'id_ind_satker IN ('.$listIdSatker.')',
					'group'=>'id_ind_satker',
		));
		$rows = count($pertanyaan);
		$data4 = array();
		
		
		if($pertanyaan != null) {
			$data[] = array (
				'No',
				'indikator',
			);
			$data4[0] = array_merge($data[0], $tglArr);
			//$data4[0][]
			$i = 1;
			
			
			foreach ($pertanyaan as $row) {
				echo $row->id_ind_satker;
				
				// $datarekap = RekapIndikator::model()->findAllByAttributes(array('id_ind_satker'=>$val->id_ind_satker, ));
				$datarekap = RekapIndikator::model()->findAll(array(
					'condition'=>'id_ind_satker=:id AND MONTH(tgl)=:m AND YEAR(tgl)=:y',
					'params'=>array(':id'=>$row->id_ind_satker, ':m'=>$m, ':y'=>$y),
				));
				$n = array();
				$d = array();
				foreach($datarekap as $item){
					$dateA = date('j', strtotime($item->tgl));
					$n[$dateA] = $item->numerator;
					$d[$dateA] = $item->denumerator;						
				}
		
				$dataPertanyaan			= $row->idIndSatker->idIndikator->uraian_ind;
				
				$data2 = array();
				$totalN = 0;
				$totalD = 0;
				for($j = 1 ; $j<=$total; $j++){
					
	


					if($n[$j] != '' || $d[$j] != ''){
						$data2[] = 'D'.$d[$j];
						$totalN += $n[$j];
						$totalD += $d[$j];
					}else{
						$data2[] = '';
						$data2[] = '';
					}
					
					
					if($n[$j] != '' || $d[$j] != ''){
						$data2[] = 'N'.$n[$j];
						$totalN += $n[$j];
						$totalD += $d[$j];
					}else{
						$data2[] = '';
						$data2[] = '';
					}
				}
				//$data2[] = round(($totalN / $totalD) * 100) .'%';
								


				$data3 = array (
					$i++,
					$dataPertanyaan,
				);
				$data4[] = array_merge ($data3, $data2);
				
				
			}
		}
		
		
		// print_r($data3);
		// echo '</br>';
		print_r($data2);
		// print_r($data4);
		exit();
		
		Yii::import('application.extensions.phpexcel.JPhpExcel');
		$xls = new JPhpExcel('UTF-8', false, 'My Test Sheet');
		$xls->addArray($data4);
		//$objPHPExcel->getActiveSheet()->mergeCells('A1:A3');
		$xls ->generateXML('rekap_indikator');
		
		
	} */
	
	public function actionRekapLaporan(){		
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
		
		
		$dataPj = PjData::model()->model()->findAll();
		
		foreach($dataPj as $item){
			$namaPj[] = $item->nama_pjdata;
			$arrPjId[$item->id_pjdata] = $item->id_pjdata;
		}
		
		
		$dataPersen = RekapIndikator::model()->findAll(array(
			'condition'=>'MONTH(tgl)=:m AND YEAR(tgl)=:y',
			'params'=>array(':m'=>$m, ':y'=>$y),
		));

	
		foreach($dataPersen as $item){
			$n[$item->idIndSatker->idIndikator->id_indikator][$item->idIndSatker->idPjdata->id_pjdata][] = $item->numerator;
			$d[$item->idIndSatker->idIndikator->id_indikator][$item->idIndSatker->idPjdata->id_pjdata][] = $item->denumerator;
			$aa[] = $item->numerator;
		}	
		
		$indikator = Indikator::model()->findAll(array(
			'order'=>'id_klp ASC',
		));
	
		
		
		$rows = count($indikator);
		$data4 = array();
		
		
		if($indikator != null) {
			$data[] = array (
				'No',
				'indikator mutu KARS',
				'klp',
				'PIC',
			);
			$data4[0] = array_merge($data[0], $namaPj);
			
			$i = 1;
			
			
			foreach ($indikator as $row) {
				
				$indikatorName = $row->uraian_ind;
				$dataKlp = $row->id_klp;
				
				$dataPic = IndSatker::model()->findAll(array(
					'with'=>'idSatker',
					'select'=>'id_indikator, id_pjdata',
					'condition'=>'id_indikator =:id',
					'params'=>array(':id'=>$row->id_indikator),
				));
				$picArr = array();
				foreach($dataPic as $val2){
					$picArr[$val2->idSatker->idUnit->inisial] =  $val2->idSatker->idUnit->inisial;
				}
				$picList = implode(', ', $picArr);
				$dataPicList = $picList;
				$persen = array();
				foreach($arrPjId as $key){
					$totalN = '';
					foreach($n[$row->id_indikator][$key] as $key2){
						$totalN += $key2;
					}
					$totalD = '';
					foreach($d[$row->id_indikator][$key] as $key2){
						$totalD += $key2;
					}
					
					if($totalN == '' && $totalD == ''){
						$persen[] = '';
					}else {
						$persen[] = round(($totalN / $totalD) * 100) .'%';
					}
				}
				
				$data3 = array (
					$i++,
					$indikatorName,
					$dataKlp,
					$dataPicList,
				);
				$data4[] = array_merge ($data3, $persen);
				
				
			} 
		}
		
		
		// print_r($data3);
		// echo '</br>';
		// print_r($data2);
		// print_r($data4);
		// exit();
		
		Yii::import('application.extensions.phpexcel.JPhpExcel');
		$xls = new JPhpExcel('UTF-8', false, 'My Test Sheet');
		$xls->addArray($data4);
		//$objPHPExcel->getActiveSheet()->mergeCells('A1:A3');
		$xls ->generateXML('Laporan');
		
		
	}
	
	
	
	
	public function actionRekapLaporan2(){		
		
		// Fungsi header dengan mengirimkan raw data excel
		header("Content-type: application/vnd-ms-excel");
		 
		// Mendefinisikan nama file ekspor "hasil-export.xls"
		header("Content-Disposition: attachment; filename=hasil-export.xls"); 
		$this->renderPartial('rekap_laporan',array(
			// 'model'=>$model,
			// 'listIdSatker'=>$listIdSatker,
		));
	}
}
