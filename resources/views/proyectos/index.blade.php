<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Proyectos') }}
        </h2>
    </x-slot>
    
        
   
        
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="d-flex flex-row align-items-center justify-content-between">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <strong>{{ __('ÁREA DE PROYECTOS') }}</strong>
                    </div>
                    <div>
                        <a class="btn btn-outline-primary mx-3" href="{{route('proyectos.create')}}">NUEVO PROYECTO</a>
                    </div>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100 overflow-auto">
                    <table class="table table-striped">
                        <thead class="bg-dark-subtle">
                            <tr>
                                <th>ID</th>
                                <th>PROYECTO</th>
                                <th>FUENTE FONDOS</th>
                                <th>MONTO PLANIFICADO</th>
                                <th>MONTO PATROCINADO</th>
                                <th>MONTO FONDOS PROPIOS</th>
                                <th>ACCIONES</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($proyectos as $proyecto)
                                <tr>
                                    <td>{{ $proyecto->id }}</td>
                                    <td>{{ $proyecto->NombreProyecto }}</td>
                                    <td>{{ $proyecto->FuenteFondos }}</td>
                                    <td>${{ $proyecto->MontoPlanificado }}</td>
                                    <td>${{ $proyecto->MontoPatrocinado }}</td>
                                    <td>${{ $proyecto->MontoFondosPropios }}</td>
                                    <td><a href="{{ route('proyectos.edit', $proyecto->id) }}">Editar</a></td>
                                    <td><form action="{{ route('proyectos.destroy', $proyecto->id) }}" method="POST">
                                            @method("DELETE")
                                            @csrf
                                            <button type="submit">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="6">No hay información para mostrar</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>