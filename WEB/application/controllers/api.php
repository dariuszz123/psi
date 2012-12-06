<?php

class Api extends MY_Controller {
    
    public function index() {
        $data = array(
            'methods' => array(
                'getNewsFeeds',
            )
        );
        
        echo json_encode($data);
    }
    
    /**
     * Rss feed for
     */
    public function getNewsFeeds() {
        $data = array(
            'VU Bendruomenei' => 'http://naujienos.vu.lt/bendruomenei?format=feed&type=rss',
            'VU Mokslas' => 'http://naujienos.vu.lt/mokslas?format=feed&type=rss',
            'VU Studijos' => 'http://naujienos.vu.lt/studijos?format=feed&type=rss',
            'VU Įvykiai' => 'http://naujienos.vu.lt/ivykiai?format=feed&type=rss',
        );
        
        echo json_encode($data);
    }
    
}