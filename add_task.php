<?php
include "tasks.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    if (isset($data["text"])) {
        $text = $data["text"];
        $taskList->addTask($text);
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false]);
    }
}