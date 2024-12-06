<!-- app/views/generic_call/index.blade.php -->

@extends('layout.layout')

@section('title', 'GENERIC CALL')

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
                            <h3 class="mb-0">GENERIC CALL</h3>
                            <a href="generic_call/create" class="btn btn-primary">
                                <i class="fas fa-plus-circle me-2"></i>Log a Call
                            </a>
                        </div>

                        @if (count($generic_calls) > 0)
                            <div class="table-responsive">
                                <table class="table table-hover" id="dataTable">
                                    <thead>
                                    <tr>
                                        <th>Ref #</th>
                                        <th>View</th>
                                        <th>Date Captured</th>
                                        <th>Caller</th>
                                        <th>Mobile No</th>
                                        <th>email Address</th>
                                        <th>District</th>
                                        <th>Institution</th>
                                        <th>Institution Type</th>
                                        <th>Feedback</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($generic_calls as $generic)
                                        <tr>
                                            <td>{{ $generic->reference }}</td>
                                            <td>
                                                <a href="{{ route('editCall', ['id' => $generic->id, 'generic_call_id' =>
                                                $generic->id]) }}" class="btn btn-sm btn-primary btn-action"><i class="fas fa-eye me-1"></i>
                                                </a>
                                            </td>
                                            <td>{{ $generic->created_at->format('Y-m-d H:i') }}</td>
                                            <td>{{ $generic->name }}</td>
                                            <td>{{ $generic->mobileNo }}</td>
                                            <td>{{ $generic->email }}</td>
                                            <td>{{ \App\Models\District::find($generic->district_id)->name }}</td>
                                            <td>{{ \App\Models\Institution::find($generic->institution_id)->name }}</td>
                                            <td>{{ $generic->institution_type }}</td>
                                            <td>
                                                <a href="{{ route('editCall', ['id' => $generic->id, 'generic_call_id' =>
                                                $generic->id]) }}" class="btn btn-sm btn-primary btn-action"><i class="fas fa-paper-plane"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info" role="alert">
                                <i class="fas fa-info-circle me-2"></i> No generic calls records available
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



