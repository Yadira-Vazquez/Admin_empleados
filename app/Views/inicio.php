<?php include('layouts/header.php'); ?>
  <body>
    <nav class="navbar navbar-expand-lg bg-secondary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 1.5rem;">
                            <i class="bi bi-person-circle"></i> <?php echo session('usuario_nombre'); ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item text-black" href="<?php echo base_url('/salir') ?>">Cerrar sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <h1 style="text-align: center;">Alta de empleado</h1>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card_empleados custom-card " id="formCard">
                    <div class="card-body">
                        <h5 class="card-title">Hola, <?php echo session('usuario_nombre'); ?></h5>
                        <p class="card-text">
                            Ingresa los datos que te indica el formulario.
                        </p>
                        <form action="<?php echo base_url('/agregar'); ?>" method="POST">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nombre" class="form-label">
                                        <i class="bi bi-person"></i> Nombre
                                    </label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa el nombre">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="fecha_nacimiento" class="form-label">
                                        <i class="bi bi-calendar"></i> Fecha de Nacimiento
                                    </label>
                                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="direccion" class="form-label">
                                        <i class="bi bi-house-door"></i> Dirección
                                    </label>
                                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingresa la dirección">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="telefono" class="form-label">
                                        <i class="bi bi-phone"></i> Teléfono
                                    </label>
                                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingresa el teléfono">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card_empleados custom-card mt-5" id="tableCard">
            <div class="card-body">
                <table id="empleado" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>IdEmpleado</th>
                            <th>Nombre</th>
                            <th>Fecha de nacimiento</th>
                            <th>Teléfono</th>
                            <th>Direccion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="filasPedidos">
                        <?php if (!empty($empleados)) : ?>
                            <?php foreach ($empleados as $empleado) : ?>
                                <tr>
                                    <td><?php echo $empleado['id_empleado']; ?></td>
                                    <td><?php echo $empleado['nombre']; ?></td>
                                    <td><?php echo $empleado['fecha_nacimiento']; ?></td>
                                    <td><?php echo $empleado['telefono']; ?></td>
                                    <td><?php echo $empleado['direccion']; ?></td>
                                    <td>
                                        <button class="btn btn-warning btn-edit" data-id="<?php echo $empleado['id_empleado']; ?>" data-nombre="<?php echo $empleado['nombre']; ?>" data-fecha="<?php echo $empleado['fecha_nacimiento']; ?>" data-telefono="<?php echo $empleado['telefono']; ?>" data-direccion="<?php echo $empleado['direccion']; ?>"><i class="bi bi-pencil"></i></button>
                                        <a href="<?php echo base_url('/eliminar/' . $empleado['id_empleado']); ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="6" class="text-center">Todavía no hay información guardada.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal de edición -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar Empleado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" action="" method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="edit_nombre" class="form-label">
                                    <i class="bi bi-person"></i> Nombre
                                </label>
                                <input type="text" class="form-control" id="edit_nombre" name="nombre">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="edit_fecha_nacimiento" class="form-label">
                                    <i class="bi bi-calendar"></i> Fecha de Nacimiento
                                </label>
                                <input type="date" class="form-control" id="edit_fecha_nacimiento" name="fecha_nacimiento">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="edit_direccion" class="form-label">
                                    <i class="bi bi-house-door"></i> Dirección
                                </label>
                                <input type="text" class="form-control" id="edit_direccion" name="direccion">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="edit_telefono" class="form-label">
                                    <i class="bi bi-phone"></i> Teléfono
                                </label>
                                <input type="text" class="form-control" id="edit_telefono" name="telefono">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        var editButtons = document.querySelectorAll('.btn-edit');
        editButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var id = this.getAttribute('data-id');
                var nombre = this.getAttribute('data-nombre');
                var fecha = this.getAttribute('data-fecha');
                var telefono = this.getAttribute('data-telefono');
                var direccion = this.getAttribute('data-direccion');

                document.getElementById('edit_nombre').value = nombre;
                document.getElementById('edit_fecha_nacimiento').value = fecha;
                document.getElementById('edit_direccion').value = direccion;
                document.getElementById('edit_telefono').value = telefono;

                document.getElementById('editForm').action = '<?php echo base_url("/actualizar"); ?>/' + id;

                var editModal = new bootstrap.Modal(document.getElementById('editModal'));
                editModal.show();
            });
        });

        if (document.querySelector('#filasPedidos tr') && document.querySelector('#filasPedidos tr').children.length > 1) {
            formCard.style.display = 'none';
        } else {
            tableCard.style.display = 'none';
        }
    });
    </script>

<?php include('layouts/footer.php'); ?>