<?php

class TaskController extends Controller
{
    private Task $taskModel;

    public function __construct()
    {
        AdminGuard::require(['admin', 'user']); // 🔒 Protect ALL methods
        // Load Task model
        $this->taskModel = $this->model('Task');
    }

    public function index()
    {
        // Render index view with tasks
        $this->view('tasks/index');
    }

    public function list() 
    {
        $user = Auth::user();

        if($user['role'] === 'admin') {
            $tasks = $this->taskModel->getTasks();
        } else {
            $tasks = $this->taskModel->getTasksByUser($user['id']);
        }

        $this->view('tasks/list', [
            'tasks' => $tasks,
            'date' => null
        ]);
        
    }

    public function CompleteList()
    {
        $user = Auth::user();
        $tasks = $this->taskModel->getTasksByStatus(1, $user['id']);

        $this->view('tasks/list', [
            'tasks' => $tasks,
            'date' => null
        ]);
    }

    public function store()
    {
        // Validate input
        $title = trim($_POST['title'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $color = $_POST['color'] ?? 'bg-secondary';
        $user = Auth::user();

        if (!$title) {
            Flash::set('error', 'Title is required');
            $this->redirect('tasks/list');
            exit;
        }

        // Create task
        $this->taskModel->createTask([
            'title' => $title,
            'description' => $description,
            'color' => $color ?? 'bg-secondary',
            'user_id' => $user['id']
        ]);

        Flash::set('success', 'Task created successfully');
        $this->redirect('tasks/list');
        exit;
    }

    public function update()
    {
        // Validate input
        $id = $_POST['id'] ?? null;
        $title = trim($_POST['title'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $color = $_POST['color'] ?? 'bg-secondary';
        $user = Auth::user();

        if (!$id || !$title) {
            Flash::set('error', 'ID and Title are required');
            $this->redirect('tasks/list');
            exit;
        }

        // Update task
        $this->taskModel->updateTask($id, [
            'title' => $title,
            'description' => $description,
            'color' => $color ?? 'bg-secondary',
            'user_id' => $user['id']
        ]);

        Flash::set('success', 'Task updated successfully');
        $this->redirect('tasks/list');
        exit;
    }

    public function delete()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            Flash::set('error', 'ID is required');
            $this->redirect('tasks/list');
            exit;
        }

        $this->taskModel->deleteTask($id);

        Flash::set('success', 'Task deleted successfully');
        $this->redirect('tasks/list');
        exit;
    }

    public function complete()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            Flash::set('error', 'ID is required');
            $this->redirect('tasks/list');
            exit;
        }

        $this->taskModel->markComplete($id);

        Flash::set('success', 'Task marked as complete');
        $this->redirect('tasks/list');
        exit;
    }

    public function uncomplete()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            Flash::set('error', 'ID is required');
            $this->redirect('tasks/list');
            exit;
        }

        $this->taskModel->markUnComplete($id);

        Flash::set('success', 'Task marked as incomplete');
        $this->redirect('tasks/list');
        exit;
    }

    public function filter()
    {
        $date = $_POST['date'] ?? null;
        $user = Auth::user();

        if (!$date) {
            Flash::set('error', 'Date is required');
            $this->redirect('tasks/list');
            exit;
        }

        $tasks = $this->taskModel->filterByDate($date, $user['id']);

        $this->view('tasks/list', ['tasks' => $tasks, 'date' => $date]);
    }
}