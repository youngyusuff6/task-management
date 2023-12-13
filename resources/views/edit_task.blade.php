@extends('layouts.app')

@section('title') Edit Task @endsection

@section('styles')
    {{-- Add your styles here --}}
@endsection

@section('content')
    <div class="container">
        <h1 class="text-center">Edit Task</h1>
        
        <!-- Task Form -->
        <div class="row mt-3">
            <div class="col-md-6 offset-md-3">
                <form action="{{ route('edit-tasks', ['id' => $task->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Task Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $task->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-2">
                        <label for="taskDescription">Task Description</label>
                        <textarea class="form-control @error('taskDescription') is-invalid @enderror" id="taskDescription" name="taskDescription" rows="3">{{ old('taskDescription', $task->description) }}</textarea>
                        @error('taskDescription')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-2">
                        <label for="dueDate">Due Date</label>
                        <input type="datetime-local" class="form-control @error('dueDate') is-invalid @enderror" id="dueDate" name="dueDate" value="{{ old('dueDate', now()->format('Y-m-d\TH:i')) }}">
                        @error('dueDate')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-2">
                        <label for="priority">Priority</label>
                        <select class="form-control @error('priority') is-invalid @enderror" id="priority" name="priority">
                            <option value="">Select Priority Level</option>
                            <option value="high" {{ old('priority', $task->priority) === 'high' ? 'selected' : '' }}>High</option>
                            <option value="medium" {{ old('priority', $task->priority) === 'medium' ? 'selected' : '' }}>Medium</option>
                            <option value="low" {{ old('priority', $task->priority) === 'low' ? 'selected' : '' }}>Low</option>
                        </select>
                        @error('priority')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-2">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="">Select Status</option>
                            <option value="pending" {{ old('status', $task->status) === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="in_progress" {{ old('status', $task->status) === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="completed" {{ old('status', $task->status) === 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="canceled" {{ old('status', $task->status) === 'canceled' ? 'selected' : '' }}>Canceled</option>
                        </select>
                    </div>

                    <div class="form-group mt-2">
                        <label for="project">Project</label>
                        <select class="form-control @error('project') is-invalid @enderror" id="project" name="project">
                            <option value="">Select Project</option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}" {{ old('project', $task->project_id) == $project->id ? 'selected' : '' }}>
                                    {{ $project->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('project')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">Edit Task</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- Add your scripts here --}}
@endsection
