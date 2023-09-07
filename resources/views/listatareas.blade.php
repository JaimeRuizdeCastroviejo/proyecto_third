<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tareas</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans">

    <div class="container mx-auto mt-10 p-4 bg-white rounded shadow-md">
        <h1 class="text-2xl font-bold mb-4">Lista de Tareas</h1>

        @if(count($tareas) > 0)
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">Nombre</th>
                        <th class="px-4 py-2">Fecha de Inicio</th>
                        <th class="px-4 py-2">Fecha de Finalización</th>
                        <th class="px-4 py-2">Asignado a</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tareas as $tarea)
                        <tr class="{{ $loop->odd ? 'bg-gray-100' : 'bg-white' }}">
                            <td class="border px-4 py-2">{{ $tarea->nombre }}</td>
                            <td class="border px-4 py-2">{{ $tarea->fecha_inicio }}</td>
                            <td class="border px-4 py-2">{{ $tarea->fecha_fin }}</td>
                            <td class="border px-4 py-2">{{ $tarea->asignado_a }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('tarea.editar', $tarea->id) }}" class="bg-blue-500 text-black px-3 py-1 rounded">Actualizar</a>
                                <a href="{{ route('tarea.borrar', $tarea->id) }}" class="bg-red-500 text-white px-3 py-1 rounded">Borrar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-red-500">No hay tareas registradas aún.</p>
        @endif
    </div>
</body>
</html>
