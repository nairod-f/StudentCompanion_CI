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
    public function get_timedata ($id) {

        $this->db->select ('lecture_name, lecture_location')
                    ->where ('timetable_id', $id);

            $result = $this->db->get ('tbl_sessions');

            if ($result->num_rows () != 1)
                return FALSE;

            # Give the controller all the data as an array
            return $result->row_array ();

    }

}
