<div class="modal fade" id="editTaskModal<?= $t['id'] ?>">
    <div class="modal-dialog">
        <form action="<?= rtrim($config['app_url'], '/') ?>/tasks/update" method="POST" class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Edit Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <input type="hidden" name="id" value="<?= $t['id'] ?>">

                <input type="text" name="title" class="form-control mb-3" placeholder="Title" required value="<?= $t['title'] ?>">

                <textarea name="description" class="form-control mb-3" placeholder="Description"><?= $t['description'] ?></textarea>

                <input type="color" name="color" class="form-control form-control-color" value="<?= $t['color'] ?>">

            </div>

            <div class="modal-footer">
                <button class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>

        </form>
    </div>
</div>