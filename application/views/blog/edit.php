<script src="<?= base_url() ?>assets/js/tinymce.min.js"></script>
<script src="<?= base_url() ?>assets/js/init-editor.js"></script>
<div class="container-md mt-5">
	<form id="new-blog" action="<?= base_url()  ?>blog/action/edit-blog" method="post">
		<div class="input-wrapper mb-3">
			<label for="title">Title</label>
			<input type="text" name="title" value="<?= $blog_content[0]['title'] ?>" id="title" required placeholder="Blog's title.." class="form-control">
		</div>	

		<div class="input-wrapper mb-3">
			<label for="content">Content</label>
			<textarea id="editor" name="content" required id="" cols="30" rows="10"><?= $blog_content[0]['content'] ?></textarea>
		</div>
		<input type="hidden" value="<?= $blog_content[0]['id_blog'] ?>" name="id_blog">
		<div class="my-5">
			<button type="submit" name="publish" class="btn btn-dark">Publish</button>
		</div>
	</form>
</div>
