
<main class="container-md mt-5">

	<?php if (isset($_SESSION['form-status'])): ?>
		<?php if ($_SESSION['form-status'] == 'success'): ?>
			<div class="alert alert-success">
				success
			</div>
		<?php endif ?>
	<?php endif ?>
	<ul class="list-group">
		<?php foreach ($blogs as $key => $value): ?>
			<li class="list-group-item d-flex justify-content-between align-items-center">
				<a class="text-dark fs-4" href="<?= base_url() ?>blog/view/<?= $value['id_blog'] ?>">
					<?= $value['title'] ?>
				</a>


				<?php if ($level == 'admin'): ?>
					<div>
						<a href="<?= base_url() ?>blog/edit/<?= $value['id_blog'] ?>" class="btn btn-primary">Edit</a>
						<a href="<?= base_url() ?>blog/delete/<?= $value['id_blog'] ?>" class="btn btn-danger">Delete</a>
					</div>						
				<?php endif ?>	
					
			</li>
		<?php endforeach ?>
	</ul>
</main>