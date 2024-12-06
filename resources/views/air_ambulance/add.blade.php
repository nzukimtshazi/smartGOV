<!-- app/views/air_ambulance/add.blade.php -->

@extends('layout.layout')

@section('title', 'Add Air Ambulance Request')

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
            <h2>AIR AMBULANCE</h2>
        </div>

        <form action="{{ route('strPg') }}" method="POST" class="needs-validation" novalidate>
        @csrf

        <!-- Caller Information -->
            <fieldset class="fieldset">
                <legend class="legend">Caller Information</legend>
                <div class="row">
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Name:</label>
                        <input type="text" class="form-control" name="fullName" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Telephone No:</label>
                        <input type="text" class="form-control" name="telephoneNo" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Mobile No:</label>
                        <input type="text" class="form-control" name="mobileNo" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Institution:</label>
                        <select class="form-select" id="institution_id" name="institution_id" required>
                            <option value="">Select Institution</option>
                            @foreach($institutions as $institution)
                                <option
                                        value="{{ $institution->id }}"
                                        data-district="{{ $institution->district->name }}"
                                        data-institution-type="{{ $institution->type }}">
                                    {{ $institution->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">District:</label>
                        <input type="text" id="district_id" name="district_id" readonly>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Institution Type</label>
                        <input type="text" id="institution_type" name="institution_type" readonly>
                    </div>
                </div>
            </fieldset>

            <!-- Control Center -->
            <fieldset class="fieldset">
                <legend class="legend">Control Center</legend>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Aircraft Type:</label>
                        <select class="form-select" name="aircraft_type" required>
                            <option value="">Select Aircraft</option>
                            <option value="Rotor Wing">Rotor Wing</option>
                            <option value="Fixed Wing">Fixed Wing</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Call Type:</label>
                        <select class="form-select" name="call_type" required>
                            <option value="">Select Call Type</option>
                            <option value="Hot Response">Hot Response</option>
                            <option value="Transfer">Transfer</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Service Provider:</label>
                        <input type="text" class="form-control" name="service_provider">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Incident:</label>
                        <select class="form-select" name="incident_id" required>
                            <option value="">Select an Incident</option>
                            @foreach($incidents as $incident)
                                <option value="{{$incident->id}}">{{$incident->description}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 mb-3">
                        <label class="form-label">Motivation:</label>
                        <textarea class="form-control" name="motivation" rows="3"></textarea>
                    </div>
                </div>
            </fieldset>

            <!-- Referring Institution -->
            <fieldset class="fieldset">
                <legend class="legend">Referring Institution</legend>
                <div class="row">
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Institution:</label>
                        <select class="form-select" name="ref_institution_id" id="ref_institution_id" required>
                            <option value="">Select Institution</option>
                            @foreach($institutions as $institution)
                                <option value="{{$institution->id}}">{{$institution->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">District:</label>
                        <input type="text" id="ref_district_id" name="ref_district_id" readonly>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Ward:</label>
                        <input type="text" name="ward">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Doctor:</label>
                        <input type="text" name="doctor">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Telephone No:</label>
                        <input type="text" name="telephone_no">
                    </div>

                    <div class="col-md-2 mb-3">
                        <label class="form-label">Mobile No:</label>
                        <input type="text" name="mobile_no">
                    </div>
                </div>
            </fieldset>

            <!-- Receiving Institution -->
            <fieldset class="fieldset">
                <legend class="legend">Receiving Institution</legend>
                <div class="row">
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Institution:</label>
                        <select class="form-select" name="rec_institution_id" id="rec_institution_id" required>
                            <option value="">Select Institution</option>
                            @foreach($institutions as $institution)
                                <option value="{{$institution->id}}">{{$institution->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">District:</label>
                        <input type="text" id="rec_district_id" name="rec_district_id" readonly>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Ward:</label>
                        <input type="text" name="recWard">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Doctor:</label>
                        <input type="text" name="recDoctor">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Telephone No:</label>
                        <input type="text" name="recTelephone_no">
                    </div>

                    <div class="col-md-2 mb-3">
                        <label class="form-label">Mobile No:</label>
                        <input type="text" name="recMobile_no">
                    </div>
                </div>
            </fieldset>

            <!-- Patient Information -->
            <fieldset class="fieldset">
                <legend class="legend">Patient Information</legend>
                <div class="row">
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Patient Name:</label>
                        <input type="text" name="patient_name">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Gender:</label>
                        <select name="gender" id="gender">
                            <option value="*">Please choose gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Age:</label>
                        <input type="number" name="age">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Weight (kg):</label>
                        <input type="text" name="weight">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Diagnosis:</label>
                        <input type="text" name="diagnosis">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Case Type:</label>
                        <select class="form-control input-sm form-control-sm" name="caseType_id" id="caseType_id">
                            <option value="">Choose the Case Type</option>
                            @foreach($caseTypes as $caseType)
                                <option value="{{$caseType->id}}" @if(old('caseType_id')==$caseType->id)
                                selected="selected"@endif>{{$caseType->type}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </fieldset>

            <!-- Hot Response -->
            <fieldset class="fieldset">
                <legend class="legend">Hot Response</legend>
                <div class="row">
                    <div class="col-md-2 mb-3">
                        <label class="form-label">District:</label>
                        <input type="text" name="hotResponse_district">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Weather:</label>
                        <input type="text" name="weather">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">GPS (Latitude):</label>
                        <input type="text" name="gps_latitude">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">GPS (Longitude):</label>
                        <input type="text" name="gps_longitude">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Pick Up Point:</label>
                        <input type="text" name="pickUp_point">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Landing Area:</label>
                        <input type="text" name="landing_area">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Landmark:</label>
                        <input type="text" name="landmark">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Ground Contact:</label>
                        <input type="text" name="ground_contact">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Marking Devices:</label>
                        <input type="text" name="marking_devices">
                    </div>
                </div>
            </fieldset>

            <!-- Authority -->
            <fieldset class="fieldset">
                <legend class="legend">Authority</legend>
                <div class="row">
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Request Status:</label>
                        <select name="req_status" id="req_status">
                            <option value="Status1">Status1</option>
                            <option value="Status2">Status2</option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Updated By:</label>
                        <input type="text" name="updated_by">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Time:</label>
                        <input type="time" class="form-control time-input" name="auth_time">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Reason:</label>
                        <input type="text" name="auth_reason">
                    </div>
                </div>
            </fieldset>

            <!-- Stand Down Notes -->
            <fieldset class="fieldset">
                <legend class="legend">Stand Down Notes</legend>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Name:</label>
                        <input type="text" name="down_name">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Notification:</label>
                        <select name="notifications" id="notifications">
                            <option value="Notification1">Notification1</option>
                            <option value="Notification2">Notification2</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Reason:</label>
                        <input type="text" name="reason">
                    </div>
                </div>
            </fieldset>

            <!-- Action Buttons -->
            <div class="d-flex justify-content-end gap-2 mb-4">
                <a href="{{ route('air_ambulance') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Cancel
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-arrow-right"></i> Next
                </button>
            </div>
        </form>
    </div>
@endsection

@section('additional_js')
    <script>
        document.getElementById('institution_id').addEventListener('change', function () {
            var selectedOption = this.options[this.selectedIndex];
            var districtName = selectedOption.getAttribute('data-district');
            var institutionType = selectedOption.getAttribute('data-institution-type');

            // Autofill the district and institution type
            document.getElementById('district_id').value = districtName || '';
            document.getElementById('institution_type').value = institutionType || '';
        });

        $(document).ready(function() {
            $('#ref_institution_id').change(function() {
                var institutionId = $(this).val();

                if (institutionId) {
                    $.ajax({
                        url: '/smartGOV/public/districts/' + institutionId,  // Adjust URL as necessary
                        type: 'GET',
                        success: function(response) {
                            if (response.district) {
                                $('#ref_district_id').val(response.district.name); // Autofill district name
                            } else {
                                $('#ref_district_id').val(''); // No district found, clear input
                            }
                        },
                        error: function() {
                            $('#ref_district_id').val(''); // In case of an error, clear the input
                        }
                    });
                } else {
                    $('#ref_district_id').val(''); // Clear input if no institution is selected
                }
            });
        });

        $(document).ready(function() {
            $('#rec_institution_id').change(function() {
                var institutionId = $(this).val();

                if (institutionId) {
                    $.ajax({
                        url: '/smartGOV/public/districts/' + institutionId,  // Adjust URL as necessary
                        type: 'GET',
                        success: function(response) {
                            if (response.district) {
                                $('#rec_district_id').val(response.district.name); // Autofill district name
                            } else {
                                $('#rec_district_id').val(''); // No district found, clear input
                            }
                        },
                        error: function() {
                            $('#rec_district_id').val(''); // In case of an error, clear the input
                        }
                    });
                } else {
                    $('#rec_district_id').val(''); // Clear input if no institution is selected
                }
            });
        });
    </script>
@endsection
