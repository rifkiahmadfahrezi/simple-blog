<script src="<?= base_url() ?>assets/js/tinymce.min.js"></script>
<script src="<?= base_url() ?>assets/js/init-editor.js"></script>
<div class="container-md mt-5">
	<form id="new-blog" action="<?= base_url()  ?>blog/action/create-blog" method="post">
		<div class="input-wrapper mb-3">
			<label for="title">Title</label>
			<input type="text" name="title" id="title" placeholder="Blog's title.." class="form-control">
		</div>	

		<div class="input-wrapper mb-3">
			<label for="content">Content</label>
			<textarea id="editor" name="content" id="content" cols="30" rows="10"></textarea>
		</div>
		<div class="my-5">
			<button type="submit" name="publish" class="btn btn-dark">Publish</button>
		</div>
	</form>
</div>
