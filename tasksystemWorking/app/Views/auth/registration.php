<?php $config = require __DIR__ . '/../../Config/config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <script src="<?= $config['app_url'] ?>/assets/js/sweetalert2.all.min.js"></script>
    <script src="<?= $config['app_url'] ?>/assets/js/AlertService.js"></script>
     <link rel="stylesheet" href="<?= $config['app_url'] ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= $config['app_url'] ?>/assets/css/bootstrap.min.css">
    <script src="<?= $config['app_url'] ?>/assets/js/bootstrap.min.js"></script>
</head>
<body>
    
    <div class="container-fluid bg-secondary-subtle">
        <img src="<?= $config['app_url'] ?>/assets/images/oc.png" class="bglogo" alt="Background Logo">
        <div class="vh-100">
            <div class="row align-items-center justify-content-center h-100">
                <div class="col-md-3">
                    <div class="card card-shadow" >
                        <div class="card-body text-center">
                            <form action="<?= $config['app_url'] ?>/auth/register" method="post">
                                <h1 class="h3 mb-3 fw-normal">Please register</h1>
                                <div class="py-2">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="name">
                                        <label for="floatingInput">Full Name</label>
                                    </div>
                                </div>
                                <div class="py-2">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="username">
                                        <label for="floatingInput">Username</label>
                                    </div>
                                </div>
                                <div class="py-2">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                                        <label for="floatingPassword">Password</label>
                                    </div>
                                </div>
                                <div class="py-2">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                                        <label for="floatingInput">Email address</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary w-100 py-2 my-2 " type="submit" name="submit">Sign in</button>
                                <p class="mt-3">Already have an account? <a href="<?= $config['app_url'] ?>/login">Sign in</a></p>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

</body>
</html>
