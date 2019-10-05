@extends('admin.layouts.default')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-8">
            <h1>Crear Socio</h1>
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
            <form method="POST" action="{{route('partner.store')}}">
                @csrf
                <!-- rut -->
                <div class="form-group">
                    <label for="rut">Rut</label>
                    <input id="rut" class="form-control" type="text" name="rut" value="{{old('rut')}}" placeholder="">
                </div>
                <!-- first name -->
                <div class="form-group">
                    <label for="first_name">Primer nombre</label>
                    <input id="first_name" class="form-control" type="text" name="first_name"
                        value="{{old('first_name')}}" placeholder="">
                </div>
                <!-- second name -->
                <div class="form-group">
                    <label for="second_name">Segundo nombre</label>
                    <input id="second_name" class="form-control" type="text" name="second_name"
                        value="{{old('second_name')}}" placeholder="">
                </div>
                <!-- first surname-->
                <div class="form-group">
                    <label for="first_surname">Apellido paterno</label>
                    <input id="first_surname" class="form-control" type="text" name="first_surname"
                        value="{{old('first_surname')}}" placeholder="">
                </div>
                <!-- second surname -->
                <div class="form-group">
                    <label for="second_surname">Apellido materno</label>
                    <input id="second_surname" class="form-control" type="text" name="second_surname"
                        value="{{old('second_surname')}}" placeholder="">
                </div>
                <!-- phone -->
                <div class="form-group">
                    <label for="phone">Fono</label>
                    <input id="phone" class="form-control" type="text" name="phone" value="{{old('phone')}}"
                        placeholder="">
                </div>
                <!-- email personal -->
                <div class="form-group">
                    <label for="personal_email">Email personal</label>
                    <input id="personal_email" class="form-control" type="email" name="personal_email"
                        value="{{old('personal_email')}}" placeholder="">
                </div>
                <!-- fecha nacimiento -->
                <div class="form-group">
                    <label for="birthday">Fecha nacimiento</label>
                    <input id="birthday" class="form-control" type="date" name="birthday" value="{{old('birthday')}}"
                        placeholder="">
                </div>
                <!-- social charges -->
                <div class="form-group">
                    <label for="social_charges">Cargas</label>
                    <input id="social_charges" class="form-control" type="text" name="social_charges"
                        value="{{old('social_charges')}}" placeholder="">
                </div>
                <!-- civil status -->
                <div class="form-group">
                    <label for="civil_status_id">Estado civil</label>
                    <select id="civil_status_id" class="form-control" name="civil_status_id">
                        @foreach ($civilStatuses as $status)
                        <option value="{{$status['id']}}" {{(old('civil_status_id')==$status['id'])? 'selected':''}}>{{$status['name']}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <!-- region -->
                <div class="form-group">
                    <label for="region_id">Region</label>
                    <select id="region_id" class="form-control" name="region_id">
                        @foreach ($regions as $region)
                        <option value="{{$region['id']}}" {{(old('region_id')==$region['id']) ? 'selected':''}}>
                            {{$region['name']}}</option>
                        @endforeach
                    </select>
                </div>
                <!-- address -->
                <div class="form-group">
                    <label for="address">Dirección</label>
                    <input id="address" class="form-control" type="text" name="address" value="{{old('address')}}"
                        placeholder="">
                </div>
                <!-- corporate email -->
                <div class="form-group">
                    <label for="corporative_email">Email corporative</label>
                    <input id="corporative_email" class="form-control" type="email" name="corporative_email"
                        value="{{old('corporative_email')}}" placeholder="">
                </div>
                <!-- office -->
                <div class="form-group">
                    <label for="office_id">Oficina</label>
                    <select id="office_id" class="form-control" name="office_id">
                        @foreach ($offices as $office)
                        <option value="{{$office['id']}}" {{(old('office_id')==$office['id'])? 'selected':''}}>
                            {{$office['name']}}</option>
                        @endforeach
                    </select>
                </div>
                <!-- date admission -->
                <div class="form-group">
                    <label for="date_admission">Fecha ingreso sindicato</label>
                    <input id="date_admission" class="form-control" type="date" name="date_admission"
                        value="{{old('date_admission')}}" placeholder="">
                </div>
                <!-- partner status active -->
                <input id="partner_status_id" type="hidden" name="partner_status_id" value="1">
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