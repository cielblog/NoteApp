<?php
defined('APPLICATION_PATH') OR die("No direct script access allowed.");

class Note extends Model {

    public function getNotes()
    {
        $notes_list = $this->db->select('notes', '*');
        return $notes_list;
    }

    public function addNote($data = [])
    {
        $do = $this->db->insert('notes', $data);

        if ($do)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }

    }

    public function searchNote($terms)
    {
        $do = $this->db->select('notes', '*', [
            'OR' => [
                'title[~]' => $terms,
                'text[~]' => $terms
            ]
        ]);

        return $do;
    }


}