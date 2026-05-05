<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow-sm border-bottom">
  <div class="container-fluid">

    <!-- Brand -->
    <a class="navbar-brand fw-bold text-primary" href="" style="font-family: 'Segoe UI', sans-serif;">
      🗒️ TaskBoard
    </a>

    <!-- Mobile toggle -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarMain" aria-controls="navbarMain"
      aria-expanded="false" aria-label="Toggle navigation">

      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarMain">

      <!-- Left menu -->
      <div class="navbar-nav me-auto">
        <?php if (Auth::isAdmin()): ?>
        <a class="nav-link" href="<?= rtrim($config['app_url'], '/') ?>/admin/dashboard">📊 Dashboard</a>
        <a class="nav-link" href="<?= rtrim($config['app_url'], '/') ?>/admin/users">👥 Users</a>
        <?php else: ?>
        <a class="nav-link active" href="<?= rtrim($config['app_url'], '/') ?>/tasks">🏠 Home</a>
        <?php endif; ?>
        <a class="nav-link" href="<?= rtrim($config['app_url'], '/') ?>/tasks">📋 Tasks</a>

      </div>

      <!-- Right menu -->
      <div class="d-flex align-items-center">

        <span class="navbar-text text-secondary me-3 fw-semibold">
           👤 <?= htmlspecialchars($user['name']) ?>
        </span>

        <a class="btn btn-outline-danger btn-sm" href="<?= rtrim($config['app_url'], '/logout') ?>/logout">
          Logout
        </a>

      </div>

    </div>
  </div>
</nav>