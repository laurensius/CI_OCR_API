<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct(){
		parent::__construct();
		header('Content-type:json');
	}

	public function do_upload(){
		if($this->input->post()!=null){
			$config['upload_path'] = './image_dir/';
			$config['allowed_types'] = 'jpg|jpeg|png|bmp';
			$config['max_size']	= '10240';
			$config['overwrite'] = 'true';
			$config['encrypt_name'] = 'true';  
			$config['remove_spaces'] = 'true';  
			$config['file_name'] = date("YmdHis");  
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('foto_ktp')){ 
				$response = array(
					"message_severity" => "warning",
					"message" => "Penyimpanan gambar gagal"
				);
			}else{ 
				$detail = $this->upload->data();
				$nama_lampiran = $detail["orig_name"];
				$response = array(
					"message_severity" => "success",
					"message" => "Penyimpanan gambar berhasil",
					"nama_lampiran" => $nama_lampiran
				);
			}
		}else{
			$response = array(
				"message_severity" => "warning",
				"message" => "Tidak ada gambar dikirim ke sever"
			);
		}
		echo json_encode($response,JSON_PRETTY_PRINT);
	}

	public function do_ocr(){
		require_once APPPATH.'libraries\tesseract\vendor\autoload.php';
		require_once APPPATH.'libraries\tesseract\vendor\thiagoalessio\tesseract_ocr\src\TesseractOCR.php';
		$filepath = FCPATH."image_dir\\".$this->uri->segment(3);
		$tesseractInstance = new TesseractOCR($filepath);
		$tesseractInstance->psm(1);
		$raw_text = $tesseractInstance->run();
		if($raw_text == ""){
			$response = array(
				"message_severity" => "warning",
				"message" => "Tidak ada hasil",
			);
		}else{
			$response = array(
				"message_severity" => "success",
				"message" => $raw_text,
			);
		}
		echo json_encode($response,JSON_PRETTY_PRINT);
	}

	public function do_save_edit(){
		define('UPLOAD_DIR', 'image_dir/');

		$original_name = $this->input->post('original_name');
		$img = $this->input->post('image');
		//echo $img;
		$img = str_replace('data:image/png;base64,', '', $img);
		$data = base64_decode($img);
		$file = UPLOAD_DIR . $original_name . '.png';
		$success = file_put_contents($file, $data);
		if($success){
			$response = array(
				"message_severity" => "success",
				"message" => "simpan hasil brightness OK",
				"image_name" =>  $original_name.".png"
			);
		}else{
			$response = array(
				"message_severity" => "warning",
				"message" => "simpan hasil brightness NOT OK",
				"image_name" => ""
			);
		}
		echo json_encode($response,JSON_PRETTY_PRINT);
	}

}
