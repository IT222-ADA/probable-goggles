<div class="container-fluid bg-secondary-subtle">
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="card card-shadow">
                    <div class="card-body text-center">
                        <form action="<?= $config['app_url'] ?>/auth/register" method="post">
                            <h1 class="h3 mb-3 fw-normal">Please Register</h1>
                            <div class="form-floating">
                            <input
                                type="text"
                                class="form-control"
                                id="floatingInput"
                                placeholder="Full name"
                                name="name"
                            />
                            <label for="floatingInput">Full Name</label>
                            </div>
                            <div class="form-floating">
                            <input
                                type="email"
                                class="form-control"
                                id="floatingInput"
                                placeholder="name@example.com"
                                name="email"
                            />
                            <label for="floatingInput">Email</label>
                            </div>
                            <div class="form-floating">
                            <input
                                type="text"
                                class="form-control"
                                id="floatingInput"
                                placeholder="username"
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
                    <div class="card-footer text-center">
                        <p>Already have account? <a href="<?= $config['app_url'] ?>/login">Sign in</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>