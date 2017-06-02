<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Timetable_Model extends CI_Model {

    # Register the user
    public function add_data ($time, $day, $lecture, $location) {

        $data = array (

            'session_time'    => $time,
            'session_day'    => $day,
            'lecture_name'    => $lecture,
            'lecture_location'   => $location
        );

        $this->db->insert ('tbl_sessions', $data);

        $id = $this->db->insert_id ();

        return ($id > 0) ? $id : FALSE;

    }

}
