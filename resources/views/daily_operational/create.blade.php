<!-- app/views/daily_operational/create.blade.php -->

@extends('layout.layout')

@section('title', 'DAILY OPERATIONAL STATUS')

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
            <h2>DAILY OPERATIONAL STATUS</h2>
        </div>

        <form action="{{ route('storeDOS') }}" method="POST" class="needs-validation" novalidate>
        @csrf

        <!-- Caller Details -->
            <fieldset class="fieldset">
                <legend class="legend">Caller Details</legend>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Date:</label>
                        <input class="form-control" type="date" name="date_captured" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Shift:</label>
                        <select class="form-select" name="shift" id="shift" required>
                            <option value="*">Select Shift</option>
                            <option value="Day">Day</option>
                            <option value="Night">Night</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Caller:</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Position:</label>
                        <input class="form-control" type="text" name="position" required>
                    </div>
                </div>
            </fieldset>

            <!-- Ammbulance Schedule -->
            <fieldset class="fieldset">
                <legend class="legend"></legend>
                <div class="row">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Districts</th>
                            @foreach($districts as $district)
                                <th>{{ $district->name }}</th>
                            @endforeach
                            <th>Total</th>
                        </tr>
                        <tr>
                            <td>AMBULANCES</td>
                        </tr>
                        </thead>

                        <tbody id="table-body">
                        @foreach($ambulances as $ambulance)
                            <tr>
                                <input type="hidden" name="ambulances[]" value="{{ $ambulance }}">
                                <td>{{ $ambulance }}</td>
                                @foreach ($districts as $district)
                                    @if($ambulance == 'Schedule Emergency')
                                        @switch($district->id)
                                            @case('1')
                                                <td>{{ 18 }}</td>
                                            @break
                                            @case('2')
                                            <td>{{ 41 }}</td>
                                            @break
                                            @case('3')
                                                <td>{{ 13 }}</td>
                                            @break
                                            @case('4')
                                                <td>{{ 13 }}</td>
                                            @break
                                            @case('5')
                                                <td>{{ 15 }}</td>
                                            @break
                                            @case('6')
                                                <td>{{ 15 }}</td>
                                            @break
                                            @case('7')
                                                <td>{{ 18 }}</td>
                                            @break
                                            @case('8')
                                                <td>{{ 18 }}</td>
                                            @break
                                            @case('9')
                                                <td>{{ 16 }}</td>
                                            @break
                                            @case('10')
                                                <td>{{ 19 }}</td>
                                            @break
                                            @default
                                                <td> {{ 18 }}</td>
                                        @endswitch
                                    @else
                                        <td>
                                            <input type="number" name="district[{{ $district->id }}][ambulance_{{ $ambulance }}]"
                                               class="form-control district-input" data-district-id="{{ $district->id }}" step="any">
                                        </td>
                                    @endif
                                @endforeach
                                @if($ambulance == 'Schedule Emergency')
                                    <td class="row-total">212</td>
                                @else
                                    <td class="row-total">0</td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>

                        <tfoot>
                        <tr>
                            <td>Total Ambulances</td>
                            @foreach ($districts as $district)
                                <td><span class="district-total" data-district-id="{{ $district->id }}">0</span></td>
                            @endforeach
                            <td><span id="grand-total">0</span></td>
                        </tr>
                        </tfoot>
                    </table>

                    <!-- pts buses -->
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <td>PTS BUSES</td>
                        </tr>
                        </thead>

                        <tbody id="table-body2">
                        @foreach($ptsBuses as $ptsBus)
                            <tr>
                                <input type="hidden" name="ptsBus[]" value="{{ $ptsBus }}">
                                <td>{{ $ptsBus }}</td>
                                @foreach ($districts as $district)
                                    <td>
                                        <input type="number" name="district[{{ $district->id }}][ptsBus_{{ $ptsBus }}]"
                                               class="form-control district-input2" data-district-id="{{ $district->id }}" step="any">
                                    </td>
                                @endforeach
                                <td class="row-total2">0</td>
                            </tr>
                        @endforeach
                        </tbody>

                        <tfoot>
                        <tr>
                            <td>Total Buses</td>
                            @foreach ($districts as $district)
                                <td><span class="district-total2" data-district-id="{{ $district->id }}">0</span></td>
                            @endforeach
                            <td><span id="grand-total2">0</span></td>
                        </tr>
                        </tfoot>
                    </table>

                    <!-- OPERATIONAL SUPPORT -->
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <td>OPERATIONAL SUPPORT</td>
                        </tr>
                        </thead>

                        <tbody id="table-body3">
                        @foreach($supports as $support)
                            <tr>
                                <input type="hidden" name="support[]" value="{{ $support }}">
                                <td>{{ $support }}</td>
                                @foreach ($districts as $district)
                                    <td>
                                        <input type="number" name="district[{{ $district->id }}][support_{{ $support }}]"
                                               class="form-control district-input3" data-district-id="{{ $district->id }}" step="any">
                                    </td>
                                @endforeach
                                <td class="row-total3">0</td>
                            </tr>
                        @endforeach
                        </tbody>

                        <tfoot>
                        <tr>
                            <td>Total Operational Support</td>
                            @foreach ($districts as $district)
                                <td><span class="district-total3" data-district-id="{{ $district->id }}">0</span></td>
                            @endforeach
                            <td><span id="grand-total3">0</span></td>
                        </tr>
                        </tfoot>
                    </table>

                    <!-- STAFF LEAVE -->
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <td>STAFF LEAVE</td>
                        </tr>
                        </thead>

                        <tbody id="table-body4">
                        @foreach($staff_leaves as $staff)
                            <tr>
                                <input type="hidden" name="staff[]" value="{{ $staff }}">
                                <td>{{ $staff }}</td>
                                @foreach ($districts as $district)
                                    <td>
                                        <input type="number" name="district[{{ $district->id }}][staff_{{ $staff }}]"
                                               class="form-control district-input4" data-district-id="{{ $district->id }}" step="any">
                                    </td>
                                @endforeach
                                <td class="row-total4">0</td>
                            </tr>
                        @endforeach
                        </tbody>

                        <tfoot>
                        <tr>
                            <td>Total Staff on Leave</td>
                            @foreach ($districts as $district)
                                <td><span class="district-total4" data-district-id="{{ $district->id }}">0</span></td>
                            @endforeach
                            <td><span id="grand-total4">0</span></td>
                        </tr>
                        </tfoot>
                    </table>

                    <!-- OVERTIME -->
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <td>OVERTIME</td>
                        </tr>
                        </thead>

                        <tbody id="table-body5">
                        @foreach($overtimes as $overtime)
                            <tr>
                                <input type="hidden" name="overtime[]" value="{{ $overtime }}">
                                <td>{{ $overtime }}</td>
                                @foreach ($districts as $district)
                                    <td>
                                        <input type="number" name="district[{{ $district->id }}][overtime_{{ $overtime }}]"
                                               class="form-control district-input5" data-district-id="{{ $district->id }}" step="any">
                                    </td>
                                @endforeach
                                <td class="row-total5">0</td>
                            </tr>
                        @endforeach
                        </tbody>

                        <tfoot>
                        <tr>
                            <td>Total Overtime Staff</td>
                            @foreach ($districts as $district)
                                <td><span class="district-total5" data-district-id="{{ $district->id }}">0</span></td>
                            @endforeach
                            <td><span id="grand-total5">0</span></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </fieldset>

            <!-- Action Buttons -->
            <a href="{!!URL::route('listDOS')!!}" class="btn btn-info" role="button">CANCEL</a>
            {!! Form::submit('Capture', array('class' => 'btn btn-primary')) !!}

            {!! Form::close() !!}
        </form>
    </div>
@endsection

@section('additional_js')
    <script>
        // Bind the update function to the inputs for the first time
        document.querySelectorAll('.district-input').forEach(input => {
            input.addEventListener('input', updateTotals);
        });

        function updateTotals() {
            // Update row total
            let row = this.closest('tr');
            let rowTotal = 0;

            // Sum up the inputs for the row
            row.querySelectorAll('.district-input').forEach(input => {
                rowTotal += parseFloat(input.value) || 0; // Ensure you add a default of 0 for invalid input
        });

            // Update the text of the row total
            row.querySelector('.row-total').textContent = rowTotal.toFixed(0);

            // Update district totals
            let districtId = this.dataset.districtId;
            let districtTotal = 0;

            // Sum up the inputs for the given district
            document.querySelectorAll(`.district-input[data-district-id="${districtId}"]`).forEach(input => {
                districtTotal += parseFloat(input.value) || 0;
        });

            // Find the district total element and update its value
            let districtTotalElement = document.querySelector(`.district-total[data-district-id="${districtId}"]`);
            if (districtTotalElement) {
                districtTotalElement.textContent = districtTotal.toFixed(0); // Update the district total text
            } else {
                // If the district total element is missing, log an error or add new element
                console.error(`District total element for districtId ${districtId} not found.`);
            }

            // Update grand total
            let grandTotal = 0;

            // Sum up all the row totals
            document.querySelectorAll('.row-total').forEach(rowTotalCell => {
                grandTotal += parseFloat(rowTotalCell.textContent) || 0; // Ensure you add a default of 0 for invalid totals
        });

            // Update the grand total element with the final value
            let grandTotalElement = document.getElementById('grand-total');
            if (grandTotalElement) {
                grandTotalElement.textContent = grandTotal.toFixed(0); // Update the grand total text
            } else {
                console.error("Grand total element not found.");
            }
        }

        // PTS BUSES
        // Bind the update function to the inputs for the first time
        document.querySelectorAll('.district-input2').forEach(input => {
            input.addEventListener('input', updateTotals2);
        });

        // Function to update the totals
        function updateTotals2() {
            // Update row total
            let row = this.closest('tr');
            let rowTotal = 0;
            row.querySelectorAll('.district-input2').forEach(input => {
                rowTotal += parseFloat(input.value) || 0;
        });
            row.querySelector('.row-total2').textContent = rowTotal.toFixed(0);

            // Update district totals
            let districtId = this.dataset.districtId;
            let districtTotal = 0;
            document.querySelectorAll(`.district-input2[data-district-id="${districtId}"]`).forEach(input => {
                districtTotal += parseFloat(input.value) || 0;
        });
            document.querySelector(`.district-total2[data-district-id="${districtId}"]`).textContent = districtTotal.toFixed(0);

            // Update grand total
            let grandTotal = 0;
            document.querySelectorAll('.row-total2').forEach(rowTotalCell => {
                grandTotal += parseFloat(rowTotalCell.textContent) || 0;
        });
            document.getElementById('grand-total2').textContent = grandTotal.toFixed(0);
        }

        // OPERATIONAL SUPPORT
        // Bind the update function to the inputs for the first time
        document.querySelectorAll('.district-input3').forEach(input => {
            input.addEventListener('input', updateTotals3);
        });

        // Function to update the totals
        function updateTotals3() {
            // Update row total
            let row = this.closest('tr');
            let rowTotal = 0;
            row.querySelectorAll('.district-input3').forEach(input => {
                rowTotal += parseFloat(input.value) || 0;
        });
            row.querySelector('.row-total3').textContent = rowTotal.toFixed(0);

            // Update district totals
            let districtId = this.dataset.districtId;
            let districtTotal = 0;
            document.querySelectorAll(`.district-input3[data-district-id="${districtId}"]`).forEach(input => {
                districtTotal += parseFloat(input.value) || 0;
        });
            document.querySelector(`.district-total3[data-district-id="${districtId}"]`).textContent = districtTotal.toFixed(0);

            // Update grand total
            let grandTotal = 0;
            document.querySelectorAll('.row-total3').forEach(rowTotalCell => {
                grandTotal += parseFloat(rowTotalCell.textContent) || 0;
        });
            document.getElementById('grand-total3').textContent = grandTotal.toFixed(0);
        }

        // STAFF LEAVE
        // Bind the update function to the inputs for the first time
        document.querySelectorAll('.district-input4').forEach(input => {
            input.addEventListener('input', updateTotals4);
        });

        // Function to update the totals
        function updateTotals4() {
            // Update row total
            let row = this.closest('tr');
            let rowTotal = 0;
            row.querySelectorAll('.district-input4').forEach(input => {
                rowTotal += parseFloat(input.value) || 0;
        });
            row.querySelector('.row-total4').textContent = rowTotal.toFixed(0);

            // Update district totals
            let districtId = this.dataset.districtId;
            let districtTotal = 0;
            document.querySelectorAll(`.district-input4[data-district-id="${districtId}"]`).forEach(input => {
                districtTotal += parseFloat(input.value) || 0;
        });
            document.querySelector(`.district-total4[data-district-id="${districtId}"]`).textContent = districtTotal.toFixed(0);

            // Update grand total
            let grandTotal = 0;
            document.querySelectorAll('.row-total4').forEach(rowTotalCell => {
                grandTotal += parseFloat(rowTotalCell.textContent) || 0;
        });
            document.getElementById('grand-total4').textContent = grandTotal.toFixed(0);
        }

        // OVERTIME
        // Bind the update function to the inputs for the first time
        document.querySelectorAll('.district-input5').forEach(input => {
            input.addEventListener('input', updateTotals5);
        });

        // Function to update the totals
        function updateTotals5() {
            // Update row total
            let row = this.closest('tr');
            let rowTotal = 0;
            row.querySelectorAll('.district-input5').forEach(input => {
                rowTotal += parseFloat(input.value) || 0;
        });
            row.querySelector('.row-total5').textContent = rowTotal.toFixed(0);

            // Update district totals
            let districtId = this.dataset.districtId;
            let districtTotal = 0;
            document.querySelectorAll(`.district-input5[data-district-id="${districtId}"]`).forEach(input => {
                districtTotal += parseFloat(input.value) || 0;
        });
            document.querySelector(`.district-total5[data-district-id="${districtId}"]`).textContent = districtTotal.toFixed(0);

            // Update grand total
            let grandTotal = 0;
            document.querySelectorAll('.row-total5').forEach(rowTotalCell => {
                grandTotal += parseFloat(rowTotalCell.textContent) || 0;
        });
            document.getElementById('grand-total5').textContent = grandTotal.toFixed(0);
        }
    </script>
@endsection

