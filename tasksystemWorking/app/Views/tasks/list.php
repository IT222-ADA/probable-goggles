<div class="container-fluid py-3">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Tasks</h2>

        <!-- Add Task Button -->
        
    </div>

    <!-- FILTER -->
    <div class="row">
        <div class="col-auto">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTaskModal">
                <i class="fa fa-plus"></i> New Task
            </button>
        </div>
        <div class="col-auto">
            <form method="POST" action="<?= rtrim($config['app_url'], '/') ?>/tasks/filter" class="row g-2 mb-3">
                <div class="col-auto">
                    <input type="date" name="date" class="form-control" value="<?= $date ?? ''; ?>">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-filter"></i></button>
                </div>
                <div class="col-auto">
                    <a href="<?= rtrim($config['app_url'], '/') ?>/tasks/list" class="btn btn-secondary"><i class="fas fa-times"></i></a>
                </div>
                <div class="col-auto">
                    <a href="<?= rtrim($config['app_url'], '/') ?>/tasks/completed" class="btn btn-info"><i class="fas fa-check"></i> Completed</a>
                </div>
            </form>
        </div>
    </div>

    <hr>

    <!-- TASK LIST -->
    <div class="row g-3">

        <?php foreach ($tasks as $t):
            $color = preg_match('/^#[a-fA-F0-9]{6}$/', $t['color']) ? $t['color'] : '#ffd700';
        ?>

        <div class="col-sm-6 col-md-4 col-lg-3" data-bs-toggle="modal" data-bs-target="#viewModal<?= $t['id'] ?>">
            <div class="sticky-note"  style="background-color: <?= $color ?>; border-left: 6px solid <?= $color ?>;">

            <style>
                .note-actions a {
                    color: #333;
                    float: right;
                }
                .note-actions a:hover {
                    color: #000;
                }
                .note-left {
                    float: left;
                }
                .note-right {
                    float: right;
                }
            </style>
                <!-- CONTENT -->
                <div class="note-header">
                    <div class="note-actions">
                        <div class="note-left">
                            <a data-bs-toggle="modal" data-bs-target="#editTaskModal<?= $t['id'] ?>" class="text-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                        <div class="note-right">
                            <a href="<?= rtrim($config['app_url'], '/') ?>/tasks/delete?id=<?php echo $t['id']; ?>" class="text-danger">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="note-title">
                    
                    <div>
                        <?= htmlspecialchars($t['title']) ?>
                    </div>
                    
                </div>
                <div class="note-content"><?= htmlspecialchars($t['description']) ?></div>

                <!-- FOOTER -->
                <div class="sticky-footer d-flex justify-content-between">
                        
                    <!-- "Complete" Button -->
                    <?php if ($t['status'] != 1){ ?>
                    <a href="<?= rtrim($config['app_url'], '/') ?>/tasks/complete?id=<?php echo $t['id']; ?>" class="btn btn-info badge">
                        <i class="fas fa-check"></i> Pending..
                    </a>
                    <?php }else{ ?>
                    
                    <span class="badge bg-success">Completed</span>
                    <a href="<?= rtrim($config['app_url'], '/') ?>/tasks/uncomplete?id=<?php echo $t['id']; ?>" class="btn btn-secondary badge">
                        <i class="fas fa-undo"></i>
                        </a>    
                    <?php } ?>

                    <small class="text-muted"> 
                        <?php // Assuming $t['created_at'] contains the datetime string from the database
                        $date = new DateTime($t['created_at']);

                        // Format the date and time
                        $formattedDate = $date->format('M d, Y \: h:i A'); // Jan 15, 2025 at 08:00 PM

                        echo $formattedDate; ?>
                    </small>
                </div>
            </div>
        </div>

        <?php require __DIR__ . '/../tasks/edit.php'; ?>
        <?php require __DIR__ . '/../tasks/view.php'; ?>
        <?php endforeach; ?>

    </div>
</div>
<?php require __DIR__ . '/../tasks/create.php'; ?>