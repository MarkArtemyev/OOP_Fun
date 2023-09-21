document.addEventListener("DOMContentLoaded", function () {
    const taskList = document.getElementById("task-list");
    const taskForm = document.getElementById("task-form");
    const taskInput = document.getElementById("task-input");

    taskForm.addEventListener("submit", function (e) {
        e.preventDefault();
        const text = taskInput.value;
        if (text.trim() !== "") {
            fetch("add_task.php", {
                method: "POST",
                body: JSON.stringify({ text }),
                headers: {
                    "Content-Type": "application/json",
                },
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        const taskItem = document.createElement("li");
                        taskItem.textContent = text;
                        taskList.appendChild(taskItem);
                        taskInput.value = "";
                    }
                });
        }
    });
});
