
<div class="container">
    <div class="page-title">
        <h3>Edit User</h3>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="<?= rtrim($config['app_url'], '/') ?>/admin/users/update" method="post">
                        <input type="hidden" name="id" value="<?= $user['id'] ?>">
                
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="username" value="<?= $user['username'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="<?= $user['name'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" class="form-select" id="role" required>
                                <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                                <option value="hr" <?= $user['role'] === 'hr' ? 'selected' : '' ?>>HR</option>
                                <option value="staff" <?= $user['role'] === 'staff' ? 'selected' : '' ?>>Staff</option>
                                <option value="student" <?= $user['role'] === 'student' ? 'selected' : '' ?>>Student</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password (leave blank to keep current)</label>
                            <input type="password" name="password" class="form-control" id="password">
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-4">
                                <a href="<?= rtrim($config['app_url'], '/') ?>/admin/users" class="btn btn-secondary mb-2"><i class="fas fa-times"></i> Cancel</a>
                                <button type="submit" name="save" class="btn btn-primary mb-2"><i class="fas fa-save"></i>Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>
