@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1>{{$project->title}}</h1>

    <p class="my-5">{{$project->content}}</p>

    <a href="{{route('admin.projects.index')}}" class="btn btn-success">torna alla lista dei project</a>

</div>
@endsection