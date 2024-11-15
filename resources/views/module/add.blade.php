<!-- app/views/module/add.blade.php -->

@extends('layout/layout')

@section('content')
    <!-- Create Module Form... -->

    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Add New Module</h3>
                </div>
                <div class="panel-body">
                    <!-- if there are creation errors, they will show here -->
                    {!! HTML::ul($errors->all()) !!}


                    <form action="{{ route('storeModule') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group form-group-sm">
                            {!! Form::label('name', 'Name:') !!}
                            {!! Form::text('name', Request::old('name'), array('class' => 'form-control form-control-sm
                            input-sm', 'required')) !!}
                        </div>

                        <div class="mb-3">
                            {!! Form::Label('image', 'Module Image:') !!}
                            <input type="file" name="img" class="form-control" placeholder="Module Image">
                        </div>

                        <a href="{!!URL::route('modules')!!}" class="btn btn-info" role="button">Cancel</a>
                        {!! Form::submit('Add', array('class' => 'btn btn-primary')) !!}
                    </form>




                </div>
            </div>
        </div>
    </div>
@endsection
