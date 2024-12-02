<body class="hold-transition login-page" style="background-color: #2c3e50;">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <!-- Logo de la aplicación -->
        <div class="row">
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <img src="assest/dist/img/mana.jpg" alt="Logo" width="300" class="img-fluid mb-4">
            </div>

            <!-- Contenedor del formulario -->
            <div class="col-md-6">
                <div class="card" style="background-color: #34495e; color: white;">
                    <div class="card-body login-card-body">
                        <p class="login-box-msg">Inicia sesión para comenzar tu sesión</p>

                        <form action="" method="post">
                            <!-- Campo de usuario -->
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Usuario" name="usuario" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Campo de contraseña -->
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Password" name="password" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Botón de inicio de sesión -->
                            <div class="row">
                                <div class="col-8"></div>
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block" style="background-color: #2980b9; border-color: #2980b9;">Acceder</button>
                                </div>
                            </div>

                            <?php
                                $login = new ControladorUsuario();
                                $login->ctrIngresoUsuario();
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="assest/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assest/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assest/dist/js/adminlte.min.js"></script>
</body>
