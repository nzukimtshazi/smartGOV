<!-- app/views/daily_operational/index.blade.php -->

@extends('layout/layout')

@section('content')

    <!-- Current daily operationa report -->

    <div class="page-content d-flex align-items-center justify-content-center">

        <div class="row w-100 mr-5 auth-page">
            <div class="col-md-8 col-xl-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="btn-group mr-2 mb-sm-0 float-sm-right mt-1">
                            <a href="daily_operational/create" role="button"
                               class="btn btn-sm btn-outline-info waves-light waves-effect"><i
                                        class="ri-add-circle-line align-middle mr-2"></i>Create Daily Operation Status</a>
                        </div>

                        <h4>DAILY OPERATIONAL STATUS</h4>

                        <table class="table table-striped mt-5" id="dataTable">
                        @if (count($operational_statuses) > 0)

                            <!-- Table Headings -->
                            <thead>
                                <th>View</th>
                                <th>Date Captured</th>
                                <th>Shift</th>
                                <th>Caller</th>
                                <th>Emegency Ambulances</th>
                                <th>Obstetric Ambulances</th>
                                <th>Operational Buses</th>
                                <th>Disaster Bus</th>
                                <th>Staff Leave</th>
                                <th>Overtime Staff</th>
                            </thead>

                                <!-- Table Body -->
                            <tbody>
                                @foreach ($operational_statuses as $operational)
                                    <tr>
                                        <td>
                                            <div>
                                                <a href="{!!URL::route('editDOS',[$operational->statusId,
                                                 'operational_id' => $operational->statusId])!!}"
                                                   class="btn btn-sm btn-info mt-n2"><i
                                                            class="ri-edit-2-line mr-1"></i>View</a>
                                            </div>
                                        </td>

                                        <!-- Date Captured -->
                                        <td class="table-text">
                                            <div>{{ $operational->dateCreated }}</div>
                                        </td>

                                        <!-- Shift -->
                                        <td class="table-text">
                                            <div>{{ $operational->shift }}</div>
                                        </td>

                                        <!-- Caller -->
                                        <td class="table-text">
                                            <div>{{ $operational->caller }}</div>
                                        </td>

                                        <!-- Emergency Ambulance -->
                                        <td class="table-text">
                                            <div>{{ $operational->emergency }}</div>
                                        </td>

                                        <!-- Obstetric Ambulances -->
                                        <td class="table-text">
                                            <div>{{ $operational->obstetric }}</div>
                                        </td>

                                        <!-- Operational Buses -->
                                        <td class="table-text">
                                            <div>{{ $operational->operational }}</div>
                                        </td>

                                        <!-- Disaster Bus -->
                                        <td class="table-text">
                                            <div>{{ $operational->disaster }}</div>
                                        </td>

                                        <!-- Staff Leave -->
                                        <td class="table-text">
                                            <div>{{ $operational->staff }}</div>
                                        </td>

                                        <!-- Overtime -->
                                        <td class="table-text">
                                            <div>{{ $operational->overtime }}</div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        @else
                            <div class="alert alert-info mt-5" role="alert">No daily operational records to display</div>
                        @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

