@extends('layouts.master')

@section('master')
  <div class="row">
    <div class="container">
      <div class="row">
	<div class="col-md-7 mx-auto">
	  <h1 class="todos-title">Todos</h1>
    {!! Form::model($todo, ['route' => ['todos.update', $todo->id], 'method' => 'PUT', 'class' => 'form']) !!}
      {!! Form::text('title', $todo->title, ['class' => 'form-control']); !!}
      {!! Form::submit('Update', ['class' => 'btn btn-primary ml-auto mt-3']); !!}
    {!! Form::close() !!}
	</div>
      </div>
    </div>
  </div>
@endsection