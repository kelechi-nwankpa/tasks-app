@extends('tasks.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel CRUD Example from scratch</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('tasks.create') }}"> Create New Task</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th>Priority</th>
            <th>Due Date</th>
            <th width="220px">Action</th>
        </tr>
        @foreach ($tasks as $task)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->priority}}</td>
                
                <td style="<?= strtotime($task->due_date) > date('U') || strtotime($task->due_date) == null ? 'color:black' : 'color:red' ?>">
                 {{ $task->due_date ? $task->due_date: 'No due date set' }}
                </td>
                <td>
                    <form action="{{ route('tasks.destroy',$task->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('tasks.show',$task->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('tasks.edit',$task->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <!-- {!! $tasks->links() !!} -->
    {!! $tasks->links('pagination::bootstrap-4') !!}

@endsection