<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
  <div class="container">
  <!-- <img src="<?= URLROOT ?>/img/logo1.png" alt="Logo COGIP"> -->
    <a class="navbar-brand" href="<?= URLROOT ?>"><?= SITENAME ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?= URLROOT ?>"><i class="fas fa-home"></i> Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= URLROOT ?>/pages/about">About</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="<?= URLROOT ?>/people">Contacts</a>
        </li>
        <?php if (isset($_SESSION['user_id'])) : ?>
          <li class="nav-item">
              <a class="nav-link" href="<?= URLROOT ?>/admin">Admin</a>
          </li>
        <?php endif; ?>
        <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == '1') : ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= URLROOT ?>/users">Users</a>
            </li>
        <?php endif; ?>
      </ul>

      <ul class="navbar-nav ml-auto">
        <?php if (isset($_SESSION['user_id'])) : ?>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-user"></i> <?= $_SESSION['user_name'] ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= URLROOT ?>/users/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
          </li>
        <?php else : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= URLROOT ?>/users/login"><i class="fas fa-sign-out-alt"></i> Login</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>