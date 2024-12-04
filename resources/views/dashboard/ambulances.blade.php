<!-- app/views/dashboard/ambulances.blade.php -->

@extends('layout/layout')

@section('content')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SMARTGOV</title>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    </head>

    <body>
    <h1>MY DASHBOARD</h1>
    <div class="btn-group mr-2 mb-sm-0 float-sm-right mt-1">
        <a href="http://localhost/smartGOV/public/dashboard" role="button"
           class="btn btn-sm btn-outline-info waves-light waves-effect">
            <i class="ri-add-circle-line align-middle mr-2"></i>All Modules</a>
        <a href="{{ route('ambulanceHistory') }}" role="button"
           class="btn btn-sm btn-outline-info waves-light waves-effect">
            <i class="ri-add-circle-line align-middle mr-2"></i>Air Ambulance History</a>
        <a href="{{ route('complaintHistory') }}" role="button"
           class="btn btn-sm btn-outline-info waves-light waves-effect">
            <i class="ri-add-circle-line align-middle mr-2"></i>Complaint Management History</a>
        <a href="{{ route('incidentHistory') }}" role="button"
           class="btn btn-sm btn-outline-info waves-light waves-effect">
            <i class="ri-add-circle-line align-middle mr-2"></i>Incident History</a>
    </div>

    <!-- Current Air Ambulance report -->

    <div class="page-content d-flex align-items-center justify-content-center">

        <div class="row w-100 mr-5 auth-page">
            <div class="col-md-8 col-xl-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <ta1ble class="table table-striped mt-5" id="dataTable">
                        @if (count($ambulances) > 0)

                            <!-- Table Body -->
                                <tbody>
                                @foreach ($ambulances as $ambulances)
                                    <tr>
                                        <!-- Reference -->
                                        <td class="table-text">
                                            <div>{{ 'Air Request No:' }} {{ $ambulances->reference }}</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- Case Type -->
                                        <td class="table-text">
                                            <?php
                                            $type = \App\Models\CaseType::find($ambulances->caseType_id)
                                            ?>
                                            <div>{{ 'Case Type:' }} {{ $type->type }}</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- Incident Type -->
                                        <td class="table-text">
                                            <?php
                                            $type = \App\Models\Incident::find($ambulances->incident_id)
                                            ?>
                                            <div>{{ 'Incident Type:' }} {{ $type->description }}</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- Assignee Name -->
                                        <td class="table-text">
                                            <?php
                                            $user = \App\Models\User::find($ambulances->user_id);
                                            $name = "$user->firstName $user->lastName";
                                            ?>
                                            <div>{{ 'Assignee Name:' }} {{ $name }}</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- Date Logged -->
                                        <td class="table-text">
                                            <div>{{ $ambulances->created_at }}</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-text">
                                            <div>{{ '-------------------' }}</div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            @else
                                <div class="alert alert-info mt-5" role="alert">No generic calls have been made</div>
                            @endif
                        </ta1ble>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
@endsection

