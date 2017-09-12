<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Timetable_Model extends CI_Model {

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

    public function link_session ($user_id, $session_id){
        $data = array (
                'tbl_users_user_id' => $user_id,
                'tbl_sessions_id'   => $session_id
        );

        $this->db->insert ('tbl_timetable', $data);

    }
    public function get_sessions($user_id){
        $this->db->select('id, session_time, session_day ,lecture_name, lecture_location');
        $this->db->where('tbl_users_user_id', $user_id);
        $this->db->join('tbl_timetable', 'tbl_timetable.tbl_sessions_id = tbl_sessions.id');
        $this->db->order_by('session_time ASC, session_day ASC');
        return $this->db->get('tbl_sessions');

    }

    public function update_timetable($id, $lecture, $location){
            //var_dump($id,  $lecture, $location); exit;

            $where = array (
                'id'        => $id
            );
            $update = array(
                'lecture_name' => $lecture,
                'lecture_location' =>$location
            );
            $this->db->where($where)
                        ->update('tbl_sessions', $update);

            return $this->db->affected_rows() == 1;
    }

    public function get_timedata ($id) {

        $this->db->select ('lecture_name, lecture_location')
                    ->where ('id', $id);

            $result = $this->db->get ('tbl_sessions');

            if ($result->num_rows () != 1)
                return FALSE;

            # Give the controller all the data as an array
            return $result->row_array ();

    }

}
