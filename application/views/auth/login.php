<div class="col-sm-12 col-md-6 mx-auto mt-5">
	<div class="m-auto">
		<form action="" method="post" class="card card-body border border-dark">
		<h1 class="fs-3 text-center my-3">Login</h1>													
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
				<input type="text" value="<?= set_value('username') ?>" name="username" id="username" class="form-control">
			</div>

			<div class="mb-3">
				<?php if (!empty(form_error('password'))): ?>
					<span class="text-danger my-2"><?= form_error('password') ?></span>
				<?php endif ?>
				<label for="password">Password</label>
				<input type="password" name="password" id="password" class="form-control">
			</div>

			<div class="my-2">
				<a href="<?= base_url() ?>auth/register" class="text-dark">Register</a>
			</div>			

			<div class="my-3">
				<button type="submit" class="btn btn-dark">Login</button>
			</div>
		</form>	
	</div>
</div>