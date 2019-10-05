@extends('admin.layouts.default')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-8">
            <h1>Editar socio</h1>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        <div class="w-100"></div>
        <div class="col-8 my-auto">
            <form method="POST" action="{{route('partner.update', $partner->id)}}">
                @method('PUT')
                @csrf
                <!-- rut -->
                <div class="form-group">
                    <label for="rut">Rut</label>
                    <input id="rut" class="form-control" type="text" name="rut" value="{{old('rut', $partner->rut)}}"
                        placeholder="">
                </div>
                <!-- first name -->
                <div class="form-group">
                    <label for="first_name">Primer nombre</label>
                    <input id="first_name" class="form-control" type="text" name="first_name"
                        value="{{old('first_name', $partner->first_name)}}" placeholder="">
                </div>
                <!-- second name -->
                <div class="form-group">
                    <label for="second_name">Segundo nombre</label>
                    <input id="second_name" class="form-control" type="text" name="second_name"
                        value="{{old('second_name', $partner->second_name)}}" placeholder="">
                </div>
                <!-- first surname-->
                <div class="form-group">
                    <label for="first_surname">Apellido paterno</label>
                    <input id="first_surname" class="form-control" type="text" name="first_surname"
                        value="{{old('first_surname', $partner->first_surname)}}" placeholder="">
                </div>
                <!-- second surname -->
                <div class="form-group">
                    <label for="second_surname">Apellido materno</label>
                    <input id="second_surname" class="form-control" type="text" name="second_surname"
                        value="{{old('second_surname', $partner->second_surname)}}" placeholder="">
                </div>
                <!-- phone -->
                <div class="form-group">
                    <label for="phone">Fono</label>
                    <input id="phone" class="form-control" type="text" name="phone"
                        value="{{old('phone', $partner->phone)}}" placeholder="">
                </div>
                <!-- email personal -->
                <div class="form-group">
                    <label for="personal_email">Email personal</label>
                    <input id="personal_email" class="form-control" type="email" name="personal_email"
                        value="{{old('personal_email', $partner->personal_email)}}" placeholder="">
                </div>
                <!-- fecha nacimiento -->
                <div class="form-group">
                    <label for="birthday">Fecha nacimiento</label>
                    <input id="birthday" class="form-control" type="date" name="birthday"
                        value="{{old('birthday', $partner->birthday)}}" placeholder="">
                </div>
                <!-- social charges -->
                <div class="form-group">
                    <label for="social_charges">Cargas</label>
                    <input id="social_charges" class="form-control" type="text" name="social_charges"
                        value="{{old('social_charges', $partner->social_charges)}}" placeholder="">
                </div>
                <!-- civil status -->
                <div class="form-group">
                    <label for="civil_status_id">Estado civil</label>
                    <select id="civil_status_id" class="form-control" name="civil_status_id">
                        @foreach ($civilStatuses as $civil)
                        @if (old('civil_status_id', $partner->civil_status_id) == $civil['id'])
                        <option value="{{$civil['id']}}" selected>{{$civil['name']}}</option>
                        @else
                        <option value="{{$civil['id']}}">{{$civil['name']}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <!-- region -->
                <div class="form-group">
                    <label for="region_id">Region</label>
                    <select id="region_id" class="form-control" name="region_id">
                        @foreach ($regions as $region)
                        @if (old('region_id', $partner->region_id) == $region['id'])
                        <option value="{{ $region['id']}}" selected>{{$region['name']}}</option>
                        @else
                        <option value="{{ $region['id']}}">{{$region['name']}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <!-- address -->
                <div class="form-group">
                    <label for="address">Dirección</label>
                    <input id="address" class="form-control" type="text" name="address"
                        value="{{old('address', $partner->address)}}" placeholder="">
                </div>
                <!-- corporate email -->
                <div class="form-group">
                    <label for="corporative_email">Email corporativo</label>
                    <input id="corporative_email" class="form-control" type="email" name="corporative_email"
                        value="{{old('corporative_email', $partner->corporative_email)}}" placeholder="">
                </div>
                <!-- office -->
                <div class="form-group">
                    <label for="office_id">Oficina</label>
                    <select id="office_id" class="form-control" name="office_id">
                        @foreach ($offices as $office)
                        @if ( old('office_id', $partner->office_id) == $office['id'])
                        <option value="{{$office['id']}}" selected>{{$office['name']}}</option>
                        @else
                        <option value="{{$office['id']}}">{{$office['name']}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <!-- date admission -->
                <div class="form-group">
                    <label for="date_admission">Fecha ingreso sindicato</label>
                    <input id="date_admission" class="form-control" type="date" name="date_admission"
                        value="{{old('date_admission', $partner->date_admission)}}" placeholder="">
                </div>
                <!-- partner status / con role auth -->
                @if (auth()->user()->role->id < 3) 
                    <div class="form-group">
                        <label for="partner_status_id">Estado</label>
                        <select id="partner_status_id" class="form-control" name="partner_status_id">
                            @foreach ($partnerStatuses as $pstatus)
                                @if ( old('partner_status_id', $partner->partner_status_id) == $pstatus->id)
                                    <option value="{{$pstatus->id}}" selected>{{$pstatus->name}}</option>
                                @else
                                    <option value="{{$pstatus->id}}">{{$pstatus->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                @endif
                <!-- submit -->
                <div class="row no-gutters">
                    <div class="col-12">
                        <button type="submit" class="btn btn-success btn-lg btn-block">guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection