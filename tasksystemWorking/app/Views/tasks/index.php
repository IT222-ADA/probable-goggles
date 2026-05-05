
<div class="container text-center mt-5 mx-auto">
    <div class="welcome-heading">
        <h1 class="display-4">WELCOME TO TASKBOARD</h1>
        <h2 class="text-primary">
            <?php echo htmlspecialchars($user['name']); ?>
        </h2>
    </div>

    <div class="row justify-content-center mt-4">
        <!-- My Tasks (all tasks) -->
        <div class="col-md-3">
            <a href="<?= rtrim($config['app_url'], '/') ?>/tasks/list" style="text-decoration: none;">
                <div class="sticky-note bg-warning text-dark">
                    <div class="note-title">My Tasks</div>
                    <div class="note-content">View and manage your current tasks here.</div>
                </div>
            </a>
        </div>

        <!-- Add Task (open modal or add page) -->
        <div class="col-md-3">
            <a href="" data-bs-toggle="modal" data-bs-target="#addTaskModal" style="text-decoration: none;">
                <div class="sticky-note bg-info text-white">
                    <div class="note-title">Add Task</div>
                    <div class="note-content">Quickly add a new task to your board.</div>
                </div>
            </a>
        </div>

        <!-- Completed Tasks (filter) -->
        <div class="col-md-3">
            <a href="<?= rtrim($config['app_url'], '/') ?>/tasks/completed" style="text-decoration: none;">
                <div class="sticky-note bg-danger text-white">
                    <div class="note-title">Completed</div>
                    <div class="note-content">Check your progress and completed items.</div>
                </div>
            </a>
        </div>
    </div>
</div>

<?php require __DIR__ . '/../tasks/create.php'; ?>