<!-- app/views/daily_operational/index.blade.php -->


@extends('layout.layout')

@section('title', 'DAILY OPERATIONAL STATUS')

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
                            <h3 class="mb-0">DAILY OPERATIONAL STATUS</h3>
                            <a href="daily_operational/create" class="btn btn-primary">
                                <i class="fas fa-plus-circle me-2"></i>Log a Report
                            </a>
                        </div>

                        @if (count($operational_statuses) > 0)
                            <div class="table-responsive">
                                <table class="table table-hover" id="dataTable">
                                    <thead>
                                    <tr>
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
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($operational_statuses as $operational)
                                        <tr>
                                            <td>
                                                <a href="{{ route('editDOS', ['id' => $operational->statusId, 'daily_operational_id' =>
                                                $operational->statusId]) }}" class="btn btn-sm btn-primary btn-action"><i class="fas fa-eye me-1"></i>
                                                </a>
                                            </td>
                                            <td>{{ $operational->dateCreated }}</td>
                                            <td>{{ $operational->shift }}</td>
                                            <td>{{ $operational->caller }}</td>
                                            <td>{{ $operational->emergency }}</td>
                                            <td>{{ $operational->obstetric }}</td>
                                            <td>{{ $operational->operational }}</td>
                                            <td>{{ $operational->disaster }}</td>
                                            <td>{{ $operational->staff }}</td>
                                            <td>{{ $operational->overtime }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info" role="alert">
                                <i class="fas fa-info-circle me-2"></i> No daily operational records available
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

