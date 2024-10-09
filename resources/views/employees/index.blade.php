@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Employees List</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Create</a>
    <a href="{{ route('employees.export') }}" class="btn btn-success mb-3">Export</a>

    
    <form action="{{ route('employees.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="file">Import Employees:</label>
            <input type="file" name="file" class="form-control">
        </div>
        <button type="submit" class="btn btn-info">Import</button>
    </form>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Department</th>
                <th>Designation</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->employee_name }}</td>
                    <td>{{ $employee->employee_department }}</td>
                    <td>{{ $employee->employee_designation }}</td>
                    <td>{{ $employee->employee_contact }}</td>
                    <td>{{ $employee->employee_email }}</td>
                    <td>
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
