@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit Todo</h1>

 
        <form action="{{ route('todos.update', $todo->id) }}" method="POST">
            @csrf
            @method('PUT')

         
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" 
                       class="form-control @error('title') is-invalid @enderror" 
                       value="{{ old('title', $todo->title) }}" required>
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
 
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" 
                          class="form-control @error('description') is-invalid @enderror" 
                          rows="4">{{ old('description', $todo->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                    <option value="pending" {{ old('status', $todo->status) == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="completed" {{ old('status', $todo->status) == 'Completed' ? 'selected' : '' }}>Completed</option>
                    <option value="failed" {{ old('status', $todo->status) == 'Failed' ? 'selected' : '' }}>Failed</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
 
            <button type="submit" class="btn btn-primary">Update</button>
          
            <a href="{{ route('todos.index') }}" class="btn btn-secondary ml-2">Cancel</a>
        </form>
    </div>
@endsection
