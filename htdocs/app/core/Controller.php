<?php
namespace app\core;

class Controller{
	public function view($name, $data = []){
		if(file_exists('app/views/' . $name . '.php')){
			include('app/views/' . $name . '.php');
		}else
			echo 'app/views/' . $name . '.php does not exist';
	}
}