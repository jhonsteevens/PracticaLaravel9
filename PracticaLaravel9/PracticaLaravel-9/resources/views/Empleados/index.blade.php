@extends('layout')
@section('titulo', 'principal')
@section('contenido')
<h1>{{$titulo}}</h1>

<br>
<!-- Botón Modal CREAR EMPLEADO-->
<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <a class="btn btn-primary" data-toggle="modal" data-target="#crearEmpleadoModal"><i class="fas fa-user-plus"></i> Nuevo Registro</a>
    </div>
</div>

<!-- Modal CREAR EMPLEADO-->
<div class="modal fade" id="crearEmpleadoModal" tabindex="-1" role="dialog" aria-labelledby="crearEmpleadoModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Empleado</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{route('empleadoGuardar')}}" method="post">
                <div class="modal-body">
                    @csrf

                    <!-- @if($errors->any())
                            @foreach($errors->all() as $error)
                                <p>{{$error}}</p>
                            @endforeach
                        @endif -->

                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese el nombre" value="{{old('nombre')}}">
                        <small class="text-danger">{{$errors->first('nombre')}}</small>
                    </div>
                    <div class="form-group">
                        <label for="edad">Edad</label>
                        <input type="number" class="form-control" name="edad" id="edad" placeholder="Ingrese su edad" value="{{old('edad')}}">
                        <small class="text-danger">{{$errors->first('edad')}}</small>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <textarea class="form-control" name="direccion" id="direccion" rows="2">{{old('direccion')}}</textarea>
                        <small class="text-danger">{{$errors->first('direccion')}}</small>

                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="ingrese un email" value="{{old('email')}}">
                        <small class="text-danger">{{$errors->first('correo')}}</small>
                    </div>

                    <div class="form-group">
                        <label for="idCargo">Cargo</label>
                        <select class="form-control" name="idCargo" id="idCargo">
                            @forelse($cargos as $cargo)
                            <option value="{{$cargo->id}}">{{$cargo->nombre}}</option>
                            @empty
                            <option>No existen</option>
                            @endforelse
                        </select>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- FIN Modal CREAR EMPLEADO-->
<br>

@if (session('mensaje'))
<div class="alert alert-success">
    {{ session('mensaje') }}
</div>
@endif

<br>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Cargo</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($empleados as $empleado)
        <tr>
            <th scope="row">{{$empleado->id}}</th>
            <td>{{$empleado->nombre}}</td>
            <td>{{$empleado->email}}</td>
            <td>{{$empleado->cargoEmpleado->nombre}}</td>
            <td>
                <form action="#" method="post">
                    <a href="#"><i class="fas fa-info-circle fa-lg text-success"></i></a>
                    <a href="#"><i class="fas fa-user-edit fa-lg" style="margin-left: 20px; margin-right: 20px;"></i></a>

                    @csrf @method('DELETE')
                    <button type="submit " style="border: none"><i class="fas fa-trash-alt fa-lg text-danger"></i></button>
                </form>
            </td>
        </tr>
        @empty
        No hay empleados
        @endforelse
    </tbody>
</table>
<div class="d-flex justify-content-center">
    {{ $empleados->links() }}
</div>
@endsection()
@section('scripts')
@if($errors->any())
<script>
    $(document).ready(function() {
        $('#crearEmpleadoModal').modal('show')
    })
</script>
@endif
@endsection