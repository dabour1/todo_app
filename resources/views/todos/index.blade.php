@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Todo List</h1>

        
        <a href="{{ route('todos.create') }}" class="btn btn-primary mb-4">Create New Todo</a>
 
        @foreach ($todos as $todo)
            <div class="card mb-3">
                <div class="card-body">
                    <h3 class="card-title">{{ $todo->title }}</h3>
                    <p class="card-text">{{ $todo->description }}</p>

                    <p class="badge {{ $todo->status == 'completed' ? 'bg-success' : ($todo->status == 'pending' ? 'bg-warning' : 'bg-danger') }}">
                        {{ $todo->status == 'completed' ? 'Completed' : ($todo->status == 'pending' ? 'Pending' : 'Failed') }}
                    </p>
                    
         
                    <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-info btn-sm">Edit</a>

                   
                    <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this Todo?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                    
                </div>
            </div>
        @endforeach
        
        
    </div>
@endsection
