<!-- app/views/incident_management/index.blade.php -->

@extends('layout/layout')

@section('content')

    <!-- Current incident management report -->

    <div class="page-content d-flex align-items-center justify-content-center">

        <div class="row w-100 mr-5 auth-page">
            <div class="col-md-8 col-xl-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="btn-group mr-2 mb-sm-0 float-sm-right mt-1">
                            <a href="incident_management/add" role="button"
                               class="btn btn-sm btn-outline-info waves-light waves-effect"><i
                                        class="ri-add-circle-line align-middle mr-2"></i>Add an Incident</a>
                        </div>

                        <h4>INCIDENT MANAGEMENT</h4>

                        <table class="table table-striped mt-5" id="dataTable">
                        @if (count($incident_managements) > 0)

                            <!-- Table Headings -->
                                <thead>
                                <th>Ref #</th>
                                <th>View</th>
                                <th>Date Captured</th>
                                <th>Caller</th>
                                <th>Informat</th>
                                <th>Type</th>
                                <th>Route</th>
                                <th>Triage Adults</th>
                                <th>Triage Children</th>
                                <th>First on Scene</th>
                                <th>MRCC Activated</th>
                                <th>Feedback</th>
                                </thead>

                                <!-- Table Body -->
                                <tbody>
                                @foreach ($incident_managements as $management)
                                    <tr>
                                        <!-- Reference -->
                                        <td class="table-text">
                                            <div>{{ $management->reference }}</div>
                                        </td>

                                        <td>
                                            <div>
                                                <a href="{!!URL::route('editIM',[$management->id,
                                                 'management_id' => $management->id])!!}"
                                                   class="btn btn-sm btn-info mt-n2"><i
                                                            class="ri-edit-2-line mr-1"></i>View</a>
                                            </div>
                                        </td>

                                        <!-- Date Captured -->
                                        <td class="table-text">
                                            <div>{{ $management->created_at }}</div>
                                        </td>

                                        <!-- Caller -->
                                        <td class="table-text">
                                            <div>{{ $management->name }}</div>
                                        </td>

                                        <!-- Informer -->
                                        <td class="table-text">
                                            <?php
                                            $caller = \App\Models\Informers::find($management->caller_id);
                                            ?>
                                            <div>{{ $caller->caller }}</div>
                                        </td>

                                        <!-- Type -->
                                        <td class="table-text">
                                            <?php
                                            $type = \App\Models\IncidentType::find($management->type_id);
                                            ?>
                                            <div>{{ $type->type }}</div>
                                        </td>

                                        <!-- Route -->
                                        <td class="table-text">
                                            <div>{{ $management->route }}</div>
                                        </td>

                                        <!-- Triage Adults -->
                                        <td class="table-text">
                                            <div>{{ $management->adult_entrapments }}</div>
                                        </td>

                                        <!-- Triage Children -->
                                        <td class="table-text">
                                            <div>{{ $management->child_entrapments }}</div>
                                        </td>

                                        <!-- First on Scene -->
                                        <td class="table-text">
                                            <?php
                                            $onScene = \App\Models\FirstOnScene::find($management->first_onScene_id);
                                            ?>
                                            <div>{{ $onScene->name }}</div>
                                        </td>

                                        <!-- Triage Children -->
                                        <td class="table-text">
                                            <div>{{ $management->MRCC_activated }}</div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            @else
                                <div class="alert alert-info mt-5" role="alert">No incident management records available</div>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

