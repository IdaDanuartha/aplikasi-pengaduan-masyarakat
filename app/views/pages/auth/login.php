<!-- Nested Row within Card Body -->
<div class="row">
    <div class="col-lg-6 d-none d-lg-block pt-5">
        <img src="<?= BASE_URL ?>/assets/img/login.svg" width="100%">
    </div>
    <div class="col-lg-6">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Welcome Back</h1>
            </div>
            <div class="my-3">
                <?php Flasher::flash(); ?>
            </div>
            <form class="user" action="<?= BASE_URL ?>/login/process" method="post">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user"
                        id="username" name="username"
                        placeholder="Enter Username" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user" name="password"
                        id="password" placeholder="Enter Password" required>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember
                            Me</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Login
                </button>
                <div class="mt-2">
                    <span style="font-size: 14px;">Doesn't have an account? <a href="<?= BASE_URL ?>/register">Create new account!</a></span>
                </div>
            </form>
        </div>
    </div>
</div>
                    