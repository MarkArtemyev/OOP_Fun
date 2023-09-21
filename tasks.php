<?php
class Task {
    private $id;
    private $text;
    private $checked;

    public function __construct($id, $text) {
        $this->id = $id;
        $this->text = $text;
        $this->checked = false;
    }

    public function getId() {
        return $this->id;
    }

    public function getText() {
        return $this->text;
    }

    public function isChecked() {
        return $this->checked;
    }

    public function setChecked($checked) {
        $this->checked = $checked;
    }
}


class TaskList {
    private $tasks = [];

    public function addTask($text) {
        $id = uniqid(); 
        $task = new Task($id, $text);
        $this->tasks[$id] = $task;
    }

    public function getTasks() {
        return $this->tasks;
    }

    public function removeTask($id) {
        if (isset($this->tasks[$id])) {
            unset($this->tasks[$id]);
        }
    }
}

$taskList = new TaskList();

