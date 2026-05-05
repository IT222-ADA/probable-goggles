 <div class="modal fade" id="viewModal<?= $t['id'] ?>">
    <div class="modal-dialog">
        <div class="modal-content"
            style="background-color: <?= $t['color'] ?>; border-left: 8px solid <?= $t['color'] ?>;">

            <div class="modal-header">
                <h5 class="modal-title"><?= htmlspecialchars($t['title']) ?></h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <p><?= nl2br(htmlspecialchars($t['description'])) ?></p>
            </div>

            <div class="modal-footer">
                <small class="text-muted">
                    <?= (new DateTime($t['created_at']))->format('M d, Y h:i A') ?>
                </small>
            </div>

        </div>
    </div>
</div>