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
                    <div class="card-footer text-center">
                        <p>Dont have account? <a href="<?= $config['app_url'] ?>/registration">Sign up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>