<!-- app/views/forensic_mortuary/index.blade.php -->

@extends('layout.layout')

@section('title', 'FORENSIC / MORTUARY')

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
                            <h3 class="mb-0">FORENSIC / MORTUARY</h3>
                            <a href="forensic_mortuary/add" class="btn btn-primary">
                                <i class="fas fa-plus-circle me-2"></i>Log a Forensic Complaint
                            </a>
                        </div>

                        @if (count($forensics) > 0)
                            <div class="table-responsive">
                                <table class="table table-hover" id="dataTable">
                                    <thead>
                                    <tr>
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
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($forensics as $forensic)
                                        <tr>
                                            <td>{{ $forensic->reference }}</td>
                                            <td>
                                                <a href="{{ route('editFM', ['id' => $forensic->id, 'forensic_mortuary_id' =>
                                                $forensic->id]) }}" class="btn btn-sm btn-primary btn-action"><i class="fas fa-eye me-1"></i>
                                                </a>
                                            </td>
                                            <td>{{ $forensic->created_at->format('Y-m-d H:i') }}</td>
                                            <td>{{ $forensic->name }}</td>
                                            <td>{{ $forensic->contactNo }}</td>
                                            <td>{{ $forensic->deceased_name }}</td>
                                            <td>{{ $forensic->gender }}</td>
                                            <td>{{ $forensic->age }}</td>
                                            <td>{{ $forensic->ethnic_group }}</td>
                                            <td>{{ $forensic->cause_of_death }}</td>
                                            <td>{{ \App\Models\District::find($forensic->district_id)->name }}</td>
                                            <td>
                                                <a href="{{ route('editFM', ['id' => $forensic->id, 'forensic_mortuary_id' =>
                                                $forensic->id]) }}" class="btn btn-sm btn-primary btn-action"><i class="fas fa-paper-plane"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info" role="alert">
                                <i class="fas fa-info-circle me-2"></i> No forensic / mortuary records available
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

