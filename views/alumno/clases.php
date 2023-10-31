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
                    <p class="mt-2 text-gray-700">ALUMNO</p>
                </div>
                
                <hr class="my-4">
                <h4 class="text-lg font-semibold mb-4">Menú Alumno</h4>
                <ul class="space-y-2">
                    <li>
                        <button class="btn btn-link" id="btnPerfil">Ver perfil</button>
                    </li>
                    <li>
                        <button class="btn btn-link" id="btnVerCalificaciones">Ver Calificaciones</button>
                    </li>
                    <li>
                        <button class="btn btn-link" id="btnAdministraTusClases">Administra tus Clases</button>
                    </li>

                </ul>
            </div>
            <!-- Div derecho para la lista -->
            <div class="w-3/4 p-4 bg-white rounded-lg shadow-md">
            <div class="text-right">
                    <button class="btn btn-link text-red-500" onclick="cerrarSesion()">Salir</button>
                </div>
                <h2 id="tituloLista" class="text-2xl font-semibold mb-4">Clases</h2>

                <!-- Lista de elementos -->
                <table class="table w-full">
                    <thead>
                        <tr>
                            <th>Mateia</th>
                            <th>Darse de baja</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Datos de la lista se cargarán dinámicamente desde PHP -->
                    </tbody>
                </table>
                <!-- Formulario de edición oculto -->
                <div id="formularioEdicion" class="hidden bg-gray-100 p-4 rounded-md my-4">
                    <h1 class="text-2xl font-semibold mb-2">materias para inscribir</h1>
                    <div class="mb-4">
                        <label for="clase" class="block text-gray-700">Escribe la Clase</label>
                        <input type="text" id="Clase" class="form-input w-full" value="">
                    </div>

                    <div class="mb-4 flex">
                     <button class="btn btn-primary w-1/2 mr-2">inscribir</button>
                    </div>
                </div>
            
        </div>
    </div>


</body>
</html>
