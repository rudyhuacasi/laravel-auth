@extends('layouts.app')

@section('content')
<div class="container my-5">

    <h1>Crea un nuovo project</h1>

    <a href="{{route('admin.projects.index')}}" class="btn btn-success my-5">torna alla lista dei proje</a>

    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{route('admin.projects.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="title">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Contenuto</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="content"></textarea>
        </div>
        <button class="btn btn-primary">Crea nuovo project</button>
    </form>

</div>
@endsection