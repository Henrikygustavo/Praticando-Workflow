<?php

class Task {
    public $id;
    public $title;
    public $completed;

    public function __construct($id, $title, $completed = false) {
        $this->id = $id;
        $this->title = $title;
        $this->completed = $completed;
    }
}
?>
