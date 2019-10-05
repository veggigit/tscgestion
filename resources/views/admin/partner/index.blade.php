@extends('admin.layouts.default')

@section('content')
<div class="container-fluid py-5">
    <div class="row">
        <div class="col-8">
            <h1>Bienvenido a Gestion de Tu Sindicato Consorcio</h1>
        </div>
        <div class="col-4">
            <a class="btn btn-success btn-block btn-lg" href="{{route('partner.create')}}">crear nuevo usuario</a>
        </div>
        <div class="w-100 mb-4"></div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Rut</th>
                                <th scope="col">Primer Nombre</th>
                                <!-- <th scope="col">Segundo Nombre</th> -->
                                <th scope="col">Primer Apellido</th>
                                <!-- <th scope="col">Segundo Apellido</th> -->
                                <th scope="col">Fono Personal</th>
                                <th scope="col">Email Personal</th>
                                <!-- <th scope="col">Cumpleaños</th> -->
                                <!-- <th scope="col">Direccion</th> -->
                                <!-- <th scope="col">Cargas</th> -->
                                <!-- <th scope="col">Estado Civil</th> -->
                                <!-- <th scope="col">Region</th> -->
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
                                {{-- <td>{{$partner->second_name}}</td> --}}
                                <td>{{$partner->first_surname}}</td>
                                {{-- <td>{{$partner->second_surname}}</td> --}}
                                <td>{{$partner->phone}}</td>
                                <td>{{$partner->personal_email}}</td>
                                {{-- <td>{{$partner->birthday}}</td> --}}
                                {{-- <td>{{$partner->address}}</td> --}}
                                {{-- <td>{{$partner->social_charges}}</td> --}}
                                {{-- <td>{{$partner->civil_status->name}}</td> --}}
                                {{-- <td>{{$partner->region->name}}</td> --}}
                                <td>{{$partner->office->name}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{route('partner.show', $partner->id)}}"
                                            class="btn btn-primary">ver</a>
                                        {{-- <a href="" class="btn btn-success">editar</a> --}}
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="w-100"></div>
    <span>{{$partners->links()}}</span>
    </div>
</div>
@endsection