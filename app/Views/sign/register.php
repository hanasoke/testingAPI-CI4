<?= $this->extend('templates/sign/layout') ?>

<?= $this->section('content') ?>
<div class="col-lg-7">
    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
        <div class="card-body">
            <?php if (isset($validation)): ?>
                <div class="alert alert-danger">
                    <?= $validation->listErrors(); ?>
                </div>
            <?php endif; ?>
            <form action="<?= base_url('/register') ?>" method="post">
                <div class="form-floating mb-3">
                    <input class="form-control" name="name" type="text" placeholder="Enter your name" value="<?= set_value('name'); ?>">
                    <label for="name">Full Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" name="email" id="email" type="email" placeholder="name@example.com" value="<?= set_value('email') ?>" />
                    <label for="email">Email address</label>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="password" name="password" type="password" placeholder="Create a password" />
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="password_confirm" name="password_confirm" type="password" placeholder="Confirm password" />
                            <label for="password_confirm">Confirm Password</label>
                        </div>
                    </div>
                </div>
                <div class="mt-4 mb-0">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-block">Create Account</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer text-center py-3">
            <div class="small"><a href="<?= base_url('/login'); ?>">Have an account? Go to login</a></div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>