<!-- app/views/incident_management/add.blade.php -->

@extends('layout.layout')

@section('title', 'INCIDENT MANAGEMENT')

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
            <h2>INCIDENT MANAGEMENT</h2>
        </div>

        <form action="{{ route('storeIM') }}" method="POST" class="needs-validation" novalidate>
        @csrf

        <!-- Caller Details -->
            <fieldset class="fieldset">
                <legend class="legend">Caller Details</legend>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Name:</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Telephone No:</label>
                        <input type="text" class="form-control" name="telephoneNo" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Mobile No:</label>
                        <input type="text" class="form-control" name="mobileNo" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">e-Mail Addess:</label>
                        <input type="text" class="form-control" name="e_mail" required>
                    </div>
                </div>
            </fieldset>

            <!-- Call Details -->
            <fieldset class="fieldset">
                <legend class="legend">Call Details</legend>
                <div class="row">
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Report Number:</label>
                        <input type="text" class="form-control" name="reportNo" required>
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
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Type:</label>
                        <select class="form-select" id="type_id" name="type_id" required>
                            <option value="">Select Incident Type</option>
                            @foreach($incident_types as $type)
                                <option value="{{ $type->id }}">{{ $type->type }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Caller:</label>
                        <select class="form-select" id="caller_id" name="caller_id" required>
                            <option value="">Select Caller</option>
                            @foreach($callers as $caller)
                                <option value="{{ $caller->id }}">{{ $caller->caller }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Route:</label>
                        <select class="form-select" name="route" id="route">
                            <option value="*">Please Select Route</option>
                            <option value="Urban">Urban</option>
                            <option value="Rural">Rural</option>
                            <option value="Industrial">Industrial</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">GPS (Latitude):</label>
                        <input type="text" name="gps_latitude" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">GPS (Longitude):</label>
                        <input type="text" name="gps_longitude" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Incident Location:</label>
                        <input type="text" name="incident_location" required>
                    </div>
                </div>
            </fieldset>

            <!-- Triage -->
            <fieldset class="fieldset">
                <legend class="legend">Triage</legend>
                <div class="row">
                    <div class="col-md-1 mb-2">
                        <label class="form-label" style="background-color: black; color: orangered">Adults</label>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Entrapments:</label>
                        <input type="text" name="adult_entrapment" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Red:</label>
                        <input type="text" name="adult_red" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Yellow:</label>
                        <input type="text" name="adult_yellow" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Green:</label>
                        <input type="text" name="adult_green" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Blue:</label>
                        <input type="text" name="adult_blue" required>
                    </div>
                    <div class="col-md-1 mb-3">
                        <label class="form-label">Total:</label>
                        <input type="text" name="adult_total" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1 mb-2">
                        <label class="form-label" style="background-color: black; color: orangered">Children</label>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Entrapments:</label>
                        <input type="text" name="child_entrapment" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Red:</label>
                        <input type="text" name="child_red" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Yellow:</label>
                        <input type="text" name="child_yellow" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Green:</label>
                        <input type="text" name="child_green" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Blue:</label>
                        <input type="text" name="child_blue" required>
                    </div>
                    <div class="col-md-1 mb-3">
                        <label class="form-label">Total:</label>
                        <input type="text" name="child_total" required>
                    </div>
                </div>
            </fieldset>

            <!-- Mechanical Response -->
            <fieldset class="fieldset">
                <legend class="legend">Mechanical Response</legend>
                <div class="row">
                    <div class="col-md-1 mb-2">
                        <label class="form-label">ALS:</label>
                        <input type="checkbox" id="als" name="als" {{ old('als') ? 'checked' : '' }}>
                    </div>
                    <div class="col-md-1 mb-2">
                        <label class="form-label">Doctor:</label>
                        <input type="checkbox" id="doctor" name="doctor" {{ old('doctor') ? 'checked' : '' }}>
                    </div>
                    <div class="col-md-1 mb-2">
                        <label class="form-label">PTV:</label>
                        <input type="checkbox" id="ptv" name="ptv" {{ old('ptv') ? 'checked' : '' }}>
                    </div>
                    <div class="col-md-1 mb-2">
                        <label class="form-labels">ESV's:</label>
                        <input type="checkbox" id="esv" name="esv" {{ old('esvk') ? 'checked' : '' }}>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label class="form-label">Air Support:</label>
                        <input type="checkbox" id="air" name="air" {{ old('air') ? 'checked' : '' }}>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label class="form-label">Co-ordination:</label>
                        <input type="checkbox" id="co" name="co" {{ old('co') ? 'checked' : '' }}>
                    </div>
                    <div class="col-md-1 mb-2">
                        <label class="form-label">Rescue:</label>
                        <input type="checkbox" id="rescue" name="rescue" {{ old('rescue') ? 'checked' : '' }}>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mb-2">
                        <label class="form-label">Disaster Bus:</label>
                        <input type="checkbox" id="bus" name="bus" {{ old('bus') ? 'checked' : '' }}>
                    </div>
                    <div class="col-md-1 mb-2">
                        <label class="form-label">Truck:</label>
                        <input type="checkbox" id="truck" name="truck" {{ old('truck') ? 'checked' : '' }}>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label class="form-label">Fire Truck:</label>
                        <input type="checkbox" id="fire" name="fire" {{ old('fire') ? 'checked' : '' }}>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label class="form-label">Rescue Boat:</label>
                        <input type="checkbox" id="boat" name="boat" {{ old('boat') ? 'checked' : '' }}>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label class="form-label">Traffic Units:</label>
                        <input type="checkbox" id="units" name="units" {{ old('units') ? 'checked' : '' }}>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label class="form-label">SAPS Units:</label>
                        <input type="checkbox" id="saps" name="saps" {{ old('saps') ? 'checked' : '' }}>
                    </div>
                    <div class="col-md-1 mb-2">
                        <label class="form-label">Other:</label>
                        <input type="checkbox" id="other" name="other" {{ old('other') ? 'checked' : '' }}>
                    </div>
                </div>
            </fieldset>

            <!-- Human Resources -->
            <fieldset class="fieldset">
                <legend class="legend">Human Resources</legend>
                <div class="row">
                    <div class="col-md-1 mb-2">
                        <label class="form-label">ALS:</label>
                        <input type="checkbox" id="hrals" name="hrals" {{ old('hrals') ? 'checked' : '' }}>
                    </div>
                    <div class="col-md-1 mb-2">
                        <label class="form-label">Doctor:</label>
                        <input type="checkbox" id="hrdoctor" name="hrdoctor" {{ old('hrdoctor') ? 'checked' : '' }}>
                    </div>
                    <div class="col-md-1 mb-2">
                        <label class="form-label">NSRI:</label>
                        <input type="checkbox" id="nsri" name="nsri" {{ old('nsri') ? 'checked' : '' }}>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label class="form-label">Sharks Board:</label>
                        <input type="checkbox" id="shark" name="shark" {{ old('shark') ? 'checked' : '' }}>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label class="form-label">Managers:</label>
                        <input type="checkbox" id="managers" name="managers" {{ old('managers') ? 'checked' : '' }}>
                    </div>
                    <div class="col-md-1 mb-2">
                        <label class="form-label">BLS:</label>
                        <input type="checkbox" id="bls" name="bls" {{ old('bls') ? 'checked' : '' }}>
                    </div>
                    <div class="col-md-1 mb-2">
                        <label class="form-label">Drivers:</label>
                        <input type="checkbox" id="drivers" name="drivers" {{ old('drivers') ? 'checked' : '' }}>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mb-2">
                        <label class="form-labels">Fire Fighters:</label>
                        <input type="checkbox" id="fighters" name="fighters" {{ old('fighters') ? 'checked' : '' }}>
                    </div>
                    <div class="col-md-1 mb-2">
                        <label class="form-labels">SAPS:</label>
                        <input type="checkbox" id="hrSAPS" name="hrSAPS" {{ old('hrSAPS') ? 'checked' : '' }}>
                    </div>
                    <div class="col-md-1 mb-2">
                        <label class="form-label">Navy:</label>
                        <input type="checkbox" id="navy" name="navy" {{ old('navy') ? 'checked' : '' }}>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label class="form-label">Airforce:</label>
                        <input type="checkbox" id="airforce" name="airforce" {{ old('airforce') ? 'checked' : '' }}>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label class="form-label">Task Force:</label>
                        <input type="checkbox" id="task" name="task" {{ old('task') ? 'checked' : '' }}>
                    </div>
                    <div class="col-md-1 mb-2">
                        <label class="form-label">Army:</label>
                        <input type="checkbox" id="hrArmy" name="hrArmy" {{ old('hrArmy') ? 'checked' : '' }}>
                    </div>
                    <div class="col-md-1 mb-2">
                        <label class="form-label">ILS:</label>
                        <input type="checkbox" id="ils" name="ils" {{ old('ils') ? 'checked' : '' }}>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mb-2">
                        <label class="form-label">Co-ordination:</label>
                        <input type="checkbox" id="hrCo" name="hrCo" {{ old('hrCo') ? 'checked' : '' }}>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label class="form-label">Mountain Rescue:</label>
                        <input type="checkbox" id="hrRescue" name="hrRescue" {{ old('hrRescue') ? 'checked' : '' }}>
                    </div>
                </div>
            </fieldset>

            <!-- Health Institutions -->
            <fieldset class="fieldset">
                <legend class="legend">Health Institutions</legend>
                <div class="row">
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Institution:</label>
                        <select class="form-select" id="institution2_id" name="institution2_id" required>
                            <option value="">Select Institution</option>
                            @foreach($institutions as $institution)
                                <option
                                        value="{{ $institution->id }}"
                                        data-district2="{{ $institution->district->name }}"
                                        data-institution2-type="{{ $institution->type }}">
                                    {{ $institution->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">District:</label>
                        <input type="text" id="district2_id" name="district2_id" readonly>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Institution Type</label>
                        <input type="text" id="institution2_type" name="institution2_type" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mb-2">
                        <label class="form-label">Blue:</label>
                        <input type="text" name="health_blue" required>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label class="form-label">Red:</label>
                        <input type="text" name="health_red" required>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label class="form-label">Yellow:</label>
                        <input type="text" name="health_yellow" required>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label class="form-label">Green:</label>
                        <input type="text" name="health_green" required>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label class="form-label">Total:</label>
                        <input type="text" name="health_total" required>
                    </div>
                </div>
            </fieldset>

            <!-- Response Details -->
            <fieldset class="fieldset">
                <legend class="legend">Response Details</legend>
                <div class="row">
                    <div class="col-md-2 mb-2">
                        <label class="form-label">Response Time:</label>
                        <input type="text" name="response_time" required>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label class="form-label">Incident Time:</label>
                        <input type="text" name="incident_time" required>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label class="form-label">Duration Scene:</label>
                        <input type="text" name="duration" required>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label class="form-label">Total Time:</label>
                        <input type="text" name="total_time" required>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label class="form-label">Distance to Hospital:</label>
                        <input type="text" name="distance" required>
                    </div>
                </div>
            </fieldset>

            <!-- Supporting Services -->
            <fieldset class="fieldset">
                <legend class="legend">Supporting Services</legend>
                <div class="row">
                    <div class="col-md-2 mb-2">
                        <label class="form-label">Private EMS:</label>
                        <input type="checkbox" id="private_ems" name="private_ems" {{ old('private_ems') ? 'checked' : '' }}>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label class="form-label">Fire Services:</label>
                        <input type="checkbox" id="services" name="services" {{ old('services') ? 'checked' : '' }}>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label class="form-label">Local Authority:</label>
                        <input type="checkbox" id="authority" name="authority" {{ old('authority') ? 'checked' : '' }}>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label class="form-label">Police:</label>
                        <input type="checkbox" id="police" name="police" {{ old('police') ? 'checked' : '' }}>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label class="form-label">Air Force:</label>
                        <input type="checkbox" id="air_force" name="air_force" {{ old('air_force') ? 'checked' : '' }}>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label class="form-label">Road Traffic Inspectorate:</label>
                        <input type="checkbox" id="inspectorate" name="inspectorate" {{ old('inspectorate') ? 'checked' : '' }}>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mb-2">
                        <label class="form-label">MRCC Activated:</label>
                        <select class="form-select" name="mrcc" id="mrcc">
                            <option value="*">Please Choose Y/N</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label class="form-label">First On Scene:</label>
                        <select class="form-select" id="onScene_id" name="onScene_id" required>
                            <option value="">Select First On Scene</option>
                            @foreach($first_onScenes as $scenes)
                                <option value="{{ $scenes->id }}">{{ $scenes->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </fieldset>

            <!-- Call Status -->
            <fieldset class="fieldset">
                <legend class="legend">Call Status</legend>
                <div class="raw">
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Additional Information:</label>
                        <textarea id="w3review" name="additional_info" required></textarea>
                    </div>
                </div>
            </fieldset>

            <!-- Action Buttons -->
            <div class="d-flex justify-content-end gap-2 mb-4">
                <a href="{{ route('listIM') }}" class="btn btn-secondary">
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

        document.getElementById('institution2_id').addEventListener('change', function () {
            var selectedOption = this.options[this.selectedIndex];
            var districtName = selectedOption.getAttribute('data-district2');
            var institutionType = selectedOption.getAttribute('data-institution2-type');

            // Autofill the district and institution type
            document.getElementById('district2_id').value = districtName || '';
            document.getElementById('institution2_type').value = institutionType || '';
        });
    </script>
@endsection
