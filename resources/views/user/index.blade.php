<!-- app/views/user/index.blade.php -->

@extends('layout/layout')

@section('content')

<!-- Current users -->

<div class="page-content d-flex align-items-center justify-content-center">

    <div class="row w-100 mr-5 auth-page">
        <div class="col-md-8 col-xl-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="btn-group mr-2 mb-sm-0 float-sm-right mt-1">
                        <a href="user/add" role="button"
                           class="btn btn-sm btn-outline-info waves-light waves-effect"><i
                                class="ri-add-circle-line align-middle mr-2"></i>Add User</a>
                    </div>

                    <h4>Users </h4>

                    <table class="table table-striped mt-5" id="dataTable">
                        @if (count($users) > 0)

                        <!-- Table Headings -->
                        <thead>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Institution</th>
                        <th>E-mail Address</th>
                        <th>Contact No.</th>
                        <th>Action</th>
                        </thead>

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

                            <td>
                                <div>
                                    <a href="{!!URL::route('editUser',[$user->id,
                                                 'user_id' => $user->id])!!}"
                                       class="btn btn-sm btn-info mt-n2"><i
                                            class="ri-edit-2-line mr-1"></i>Edit</a>
                                </div>
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

