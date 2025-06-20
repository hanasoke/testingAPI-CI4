<?= $this->extend('templates/sign/layout') ?>

<?= $this->section('content') ?>
<div class="col-lg-5">
    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
        <div class="card-body">
            <?php if(isset($error)): ?>
                <div class="alert alert-danger">
                    <?= $error; ?>
                </div>
            <?php endif; ?>

            <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success'); ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('/login') ?>" method="post"> 
                <div class="form-floating mb-3">
                    <input class="form-control" name="email" id="email" type="email" placeholder="name@example.com" value="<?= set_value('email'); ?>" />
                    <label for="email">Email address</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="password" name="password" type="password" placeholder="Password" />
                    <label for="password">Password</label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                    <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                </div>
                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                    <a class="small" href="password.html">Forgot Password?</a>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
        <div class="card-footer text-center py-3">
            <div class="small"><a href="<?= base_url('/register'); ?>">Need an account? Sign up!</a></div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>