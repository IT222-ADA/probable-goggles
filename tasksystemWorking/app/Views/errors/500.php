<?php $config = require __DIR__ . '/../../Config/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>500 Server Error</title>
    <script src="<?= rtrim($config['app_url'], '/') ?>/assets/js/sweetalert2.all.min.js"></script>
</head>
<body>

<script>
Swal.fire({
    icon: 'error',
    title: '500 - Server Error',
    text: 'Something went wrong on our side. Please try again later.',
    confirmButtonText: 'Reload'
}).then(() => {
    location.reload();
});
</script>

</body>
</html>
