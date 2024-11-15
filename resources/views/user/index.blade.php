@extends('layout/app')

@section('content')

<!-- Current users -->

<div class="page-content d-flex align-items-center justify-content-center">

    <div class="row w-100 mr-5 auth-page">
        <div class="col-md-8 col-xl-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="btn-group mr-2 mb-sm-0 float-sm-right mt-1">
                        <a href="user/create" role="button"
                           class="btn btn-sm btn-outline-info waves-light waves-effect"><i
                                class="ri-add-circle-line align-middle mr-2"></i>Add User</a>
                    </div>

                    <h4>Users </h4>

                    <table class="table table-striped mt-5" id="dataTable">
                        @if (count($users) > 0)

                        <!-- Table Headings -->
                        <thead>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Email Address</th>
                        <th>Enterprise</th>
                        <th>Action</th>
                        </thead>

                        <!-- Table Body -->
                        <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <!-- Name -->
                            <td class="table-text">
                                <div>{{ $user->name }}</div>
                            </td>

                            <!-- Surname -->
                            <td class="table-text">
                                <div>{{ $user->surname }}</div>
                            </td>

                            <!-- User Email Address -->
                            <td class="table-text">
                                <div>{{ $user->email }}</div>
                            </td>

                            <!-- Enterprise ID -->
                            <td class="table-text">
                                @foreach($eids as $eid)
                                @if($eid['id'] == $user->eid_id)
                                <option value="{{$eid->id}}">{{$eid->enterprise_id}}</option>
                                @endif
                                @endforeach
                            </td>

                            <td>
                                <div>
                                    <a href="{!!URL::route('editUser',[$user->id,
                                                 'enterprise_id' => $user->eid_id])!!}"
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

@push('plugin-scripts')
<script src="{{URL::asset('/assets/js/pages/fontawesome.init.js')}}"></script>
<script src="{{asset('/assets/js/pages/fontawesome.init.js')}}"></script>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
@endpush

@push('custom-scripts')

@endpush
