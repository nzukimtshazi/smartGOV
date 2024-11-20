<!-- app/views/forensic_mortuary/index.blade.php -->

@extends('layout/layout')

@section('content')

    <!-- Current forensic/mortuary report -->

    <div class="page-content d-flex align-items-center justify-content-center">

        <div class="row w-100 mr-5 auth-page">
            <div class="col-md-8 col-xl-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="btn-group mr-2 mb-sm-0 float-sm-right mt-1">
                            <a href="forensic_mortuary/add" role="button"
                               class="btn btn-sm btn-outline-info waves-light waves-effect"><i
                                        class="ri-add-circle-line align-middle mr-2"></i>Log a Forensic Request</a>
                        </div>

                        <h4>FORENSIC / MORTUARY</h4>

                        <table class="table table-striped mt-5" id="dataTable">
                        @if (count($forensics) > 0)

                            <!-- Table Headings -->
                                <thead>
                                <th>Ref #</th>
                                <th>View</th>
                                <th>Date Captured</th>
                                <th>Caller</th>
                                <th>Phone No</th>
                                <th>Deceased Name</th>
                                <th>Gender</th>
                                <th>Age</th>
                                <th>Ethnic Group</th>
                                <th>Cause of Death</th>
                                <th>District</th>
                                <th>Feedback</th>
                                </thead>

                                <!-- Table Body -->
                                <tbody>
                                @foreach ($forensics as $forensic)
                                    <tr>
                                        <!-- Reference -->
                                        <td class="table-text">
                                            <div>{{ $forensic->reference }}</div>
                                        </td>

                                        <td>
                                            <div>
                                                <a href="{!!URL::route('editFM',[$forensic->id,
                                                 'forensic_id' => $forensic->id])!!}"
                                                   class="btn btn-sm btn-info mt-n2"><i
                                                            class="ri-edit-2-line mr-1"></i>View</a>
                                            </div>
                                        </td>

                                        <!-- Date Captured -->
                                        <td class="table-text">
                                            <div>{{ $forensic->created_at }}</div>
                                        </td>

                                        <!-- Caller -->
                                        <td class="table-text">
                                            <div>{{ $forensic->name }}</div>
                                        </td>

                                        <!-- Mobile No -->
                                        <td class="table-text">
                                            <div>{{ $forensic->contactNo }}</div>
                                        </td>

                                        <!-- Deceased Name -->
                                        <td class="table-text">
                                            <div>{{ $forensic->deceased_name }}</div>
                                        </td>

                                        <!-- Gender -->
                                        <td class="table-text">
                                            <div>{{ $forensic->gender }}</div>
                                        </td>

                                        <!-- Age -->
                                        <td class="table-text">
                                            <div>{{ $forensic->age }}</div>
                                        </td>

                                        <!-- Ethnic Group -->
                                        <td class="table-text">
                                            <div>{{ $forensic->ethnic_group }}</div>
                                        </td>

                                        <!-- Cause of Death -->
                                        <td class="table-text">
                                            <div>{{ $forensic->cause_of_death }}</div>
                                        </td>

                                        <!-- District -->
                                        <td class="table-text">
                                            <div>{{ $forensic->district_id }}</div>
                                        </td>

                                        <!-- Feedback -->
                                        <td class="table-text">
                                            <div>{{ 'No Feedback' }}</div>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            @else
                                <div class="alert alert-info mt-5" role="alert">No forensic/mortuary records to display</div>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

