<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Tarea</title>
    @vite('resources/css/app.css')
    <!-- Aquí puedes añadir estilos CSS o vincular a archivos CSS si los tienes -->
</head>
<body>
    <h1>Añadir Tarea</h1>
    <!-- Muestra mensajes de éxito si los hay -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Muestra errores de validación si los hay -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <img class="rounded-t-lg" src="https://i.blogs.es/a79716/filtros-naturaleza-nueva/450_1000.webp" alt="" />
            </a>
            <div class="p-5" >
                <form action="{{ route('añadirTareas') }}" method="post">
                    @csrf  <!-- Directiva CSRF para seguridad -->
        
                    <div class="form-group">
                        <label for="nombre">Nombre de la Tarea:</label>
                        <input type="text" name="nombre" id="nombre" required>
                    </div>
        
                    <div class="form-group">
                        <label for="fecha_inicio">Fecha de Inicio:</label>
                        <input type="date" name="fecha_inicio" id="fecha_inicio" required>
                    </div>
        
                    <div class="form-group">
                        <label for="fecha_fin">Fecha de Finalización:</label>
                        <input type="date" name="fecha_fin" id="fecha_fin" required>
                    </div>
        
                    <div class="form-group">
                        <label for="asignado_a">Asignado a:</label>
                        <input type="text" name="asignado_a" id="asignado_a" required>
                    </div>
        
                    <button type="submit" background-color="blue">Añadir Tarea</button>
          </form>
    </div>
</body>
</html>

