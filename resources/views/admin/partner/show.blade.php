@extends('admin.layouts.default')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-8">
            <h1>Detalle Socio</h1>
        </div>
        <div class="w-100"></div>
        <div class="col-8 my-auto">
            <ul class="list-group">
                <li class="list-group-item active text-center">{{$partner->first_name. ' '.$partner->first_surname}}
                </li>
                <li class="list-group-item">Rut: {{$partner->rut}}</li>
                <li class="list-group-item">P. Nombre: {{$partner->first_name}}</li>
                <li class="list-group-item">S. Nombre: {{$partner->second_name}}</li>
                <li class="list-group-item">A. Paterno: {{$partner->first_surname}}</li>
                <li class="list-group-item">A. Materno: {{$partner->second_surname}}</li>
                <li class="list-group-item">Fono: {{$partner->phone}}</li>
                <li class="list-group-item">Email personal: {{$partner->personal_email}}</li>
                <li class="list-group-item">Fecha nacimiento: {{$partner->birthday}}</li>
                <li class="list-group-item">Domicilio: {{$partner->address}}</li>
                <li class="list-group-item">Region: {{$partner->region->name}}</li>
                <li class="list-group-item">Cargas: {{$partner->social_charges}}</li>
                <li class="list-group-item">Estado Civil: {{$partner->civil_status->name}}</li>
                <li class="list-group-item">Oficina: {{$partner->office->name}}</li>
            </ul>
            <div class="row no-gutters">
                <div class="col">
                    <a href="{{route('partner.edit', $partner->id)}}" class="btn btn-success btn-block">editar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection