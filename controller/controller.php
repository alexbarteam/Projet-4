<?php

class Controller {
	
	// Path to default template, views and models
    private $_pathToTemplate = './template/';
    private $_pathToView = './view/';
    private $_pathToModel = './model/';
	
	// Check if directories template, views & models exists
	public function __construct($_pathToTemplate = null) {
		
		if ($_pathToTemplate !== null) {
			$this->_pathToTemplate = $_pathToTemplate;
        }
					
	}	
	
	// Loading pages views and models
	public function renderView() {
		
		// Check if files exist in directories
		$this->_pathToView = scandir($this->_pathToView);
		$this->_pathToModel = scandir($this->_pathToModel);
		
		// If get view & not empty
		if(isset($_GET['view']) && !empty($_GET['view'])) {
			
			// Get the file view.php in directories
			if(in_array($_GET['view'].'.php',$this->_pathToView)){
				$view = $_GET['view'];
			}
			else {
				$view = "error";
			}

		}
		// If not, get the default view home
		else {
			$view = 'home';
		}
		
		// Get the model file view..class.php in directories
		if(in_array($view.'.class.php',$this->_pathToModel)) {
			include('./model/'.$view.'.class.php');
		}
		
		include $this->_pathToTemplate.'default.php';
				
	}
	
}