<?php

// Интерфейс для задач
interface TaskInterface {
    public function getTitle();
    public function getDescription();
    public function getStatus();
    public function assignTo(User $user);
}

// Интерфейс для пользователей
interface UserInterface {
    public function getName();
    public function getEmail();
    public function getRole();
}

// Класс для представления пользователей
class User implements UserInterface {
    protected $name;
    protected $email;
    protected $role;

    public function __construct($name, $email, $role) {
        $this->name = $name;
        $this->email = $email;
        $this->role = $role;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getRole() {
        return $this->role;
    }
}

// Класс для представления задач
class Task implements TaskInterface {
    protected $title;
    protected $description;
    protected $status;
    protected $assignedUser;

    public function __construct($title, $description) {
        $this->title = $title;
        $this->description = $description;
        $this->status = 'Open'; // Начальный статус - "Открыта"
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getStatus() {
        return $this->status;
    }

    public function assignTo(User $user) {
        $this->assignedUser = $user;
    }
}

// Создаем пользователя и задачу
$user = new User('John Doe', 'john@example.com', 'Developer');
$task = new Task('Create Project Plan', 'Plan the project and create a timeline.');

// Назначаем задачу пользователю
$task->assignTo($user);

// Выводим информацию о задаче и пользователе
echo "Task: {$task->getTitle()}\n";
echo "Description: {$task->getDescription()}\n";
echo "Status: {$task->getStatus()}\n";
echo "Assigned To: {$task->assignedUser->getName()} ({$task->assignedUser->getRole()})\n";
?>
