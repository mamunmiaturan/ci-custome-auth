<?php $this->load->view('includes/header.php') ?>
<div class="text-center">
    <h1 class="fs-4 card-title fw-bold mb-4">Welcome to Login page</h1>
</div>
<form method="POST" class="needs-validation" novalidate="" autocomplete="off">
    <div class="mb-3">
        <label class="mb-2 text-muted" for="email">Email</label>
        <input id="email" type="email" class="form-control" name="email" value="" required autofocus>
    </div>
    <div class="mb-3">
        <label class="mb-2 text-muted" for="password">Passsword</label>
        <input id="password" type="password" class="form-control" name="password" required>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary ">
            Login
        </button>
    </div>
    </div>
    <div class="card-footer py-3 border-0">
        <div class="text-center">
            Don't have an account? <a href="<?= base_url('auth/register') ?>" class="text-dark">Create One</a>
        </div>
    </div>
</form>
<?php $this->load->view('includes/footer.php') ?>