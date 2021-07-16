<div class="col-sm-12 col-md-6 mx-auto mt-5">
	<div class="m-auto">
		<form action="" method="post" class="card card-body border border-dark">
		<h1 class="fs-3 text-center my-3">Register</h1>													
		<?php if (isset($_SESSION['message'])): ?>
				<div class="alert alert-danger">
					<?= $_SESSION['message'] ?>
				</div>
				<?php unset($_SESSION['message']) ?>
			<?php endif ?>

			<div class="mb-3">
				<?php if (!empty(form_error('username'))): ?>
					<span class="text-danger my-2"><?= form_error('username') ?></span>
				<?php endif ?>
				<label for="username">Username</label>
				<input type="text" name="username" value="<?= set_value('username') ?>" id="username" class="form-control">
			</div>

			<div class="mb-3">
				<?php if (!empty(form_error('password'))): ?>
					<span class="text-danger my-2"><?= form_error('password') ?></span>
				<?php endif ?>
				<label for="password">Password</label>
				<input type="password" name="password" id="password" class="form-control">
			</div>

			<div class="mb-3">
				<?php if (!empty(form_error('conf_password'))): ?>
					<span class="text-danger my-2"><?= form_error('conf_password') ?></span>
				<?php endif ?>
				<label for="conf_password">Confirm password</label>
				<input type="password" name="conf_password" id="conf_password" class="form-control">
			</div>

			<div class="my-2">
				<a href="<?= base_url() ?>auth/login" class="text-dark">Login</a>
			</div>			

			<div class="my-3">
				<button type="submit" class="btn btn-dark">Register</button>
			</div>
		</form>	
	</div>
</div>