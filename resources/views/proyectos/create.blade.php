<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <strong>{{ __('NUEVO PROYECTO') }}</strong>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100 overflow-auto">
                    <div class="d-flex flex-column align-items-center justify-content-center">
                        
                        <form class="w-50" action="{{ route('proyectos.store') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="NombreProyecto" name="NombreProyecto" placeholder="Nombre del proyecto" value="{{ old('NombreProyecto') }}">
                                <label for="NombreProyecto">Nombre del proyecto</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="FuenteFondos" name="FuenteFondos" placeholder="Fuente de fondos" value="{{ old('FuenteFondos' )}}">
                                <label for="FuenteFondos">Fuente de fondos</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="MontoPlanificado" name="MontoPlanificado" placeholder="Monto planificado" value="{{ old('MontoPlanificado') }}">
                                <label for="MontoPlanificado">Monto planificado</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="MontoPatrocinado" name="MontoPatrocinado" placeholder="Monto patrocinado" value="{{ old('MontoPatrocinado')}}">
                                <label for="MontoPatrocinado">Monto patrocinado</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="MontoFondosPropios" name="MontoFondosPropios" placeholder="Monto fondos propios" value="{{ old('MontoFondosPropios')}}">
                                <label for="MontoFondosPropios">Monto fondos propios</label>
                            </div>
                            <div class="d-flex justify-content-center mb-3">
                                <button class="btn btn-outline-primary" type="submit">GUARDAR</button>
                            </div>
                            

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>