<!-- app/views/institution_status/index.blade.php -->

@extends('layout.layout')

@section('title', 'HOSPITAL / CLINIC DAILY STATUS')

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
                            <h3 class="mb-0">HOSPITAL / CLINIC DAILY STATUS</h3>
                            <a href="institution_status/add" class="btn btn-primary">
                                <i class="fas fa-plus-circle me-2"></i>New Request
                            </a>
                        </div>

                        @if (count($institution_status) > 0)
                            <div class="table-responsive">
                                <table class="table table-hover" id="dataTable">
                                    <thead>
                                    <tr>
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
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($institution_status as $status)
                                        <tr>
                                            <td>{{ $status->reference }}</td>
                                            <td>
                                                <a href="{{ route('editStatus', ['id' => $status->id, 'institution_status_id' =>
                                                $status->id]) }}" class="btn btn-sm btn-primary btn-action"><i class="fas fa-eye me-1"></i>
                                                </a>
                                            </td>
                                            <td>{{ $status->created_at->format('Y-m-d H:i') }}</td>
                                            <td>{{ $status->name }}</td>
                                            <td>{{ \App\Models\District::find($status->district_id)->name }}</td>
                                            <td>{{ \App\Models\Institution::find($status->institution_id)->name }}</td>
                                            <td>{{ $status->institution_type }}</td>
                                            <td>{{ $status->no_of_admissions }}</td>
                                            <td>{{ $status->no_of_deaths }}</td>
                                            <td>{{ $status->no_of_births }}</td>
                                            <td class="table-text">
                                                <?php
                                                $department = \App\Models\Department::find($status->institution_id);
                                                $rate = round($department->beds_occupied / $department->no_of_beds * 100.2);
                                                ?>
                                                <div>{{ $rate }}</div>
                                            </td>
                                            <td>
                                                <a href="{{ route('editStatus', ['id' => $status->id, 'institution_status_id' =>
                                                $status->id]) }}" class="btn btn-sm btn-primary btn-action"><i class="fas fa-paper-plane"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info" role="alert">
                                <i class="fas fa-info-circle me-2"></i> No hospital/clinic records available
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