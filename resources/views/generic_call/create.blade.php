<!-- app/views/generic_call/create.blade.php -->

@extends('layout.layout')

@section('title', 'GENERIC CALL')

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
            <h2>GENERIC CALL</h2>
        </div>

        <form action="{{ route('storeCall') }}" method="POST" class="needs-validation" novalidate>
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
                    <div class="col-md-3 mb-3">
                        <label class="form-label">e-Mail Address:</label>
                        <input type="text" class="form-control" name="email" required>
                    </div>
                </div>
            </fieldset>

            <!-- Call Details -->
            <fieldset class="fieldset">
                <legend class="legend">Call Details</legend>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Type of Call:</label>
                        <select class="form-select" name="call_type" id="call_type" required>
                            <option value="*">Select Call Type</option>
                            <option value="EMS">EMS</option>
                            <option value="Forensic">Forensic</option>
                            <option value="Prank Call">Prank Call</option>
                            <option value="Help">Help</option>
                            <option value="Other">Other</option>
                        </select>
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
                        <input class="form-select" type="text" id="district_id" name="district_id" readonly>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Institution Type</label>
                        <input type="text" id="institution_type" name="institution_type" readonly>
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
            <a href="{!!URL::route('calls')!!}" class="btn btn-info" role="button">CANCEL</a>
            {!! Form::submit('Capture', array('class' => 'btn btn-primary')) !!}

            {!! Form::close() !!}
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
    </script>
@endsection

