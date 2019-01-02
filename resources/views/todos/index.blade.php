@extends('layouts.master')

@section('master')
  <div class="row">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <h1 class="todos-title">Todos</h1>
          <div class="todos-wrapper">
            <ul class="list-group todos-list">
              @foreach ($todos as $todo)
                <li class="list-group-item todos-list-item">{{ $todo->title }}</li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection