@extends('layouts.app')

@section('title', 'Todo Laravel - Yusuf Shakeel')

@section('content')
<div class="container">
  <div class="row">
  <div class="col-xs-12 col-sm-10 offset-sm-1 col-md-10 offset-md-1">
      
      <div class="my-3">

        <p class="my-3 text-center">DONE</p>
        
        @if (count($todos) > 0)

          <ul class="list-group">
          @foreach ($todos as $todo)

          <li class="list-group-item">
            <div>
              <div class="btn-group btn-group-sm float-right" role="group" aria-label="Basic example">
                <a href='/task/{{ $todo->id }}' 
                    class="btn btn-secondary"><i class="fa fa-close"></i></a>
              </div>
              <a data-toggle="collapse" href="#collapse-id-{{ $todo->id }}">{{ $todo->title }}</a>
              <div class="btn-group btn-group-sm float-right" role="group" aria-label="Basic example">
                <a href='/task/{{ $todo->id }}' 
                    class="btn btn-secondary"><i class="fa fa-pencil"></i></a>
              </div>
              
            </div>
            <div class="collapse" id="collapse-id-{{ $todo->id }}">
              <div class="card card-body">
                <div class="todo-description">{{ $todo->description }}</div>
                <hr>
                <p>Status: {{ $todo->status }}</p>
                <p title="{{ $todo->created_at }}">Created: {{ $todo->created_at->diffForHumans() }}</p>
              </div>
            </div>
          </li>

          @endforeach
          </ul>

        @else
          <p class="lead">No DONE todo tasks</p>
        @endif

      </div>

      <!-- nav -->
      <div class="my-3">
        <!-- prev button -->
        @if ($page > 1)
          <a href="/todo/done/{{ $page - 1 }}" class="btn btn-primary">Prev</a>
        @endif

        <!-- next button -->
        @if (count($todos) === 10)
          <a href="/todo/done/{{ $page + 1 }}" class="btn btn-primary float-right">Next</a>
        @endif
      </div>
      <!-- nav ends here -->

    </div>
  </div>
</div>
@endsection