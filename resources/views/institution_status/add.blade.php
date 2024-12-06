<!-- app/views/institution_status/add.blade.php -->

@extends('layout.layout')

@section('title', 'HOSPITAL / CLINIC DAILY STATUS')

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
            <h2>HOSPITAL / CLINIC DAILY STATUS</h2>
        </div>

        <form action="{{ route('storeInstMan') }}" method="POST" class="needs-validation" novalidate>
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
                        <label class="form-label">Role:</label>
                        <select class="form-select" id="role_id" name="role_id" required>
                            <option value="">Select User Role</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->description }}</option>
                            @endforeach
                        </select>
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

            <!-- Institution Details -->
            <fieldset class="fieldset">
                <legend class="legend">Institution Details</legend>
                <div class="row">
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
                        <label class="form-label">Manager:</label>
                        <input class="form-control" type="text" name="manager" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Mobile No:</label>
                        <input class="form-control" type="text" name="contactNo" required>
                    </div>
                </div>
            </fieldset>

            <fieldset class="fieldset">
                <legend class="legend">Beds Occupancy</legend>
                <div class="row">
                    <div id="departmentRows">
                        <table class="table table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th>Department</th>
                                    <th>Total No of Beds</th>
                                    <th>Beds Available</th>
                                    <th>Beds Occupied</th>
                                    <th>Occupancy Rate</th>
                                </tr>
                            </thead>
                            <!-- Default department row -->
                            <tbody>
                                <tr>
                                    <td><input type="text" name="departments[0][name]"
                                               placeholder="Department" required></td>
                                    <td><input type="number" name="departments[0][count]"
                                               placeholder="Total Beds" required oninput="calculateOccupancyRate(0)"></td>
                                    <td><input type="number" name="departments[0][available]"
                                               placeholder="Beds Available" required oninput="calculateOccupancyRate(0)"></td>
                                    <td><input type="number" name="departments[0][occupied]"
                                               placeholder="Beds Occupied" required oninput="calculateOccupancyRate(0)"></td>
                                    <td><input type="text" name="departments[0][rate]"
                                               placeholder="Occupancy Rate" disabled></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Button to add new department row -->
                <button type="button" onclick="addDepartmentRow()">Add Department</button>
            </fieldset>

            <!-- Daily Statistics -->
            <fieldset class="fieldset">
                <legend class="legend">Daily Statistics</legend>
                <div class="row">
                    <div class="col-md-2 mb-3">
                        <label class="form-label">No of Admissions:</label>
                        <input class="form-control" type="number" name="admissions" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Additional Admission's Information:</label>
                        <input class="form-control" type="text" name="admission_info" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mb-3">
                        <label class="form-label">No of Deaths:</label>
                        <input class="form-control" type="number" name="death_count" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Cause of Deaths:</label>
                        <input class="form-control" type="text" name="cause_of_death" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mb-3">
                        <label class="form-label">No of Births:</label>
                        <input class="form-control" type="number" name="birth_count" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Additional Birth's information:</label>
                        <input class="form-control" type="text" name="birth_info" required>
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
                <a href="{{ route('instStatus') }}" class="btn btn-secondary">
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

        let departmentCount = 1; // Start with the initial department row.

        // Function to calculate occupancy rate
        function calculateOccupancyRate(index) {
            const totalBeds = document.querySelector(`input[name="departments[${index}][count]"]`).value;
            const bedsOccupied = document.querySelector(`input[name="departments[${index}][occupied]"]`).value;

            if (totalBeds && bedsOccupied) {
                const occupancyRate = (bedsOccupied / totalBeds) * 100;
                document.querySelector(`input[name="departments[${index}][rate]"]`).value = occupancyRate.toFixed(2) + '%';
            } else {
                document.querySelector(`input[name="departments[${index}][rate]"]`).value = '';
            }
        }

        // Function to add a new department row dynamically
        function addDepartmentRow() {
            const departmentRows = document.getElementById("departmentRows");
            const newRow = document.createElement("div");
            newRow.classList.add("department-row");

            newRow.innerHTML = `
            <input type="text" name="departments[${departmentCount}][name]" placeholder="Department" required>
            <input type="number" name="departments[${departmentCount}][count]" placeholder="Total Beds" required oninput="calculateOccupancyRate(${departmentCount})">
            <input type="number" name="departments[${departmentCount}][available]" placeholder="Beds Available" required oninput="calculateOccupancyRate(${departmentCount})">
            <input type="number" name="departments[${departmentCount}][occupied]" placeholder="Beds Occupied" required oninput="calculateOccupancyRate(${departmentCount})">
            <input type="text" name="departments[${departmentCount}][rate]" placeholder="Occupancy Rate" disabled>
        `;

            departmentRows.appendChild(newRow);
            departmentCount++;
        }
    </script>
@endsection
