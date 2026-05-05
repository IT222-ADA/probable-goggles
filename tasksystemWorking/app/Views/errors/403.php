<?php $config = require __DIR__ . '/../../Config/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>403 Forbidden</title>
    <script src="<?= rtrim($config['app_url'], '/') ?>/assets/js/sweetalert2.all.min.js"></script>
</head>
<body>

<?php $user = Auth::user(); ?>

<script>
Swal.fire({
    icon: 'warning',
    title: '403 - Access Denied',
    text: 'You do not have permission to access this page.',
    confirmButtonText: 'Go Back'
}).then(() => {
    window.location.href = "<?= rtrim($config['app_url'], '/') ?>/<?= ($user['role'] === 'admin') ? 'admin/dashboard' : 'tasks' ?>";
});
</script>

</body>
</html>
