<?php $config = require __DIR__ . '/../../Config/Config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= $config['app_url'] ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= $config['app_url'] ?>/assets/css/bootstrap.css">
    <script src="<?= $config['app_url'] ?>/assets/js/bootsrap.min.js"></script>
</head>
<body>
    <div class="container-fluid bg-secondary-subtle">
        <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="card card-shadow">
                        <div class="card-body text-center">
                            <form action="<?= $config['app_url'] ?>/auth/authenticate" method="post">
                                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
                                <div class="form-floating">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="floatingInput"
                                    placeholder="name@example.com"
                                    name="username"
                                />
                                <label for="floatingInput">username</label>
                                </div>
                                <div class="form-floating">
                                <input
                                    type="password"
                                    class="form-control"
                                    id="floatingPassword"
                                    placeholder="Password"
                                    name="password"
                                />
                                <label for="floatingPassword">Password</label>
                                </div>
                                <button class="btn btn-primary w-100 py-2 my-2" type="submit" name="submiy">Sign in</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>