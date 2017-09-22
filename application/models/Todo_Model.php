<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Todo_Model extends CI_Model {

    # Register the user
    public function add_item ($todo_title, $todo_content) {

        $data = array (
            'user_id'        => $this->session->userdata('user_id'),
            'todo_title'     => $todo_title,
            'note_date'      => time(),
            'todo_content'   => $todo_content
        );

        $this->db->insert ('tbl_todo', $data);

        $id = $this->db->insert_id ();

        return ($id > 0) ? $id : FALSE;

    }

    public function get_todo_list($user_id, $id) {

        $data = array (
            'user_id'        => $user_id,
            'todo_list_id'   => $todo_id
        );

        return $this->db->select('*')
                          ->where ($data)
                          ->get ('tbl_todo')
                          ->row_array ();

}

public function get_user_todo ($id) {

    $query = $this->db->select('todo_list_id, todo_title, todo_date')
                      ->where ('user_id', $id)
                      ->get ('tbl_todo');
    return $query;

}

public function update_todo ($todo_title, $todo_content) {

    $where = array(
        'user_id'   => $this->session->userdata('user_id'),
        'todo_list_id'   => $id
    );

    $data = array (
        'todo_title'     => $todo_title,
        'todo_content'   => $todo_content
    );

    $this->db->where ($where)
             ->update ('tbl_todo', $data);

    return $this->db->affected_rows() == 1;

}
}
