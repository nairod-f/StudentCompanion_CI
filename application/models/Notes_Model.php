<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notes_Model extends CI_Model {

    # Register the user
    public function add_note ($title, $content) {

        $data = array (
            'user_id'        => $this->session->userdata('user_id'),
            'note_title'     => $title,
            'note_date'      => time(),
            'note_content'   => $content
        );

        $this->db->insert ('tbl_notes', $data);

        $id = $this->db->insert_id ();

        return ($id > 0) ? $id : FALSE;

    }

    public function get_note ($user_id, $id) {

        $data = array (
            'user_id'   => $user_id,
            'note_id'   => $id
        );

        return $this->db->select('*')
                          ->where ($data)
                          ->get ('tbl_notes')
                          ->row_array ();

}

public function get_user_notes ($id) {

    $query = $this->db->select('note_id, note_title, note_date')
                      ->where ('user_id', $id)
                      ->get ('tbl_notes');
    return $query;

}

public function update_note ($id, $title, $content) {

    $where = array(
        'user_id'   => $this->session->userdata('user_id'),
        'note_id'   => $id
    );

    $data = array (
        'note_title'     => $title,
        'note_content'   => $content
    );

    $this->db->where ($where)
             ->update ('tbl_notes', $data);

    return $this->db->affected_rows() == 1;

}
}
