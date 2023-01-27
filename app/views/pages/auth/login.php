<!-- Nested Row within Card Body -->
<div class="row">
    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
    <div class="col-lg-6">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Welcome</h1>
            </div>
            <form class="user">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user"
                        id="username"
                        placeholder="Enter Username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user"
                        id="password" placeholder="Enter Password">
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember
                            Me</label>
                    </div>
                </div>
                <a href="<?= BASE_URL ?>/dashboard" class="btn btn-primary btn-user btn-block">
                    Login
                </a>
                <div class="mt-2">
                    <span style="font-size: 14px;">Doesn't have an account? <a href="<?= BASE_URL ?>/register">Create new account!</a></span>
                </div>
            </form>
        </div>
    </div>
</div>
                    