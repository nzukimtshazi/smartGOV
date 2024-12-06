<!-- app/views/air_ambulance/approve.blade.php -->

@extends('layout/layout')

@section('content')

    <!-- Current air ambulance report -->

    <div class="page-content d-flex align-items-center justify-content-center">

        <div class="row w-100 mr-5 auth-page">
            <div class="col-md-8 col-xl-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h4>AIR AMBULANCES TO BE APPROVED</h4>

                        <table class="table table-striped mt-5" id="dataTable">
                        @if (count($air_ambulances) > 0)

                            <!-- Table Headings -->
                                <thead>
                                <th>Ref #</th>
                                <th>Date Captured</th>
                                <th>Capturer</th>
                                <th>Caller</th>
                                <th>Aircraft Type</th>
                                <th>Call Type</th>
                                <th>Incident</th>
                                <th>Referring Institution</th>
                                <th>Receiving Institution</th>
                                <th>Total Airtime</th>
                                <th>Action</th>
                                </thead>

                                <!-- Table Body -->
                                <tbody>
                                @foreach ($air_ambulances as $ambulance)
                                    <tr>
                                        <!-- Reference -->
                                        <td class="table-text">
                                            <div>{{ $ambulance->reference }}</div>
                                        </td>

                                        <!-- Date Captured -->
                                        <td class="table-text">
                                            <div>{{ $ambulance->created_at }}</div>
                                        </td>

                                        <!-- Captured -->
                                        <td class="table-text">
                                            <?php
                                            $user = \App\Models\User::find($ambulance->user_id);
                                            ?>
                                            <div>{{ $user->lastName }}</div>
                                        </td>

                                        <!-- Caller -->
                                        <td class="table-text">
                                            <div>{{ $ambulance->name }}</div>
                                        </td>

                                        <!-- Aircraft Type -->
                                        <td class="table-text">
                                            <div>{{ $ambulance->aircraft_type }}</div>
                                        </td>

                                        <!-- Call Type -->
                                        <td class="table-text">
                                            <div>{{ $ambulance->caller_type }}</div>
                                        </td>

                                        <!-- Incident -->
                                        <td class="table-text">
                                            <?php
                                            $incident = \App\Models\Incident::find($ambulance->incident_id);
                                            ?>
                                            <div>{{ $incident->description }}</div>
                                        </td>

                                        <!-- Referring Institution -->
                                        <td class="table-text">
                                            <div>{{ $ambulance->referring_institution }}</div>
                                        </td>

                                        <!-- Receiving Institution -->
                                        <td class="table-text">
                                            <div>{{ $ambulance->receiving_institution }}</div>
                                        </td>

                                        <!-- Total Airtime -->
                                        <td class="table-text">
                                            <div>{{ $ambulance->total_airtime }}</div>
                                        </td>

                                        <!-- Authority -->
                                        <td>
                                            <div>
                                                <a href="{!!URL::route('editAA',[$ambulance->id,
                                                 'air_ambulance_id' => $ambulance->id])!!}"
                                                   class="btn btn-sm btn-info mt-n2"><i
                                                            class="ri-edit-2-line mr-1"></i>Approve/Decline</a>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            @else
                                <div class="alert alert-info mt-5" role="alert">No air ambulance records available</div>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection