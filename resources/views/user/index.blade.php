<!-- app/views/user/index.blade.php  (displays ALL USERS) -->

@extends('layout/layout')

@section('content')

    <!-- Current users -->
    <head>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="your-script.js"></script>
    </head>

    <div class="page-content d-flex align-items-center justify-content-center">

        <div class="row w-100 mr-5 auth-page">
            <div class="col-md-8 col-xl-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h4>ALL USERS
                            <div class="btn-group ml-auto mb-sm-0 float-sm-right mt-1 text-right">
                                <form action="{{ route('searchUsers') }}" method="GET" class="d-inline-block">
                                    <input type="text" name="query" placeholder="Search..." value="{{ request()->query('query') }}">
                                </form>
                                <a href="user/add" role="button" class="btn btn-sm btn-outline-info waves-light waves-effect ml-2">
                                    <i class="ri-add-circle-line align-middle mr-2"></i>Add User
                                </a>
                            </div>
                        </h4>

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

