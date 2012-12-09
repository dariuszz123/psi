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
        $result = mysql_query("SELECT *FROM rss_list") or die(mysql_error());
 
		// check for empty result
		if (mysql_num_rows($result) > 0) {
			// looping through all results
			// products node
			$response["rsslist"] = array();
		 
			while ($row = mysql_fetch_array($result)) {
				// temp user array
				$product = array();
				$product["id"] = $row["id"];
				$product["pavadinimas"] = $row["pavadinimas"];
				$product["adresas"] = $row["adresas"];
		 
				// push single product into final response array
				array_push($response["rsslist"], $product);
			}
			// success
			//$response["success"] = 1;
		 
			// echoing JSON response
			echo json_encode($response);
		} else {
			// no products found
			//$response["success"] = 0;
			$response["message"] = "No rss links found!";
		 
			// echo no users JSON
			echo json_encode($response);
		}
    }
    
    /**
     * Return valid key, to use in other functions
     * @param type $email
     * @param type $password
     * @return boolean
     */
    public function authenticate($email, $password) {
        $data = array(
            'error' => false,
            'error_message' => null,
            'key' => null,
        );
        echo json_encode($data);
    }
    
    /**
     * Get messages for user
     * @param type $key
     */
    public function getMessages($key) {
        // get user by key
        // get messages list
        $data = array(
            'error' => false,
            'error_message' => null,
            'messages' => array(
                array('from' => 'mailas@emailas.lt', 'subject' => '', 'message' => 'test'),
                array('from' => 'mailas@emailas.lt', 'subject' => '', 'message' => 'test'),
                array('from' => 'mailas@emailas.lt', 'subject' => '', 'message' => 'test'),
            )
        );
        echo json_encode($data);
    }
    
    public function getFacultyList() {
        $data = array(1 => 'MIF');
        echo json_encode($data);
    }
    
    public function getStudyList($facultyId) {
        $data = array(
            1 => 'Programų sistema',
            2 => 'Informatika'
        );
        echo json_encode($data);
    }
    
    public function getCourseList($facultyId, $studyId) {
        $data = array(
            1 => 'Bakalaurai 1 k.',
            2 => '2 k.'
        );
        echo json_encode($data);
    }
    
    public function getGroupList($facultyId, $studyId, $courseId) {
        $data = array(
            1 => 'PS1',
            2 => 'PS2',
            3 => 'PS2',
            4 => 'PS2',
            5 => 'PS2',
        );
        echo json_encode($data);
    }
    
    public function getSchedule($groupId) {
        // getSchedule by group id 
        $data = array(
            1 => array(
                array('from' => '08:30', 'to' => '10:00', 'Shit', 'Naugard', '103 kab.'),
                array('from' => '10:15', 'to' => '10:00', 'Shit', 'Naugard', '103 kab.'),
                array('from' => '08:30', 'to' => '10:00', 'Shit', 'Naugard', '103 kab.'),
            ),
            1 => array(
                array('from' => '08:30', 'to' => '10:00', 'Shit', 'Naugard', '103 kab.'),
                array('from' => '10:15', 'to' => '10:00', 'Shit', 'Naugard', '103 kab.'),
                array('from' => '08:30', 'to' => '10:00', 'Shit', 'Naugard', '103 kab.'),
            ),
        );
        echo json_encode($data);
    }
    
}