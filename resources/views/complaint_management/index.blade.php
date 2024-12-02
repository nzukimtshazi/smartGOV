<!-- app/views/complaint_management/index.blade.php -->

@extends('layout/layout')

@section('content')

    <!-- Current forensic/mortuary report -->

    <div class="page-content d-flex align-items-center justify-content-center">

        <div class="row w-100 mr-5 auth-page">
            <div class="col-md-8 col-xl-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="btn-group mr-2 mb-sm-0 float-sm-right mt-1">
                            <a href="complaint_management/add" role="button"
                               class="btn btn-sm btn-outline-info waves-light waves-effect"><i
                                        class="ri-add-circle-line align-middle mr-2"></i>Log a Complaint</a>
                        </div>

                        <h4>COMPLAINTS MANAGEMENT</h4>

                        <table class="table table-striped mt-5" id="dataTable">
                        @if (count($complaints) > 0)

                            <!-- Table Headings -->
                                <thead>
                                <th>Ref #</th>
                                <th>View</th>
                                <th>Date Captured</th>
                                <th>Caller</th>
                                <th>Mobile No</th>
                                <th>Call Type</th>
                                <th>Complaint Type</th>
                                <th>District</th>
                                <th>Institution</th>
                                <th>Feedback</th>
                                </thead>

                                <!-- Table Body -->
                                <tbody>
                                @foreach ($complaints as $complaint)
                                    <tr>
                                        <!-- Reference -->
                                        <td class="table-text">
                                            <div>{{ $complaint->reference }}</div>
                                        </td>

                                        <td>
                                            <div>
                                                <a href="{!!URL::route('editCM',[$complaint->id,
                                                 'complaint_id' => $complaint->id])!!}"
                                                   class="btn btn-sm btn-info mt-n2"><i
                                                            class="ri-edit-2-line mr-1"></i>View</a>
                                            </div>
                                        </td>

                                        <!-- Date Captured -->
                                        <td class="table-text">
                                            <div>{{ $complaint->created_at }}</div>
                                        </td>

                                        <!-- Caller -->
                                        <td class="table-text">
                                            <div>{{ $complaint->name }}</div>
                                        </td>

                                        <!-- Mobile No -->
                                        <td class="table-text">
                                            <div>{{ $complaint->mobileNo }}</div>
                                        </td>

                                        <!-- Call Type -->
                                        <td class="table-text">
                                            <div>{{ $complaint->caller_type }}</div>
                                        </td>

                                        <!-- Complaint Type -->
                                        <td class="table-text">
                                            <?php
                                                $complain = \App\Models\Complaint::find($complaint->complaints_id);
                                            ?>
                                            <div>{{ $complain->type }}</div>
                                        </td>

                                        <!-- District -->
                                        <td class="table-text">
                                            <?php
                                            $district = \App\Models\District::find($complaint->district_id);
                                            ?>
                                            <div>{{ $district->name }}</div>
                                        </td>

                                        <!-- District -->
                                        <td class="table-text">
                                            <?php
                                            $institution = \App\Models\Institution::find($complaint->institution_id);
                                            ?>
                                            <div>{{ $institution->name }}</div>
                                        </td>

                                        <!-- Feedback -->
                                        <td class="table-text">
                                            <div>{{ 'No Feedback' }}</div>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            @else
                                <div class="alert alert-info mt-5" role="alert">No complaint records to display</div>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

