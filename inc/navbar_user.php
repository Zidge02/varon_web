<nav class="navbar navbar-dark navbar-expand-lg bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php?vista=principal">
        <!-- <img src="media/img/logo.png" alt="Bootstrap" width="80" height="80"> -->
        <h3>Casa Varon</h3>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" href="./inc/salir.php"><i class="bi bi-box-arrow-in-right"></i> Cerrar sesion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="index.php?vista=user_page"><i class="bi bi-person-circle"></i> <?php echo($_SESSION['usuario_login']) ?></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>