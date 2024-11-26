<!-- app/views/institution_status/index.blade.php -->

@extends('layout/layout')

@section('content')

    <!-- Current Hospital/Clinic Daily Status report -->

    <div class="page-content d-flex align-items-center justify-content-center">

        <div class="row w-100 mr-5 auth-page">
            <div class="col-md-8 col-xl-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="btn-group mr-2 mb-sm-0 float-sm-right mt-1">
                            <a href="institution_status/add" role="button"
                               class="btn btn-sm btn-outline-info waves-light waves-effect"><i
                                        class="ri-add-circle-line align-middle mr-2"></i>Draw a daily status</a>
                        </div>

                        <h4>HOSPITAL/CLINIC DAILY STATUS</h4>

                        <table class="table table-striped mt-5" id="dataTable">
                        @if (count($institution_status) > 0)

                            <!-- Table Headings -->
                                <thead>
                                <th>Ref #</th>
                                <th>View</th>
                                <th>Date Captured</th>
                                <th>Reporter</th>
                                <th>District</th>
                                <th>Institution</th>
                                <th>Institution Type</th>
                                <th>No of Admissions</th>
                                <th>No of Deaths</th>
                                <th>No of Births</th>
                                <th>Beds Occupancy</th>
                                <th>Feedback</th>
                                </thead>

                                <!-- Table Body -->
                                <tbody>
                                @foreach ($institution_status as $status)
                                    <tr>
                                        <!-- Reference -->
                                        <td class="table-text">
                                            <div>{{ $status->reference }}</div>
                                        </td>

                                        <td>
                                            <div>
                                                <a href="{!!URL::route('editStatus',[$status->id,
                                                 'institution_status_id' => $status->id])!!}"
                                                   class="btn btn-sm btn-info mt-n2"><i
                                                            class="ri-edit-2-line mr-1"></i>View</a>
                                            </div>
                                        </td>

                                        <!-- Date Captured -->
                                        <td class="table-text">
                                            <div>{{ $status->created_at }}</div>
                                        </td>

                                        <!-- Caller -->
                                        <td class="table-text">
                                            <div>{{ $status->name }}</div>
                                        </td>

                                        <!-- District -->
                                        <td class="table-text">
                                            <?php
                                                $district = \App\Models\District::find($status->district_id);
                                            ?>
                                            <div>{{ $district->name }}</div>
                                        </td>

                                        <!-- Institution -->
                                        <td class="table-text">
                                            <?php
                                                $institution = \App\Models\Institution::find($status->institution_id);
                                            ?>
                                            <div>{{ $institution->name }}</div>
                                        </td>

                                        <!-- Institution Type -->
                                        <td class="table-text">
                                            <div>{{ $status->institution_type }}</div>
                                        </td>

                                        <!-- No of Admissions -->
                                        <td class="table-text">
                                            <div>{{ $status->no_of_admissions }}</div>
                                        </td>

                                        <!-- No of Deaths -->
                                        <td class="table-text">
                                            <div>{{ $status->no_of_deaths }}</div>
                                        </td>

                                        <!-- No of births -->
                                        <td class="table-text">
                                            <div>{{ $status->no_of_births }}</div>
                                        </td>

                                        <!-- Beds Occupancy -->
                                        <td class="table-text">
                                            <div>{{ '70%' }}</div>
                                        </td>

                                        <!-- Feedback -->
                                        <td class="table-text">
                                            <div>{{ 'No Feedback' }}</div>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            @else
                                <div class="alert alert-info mt-5" role="alert">No generic calls have been made</div>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

