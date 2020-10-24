<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('FilesModel');
	}
	
	public function index()
	{
		$currentFiles = array();
		$deletedFiles = array();
		$directoryPath = FCPATH . 'assets/assets/img/portfolio/';
		$actualFileList = array_diff( scandir($directoryPath)		, array('.') );
		$directoryArray = array(
			'directory_name' => $directoryPath
		);
		$directoryResult = $this->FilesModel->direcoryCheck($directoryArray);  
		if($directoryResult !== NULL){		
			$directoryDetails = array(
				'directory_id' => $directoryResult->directory_id
			);
			$filesChecked = $this->FilesModel->getFileList($directoryDetails); 
			
			foreach ($filesChecked as $key => $value) {
				if($value['status'] === "ENABLED"){
					$thisFile =  array (
						'file_name' => $value['file_name'],
						'file_id' => $value['file_id']
					  );
					  array_push($currentFiles, $thisFile);
				}else{
					array_push($deletedFiles, $value['file_name']);
				}
			}
		}else{
			$savedDirectory = $this->FilesModel->saveDirecory($directoryArray);  
			foreach ($actualFileList as $file) {
				$dataArray = array(
					'file_name' =>$file,
					'directory_id' =>$savedDirectory,
					'status' => 'ENABLED',
				);
				$result = $this->FilesModel->saveFiles($dataArray);  
				$thisFile =  array (
					'file_name' => $file,
					'file_id' => $result
				  );
				array_push($currentFiles, $thisFile);
			}
		}
		$data['fileList'] = $currentFiles;
		$data['historyFileList'] = $deletedFiles;
		$data['content'] = 'Sample';
		$data['selectedDirectoryPath'] = $directoryPath;
		$this->load->view('template/index',$data);
	}
	public function deleteFile(){
		$file_name = $this->input->post('file_name');
        $condition=array(
            'file_id' =>$this->input->post('file_id')
		);
		$directory_id = $this->FilesModel->getdirectoryId($condition);
		$conditionOne = array(
			'directory_id' => $directory_id->directory_id
		);
		$directoryDetails = $this->FilesModel->getdirectoryPath($conditionOne);
		$directory_path = $directoryDetails->directory_name;
		$this->load->helper("file");
		unlink($directory_path.$file_name);
        $data=array(
            'status' =>'DISABLED'
		);
        $result = $this->FilesModel->deleteFile($condition,$data);
        if ($result === "") {
            echo json_encode(["status" => "success", "message" => "No data found"]);
        } else {
            echo json_encode(["status" => "success", 'data' => $result]);
		}
	}
	public function uploader(){
        error_reporting(E_ALL | E_STRICT);
        $this->load->library("UploadHandler");
	}

}
