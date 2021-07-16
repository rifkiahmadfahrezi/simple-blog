<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.0.1/styles/atom-one-dark.min.css" integrity="sha512-Jk4AqjWsdSzSWCSuQTfYRIF84Rq/eV0G2+tu07byYwHcbTGfdmLrHjUSwvzp5HvbiqK4ibmNwdcG49Y5RGYPTg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.8.2/skins/content/default/content.min.css" integrity="sha512-KYlPDsJE6wqDev6smrRzaH8VwjoFV9Xj4VzyoUok3vzkVZe0g32WFiVawEiAD77EI2tSoruKNJCedUSCrk5E/Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdn.jsdelivr.net/gh/highlightjs/cdn-release@11.0.1/build/highlight.min.js"></script>
<script>hljs.highlightAll();</script>
<div class="container-md my-3">
	<?php foreach ($blogs as $key => $value): ?>
		<div class="d-flex justify-content-between align-item-center">
			<h1 class="blog-title fs-2"><?= $value['title'] ?></h1>
			<div>
				<a class="btn btn-outline-dark" href="<?= base_url() ?>">Back to home</a>
			</div>
		</div>	
		<div class="my-3 d-flex w-50 align-items-center justify-content-between">
			<p class="text-secondary">Last update : <?= Blog::show_date($value['last_update']) ?></p>		
		</div>

		<div class="blog-content my-3"><?= $value['content'] ?></div>
	<?php endforeach ?>
</div>

