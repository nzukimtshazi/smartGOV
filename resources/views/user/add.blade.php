<!-- app/views/user/add.blade.php -->

@extends('layout/layout')

@section('content')
<!-- Create User Form... -->

    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Add New User</h3>
                </div>
                <div class="panel-body">
                    <!-- if there are creation errors, they will show here -->
                    {!! HTML::ul($errors->all()) !!}

                    {!! Form::model(new App\Models\User, ['route' => ['storeUser']]) !!}

                    <div class="form-group form-group-sm">
                        {!! Form::label('name', 'Name:') !!}
                        {!! Form::text('name', Request::old('name'), array('class' => 'form-control form-control-sm
                        input-sm', 'required')) !!}
                    </div>

                    <div class="form-group form-group-sm">
                        {!! Form::label('surname', 'Surname:') !!}
                        {!! Form::text('surname', Request::old('surname'), array('class' => 'form-control
                        form-control-sm input-sm', 'required')) !!}
                    </div>

                    <div class="form-group form-group-sm">
                        {!! Form::label('role_id', 'User Role:') !!}
                        <select class="form-control form-control-sm
                        input-sm" required name="role_id" id="role_id">
                            <option value="">Select User Role</option>
                            @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->role_id }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group form-group-sm">
                        {!! Form::label('institution_id', 'Hospital/Clinic:') !!}
                        <select class="form-control form-control-sm
                        input-sm" required name="institution_id" id="institution_id">
                            <option value="">Select Hospital or Clinic</option>
                            @foreach($institutions as $institution)
                            <option value="{{ $role->id }}">{{ $institution->institution_id }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group form-group-sm">
                        {!! Form::label('contactNo', 'Contact No:') !!}
                        {!! Form::text('contactNo', Request::old('contactNo'), array('class' => 'form-control
                        form-control-sm input-sm', 'required')) !!}
                    </div>

                    <div class="form-group form-group-sm">
                        {!! Form::label('userName', 'User Name:') !!}
                        {!! Form::text('userName', Request::old('userName'), array('class' => 'form-control
                        form-control-sm input-sm', 'required')) !!}
                    </div>

                    <div class="form-group form-group-sm">
                        {!! Form::label('email', 'Email:') !!}
                        {!! Form::email('email', Request::old('email'), array('class' => 'form-control
                        form-control-sm input-sm', 'required')) !!}
                    </div>

                    <div class="form-group form-group-sm">
                        {!! Form::label('password', 'Password:') !!}
                        {!! Form::password('password', array('class' => 'form-control form-control-sm
                        input-sm', 'required')) !!}
                    </div>

                    <a href="{!!URL::route('login')!!}" class="btn btn-info" role="button">Cancel</a>
                    {!! Form::submit('Add', array('class' => 'btn btn-primary')) !!}

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
