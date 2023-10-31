<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Plataforma Virtual</title>
    <!-- Incluye los estilos de Tailwind CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css">
    <!-- Agrega aquí tus propios estilos CSS si es necesario -->
</head>
<body class="bg-gray-200 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-96">
    <img src="/assets/logo.jpg" alt="Imagen del Admin" class="w-16 h-16 rounded-full mx-auto">
        <h2 class="text-2xl font-semibold mb-4">Iniciar Sesión</h2>
        <form action="/models/auth.php" method="POST" class="space-y-4">
            <div>
                <label for="email" class="block text-gray-600">Correo Electrónico</label>
                <input type="email" id="email" name="email" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500" required>
            </div>
            <div>
                <label for="password" class="block text-gray-600">Contraseña</label>
                <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500" required>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white rounded py-2">Iniciar Sesión</button>
        </form>
        <p class="text-center text-sm text-gray-500 mt-4">¿No tienes una cuenta? <a href="/registro" class="text-blue-500">Regístrate</a></p>
    </div>
</body>
</html>
