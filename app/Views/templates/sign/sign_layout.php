<?= $this->extend('templates/sign/header') ?>

<?= $this->section('content') ?>
    <?= $this->renderSection('auth_content') ?>
<?= $this->endSection() ?>

<?= $this->extend('templates/sign/footer') ?>