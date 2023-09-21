<?php
include "tasks.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    if (isset($data["id"]) && isset($data["checked"])) {
        $taskId = $data["id"];
        $isChecked = $data["checked"];

        // мб добавлю логику для сохранения статуса в бд или файле но это не точно

        $taskList->getTasks()[$taskId]->setChecked($isChecked);
        
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false]);
    }
}
?>
