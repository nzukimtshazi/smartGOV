<!-- app/views/forensic_mortuary/add.blade.php -->

@extends('layout.layout')

@section('title', 'FORENSIC / MORTUARY')

@section('additional_css')
    <style>
        .fieldset {
            border: 1px solid var(--primary-color);
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            background-color: white;
        }

        .legend {
            color: var(--primary-color);
            font-weight: bold;
            width: auto;
            padding: 0 10px;
            margin-bottom: 0;
            font-size: 1.1rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-label {
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #ced4da;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(128, 128, 128, 0.25);
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>FORENSIC / MORTUARY</h2>
        </div>

        <form action="{{ route('storeFM') }}" method="POST" class="needs-validation" novalidate>
        @csrf

            <!-- Caller Details -->
            <fieldset class="fieldset">
                <legend class="legend">Caller Details</legend>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Caller Name:</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Contact No:</label>
                        <input type="text" class="form-control" name="contactNo" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Mobile No:</label>
                        <input type="text" class="form-control" name="mobileNo" required>
                    </div>
                </div>
            </fieldset>

            <!-- Deceased Details -->
            <fieldset class="fieldset">
                <legend class="legend">Deceased Details</legend>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Name:</label>
                        <input class="form-control" type="text" name="deceasedName" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Gender:</label>
                        <select class="form-select" name="gender" id="gender" required>
                            <option value="">Please Choose Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Age:</label>
                        <input class="form-control" type="number" name="age" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Ethnic Group:</label>
                        <select class="form-select" name="ethnic_group" id="ethnic_group" required>
                            <option value="*">Please Choose Ethnic Group</option>
                            <option value="African">African</option>
                            <option value="Coloured">Coloured</option>
                            <option value="Indian">Indian</option>
                            <option value="White">White</option>
                            <option value="Foreigner">Foreigner</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Classification:</label>
                        <select class="form-select" name="classification_id"
                                id="classification_id" required>
                            <option value="">Select Classification</option>
                            @foreach($classifications as $classification)
                                <option value="{{$classification->id}}" @if(old('classification_id')==$classification->id)
                                selected="selected"@endif>{{$classification->description}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">SAPS Case No:</label>
                        <input class="form-control" type="text" name="caseNo" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Cause of Death</label>
                        <input class="form-control" type="text" name="cause_of_death" required>
                    </div>
                </div>
            </fieldset>

            <!-- Scene -->
            <fieldset class="fieldset">
                <legend class="legend">Scene</legend>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label class="form-label">District:</label>
                        <select class="form-select" name="district" id="district" required>
                            <option value="">Select District</option>
                            @foreach($districts as $district)
                                <option value="{{$district->id}}" @if(old('district_id')==$district->id)
                                selected="selected"@endif>{{$district->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Place:</label>
                        <input class="form-control" type="text" name="place" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Area Type:</label>
                        <input class="form-control" type="text" name="area" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Deceased Pickup Point:</label>
                        <input class="form-control" type="text" name="deceased_pickUp_point" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Guide Pickup Point:</label>
                        <input class="form-control" type="text" name="guide_pickUp_point" required>
                    </div>
                </div>
                <div class="row">
                    <label class="form-label">Physical Address:</label>
                    <input class="form-control" type="text" name="physical_address" required>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">SAPS Name:</label>
                        <input class="form-control" type="text" name="SAPS_name" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">SAPS Station:</label>
                        <input class="form-control" type="text" name="station" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">SAPS Time:</label>
                        <input class="form-control" type="text" name="SAPS_time" required>
                    </div>
                </div>
            </fieldset>

            <!-- Delivery -->
            <fieldset class="fieldset">
                <legend class="legend">Delivery</legend>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Deceased Delivery Point:</label>
                        <input class="form-control" type="text" name="delivery_point" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Name of Service Provider:</label>
                        <input class="form-control" type="text" name="service_provider" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Method of Transport:</label>
                        <input class="form-control" type="text" name="transport_method" required>
                    </div>
                </div>
            </fieldset>

            <!-- Service Provider -->
            <fieldset class="fieldset">
                <legend class="legend">Service Provider</legend>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Provider:</label>
                        <select class="form-select" name="service_provider" id="service_provider" required>
                            <option value="*">Please Choose Service Provider</option>
                            <option value="Private EMS">Private EMS</option>
                            <option value="Local">Local</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Name of Service Provider:</label>
                        <input class="form-control" type="text" name="provider_name" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Contact Person:</label>
                        <input class="form-control" type="text" name="contactPerson" required>
                    </div>
                </div>
            </fieldset>

            <!-- Fleet -->
            <fieldset class="fieldset">
                <legend class="legend">Fleet</legend>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Fleet No:</label>
                        <input class="form-control" type="text" name="fleetNo" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Depot:</label>
                        <input class="form-control" type="text" name="depot" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Crew 1:</label>
                        <input class="form-control" type="text" name="crew1" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Crew 2:</label>
                        <input class="form-control" type="text" name="crew2" required>
                    </div>
                </div>
            </fieldset>

            <!-- Call Status -->
            <fieldset class="fieldset">
                <legend class="legend">Call Status</legend>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Additional Information:</label>
                        <textarea id="w3review" name="additional_info" required></textarea>
                    </div>
                </div>
            </fieldset>

            <!-- Action Buttons -->
            <a href="{!!URL::route('foreMort')!!}" class="btn btn-info" role="button">CANCEL</a>
            {!! Form::submit('Capture', array('class' => 'btn btn-primary')) !!}

            {!! Form::close() !!}
        </form>
    </div>
@endsection

