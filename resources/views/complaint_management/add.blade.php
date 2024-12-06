<!-- app/views/complaint_management/add.blade.php -->

@extends('layout.layout')

@section('title', 'COMPLAINTS MANAGEMENT')

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
            <h2>COMPLAINTS MANAGEMENT</h2>
        </div>

        <form action="{{ route('storeComMan') }}" method="POST" class="needs-validation" novalidate>
        @csrf

            <!-- Caller Information -->
            <fieldset class="fieldset">
                <legend class="legend">Call Information</legend>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Caller Name:</label>
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
                        <label class="form-label">e-Mail Address:</label>
                        <input type="text" class="form-control" name="email" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Caller Type:</label>
                        <select name="caller_type" id="caller_type" required>
                            <option value="*">Choose Caller Type</option>
                            <option value="Internal">Internal</option>
                            <option value="External">External</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Company:</label>
                        <input type="text" class="form-control" name="company" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Contact Person:</label>
                        <input type="text" class="form-control" name="contact_person" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Location:</label>
                        <input type="text" class="form-control" name="location" required>
                    </div>
                    <div class="col-md-3 mb-3">
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
                    <div class="col-md-3 mb-3">
                        <label class="form-label">District:</label>
                        <input type="text" class="form-control" id="district_id" name="district_id" readonly>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Institution Type</label>
                        <input type="text" class="form-control" id="institution_type" name="institution_type" readonly>
                    </div>
                </div>
            </fieldset>

            <!-- What Happened? -->
            <fieldset class="fieldset">
                <legend class="legend">What Happened?</legend>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Complaint Type:</label>
                        <select class="form-control input-sm form-control-sm" name="type_id" id="type_id" required>
                            <option value="">Select Complaint Type</option>
                            @foreach($complaint_types as $type)
                                <option value="{{$type->id}}" @if(old('type_id')==$type->id)
                                selected="selected"@endif>{{$type->type}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Location of Incident:</label>
                        <input type="text" class="form-control" name="location_ofIncident" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Institution:</label>
                        <select class="form-select" id="institution2_id" name="institution2_id" required>
                            <option value="">Select Institution</option>
                            @foreach($institutions as $institution)
                                <option
                                    value="{{ $institution->id }}"
                                    data-district2="{{ $institution->district->name }}"
                                    data-institution-type2="{{ $institution->type }}">
                                    {{ $institution->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">District:</label>
                        <input type="text" class="form-control" id="district2_id" name="district2_id" readonly>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Institution Type</label>
                        <input type="text" class="form-control" id="institution2_type" name="institution2_type" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                        <label class="form-label">Additional Complaint Information:</label>
                        <textarea id="w3review" name="additional_info" required></textarea>
                    </div>
                </div>
            </fieldset>

            <!-- Action Buttons -->
            <div class="d-flex justify-content-end gap-2 mb-4">
                <a href="{{ route('comMan') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Cancel
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-arrow-right"></i> Capture
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
            var institutionType = selectedOption.getAttribute('data-institution-type2');

            // Autofill the district and institution type
            document.getElementById('district2_id').value = districtName || '';
            document.getElementById('institution2_type').value = institutionType || '';
        });
    </script>
@endsection
