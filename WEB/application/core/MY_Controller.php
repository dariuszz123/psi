<?php

class MY_Controller extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->base_css();
        $this->base_js();
    }
    
    /**
     * Load base css files in all controllers
     */
    private function base_css() {
        $this->template->add_css('css/style.css');
        $this->template->add_css('css/bootstrap.css');
        $this->template->add_css('css/bootstrap-responsive.css');
    }
    
    /**
     * Load base js files in all crontollers
     */
    private function base_js() {
        $this->template->add_js('js/jquery-1.8.3.min.js');
        $this->template->add_js('js/bootstrap.min.js');
    }
    
}

?>
