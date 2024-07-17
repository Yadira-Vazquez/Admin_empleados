<?php include('layouts/header.php'); ?>
  <body class="login-page">

    <div class="account-pages my-5 ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="card" style="border-radius: 10%">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-12 p-4">
                                    <h6 class="h5 mb-0 mt-3">Iniciar Sesión</h6>
                                    <p class="text-muted mt-1 mb-4">
                                        Bienvenido(a), nos encanta tenerte aquí.
                                    </p>

                                    <?php if (isset($mensaje)): ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <?php echo $mensaje; ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <form method="POST" action="<?php echo base_url('/login') ?>" class="">
                                        <div class="mb-3">
                                            <label class="form-label">Usuario</label>
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="bi bi-person"></i>
                                                </span>
                                                <input type="text" class="form-control" id="username" name="username" placeholder="Ingresa tu nombre de usuario">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Contraseña</label>
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="bi bi-lock"></i>
                                                </span>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa tu contraseña">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                                        <br>
                                    </form>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div> 
            </div>
        </div>
    </div>

<?php include('layouts/footer.php'); ?>