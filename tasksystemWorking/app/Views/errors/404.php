<?php $config = require __DIR__ . '/../../Config/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>404 Not Found</title>
    <script src="<?= rtrim($config['app_url'], '/') ?>/assets/js/sweetalert2.all.min.js"></script>
</head>
<body>
<?php $user = Auth::user(); ?>
<script>
Swal.fire({
    icon: 'error',
    title: '404 - Page Not Found',
    text: 'The page you are looking for does not exist.',
    confirmButtonText: 'Go Back'
}).then(() => {
    window.location.href = "<?= rtrim($config['app_url'], '/') ?>/<?= ($user['role'] === 'admin') ? 'admin/dashboard' : 'tasks' ?>";
});
</script>

</body>
</html>
