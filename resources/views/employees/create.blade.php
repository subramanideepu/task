@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New Employee</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('employees.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="employee_name">Employee Name</label>
            <input type="text" name="employee_name" class="form-control" value="{{ old('employee_name') }}">
        </div>

        <div class="form-group">
            <label for="employee_department">Employee Department</label>
            <input type="text" name="employee_department" class="form-control" value="{{ old('employee_department') }}">
        </div>

        <div class="form-group">
            <label for="employee_id">Employee ID</label>
            <input type="text" name="employee_id" class="form-control" value="{{ old('employee_id') }}">
        </div>

        <div class="form-group">
            <label for="employee_designation">Employee Designation</label>
            <input type="text" name="employee_designation" class="form-control" value="{{ old('employee_designation') }}">
        </div>

        <div class="form-group">
            <label for="employee_contact">Employee Contact</label>
            <input type="text" name="employee_contact" class="form-control" value="{{ old('employee_contact') }}">
        </div>

        <div class="form-group">
            <label for="employee_email">Employee Email</label>
            <input type="email" name="employee_email" class="form-control" value="{{ old('employee_email') }}">
        </div>

        <button type="submit" class="btn btn-success">Create Employee</button>
    </form>
</div>
@endsection
