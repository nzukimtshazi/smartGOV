<!-- app/views/generic_call/index.blade.php -->

@extends('layout/layout')

@section('content')

    <!-- Current air ambulance report -->

    <div class="page-content d-flex align-items-center justify-content-center">

        <div class="row w-100 mr-5 auth-page">
            <div class="col-md-8 col-xl-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="btn-group mr-2 mb-sm-0 float-sm-right mt-1">
                            <a href="generic_call/create" role="button"
                               class="btn btn-sm btn-outline-info waves-light waves-effect"><i
                                        class="ri-add-circle-line align-middle mr-2"></i>Log a Call</a>
                        </div>

                        <h4>GENERIC CALL</h4>

                        <table class="table table-striped mt-5" id="dataTable">
                        @if (count($generic_calls) > 0)

                            <!-- Table Headings -->
                                <thead>
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
                                </thead>

                                <!-- Table Body -->
                                <tbody>
                                @foreach ($generic_calls as $generic)
                                    <tr>
                                        <!-- Reference -->
                                        <td class="table-text">
                                            <div>{{ $generic->reference }}</div>
                                        </td>

                                        <td>
                                            <div>
                                                <a href="{!! URL::route('editCall', [$generic->id]) !!}" class="btn btn-sm btn-info mt-n2">
                                                    <i class="ri-edit-2-line mr-1"></i> View
                                                </a>
                                            </div>
                                        </td>

                                        <!-- Date Captured -->
                                        <td class="table-text">
                                            <div>{{ $generic->created_at }}</div>
                                        </td>

                                        <!-- Caller -->
                                        <td class="table-text">
                                            <div>{{ $generic->name }}</div>
                                        </td>

                                        <!-- Mobile No -->
                                        <td class="table-text">
                                            <div>{{ $generic->mobileNo }}</div>
                                        </td>

                                        <!-- Email Address -->
                                        <td class="table-text">
                                            <div>{{ $generic->email }}</div>
                                        </td>

                                        <!-- District -->
                                        <td class="table-text">
                                            <?php
                                                $district = \App\Models\District::find($generic->district_id);
                                            ?>
                                            <div>{{ $district->name }}</div>
                                        </td>

                                        <!-- Institution -->
                                        <td class="table-text">
                                            <?php
                                                $institution = \App\Models\Institution::find($generic->institution_id);
                                            ?>
                                            <div>{{ $institution->name }}</div>
                                        </td>

                                        <!-- Institution Type -->
                                        <td class="table-text">
                                            <div>{{ $generic->institution_type }}</div>
                                        </td>

                                        <!-- Feedback -->
                                        <td class="table-text">
                                            <div>{{ 'No Feedback' }}</div>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            @else
                                <div class="alert alert-info mt-5" role="alert">No generic calls have been made</div>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

