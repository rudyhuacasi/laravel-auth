@extends('layouts.app')

@section('content')
<div class="container my-5">

    <h1>Aggiona project</h1>

    <a href="{{route('admin.projects.index')}}" class="btn btn-success my-5">torna alla lista dei project</a>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{route('admin.projects.update', $project)}}" method="post">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="{{ old('title', $project->title)}}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Contenuto</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="content">{{ old('content', $project->content)}}</textarea>
        </div>
        <button class=" btn btn-primary">Aggiorn post</button>
    </form>

</div>
@endsection