@extends('admin.layouts.default')

@section('content')
<div class="container-fluid py-5">
    <div class="row">
        <div class="col-8">
            <h1>Bienvenido a Gestion de Tu Sindicato Consorcio</h1>
        </div>
        <div class="col-2">
            <a class="btn btn-success btn-block btn-lg" href="{{route('newsletter.create')}}">Enviar mensaje</a>
        </div>
        <div class="col-2">
            <a class="btn btn-primary btn-block btn-lg" href="{{route('partner.create')}}">Crear nuevo usuario</a>
        </div>
        <div class="w-100 mb-4"></div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="table-partners" class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Rut</th>
                                <th scope="col">Primer Nombre</th>
                                <th scope="col">Primer Apellido</th>
                                <th scope="col">Fono Personal</th>
                                <th scope="col">Email Personal</th>
                                <th scope="col">Oficina</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($partners as $partner)
                            <tr>
                                <th scope="row">{{$partner->id}}</th>
                                <td>{{$partner->rut}}</td>
                                <td>{{$partner->first_name}}</td>
                                <td>{{$partner->first_surname}}</td>
                                <td>{{$partner->phone}}</td>
                                <td>{{$partner->personal_email}}</td>
                                <td>{{$partner->office->name}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{route('partner.show', $partner->id)}}"
                                            class="btn btn-primary">ver</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection