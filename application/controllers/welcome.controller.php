<?php
defined('APPLICATION_PATH') OR die("No direct script access allowed.");

class WelcomeController extends Controller {

    private $note_model;

    public function __construct()
    {
        parent::__construct();

        // Load models
        $this->note_model = new Note();
    }

    public function index()
    {

        $data = [
            'Title' => 'Main Page',
            'notes_list' => $this->note_model->getNotes()
        ];
        #print_r($this->note_model->getNotes());

        // Main page
        $this->view->render('main', $data);

    }

    public function save_note()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {

            // User input
            $title = $_POST['note_title'];
            $text  = $_POST['note_text'];

            // Error container
            $error = [];
            $error['type'] = "warning";

            $is_valid = GUMP::is_valid($_POST, [
                'note_title' => 'required',
                'note_text' => 'required'
            ]);

            if ($is_valid === TRUE)
            {
                $add = $this->note_model->addNote([
                    'title' => $title,
                    'text'  => $text
                ]);

                if ($add)
                {
                    $error['type'] = "success";
                    $error['msg'] = "Note was added successfully";
                    echo json_encode($error);
                    exit;
                }
                else
                {
                    $error['type'] = "danger";
                    $error['msg'] = "There are some problems from our ends. Please try again later";
                    echo json_encode($error);
                    exit;
                }
            }
            else
            {
                $error['msg'] = "Error.";
                echo json_encode($error);
                exit;
            }
        }
    }

    public function search_note()
    {
        $results = [];


        $data['Title'] = "Search Result";

        if ($_SERVER['REQUEST_METHOD'] === "POST")
        {
            $terms = $_POST['terms'];

            $results = $this->note_model->searchNote($terms);
        }

        $data['terms'] = $results;

        $this->view->render('search_result', $data);
    }


}