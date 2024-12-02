<!-- app/views/air_ambulance/edit.blade.php -->

@extends('layout/layout')

@section('content')
    <!-- Edit Air Ambulance Form... -->

    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5 class="panel-title">AIR AMBULANCE REQUEST {{ $air_ambulance->reference }}</h5>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <!-- if there are creation errors, they will show here -->
                            {!! HTML::ul($errors->all()) !!}
                        </div>
                    </div>

                    <form method="POST" action="{{ route('updateAA', $air_ambulance->id) }}">
                        @csrf
                        @method('PATCH')

                    <fieldset class="fieldset" style="display:inline;">
                        <legend class="legend">CALLER INFORMATION</legend>
                        <div class="user-details" style="display:inline;">
                            <div class="input-box6">
                                {!! Form::label('name', 'Name:') !!}
                                {!! Form::text('name', $air_ambulance->name, array('class' => 'form-control')) !!}
                            </div>
                            <div class="input-box6">
                                {!! Form::label('telephoneNo', 'Telephone No:') !!}
                                {!! Form::text('telephoneNo', $air_ambulance->telephoneNo, array('class' => 'form-control')) !!}
                            </div>
                            <div class="input-box6">
                                {!! Form::label('mobileNo', 'Mobile No:') !!}
                                {!! Form::text('mobileNo', $air_ambulance->mobileNo, array('class' => 'form-control')) !!}
                            </div>
                        </div> <br>
                        <div class="user-details" style="display:inline;">
                            <div class="input-box6">
                                <?php
                                    $district = \App\Models\District::find($air_ambulance->district_id);
                                ?>
                                {!! Form::label('district', 'District:') !!}
                                {!! Form::text('district', $district->nme, array('class' => 'form-control')) !!}
                            </div>
                            <div class="input-box6">
                                <?php
                                    $institution = \App\Models\Institution::find($air_ambulance->institution_id);
                                ?>
                                {!! Form::label('institution', 'Institution:') !!}
                                {!! Form::text('institution', $institution->name, array('class' => 'form-control')) !!}
                            </div>
                            <div class="input-box6">
                                {!! Form::label('institution_type', 'Institution Type:') !!}
                                {!! Form::text('institution_type', $air_ambulance->institution_type, array('class' => 'form-control')) !!}
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="fieldset" style="display:inline;">
                        <legend class="legend">PATIENT'S INFORMATION</legend>
                        <div class="user-details" style="display:inline;">
                            <div class="input-box6">
                                {!! Form::label('patient_name', 'Patient Name:') !!}
                                {!! Form::text('patient_name', $air_ambulance->patientName, array('class' => 'form-control')) !!}
                            </div>
                            <div class="input-box6">
                                {!! Form::label('gender', 'Gender:') !!}
                                {!! Form::text('gender', $air_ambulance->gender, array('class' => 'form-control')) !!}
                            </div>
                            <div class="input-box6">
                                {!! Form::label('age', 'Age:') !!}
                                {!! Form::text('age', $air_ambulance->age, array('class' => 'form-control')) !!}
                            </div>
                        </div> <br>
                        <div class="user-details" style="display:inline;">
                            <div class="input-box6">
                                {!! Form::label('weight', 'Weight:') !!}
                                {!! Form::text('weight', $air_ambulance->weight, array('class' => 'form-control')) !!}
                            </div>
                            <div class="input-box6">
                                {!! Form::label('diagnosis', 'Diagnosis:') !!}
                                {!! Form::text('diagnosis', $air_ambulance->diagnosis, array('class' => 'form-control')) !!}
                            </div>
                            <div class="input-box6">
                                <?php
                                    $type = \App\Models\CaseType::find($air_ambulance->caseType_id);
                                ?>
                                {!! Form::label('caseType_id', 'Case Type:') !!}
                                {!! Form::text('caseType_id', $type->type, array('class' => 'form-control')) !!}
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="fieldset" style="display:inline;">
                        <legend class="legend">AUTHORITY</legend>
                        <div class="user-details" style="display:inline;">
                            <button type="submit" name="action" value="approve" class="btn btn-success">Approve</button>
                            <button type="submit" name="action" value="decline" class="btn btn-danger">Decline</button>
                        </div> <br>
                        <div class="user-details" style="display:inline;">
                            <div class="input-box6">
                                {!! Form::label('updated_by', 'Updated By:') !!}
                                {!! Form::text('updated_by', $air_ambulance->updated_by, array('class' => 'form-control')) !!}
                            </div>
                            <div class="input-box6">
                                {!! Form::label('time_authorized', 'Time:') !!}
                                {!! Form::text('time_authorized', $air_ambulance->time_authorized, array('class' => 'form-control')) !!}
                            </div>
                            <div class="input-box6">
                                {!! Form::label('reason', 'Reason:') !!}
                                {!! Form::text('reason', $air_ambulance->reason, array('class' => 'form-control')) !!}
                            </div>
                        </div>
                    </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
