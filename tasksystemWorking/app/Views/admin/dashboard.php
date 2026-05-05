
<div class="container mt-4">
    <h1>Welcome to Admin Dashboard</h1>
    <p>This is the admin dashboard. You can manage users and tasks from here.</p>
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text display-4"><?= $userCount ?></p>
                    <a href="<?= rtrim($config['app_url'], '/') ?>/admin/users" class="btn btn-light">View Users</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Tasks</h5>
                    <p class="card-text display-4"><?= $taskCount ?></p> 
                    <a href="<?= rtrim($config['app_url'], '/') ?>/tasks" class="btn btn-light">View Tasks</a>
                </div>
            </div>
        </div>
    </div>
</div>