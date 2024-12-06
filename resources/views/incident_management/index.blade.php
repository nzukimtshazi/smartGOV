<!-- app/views/incident_management/index.blade.php -->

@extends('layout.layout')

@section('title', 'INCIDENT MANAGEMENT')

@section('additional_css')
    <style>
        .card {
            margin: 0 1rem;
        }

        .table th {
            padding: 0.5rem;
            font-size: 0.9rem;
            white-space: nowrap;
            background-color: #f5f5f5;
            color: #333;
        }

        .table td {
            padding: 0.5rem;
            font-size: 0.9rem;
            vertical-align: middle;
        }

        .table-text {
            margin: 0;
        }

        .btn-action {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
        }

        .status-badge {
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.875rem;
            font-weight: bold;
        }

        .status-pending {
            background-color: #ffc107;
            color: #333;
        }

        .status-approved {
            background-color: #28a745;
            color: #fff;
        }

        .status-declined {
            background-color: #dc3545;
            color: #fff;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="mb-0">INCIDENT MANAGEMENT</h3>
                            <a href="incident_management/add" class="btn btn-primary">
                                <i class="fas fa-plus-circle me-2"></i>Log an Incident
                            </a>
                        </div>

                        @if (count($incident_managements) > 0)
                            <div class="table-responsive">
                                <table class="table table-hover" id="dataTable">
                                    <thead>
                                    <tr>
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
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($incident_managements as $management)
                                        <tr>
                                            <td>{{ $management->reference }}</td>
                                            <td>
                                                <a href="{{ route('editIM', ['id' => $management->id, 'incident_management_id' =>
                                                $management->id]) }}" class="btn btn-sm btn-primary btn-action"><i class="fas fa-eye me-1"></i>
                                                </a>
                                            </td>
                                            <td>{{ $management->created_at->format('Y-m-d H:i') }}</td>
                                            <td>{{ $management->name }}</td>
                                            <td>{{ \App\Models\Informers::find($management->caller_id)->caller }}</td>
                                            <td>{{ \App\Models\IncidentType::find($management->type_id)->type }}</td>
                                            <td>{{ $management->route }}</td>
                                            <td>{{ $management->adult_entrapments }}</td>
                                            <td>{{ $management->child_entrapments }}</td>
                                            <td>{{ \App\Models\FirstOnScene::find($management->first_onScene_id)->name }}</td>
                                            <td>{{ $management->MRCC_activated }}</td>
                                            <td>
                                                <a href="{{ route('editIM', ['id' => $management->id, 'incident_management_id' =>
                                                $management->id]) }}" class="btn btn-sm btn-primary btn-action"><i class="fas fa-paper-plane"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info" incident="alert">
                                <i class="feedback-mark"></i> No incidents records available
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('additional_js')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                responsive: true,
                dom: '<"d-flex justify-content-between align-items-center mb-3"Bf>rt<"d-flex justify-content-between align-items-center mt-3"lip>',
                buttons: [
                    {
                        extend: 'excel',
                        text: '<i class="fas fa-file-excel me-1"></i> Excel',
                        className: 'btn btn-success btn-sm'
                    },
                    {
                        extend: 'pdf',
                        text: '<i class="fas fa-file-pdf me-1"></i> PDF',
                        className: 'btn btn-danger btn-sm'
                    },
                    {
                        extend: 'print',
                        text: '<i class="fas fa-print me-1"></i> Print',
                        className: 'btn btn-info btn-sm'
                    }
                ],
                pageLength: 15,
                order: [[1, 'desc']], // Sort by date column
                columnDefs: [
                    {
                        targets: 11, // Actions column
                        orderable: false
                    }
                ]
            });
        });
    </script>
@endsection