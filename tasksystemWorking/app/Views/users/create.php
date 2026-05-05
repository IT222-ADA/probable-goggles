
<div class="container">
    <div class="page-title">
        <h3>Create New User</h3>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Create User Form
                </div>
                <div class="card-body">
                    <form action="<?= rtrim($config['app_url'], '/') ?>/admin/users/store" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" class="form-select" id="role" required>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-4">
                                <a href="<?= rtrim($config['app_url'], '/') ?>/admin/users" class="btn btn-secondary mb-2"><i class="fas fa-times"></i> Cancel</a>
                                <button type="submit" name="save" class="btn btn-primary mb-2"><i class="fas fa-save"></i> Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

   
</div>
