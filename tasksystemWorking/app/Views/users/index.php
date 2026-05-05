
<div class="container py-4">

    <!-- Page Title -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Users</h3>

        <a href="<?= rtrim($config['app_url'], '/') ?>/admin/users/create" 
           class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-header fw-semibold">
            User List
        </div>

        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-hover align-middle" id="dataTables-example" width="100%">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($users as $u): ?>
                        <tr>
                            <td><?= $u['id'] ?></td>
                            <td><?= htmlspecialchars($u['username']) ?></td>
                            <td><?= htmlspecialchars($u['name']) ?></td>
                            <td>
                                <span class="badge bg-<?= $u['role'] === 'admin' ? 'danger' : 'secondary' ?>">
                                    <?= $u['role'] ?>
                                </span>
                            </td>
                            <td class="text-center">

                                <div class="btn-group btn-group-sm">

                                    <a class="btn btn-warning"
                                       href="<?= rtrim($config['app_url'], '/') ?>/admin/users/edit?id=<?= $u['id'] ?>">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <button class="btn btn-danger"
                                            onclick="confirmDelete(<?= $u['id'] ?>)">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                </div>

                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>

        </div>
    </div>
</div>

<script>
function confirmDelete(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "<?= rtrim($config['app_url'], '/') ?>/admin/users/delete?id=" + id;
        }
    })
}
</script>

