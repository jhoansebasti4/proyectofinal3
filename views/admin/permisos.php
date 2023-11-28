<?php
// usuarios.php
require_once '../../models/AdminModel.php'; // Ajusta la ruta según la ubicación real del archivo

// Instanciamos el modelo AdminModel
$model = new AdminModel();

// Obtenemos la lista de usuarios desde el modelo (en lugar de permisos)
$usuarios = $model->getUsuarios(); // Asegúrate de que el método exista en tu modelo

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataforma Virtual</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Agrega aquí tus propios estilos CSS si es necesario -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css">
</head>
<body class="bg-gray-200"> 
    <div class="container mx-auto my-5">
        <div class="flex">
            <!-- Div izquierdo con información del usuario y menú -->
            <div class="w-1/5 p-4 bg-white rounded-lg shadow-md">
                <div class="text-center">
                    <img src="/assets/logo.jpg" alt="Imagen del Admin" class="w-16 h-16 rounded-full mx-auto">
                    <p class="mt-2 text-gray-700">ADMINISTRADOR</p>
                </div>
                
                <hr class="my-4">
                <h4 class="text-lg font-semibold mb-4">Menú Administrador</h4>
                <ul class="space-y-2">
                    <li>
                        <button class="btn btn-link" id="btnUsuarios">Usuarios</button>
                    </li>
                    <li>
                        <button class="btn btn-link" id="btnMaestros">Maestros</button>
                    </li>
                    <li>
                        <button class="btn btn-link" id="btnAlumnos">Alumnos</button>
                    </li>
                    <li>
                        <button class="btn btn-link" id="btnClases">Clases</button>
                    </li>
                </ul>
                
            </div>
         <!-- AL DAR CLIC EN PERMISOS DEBE APARECER ESTA TABLA PERMISOS -->
         <div class="w-3/4 p-4 bg-white rounded-lg shadow-md" id="tablaUsuarios">
             <div class="text-right">
                 <button class="btn btn-link text-red-500" onclick="cerrarSesion()">Salir</button>
                </div>
                <h2 id="tituloLista" class="text-2xl font-semibold mb-4">Lista de Permisos</h2>
                <!-- Lista de elementos -->
                <table class="table w-full">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email/Usuario</th>
                            <th>Permiso</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $usuario): ?>
                            <tr>
                                <td><?php echo $usuario['ID']; ?></td>
                                <td><?php echo $usuario['Email_Usuario']; ?></td>
                                <td><?php echo $usuario['Permiso']; ?></td>
                                <td><?php echo $usuario['Estado']; ?></td>
                                <td class="space-x-2">
                                    <button class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-700">Edit</button>
                                    <button class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-700">Elim</button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    
                    
                <!-- Formulario de edición oculto -->
                <div id="formularioEdicion" class="hidden bg-gray-100 p-4 rounded-md my-4">
                    <h1 class="text-2xl font-semibold mb-2">Editar Permiso</h1>
                    <div class="mb-4">
                        <label for="Email" class="block text-gray-700">Email del Usuario</label>
                        <input type="text" id="Email" class="form-input w-full" value="">
                    </div>
                    <div class="mb-4">
                        <label for="rolDeUsuario" class="block text-gray-700">Rol de Usuario</label>
                        <input type="text" id="Rol" class="form-input w-full" value="">
                    </div>
                    <div class="mb-4">
                        <label for="UsuarioActivo" class="block text-gray-700">Usuario Activo</label>
                        <input type="text" id="usuarioActivo" class="form-input w-full" value="">
                    </div>
                    <div class="mb-4 flex">
                        <button class="btn btn-primary w-1/2 mr-2">Guardar Cambios</button>
                        <button class="btn btn-link w-1/2" onclick="ocultarFormulario()">Cerrar</button>
                    </div>
                </div>
            </div>
            <!-- AL DAR CLIC EN MAESTROS DEBE APARECER ESTA TABLA MAESTROS -->
            <div class="w-3/4 p-4 bg-white rounded-lg shadow-md" id="tablaMaestros" style="display: none;">
                <div class="text-right">
                    <button class="btn btn-link text-red-500" onclick="cerrarSesion()">Salir</button>
                </div>
                <h2 id="tituloLista" class="text-2xl font-semibold mb-4">Lista de Maestros</h2>
                <div class="info-lista mb-4">
                    <div class="flex">
                        <button class="btn btn-primary w-1/4 ml-2">Nuevo Maestro</button>
                    </div>
                </div>
                <!-- Lista de elementos -->
                <table class="table w-full">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Dirección</th>
                            <th>Fec. de Nacimiento</th>
                            <th>Clase Asignada</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Datos de la lista se cargarán dinámicamente desde PHP -->
                        <tr>
                            <td>1</td>
                            <td>123456</td>
                            <td>Juan Pérez</td>
                            <td>juan@example.com</td>
                            <td>Dirección 123</td>
                            <td>01/01/1990</td>
                            <td>Matemáticas</td>
                            <td>
                                <button class="btn btn-link text-blue-500" onclick="mostrarFormulario(1)">Edi</button>
                                <button class="btn btn-link text-red-500" onclick="eliminarElemento(1)">Eli</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- Formulario de edición oculto -->
                <div id="formularioEdicion" class="hidden bg-gray-100 p-4 rounded-md my-4">
                    <h1 class="text-2xl font-semibold mb-2">Editar Maestro</h1>
                    <div class="mb-4">
                        <label for="correo" class="block text-gray-700">Correo Electrónico</label>
                        <input type="text" id="correo" class="form-input w-full" value="juan@example.com">
                    </div>
                    <div class="mb-4">
                        <label for="nombre" class="block text-gray-700">Nombre</label>
                        <input type="text" id="nombre" class="form-input w-full" value="Juan Pérez">
                    </div>
                    <div class="mb-4">
                        <label for="direccion" class="block text-gray-700">Dirección</label>
                        <input type="text" id="direccion" class="form-input w-full" value="Dirección 123">
                    </div>
                    <div class="mb-4">
                        <label for="fechaNacimiento" class="block text-gray-700">Fec. de Nacimiento</label>
                        <input type="text" id="fechaNacimiento" class="form-input w-full" value="01/01/1990">
                    </div>
                    <div class="mb-4">
                        <label for="claseAsignada" class="block text-gray-700">Clase Asignada</label>
                        <input type="text" id="claseAsignada" class="form-input w-full" value="Matemáticas">
                    </div>
                    <div class="mb-4 flex">
                        <button class="btn btn-primary w-1/2 mr-2">Guardar Cambios</button>
                        <button class="btn btn-link w-1/2" onclick="ocultarFormulario()">Cerrar</button>
                    </div>
                </div>
                <div id="formularioCreacion" class="hidden bg-gray-100 p-4 rounded-md my-4">
                    <h1 class="text-2xl font-semibold mb-2">Agregar Maestro</h1>
                    <div class="mb-4">
                        <label for="correo" class="block text-gray-700">Correo Electrónico</label>
                        <input type="text" id="correo" class="form-input w-full" value="juan@example.com">
                    </div>
                    <div class="mb-4">
                        <label for= "nombre" class="block text-gray-700">Nombre</label>
                        <input type="text" id="nombre" class="form-input w-full" value="Juan Pérez">
                    </div>
                    <div class="mb-4">
                        <label for="direccion" class="block text-gray-700">Dirección</label>
                        <input type="text" id="direccion" class="form-input w-full" value="Dirección 123">
                    </div>
                    <div class="mb-4">
                        <label for="fechaNacimiento" class="block text-gray-700">Fec. de Nacimiento</label>
                        <input type="text" id="fechaNacimiento" class="form-input w-full" value="01/01/1990">
                    </div>
                    <div class="mb-4">
                        <label for="claseAsignada" class="block text-gray-700">Asignar Clase</label>
                        <input type="text" id="clase" class="form-input w-full" value="">
                    </div>
                    <div class="mb-4 flex">
                        <button class="btn btn-primary w-1/2 mr-2">Crear</button>
                        <button class="btn btn-link w-1/2" onclick="ocultarFormulario('crear')">Cerrar</button>
                    </div>
                </div>
            </div>
            <!-- AL DAR CLIC EN CLASES DEBE APARECER ESTA TABLA CLASES -->
            <div class="w-3/4 p-4 bg-white rounded-lg shadow-md" id="tablaClases" style="display: none;">
                <div class="text-right">
                    <button class="btn btn-link text-red-500" onclick="cerrarSesion()">Salir</button>
                </div>
                <h2 id="tituloLista" class="text-2xl font-semibold mb-4">Lista de Clases</h2>
                <div class="info-lista mb-4">
                    <div class="flex">
                        <button class="btn btn-primary w-1/4 ml-2">Nueva Clase</button>
                    </div>
                </div>
                <!-- Lista de elementos -->
                <table class="table w-full">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Clase</th>
                            <th>Maestro</th>
                            <th>Alumnos Inscritos</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Datos de la lista se cargarán dinámicamente desde PHP -->
                    </tbody>
                </table>
                <!-- Formulario de edición oculto -->
                <div id="formularioEdicion" class="hidden bg-gray-100 p-4 rounded-md my-4">
                    <h1 class="text-2xl font-semibold mb-2">Editar Clase</h1>
                    <div class="mb-4">
                        <label for="Clase" class="block text-gray-700">Nombre de la Materia</label>
                        <input type="text" id="clase" class="form-input w-full" value="juan@example.com">
                    </div>
                    <div class="mb-4">
                        <label for="Maestro" class="block text-gray-700">Maestro Asignado</label>
                        <input type="text" id="nombre" class="form-input w-full" value="Juan Pérez">
                    </div>
                    <div class="mb-4 flex">
                        <button class="btn btn-primary w-1/2 mr-2">Guardar Cambios</button>
                        <button class="btn btn-link w-1/2" onclick="ocultarFormulario()">Cerrar</button>
                    </div>
                </div>
                
                <div id= "formularioCreacion" class="hidden bg-gray-100 p-4 rounded-md my-4">
                    <h1 class="text-2xl font-semibold mb-2">Agregar Clase</h1>
                    <div class="mb-4">
                        <label for="Clase" class="block text-gray-700">Nombre de la Materia</label>
                        <input type="text" id="clase" class="form-input w-full" value="juan@example.com">
                    </div>
                    <div class="mb-4">
                        <label for= "Maestro" class="block text-gray-700">Maestro disponible para la clase</label>
                        <input type="text" id="maestro" class="form-input w-full" value="Juan Pérez">
                    </div>
                    <div class="mb-4 flex">
                        <button class="btn btn-primary w-1/2 mr-2">Crear</button>
                        <button class="btn btn-link w-1/2" onclick="ocultarFormulario('crear')">Cerrar</button>
                    </div>
                </div>
            </div>
            
            <!-- AL DAR CLIC EN ALUMNOS DEBE APARECER ESTA TABLA ALUMNOS -->
            <div class="w-3/4 p-4 bg-white rounded-lg shadow-md" id="tablaAlumnos" style="display: none;">
                <div class="text-right">
                    <button class="btn btn-link text-red-500" onclick="cerrarSesion()">Salir</button>
                </div>
                <h2 id="tituloLista" class="text-2xl font-semibold mb-4">Lista de Alumnos</h2>
                <div class="info-lista mb-4">
                    <div class="flex">
                        <button class="btn btn-primary w-1/4 ml-2">Nuevo alumno</button>
                    </div>
                </div>
                <!-- Lista de elementos -->
                <table class="table w-full">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Dirección</th>
                            <th>Fec. de Nacimiento</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Datos de la lista se cargarán dinámicamente desde PHP -->
                    </tbody>
                </table>
                
                <!-- Formulario de edición oculto -->
                <div id="formularioEdicion" class="hidden bg-gray-100 p-4 rounded-md my-4">
                    <h1 class="text-2xl font-semibold mb-2">Editar Alumno</h1>
                    <div class="mb-4">
                        <label for="DNI" class="block text-gray-700">DNI</label>
                        <input type="text" id="DNI" class="form-input w-full" value="">
                    </div>
                    <div class="mb-4">
                        <label for="correo" class="block text-gray-700">Correo Electrónico</label>
                        <input type="text" id="correo" class="form-input w-full" value="">
                    </div>
                    <div class="mb-4">
                        <label for="nombre" class="block text-gray-700">Nombre</label>
                        <input type="text" id="nombre" class="form-input w-full" value="">
                    </div>
                    <div class="mb-4">
                        <label for="direccion" class="block text-gray-700">Dirección</label>
                        <input type="text" id="direccion" class="form-input w-full" value="">
                    </div>
                    <div class="mb-4">
                        <label for="fechaNacimiento" class="block text-gray-700">Fec. de Nacimiento</label>
                        <input type="text" id="fechaNacimiento" class="form-input w-full" value="">
                    </div>
                    <div class="mb-4 flex">
                        <button class="btn btn-primary w-1/2 mr-2">Guardar Cambios</button>
                        
                        <button class="btn btn-link w-1/2" onclick="ocultarFormulario()">Cerrar</button>
                    </div>
                </div>
                
                <div id="formularioCreacion" class="hidden bg-gray-100 p-4 rounded-md my-4">
                    <h1 class="text-2xl font-semibold mb-2">Agregar Alumno</h1>
                    <div class="mb-4">
                        <label for="DNI" class="block text-gray-700">DNI</label>
                        <input type="text" id="DNI" class="form-input w-full" value="">
                    </div>
                    <div class="mb-4">
                        <label for="correo" class="block text-gray-700">Correo Electrónico</label>
                        <input type="text" id="correo" class="form-input w-full" value="juan@example.com">
                    </div>
                    <div class="mb-4">
                        <label for= "nombre" class="block text-gray-700">Nombre</label>
                        <input type="text" id="nombre" class="form-input w-full" value="Juan Pérez">
                    </div>
                    <div class="mb-4">
                        <label for="direccion" class="block text-gray-700">Dirección</label>
                        <input type="text" id="direccion" class="form-input w-full" value="Dirección 123">
                    </div>
                    <div class="mb-4">
                        <label for="fechaNacimiento" class="block text-gray-700">Fec. de Nacimiento</label>
                        <input type="text" id="fechaNacimiento" class="form-input w-full" value="01/01/1990">
                    </div>
                    <div class="mb-4 flex">
                        <button class="btn btn-primary w-1/2 mr-2">Crear</button>
                        <button class="btn btn-link w-1/2" onclick="ocultarFormulario('crear')">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Obtén botones y tablas
            var btnUsuarios = document.getElementById('btnUsuarios');
            var btnMaestros = document.getElementById('btnMaestros');
            var btnAlumnos = document.getElementById('btnAlumnos');
            var btnClases = document.getElementById('btnClases');
            
            var tablaPermisos = document.getElementById('tablaPermisos');
            var tablaMaestros = document.getElementById('tablaMaestros');
            var tablaAlumnos = document.getElementById('tablaAlumnos');
            var tablaClases = document.getElementById('tablaClases');
            
            // Agrega controladores de eventos a los botones
            btnUsuarios.addEventListener('click', function() {
                ocultarTodasLasTablas();
                tablaPermisos.style.display = 'block';
            });
            btnMaestros.addEventListener('click', function() {
                ocultarTodasLasTablas();
                tablaMaestros.style.display = 'block';
            });
            btnAlumnos.addEventListener('click', function() {
                ocultarTodasLasTablas();
                tablaAlumnos.style.display = 'block';
            });
            btnClases.addEventListener('click', function() {
                ocultarTodasLasTablas();
                tablaClases.style.display = 'block';
            });
            
            // Función para ocultar todas las tablas
            function ocultarTodasLasTablas() {
                tablaPermisos.style.display = 'none';
                tablaMaestros.style.display = 'none';
                tablaAlumnos.style.display = 'none';
                tablaClases.style.display = 'none';
            }
        });
    </script>

</body>
</html>

