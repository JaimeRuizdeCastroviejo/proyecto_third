<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarea</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans">

    <div class="container mx-auto mt-10 p-4 bg-white rounded shadow-md">
        <h1 class="text-2xl font-bold mb-4">Editar Tarea</h1>

        @if(session('error'))
            <div class="bg-red-500 text-white p-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('tarea.actualizar', $tarea->id) }}" method="post">
            @csrf

            <div class="mb-4">
                <label for="nombre" class="block text-sm font-bold mb-2">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="{{ $tarea->nombre }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="fecha_inicio" class="block text-sm font-bold mb-2">Fecha de Inicio:</label>
                <input type="date" id="fecha_inicio" name="fecha_inicio" value="{{ $tarea->fecha_inicio }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="fecha_fin" class="block text-sm font-bold mb-2">Fecha de Fin:</label>
                <input type="date" id="fecha_fin" name="fecha_fin" value="{{ $tarea->fecha_fin }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="asignado_a" class="block text-sm font-bold mb-2">Asignado a:</label>
                <input type="text" id="asignado_a" name="asignado_a" value="{{ $tarea->asignado_a }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Actualizar Tarea
                </button>
                <a href="{{ route('consultarTareas') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                    Regresar a la lista de tareas
                </a>
            </div>

        </form>
    </div>

</body>
</html>
