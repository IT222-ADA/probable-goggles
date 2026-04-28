<?php $config = require __DIR__ . '/../../Config/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? '' ?></title>
    <link rel="stylesheet" href="<?= rtrim($config['app_url'], '/') ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= rtrim($config['app_url'], '/') ?>/assets/css/bootstrap.min.css">
    <link href="<?= rtrim($config['app_url'], '/') ?>/assets/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="<?= rtrim($config['app_url'], '/') ?>/assets/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="<?= rtrim($config['app_url'], '/') ?>/assets/vendor/datatables/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= rtrim($config['app_url'], '/') ?>/assets/css/sweetalert2.min.css">
    
    
</head>
<body>
    <?php require $contentView; ?>
</body>
</html>

<script src="<?= rtrim($config['app_url'], '/') ?>/assets/js/sweetalert2.all.min.js"></script>
<script src="<?= rtrim($config['app_url'], '/') ?>/assets/js/AlertService.js"></script>
<script src="<?= rtrim($config['app_url'], '/') ?>/assets/js/bootstrap.min.js"></script>
<script src="<?= rtrim($config['app_url'], '/') ?>/assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= rtrim($config['app_url'], '/') ?>/assets/vendor/datatables/datatables.min.js"></script>
<script src="<?= rtrim($config['app_url'], '/') ?>/assets/js/initiate-datatables.js"></script>

<?php
require_once __DIR__ . '/../../Core/Flash.php';
Flash::display();
?>