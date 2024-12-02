<!-- app/views/air_ambulance/add.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMARTGOV</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/sidebar.css" />
    <link rel="stylesheet" href="css/users_list.css" />
    <link rel="stylesheet" href="css/search_bar.css" />
    <link rel="stylesheet" href="css/forms.css" />
    <title>Smart Gov</title>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="css/nav_profile.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/forms2.css" />

    <script>
        $(document).ready(function(){
            $(".profile .icon_wrap").click(function(){
                $(this).parent().toggleClass("active");
                $(".notifications").removeClass("active");
            });

            $(".notifications .icon_wrap").click(function(){
                $(this).parent().toggleClass("active");
                $(".profile").removeClass("active");
            });

            $(".show_all .link").click(function(){
                $(".notifications").removeClass("active");
                $(".popup").show();
            });

            $(".close").click(function(){
                $(".popup").hide();
            });
        });
    </script>

</head>
//<?php
//session_start();
//include "conn.php";
//$current_user = $_SESSION['currentUser'];
//?>
//<?php
//if(isset($_POST['btn_cancel'])) {
//    echo"<script>location.href = 'modules.php?'</script>";
//}
//if(isset($_POST['btn_next'])) {
//    echo"<script>location.href = 'air_ambulance2.php?'</script>";
//}
//?>
<body>

<!-- NAVIGATION WITH LOGO AND USER PROFILE -->
<!-- ============================================================= -->
<form action="{{ route('addAirAmb') }}" method="POST" enctype="multipart/form-data" autocomplete="off" style="width:100%; margin-top:0px;">
    @csrf
    <div class="row" style=" background-color: white;">
        <div class="column" style="float:left;">
            <img src="img/NEW KZNDOH logo1.png" style="margin-left:5%; width:350px; height:100px;">
        </div>
        <div class="column" style="width:20%; float:right;">
            <div class="column" style="width:12%; float:right;">
                <img src="img/pic.png" alt="profile_pic" style="height:60px; width:60px; margin-top:20px;">
            </div>
            <div class="column" style=" margin-top:30px; float:right; ">
                <span class="name" style="color:black; ">Nzuki Mtshazi</span>
                <li ><a href="test.php"><span  style="color:black;  align: center;"><img src="img/edit.png" style="height:15px; width:15px;"></span>Edit</a>
                    <a href="index.php"><span style="color:black; margin-left:20px;"><img src="img/log-out.png" style="height:15px; width:15px;"></span>Logout</a></li>
            </div>

        </div>
    </div>
    <!-- =================================================================== -->

    <div class="wrapper">

        <aside id="sidebar" style="background-color:darkgreen;">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="#">SIDE MENU</a>
                </div>
            </div>

            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="dashboard.php" class="sidebar-link">
                        <img src="img/Dashboard 1.png" style="height:25px; width:25px; color:white;">
                        <span>DASHBOARD</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="modules.php" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                       data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <img src="img/Modules 1.png" style="height:25px; width:25px; color:white;">
                        <span>MODULES</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar1">
                        <li class="sidebar-item">
                            <a href="air_ambulance1.php" class="sidebar-link">Air Ambulance</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="complaints1.php" class="sidebar-link">Complaints</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="emergency1.php" class="sidebar-link">Emergency Medical Services</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="generic1.php" class="sidebar-link">Generic Call</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="hospital.php" class="sidebar-link">Hospital / Clinic Daily Status</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="forensic.php" class="sidebar-link">Forensic / Montuary</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="reports.php" class="sidebar-link">
                        <img src="img/Reports 1.png" style="height:25px; width:25px; color:white;">
                        <span>REPORTS</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                       data-bs-target="#multi" aria-expanded="false" aria-controls="multi">
                        <img src="img/User Management 1.png" style="height:25px; width:25px; color:white;">
                        <span>USERS</span>
                    </a>
                    <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="users.php" class="sidebar-link">All Users</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="users_role.php" class="sidebar-link">User Role Editor</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="user_group.php" class="sidebar-link">User Group SMS</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="news.php" class="sidebar-link">
                        <img src="img/News & Events 1.png" style="height:25px; width:25px; color:white;">
                        <span>NEWS & EVENTS</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="gallery.php" class="sidebar-link">
                        <img src="img/Gallery 1.png" style="height:25px; width:25px; color:white;">
                        <span>GALLERY</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="settings.php" class="sidebar-link">
                        <img src="img/Settings 1.png" style="height:25px; width:25px; color:white;">
                        <span>SETTINGS</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="index.php" class="sidebar-link">
                    <img src="img/log-out.png" style="height:25px; width:25px; color:white;">
                    <span>Logout</span>
                </a>
            </div>
        </aside>

        <div class="main p-3">
            <div class="navbar" style="background-color: yellow; margin-left:-15px; margin-top:-15px;">
                <!-- ================================ SEARCH BAR ================================ -->
                <div class="row1" style=" background-color: yellow; width:100%;">
                    <div class="column1" style="float:left; width:40%;">
                        <span class="name" style="color:black; "><strong>AIR AMBULANCE</strong></span>
                    </div>
                    <div class="column1" style="float:right; width:30%;">
                        <input type="text" class="txt_search" placeholder="Search" name="search">
                        <button type="submit" class="btn_search"><i class="fa fa-search" style="color:black;"></i></button>

                        <div class="column1" style="float:right; width:20%;">
                            <button class="btn_add"> Add User <i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </div>
                <!-- ===================================================================================== -->
            </div>

            <!-- ========================================== Caller Information =========================================== -->
            <fieldset class="fieldset" style="display:inline;">
                <legend class="legend">Caller Information</legend>
                <div class="user-details" style="display:inline;">
                    <div class="input-box6">
                        <span class="details">Name:</span>
                        <input type="text" name="fullName" required>
                    </div>
                    <div class="input-box6">
                        <span class="details">Telephone No:</span>
                        <input type="text" name="telephoneNo" required>
                    </div>
                    <div class="input-box6">
                        <span class="details">Mobile No:</span>
                        <input type="text" name="mobileNo" required>
                    </div>
                    <div class="input-box6">
                        <span class="details">District:</span>
                        <select class="form-control input-sm form-control-sm" name="district" id="district">
                            <option value="">Select District</option>
                            @foreach($districts as $district)
                                <option value="{{$district->id}}" @if(old('district_id')==$district->id)
                                selected="selected"@endif>{{$district->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-box6">
                        <span class="details">Institution:</span>
                        <select class="form-control input-sm form-control-sm" name="institution" id="institution">
                            <option value="">Select Institution</option>
                            @foreach($institutions as $institution)
                                <option value="{{$institution->id}}" @if(old('institution_id')==$institution->id)
                                selected="selected"@endif>{{$institution->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-box6">
                        <span class="details">Institution Type:</span>
                        <select name="institution_type" id="institution_type" required>
                            <option value="*">Choose Institution Type</option>
                            <option value="Hospital">Hospital</option>
                            <option value="Clinic">Clinic</option>
                        </select>
                    </div>
                </div>
            </fieldset>
            <!-- ====================================== Control Center =============================================== -->
            <fieldset class="fieldset" style="display:inline;">
                <legend class="legend">Control Center</legend>
                <div class="user-details" style="display:inline;">
                    <div class="input-box4">
                        <span class="details">Aircraft Type:</span>
                        <select name="aircraft_type" id="aircraft_type">
                            <option value="*">Select Aircraft</option>
                            <option value="Rotor Wing">Rotor Wing</option>
                            <option value="Fixed Wing">Fixed Wing</option>
                        </select>
                    </div>
                    <div class="input-box4">
                        <span class="details">Call Type:</span>
                        <select name="call_type" id="call_type">
                            <option value="*">Select Call Type</option>
                            <option value="Hot Response">Hot Response</option>
                            <option value="Transfer">Transfer</option>
                        </select>
                    </div>
                    <div class="input-box4">
                        <span class="details">Service Provider:</span>
                        <input type="text" name="service_provider">
                    </div>
                    <div class="input-box4">
                        <span class="details">Incient:</span>
                        <select class="form-control input-sm form-control-sm" name="incident_id" id="incident_id">
                            <option value="">Select an Incident</option>
                            @foreach($incidents as $incident)
                                <option value="{{$incident->id}}" @if(old('incident_id')==$incident->id)
                                selected="selected"@endif>{{$incident->description}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="user-details" style="display:inline;">
                    <div class="input-box1">
                        <span class="details">Motivation:</span>
                        <textarea id="motivation" name="motivation"></textarea>
                    </div>
                </div>
            </fieldset>
            <!-- ========================================== Referring Institution =========================================== -->
            <fieldset class="fieldset" style="display:inline;">
                <legend class="legend">Referring Institution</legend>
                <div class="user-details" style="display:inline;">
                    <div class="input-box6">
                        <span class="details">District:</span>
                        <select class="form-control input-sm form-control-sm" name="district2" id="district2">
                            <option value="">Select the Referring District</option>
                            @foreach($districts as $district)
                            <option value="{{$district->id}}" @if(old('district_id')==$district->id)
                            selected="selected"@endif>{{$district->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-box6">
                        <span class="details">Institution:</span>
                        <select class="form-control input-sm form-control-sm" name="institution2" id="institution2">
                            <option value="">Select the Referring Institution</option>
                            @foreach($institutions as $institution)
                                <option value="{{$institution->id}}" @if(old('institution_id')==$institution->id)
                                selected="selected"@endif>{{$institution->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-box6">
                        <span class="details">Ward:</span>
                        <input type="text" name="ward">
                    </div>
                    <div class="input-box6">
                        <span class="details">Doctor:</span>
                        <input type="text" name="doctor">
                    </div>
                    <div class="input-box6">
                        <span class="details">Telephone No:</span>
                        <input type="text" name="telephone_no">
                    </div>
                    <div class="input-box6">
                        <span class="details">Mobile No:</span>
                        <input type="text" name="mobile_no">
                    </div>
                </div>
            </fieldset>
            <!-- ========================================== Receiving Institution =========================================== -->
            <fieldset class="fieldset" style="display:inline;">
                <legend class="legend">Receiving Institution</legend>
                <div class="user-details" style="display:inline;">
                    <div class="input-box6">
                        <span class="details">District:</span>
                        <select class="form-control input-sm form-control-sm" name="district3" id="district3">
                            <option value="">Select the Receiving District</option>
                            @foreach($districts as $district)
                                <option value="{{$district->id}}" @if(old('district_id')==$district->id)
                                selected="selected"@endif>{{$district->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-box6">
                        <span class="details">Institution:</span>
                        <select class="form-control input-sm form-control-sm" name="institution3" id="institution3">
                            <option value="">Select the Receiving Institution</option>
                            @foreach($institutions as $institution)
                                <option value="{{$institution->id}}" @if(old('institution_id')==$institution->id)
                                selected="selected"@endif>{{$institution->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-box6">
                        <span class="details">Ward:</span>
                        <input type="text" name="recWard">
                    </div>
                    <div class="input-box6">
                        <span class="details">Doctor:</span>
                        <input type="text" name="recDoctor">
                    </div>
                    <div class="input-box6">
                        <span class="details">Telephone No:</span>
                        <input type="text" name="recTelephone_no">
                    </div>
                    <div class="input-box6">
                        <span class="details">Mobile No:</span>
                        <input type="text" name="recMobile_no">
                    </div>
                </div>
            </fieldset>
            <!-- ============================================ Patient Institution ========================================= -->
            <fieldset class="fieldset" style="display:inline;">
                <legend class="legend">Patient Institution</legend>
                <div class="user-details" style="display:inline;">
                    <div class="input-box6">
                        <span class="details">Patient Name:</span>
                        <input type="text" name="patient_name">
                    </div>
                    <div class="input-box6">
                        <span class="details">Gender:</span>
                        <select name="gender" id="gender">
                            <option value="*">Please choose gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="input-box6">
                        <span class="details">Age:</span>
                        <input type="number" name="age">
                    </div>
                    <div class="input-box6">
                        <span class="details">Weight (kg):</span>
                        <input type="text" name="weight">
                    </div>
                    <div class="input-box6">
                        <span class="details">Diagnosis:</span>
                        <input type="text" name="diagnosis">
                    </div>
                    <div class="input-box6">
                        <span class="details">Case Type:</span>
                        <select class="form-control input-sm form-control-sm" name="caseType_id" id="caseType_id">
                            <option value="">Choose the Case Type</option>
                            @foreach($caseTypes as $caseType)
                                <option value="{{$caseType->id}}" @if(old('caseType_id')==$caseType->id)
                                selected="selected"@endif>{{$caseType->type}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </fieldset>
            <!-- ============================================ Hot Response ========================================= -->
            <fieldset class="fieldset" style="display:inline;">
                <legend class="legend">Hot Response</legend>
                <div class="user-details" style="display:inline;">
                    <div class="input-box5">
                        <span class="details">District:</span>
                        <input type="text" name="hotResponse_district">
                    </div>
                    <div class="input-box5">
                        <span class="details">Weather:</span>
                        <input type="text" name="weather">
                    </div>
                    <div class="input-box5">
                        <span class="details">GPS (Latitude):</span>
                        <input type="text" name="gps_latitude">
                    </div>
                    <div class="input-box5">
                        <span class="details">GPS (Longitude):</span>
                        <input type="text" name="gps_longitude">
                    </div>
                    <div class="input-box5">
                        <span class="details">Pick Up Point:</span>
                        <input type="text" name="pickUp_point">
                    </div>
                </div>
                <div class="user-details" style="display:inline;">
                    <div class="input-box5">
                        <span class="details">Landing Area:</span>
                        <input type="text" name="landing_area">
                    </div>
                    <div class="input-box5">
                        <span class="details">Landmark:</span>
                        <input type="text" name="landmark">
                    </div>
                    <div class="input-box5">
                        <span class="details">Ground Contact:</span>
                        <input type="text" name="ground_contact">
                    </div>
                    <div class="input-box5" style="width:40%;">
                        <span class="details">Marking Devices:</span>
                        <input type="text" name="marking_devices">
                    </div>
                </div>
            </fieldset>
            <!-- ============================================ Authority ========================================= -->
            <fieldset class="fieldset" style="display:inline;">
                <legend class="legend">Authority</legend>
                <div class="user-details" style="display:inline;">
                    <div class="input-box5">
                        <span class="details">Request Status:</span>
                        <select name="req_status" id="req_status">
                            <option value="Status1">Status1</option>
                            <option value="Status2">Status2</option>
                        </select>
                    </div>
                    <div class="input-box5">
                        <span class="details">Updated By:</span>
                        <input type="text" name="updated_by">
                    </div>
                    <div class="input-box5">
                        <span class="details">Time:</span>
                        <input type="time" name="auth_time">
                    </div>
                    <div class="input-box5" style="width:40%;">
                        <span class="details">Reason:</span>
                        <input type="text" name="auth_reason">
                    </div>
                </div>
            </fieldset>
            <!-- ============================================ Stand Down Notes ========================================= -->
            <fieldset class="fieldset" style="display:inline;">
                <legend class="legend">Stand Down Notes</legend>
                <div class="user-details" style="display:inline;">
                    <div class="input-box5">
                        <span class="details">Name:</span>
                        <input type="text" name="down_name">
                    </div>
                    <div class="input-box5">
                        <span class="details">Notification:</span>
                        <select name="notifications" id="notifications">
                            <option value="Notification1">Notification1</option>
                            <option value="Notification2">Notification2</option>
                        </select>
                    </div>
                    <div class="input-box5" style="width:60%;">
                        <span class="details">Reason:</span>
                        <input type="text" name="reason">
                    </div>
                </div>
            </fieldset>
            <!-- ===================================================================================== -->
        </div>
        <a href="{!!URL::route('login')!!}" class="btn btn-info" role="button">CANCEL</a>
        <button type="submit">Next</button>
        {!! Form::close() !!}
    </div>
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>
    <script src="script.js"></script> -->
</form>
<script>
    $(document).ready(function() {
        // On district change, make an AJAX request to get the institutions
        $('#district').change(function() {
            var districtId = $(this).val();
            if (districtId) {
                $.ajax({
                    url: '/smartGOV/public/get-institutions/' + districtId,
                    type: 'GET',
                    success: function(data) {
                        $('#institution').html('<option value="">Select Institution</option>'); // Clear current options
                        $.each(data, function(key, value) {
                            $('#institution').append('<option value="'+value.id+'">'+value.name+'</option>');
                        });
                    }
                });
            } else {
                $('#institution').html('<option value="">Select Institution</option>');
            }
        });
    });
    $(document).ready(function() {
        // On district change, make an AJAX request to get the institutions
        $('#district2').change(function() {
            var districtId = $(this).val();
            if (districtId) {
                $.ajax({
                    url: '/smartGOV/public/get-institutions/' + districtId,
                    type: 'GET',
                    success: function(data) {
                        $('#institution2').html('<option value="">Select Institution</option>'); // Clear current options
                        $.each(data, function(key, value) {
                            $('#institution2').append('<option value="'+value.id+'">'+value.name+'</option>');
                        });
                    }
                });
            } else {
                $('#institution2').html('<option value="">Select Institution</option>');
            }
        });
    });
    $(document).ready(function() {
        // On district change, make an AJAX request to get the institutions
        $('#district3').change(function() {
            var districtId = $(this).val();
            if (districtId) {
                $.ajax({
                    url: '/smartGOV/public/get-institutions/' + districtId,
                    type: 'GET',
                    success: function(data) {
                        $('#institution3').html('<option value="">Select Institution</option>'); // Clear current options
                        $.each(data, function(key, value) {
                            $('#institution3').append('<option value="'+value.id+'">'+value.name+'</option>');
                        });
                    }
                });
            } else {
                $('#institution3').html('<option value="">Select Institution</option>');
            }
        });
    });
</script>
</body>

</html>