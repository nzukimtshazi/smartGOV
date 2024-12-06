<!-- app/views/groupSms/create.blade.php -->

@extends('layout.layout')

@section('title', 'USER GROUP SMS')

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
            <h2>USER GROUP SMS</h2>
        </div>

        <form action="{{ route('storeSMS') }}" method="POST" class="needs-validation" novalidate>
        @csrf

            <fieldset class="fieldset">
                <legend class="legend">Send SMS to a Group</legend>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Department:</label>
                        <select class="form-select" id="dept_id" name="dept_id" required>
                            <option value="">Select Department</option>
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mb-3">
                        <label class="form-label">Select User Group:</label>
                    </div>
                </div>

                <fieldset class="fieldset">
                    <div class="row">
                        <div class="col-md-2 mb-3">
                            <input type="checkbox" name="checkboxes[]" value="supervisor" id="supervisor">
                            <label class="form-label">Supervisors:</label>
                        </div>
                        <div class="col-md-2 mb-3">
                            <input type="checkbox" name="checkboxes[]" value="managers" id="managers">
                            <label class="form-label">General Managers:</label>
                        </div>
                        <div class="col-md-2 mb-3">
                            <input type="checkbox" name="checkboxes[]" value="departments" id="departments">
                            <label class="form-label">Head of Departments:</label>
                        </div>
                        <div class="col-md-2 mb-3">
                            <input type="checkbox" name="checkboxes[]" value="agents" id="agents">
                            <label class="form-label">Call-Centre Agents:</label>
                        </div>
                        <div class="col-md-2 mb-3">
                            <input type="checkbox" name="checkboxes[]" value="nurses" id="nurses">
                            <label class="form-label">Nurses:</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 mb-3">
                            <input type="checkbox" name="checkboxes[]" value="doctors" id="doctors">
                            <label class="form-label">Doctors:</label>
                        </div>
                        <div class="col-md-2 mb-3">
                            <input type="checkbox" name="checkboxes[]" value="pilots" id="pilots">
                            <label class="form-label">Pilots:</label>
                        </div>
                        <div class="col-md-2 mb-3">
                            <input type="checkbox" name="checkboxes[]" value="guards" id="guards">
                            <label class="form-label">Life Guards:</label>
                        </div>
                        <div class="col-md-2 mb-3">
                            <input type="checkbox" name="checkboxes[]" value="paramedics" id="paramedics">
                            <label class="form-label">Paramedics:</label>
                        </div>
                        <div class="col-md-2 mb-3">
                            <input type="checkbox" name="checkboxes[]" value="assistants" id="assistants">
                            <label class="form-label">Assistants:</label>
                        </div>
                    </div>
                </fieldset>

                <!-- SMS Content -->
                <legend class="legend">SMS Content</legend>
                <div class="row">
                    <textarea id="w3review" name="contents" required></textarea>
                    <label class="form-label">Remaining characters 160</label>
                </div>
            </fieldset>

            <!-- Action Buttons -->
            <div class="d-flex justify-content-end gap-2 mb-4">
                <a href="{!!URL::route('login')!!}" class="btn btn-info" role="button">CANCEL</a>
                {!! Form::submit('Send SMS', array('class' => 'btn btn-primary')) !!}
                {!! Form::close() !!}
            </div>
        </form>
    </div>
@endsection
