@extends('admin.layouts.default')

@section('content')

<div class="container py-5">

    @if (session('newsletter-ok'))
    <div class="alert alert-success">
        {{ session('newsletter-ok') }}
    </div>
    @elseif($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{route('newsletter.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="sender_name" value="{{auth()->user()->name}}">
        <input type="hidden" name="sender_email" value="{{auth()->user()->email}}">
        <div class="form-group">
            <label for="to">Para</label>
            <select id="to" class="form-control" name="to">
                <option value="1">Test</option>
                <option value="2">Socios Santiago</option>
                <option value="3">Socios Regiones</option>
            </select>
        </div>
        <div class="form-group">
            <label for="subject">Asunto</label>
            <input id="subject" class="form-control" type="text" name="subject" value="{{old('subject')}}">
        </div>
        <div class="form-group">
            <label for="title">Titulo</label>
            <input id="title" class="form-control" type="text" name="title" value="{{old('title')}}">
        </div>
        <div class="form-group">
            <label for="body">Mensaje</label>
            <textarea id="body" class="form-control" name="body" rows="3">{{old('body')}}</textarea>
        </div>
        <div class="form-group">
            <label for="img">Subir imagen</label>
            <input type="file" class="form-control-file" id="img" name="img">
        </div>
        <div class="form-group">
            <label for="link">Link a más info</label>
            <input id="link" class="form-control" type="text" name="link" value="{{old('link')}}">
        </div>
        <button class="btn btn-success btn-lg" type="submit">Enviar</button>
    </form>
</div>

@endsection