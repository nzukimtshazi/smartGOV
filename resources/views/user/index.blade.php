<!-- app/views/user/index.blade.php  (displays ALL USERS) -->

@extends('layout.layout')

@section('title', 'ALL USERS')

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
                            <h3 class="mb-0">ALL USERS</h3>
                            <form action="{{ route('searchUsers') }}" method="GET" class="d-inline-block">
                                <input type="text" name="query" placeholder="Search..." value="{{ request()->query('query') }}">
                            </form>
                            <a href="user/add" class="btn btn-primary">
                                <i class="fas fa-plus-circle me-2"></i>Add a user
                            </a>
                        </div>

                        <table class="table table-striped mt-5" id="dataTable">
                        @if (count($users) > 0)

                            <!-- Table Body -->
                                <tbody>
                                @foreach ($users as $user)
                                    <tr style="background-color: yellow;">
                                        <!-- First column data -->
                                        <td class="load-info-button" data-user-id="{{ $user->id }}" style="vertical-align: top;">
                                            <div class="user-card" id="user-{{ $user->id }}">
                                                <div class="user_summary">
                                                    <div>{{ $user->firstName }} {{ $user->lastName }}: {{ $user->user_role }}</div>
                                                    <div>{{ $user->district }} | {{ $user->institution }}
                                                        <button class="toggle-btn" data-user-id="{{ $user->id }}">&#x2193;</button>
                                                    </div>
                                                </div>
                                                <!-- Hidden user details, initially hidden -->
                                                <div class="user-details" id="details-{{ $user->id }}" style="display:none;">
                                                    <p><strong>{{ $user->firstName }} {{ $user->lastName }}</strong></p>
                                                    <p>Role: {{ $user->user_role }}</p>
                                                    <p>Department:</p>
                                                    <p>Contact No: {{ $user->contactNo }}</p>
                                                    <p><strong>e-mail Address:</strong> {{ $user->email }}</p>
                                                    <p>User Rights/Capabilities:</p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <div id="info-container" style="display:none;"></div>
                                @endforeach
                                </tbody>
                            @else
                                <div class="alert alert-info mt-5" role="alert">No users are available</div>
                            @endif
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('additional_js')
    <script type="text/javascript">
        document.querySelectorAll('.toggle-btn').forEach(button => {
            button.addEventListener('click', function () {
            // Get the user ID from the data attribute
            var userId = this.getAttribute('data-user-id');

            // Find the corresponding details section for this user
            var details = document.getElementById('details-' + userId);

            // Toggle the display of the user details
            if (details.style.display === 'none') {
                details.style.display = 'block';
                this.textContent = 'Hide Details'; // Change button text
            } else {
                details.style.display = 'none';
                this.textContent = 'Show Details'; // Revert button text
            }
        });
        });
    </script>
@endsection