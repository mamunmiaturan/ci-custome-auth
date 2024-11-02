<?php $this->load->view('includes/header.php'); ?>

<div class="text-center">
	<h1 class="fs-4 card-title fw-bold mb-4">Welcome to Registration page</h1>
</div>

<!-- Display validation errors if any -->
<?php if (validation_errors()): ?>
	<div class="alert alert-danger">
		<?php echo validation_errors(); ?>
	</div>
<?php endif; ?>

<form method="POST" action="<?= base_url('auth/register') ?>" class="needs-validation" novalidate="" autocomplete="off">
	<div class="mb-3">
		<label class="mb-2 text-muted" for="nameID">Name</label>
		<input id="nameID" type="text" class="form-control" name="name" placeholder="Enter your name" required autofocus>
	</div>
	<div class="mb-3">
		<label class="mb-2 text-muted" for="emailID">Email</label>
		<input id="emailID" type="email" class="form-control" name="email" placeholder="Enter your email" required>
	</div>
	<div class="mb-3">
		<label class="mb-2 text-muted" for="phoneNumberID">Phone No</label>
		<input id="phoneNumberID" type="text" class="form-control" name="phone" placeholder="Enter your phone no" required>
	</div>
	<div class="mb-3">
		<label class="mb-2 text-muted" for="password">Password</label>
		<input id="password" type="password" class="form-control" name="password" placeholder="Enter your password" required>
	</div>
	<div class="mb-3">
		<label class="mb-2 text-muted" for="confirm_password">Confirm Password</label>
		<input id="confirm_password" type="password" class="form-control" name="confirm_password" placeholder="Confirm your password" required>
	</div>
	<div class="mb-3">
		<label class="mb-2 text-muted" for="genderID">Gender</label>
		<select id="genderID" class="form-control" name="gender" required>
			<option value="" disabled>Select Gender</option>
			<option value="Male">Male</option>
			<option value="Female">Female</option>
			<option value="Other">Other</option>
		</select>
	</div>

	<div class="mb-3">
		<label class="mb-2 text-muted" for="addressID">Address</label>
		<input id="addressID" type="text" class="form-control" name="address" placeholder="Enter your address" required>
	</div>
	<div class="text-center">
		<button type="submit" class="btn btn-primary">
			Register
		</button>
	</div>
	</div>
	<div class="card-footer py-3 border-0">
		<div class="text-center">
			Do you have an account? <a href="<?= base_url('/') ?>" class="text-dark">Login</a>
		</div>
	</div>
</form>

<?php $this->load->view('includes/footer.php'); ?>