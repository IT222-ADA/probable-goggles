
<div class="modal fade" id="addTaskModal">
    <div class="modal-dialog">
        <form action="<?= rtrim($config['app_url'], '/') ?>/tasks/store" method="POST" class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">New Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <input type="hidden" name="user_id" value="<?= $user['id'] ?>">

                <input type="text" name="title" class="form-control mb-3" placeholder="Title" required>

                <textarea name="description" class="form-control mb-3" placeholder="Description"></textarea>

                <input type="color" name="color" class="form-control form-control-color" value="#ffd700">

            </div>

            <div class="modal-footer">
                <button class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>

        </form>
    </div>
</div>