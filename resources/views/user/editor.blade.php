<!-- app/views/user/editor.blade.php -->

@extends('layout/layout')

@section('content')

    <!-- Current users -->

    <div class="page-content d-flex align-items-center justify-content-center">
        <div class="row w-100 mr-5 auth-page">
            <div class="col-md-8 col-xl-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h6>USER ROLE EDITOR
                            <div class="btn-group ml-auto mb-sm-0 float-sm-right mt-1 text-right">
                                <form action="{{ route('searchUsers') }}" method="GET" class="d-inline-block">
                                    <input type="text" name="query" placeholder="Search..." value="{{ request()->query('query') }}">
                                </form>
                                <a href="user/add" role="button" class="btn btn-sm btn-outline-info waves-light waves-effect ml-2">
                                    <i class="ri-add-circle-line align-middle mr-2"></i>Add User
                                </a>
                            </div>
                        </h6>

                        <tr>
                            <div class="vertical-list">
                                <span> {{ 'All Users' }} {{ $userCount }}</span>&nbsp;&nbsp;
                                @foreach($user as $usr)
                                    <span>{{ $usr->user_role }} {{ $usr->count }}</span>&nbsp;&nbsp;
                                @endforeach
                            </div>
                        </tr>

                        <table class="table table-striped mt-5" id="dataTable">
                        @if (count($users) > 0)

                            <!-- Table Body -->
                                <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <!-- Username -->
                                        <td class="table-text">
                                            <div>{{ $user->userName }}</div>
                                        </td>

                                        <!-- Firstname & Surname -->
                                        <td class="table-text">
                                            <div>{{ $user->firstName }} {{ $user->surname }}</div>
                                        </td>

                                        <!-- User Role -->
                                        <td class="table-text">
                                            <div>{{ $user->user_role }}</div>
                                        </td>

                                        <!-- Institution -->
                                        <td class="table-text">
                                            <div>{{ $user->institution }}</div>
                                        </td>

                                        <!-- Email Address -->
                                        <td class="table-text">
                                            <div>{{ $user->email }}</div>
                                        </td>

                                        <!-- Contact No -->
                                        <td class="table-text">
                                            <div>{{ $user->contactNo }}</div>
                                        </td>
                                    </tr>
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

