<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-md">
    <a class="navbar-brand" href="<?= base_url() ?>">MyBlog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <?php if ($active_page == "home"): ?>
          <li class="nav-item">
            <a class="nav-link active" href="<?= base_url() ?>">Home</a>
          </li>
          <?php if($this->session->level == 'admin'): ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url() ?>blog/new">New Blog</a>
            </li>
           <?php endif ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>auth/logout">logout</a>
          </li> 
          <?php elseif($active_page == 'new blog'): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>">Home</a>
          </li>
         <?php if($this->session->level == 'admin'): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>blog/new">New Blog</a>
          </li>
       <?php endif ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>auth/logout">logout</a>
          </li> 
          <?php else:  ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url() ?>">Home</a>
            </li>
            <?php if($this->session->level == 'admin'): ?>
              <li class="nav-item">
              <a class="nav-link" href="<?= base_url() ?>blog/new">New Blog</a>
            </li> 
          <?php endif ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url() ?>auth/logout">logout</a>
            </li> 
        <?php endif ?>
      </ul>
    </div>
  </div>
</nav>