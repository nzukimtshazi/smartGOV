<!-- app/views/incident_management/add.blade.php -->

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
    <!--<link rel="stylesheet" href="css/sidebar.css" />
    <link rel="stylesheet" href="css/users_list.css" />
    <link rel="stylesheet" href="css/search_bar.css" />
    <link rel="stylesheet" href="css/forms.css" />-->
    <title>Smart Gov</title>
    <!--<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!--<link rel="stylesheet" href="css/nav_profile.css" />-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--<link rel="stylesheet" href="css/forms2.css" />-->

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
//if(isset($_POST['btn_capture'])) {
//    echo"<script>location.href = 'hospital2.php?'</script>";
//}
//?>
<body>

<!-- NAVIGATION WITH LOGO AND USER PROFILE -->
{!! Form::model(new App\Models\IncidentManagement, ['route' => ['storeIM']]) !!}
<!-- ============================================================= -->
<!--<div class="row" style=" background-color: white;">
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
</div>-->
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
        <!--<div class="sidebar-footer">
            <a href="index.php" class="sidebar-link">
                <img src="img/log-out.png" style="height:25px; width:25px; color:white;">
                <span>Logout</span>
            </a>
        </div>-->
    </aside>

    <div class="main p-3">
        <div class="navbar" style="background-color: yellow; margin-left:-15px; margin-top:-15px;">
            <!-- ================================ SEARCH BAR ================================ -->
            <div class="row1" style=" background-color: yellow; width:100%;">
                <div class="column1" style="float:left; width:40%;">
                    <span class="name" style="color:black; "><strong>INCIDENT MANAGEMENT</strong></span>
                </div>
                <div class="column1" style="float:right; width:30%;">
                    <input type="text" class="txt_search" placeholder="Search" name="search" style="display:none;">
                    <button type="submit" class="btn_search" style="display:none;"><i class="fa fa-search" style="color:black;"></i></button>

                    <div class="column1" style="float:right; width:10%;">
                        <button class="btn_add" style="width:70%;"><i class="fa fa-eye"></i></button>
                    </div>
                </div>
            </div>
            <!-- ===================================================================================== -->
        </div>

        <!-- ============================================ Caller Details ========================================= -->
        <fieldset class="fieldset" style="display:inline;">
            <legend class="legend">Caller Details</legend>
            <div class="user-details" style="display:inline;">
                <div class="input-box4">
                    <span class="details">Name:</span>
                    <input type="text" name="name" required>
                </div>
                <div class="input-box4">
                    <span class="details">Telephone No:</span>
                    <input type="text" name="telephoneNo" required>
                </div>
                <div class="input-box4">
                    <span class="details">Mobile No:</span>
                    <input type="text" name="mobileNo" required>
                </div>
                <div class="input-box4">
                    <span class="details">e-Mail Address:</span>
                    <input type="text" name="e_mail" required>
                </div>

            </div>
        </fieldset>

        <!-- ============================================ Call Details ========================================= -->
        <fieldset class="fieldset" style="display:inline;">
            <legend class="legend">Call Details</legend>
            <div class="caller-details" style="display:inline;">
                <div class="input-box4">
                    <span class="details">Report No:</span>
                    <input type="text" name="reportNo" required>
                </div>
                <div class="input-box4">
                    <label style="float:left;">District:</label>
                    <select class="form-control input-sm form-control-sm" id="district" name="district" required>
                        <option value="">Select District</option>
                            @foreach($districts as $district)
                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                            @endforeach
                    </select>
                </div>

                <div class="input-box4">
                    <span class="details">Institution:</span>
                    <select class="form-control input-sm form-control-sm" name="institution" id="institution" required>
                        <option value="">Select Institution</option>
                        @foreach($institutions as $institution)
                        <option value="{{ $institution->id }}">{{ $institution->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="input-box4">
                    <span class="details">Type of Institution:</span>
                    <select name="route" id="route">
                        <option value="*">Select Institution Type</option>
                        <option value="Hospital">Hospital</option>
                        <option value="Clinic">Clinic</option>
                    </select>
                </div>

                <div class="input-box4">
                    <label style="float:left;">Type:</label>
                    <select class="form-control input-sm form-control-sm" id="type_id" name="type_id" required>
                        <option value="">Select Incident Type</option>
                        @foreach($incident_types as $type)
                            <option value="{{ $type->id }}">{{ $type->type }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="input-box4">
                    <label style="float:left;">Caller:</label>
                    <select class="form-control input-sm form-control-sm" id="caller_id" name="caller_id" required>
                        <option value="">Select Caller</option>
                        @foreach($callers as $caller)
                        <option value="{{ $caller->id }}">{{ $caller->caller }}</option>
                        @endforeach
                    </select>
                </div>
            </div><br>
            <div class="caller-details" style="display:inline;">
                <div class="input-box4">
                    <span class="details">Route:</span>
                    <select name="route" id="route">
                        <option value="*">Please Select Route</option>
                        <option value="Urban">Urban</option>
                        <option value="Rural">Rural</option>
                        <option value="Industrial">Industrial</option>
                        <option value="Other">Rural</option>
                    </select>
                </div>
                <div class="input-box4">
                    <span class="details">GPS (Latitude):</span>
                    <input type="text" name="gps_latitude" required>
                </div>

                <div class="input-box4">
                    <span class="details">GPS (Longitude):</span>
                    <input type="text" name="gps_longitude" required>
                </div>

                <div class="input-box4">
                    <span class="details">Incident Location:</span>
                    <input type="text" name="incident_location" required>
                </div>
            </div>
        </fieldset>

        <!-- ============================================ Triage ========================================= -->
        <fieldset class="fieldset" style="display:inline;">
            <legend class="legend">Triage</legend>
            <div class="triage-details" style="display:inline;">
                <div class="input-box4">
                    <span class="details" style="background-color: black; color: orangered">Adults</span>
                </div>
                <div class="input-box4">
                    <span class="details">Entrapments:</span>
                    <input type="text" name="adult_entrapment" required>
                </div>

                <div class="input-box4">
                    <span class="details">Red:</span>
                    <input type="text" name="adult_red" required>
                </div>

                <div class="input-box4">
                    <span class="details">Yellow:</span>
                    <input type="text" name="adult_yellow" required>
                </div>

                <div class="input-box4">
                    <span class="details">Green:</span>
                    <input type="text" name="adult_green" required>
                </div>

                <div class="input-box4">
                    <span class="details">Blue:</span>
                    <input type="text" name="adult_blue" required>
                </div>

                <div class="input-box4">
                    <span class="details">Total:</span>
                    <input type="text" name="adult_total" required>
                </div>
            </div> <br>

            <div class="triage-details" style="display:inline;">
                <div class="input-box4">
                    <span class="details" style="background-color: black; color: orangered">Children</span>
                </div>
                <div class="input-box4">
                    <span class="details">Entrapments:</span>
                    <input type="text" name="child_entrapment" required>
                </div>

                <div class="input-box4">
                    <span class="details">Red:</span>
                    <input type="text" name="child_red" required>
                </div>

                <div class="input-box4">
                    <span class="details">Yellow:</span>
                    <input type="text" name="child_yellow" required>
                </div>

                <div class="input-box4">
                    <span class="details">Green:</span>
                    <input type="text" name="child_green" required>
                </div>

                <div class="input-box4">
                    <span class="details">Blue:</span>
                    <input type="text" name="child_blue" required>
                </div>

                <div class="input-box4">
                    <span class="details">Total:</span>
                    <input type="text" name="child_total" required>
                </div>
            </div>
        </fieldset>

        <!-- =================================Mechanical Response ========================================= -->
        <fieldset class="fieldset" style="display:inline;">
            <legend class="legend">Mechanical Response</legend>
            <div class="triage-details" style="display:inline;">
                <div class="input-box4">
                    <span class="details">ALS:</span>
                    <input type="checkbox" id="als" name="als" {{ old('als') ? 'checked' : '' }}>
                </div>

                <div class="input-box4">
                    <span class="details">Doctor:</span>
                    <input type="checkbox" id="doctor" name="doctor" {{ old('doctor') ? 'checked' : '' }}>
                </div>

                <div class="input-box4">
                    <span class="details">PTV:</span>
                    <input type="checkbox" id="ptv" name="ptv" {{ old('ptv') ? 'checked' : '' }}>
                </div>

                <div class="input-box4">
                    <span class="details">ESV's:</span>
                    <input type="checkbox" id="esv" name="esv" {{ old('esvk') ? 'checked' : '' }}>
                </div>

                <div class="input-box4">
                    <span class="details">Air Support:</span>
                    <input type="checkbox" id="air" name="air" {{ old('air') ? 'checked' : '' }}>
                </div>

                <div class="input-box4">
                    <span class="details">Co-ordination:</span>
                    <input type="checkbox" id="co" name="co" {{ old('co') ? 'checked' : '' }}>
                </div>

                <div class="input-box4">
                    <span class="details">Rescue:</span>
                    <input type="checkbox" id="rescue" name="rescue" {{ old('rescue') ? 'checked' : '' }}>
                </div>
            </div> <br>

            <div class="triage-details" style="display:inline;">
                <div class="input-box4">
                    <span class="details">Disaster Bus:</span>
                    <input type="checkbox" id="bus" name="bus" {{ old('bus') ? 'checked' : '' }}>
                </div>

                <div class="input-box4">
                    <span class="details">Truck:</span>
                    <input type="checkbox" id="truck" name="truck" {{ old('truck') ? 'checked' : '' }}>
                </div>

                <div class="input-box4">
                    <span class="details">Fire Truck:</span>
                    <input type="checkbox" id="fire" name="fire" {{ old('fire') ? 'checked' : '' }}>
                </div>

                <div class="input-box4">
                    <span class="details">Rescue Boat:</span>
                    <input type="checkbox" id="boat" name="boat" {{ old('boat') ? 'checked' : '' }}>
                </div>

                <div class="input-box4">
                    <span class="details">Traffic Units:</span>
                    <input type="checkbox" id="units" name="units" {{ old('units') ? 'checked' : '' }}>
                </div>

                <div class="input-box4">
                    <span class="details">SAPS Units:</span>
                    <input type="checkbox" id="saps" name="saps" {{ old('saps') ? 'checked' : '' }}>
                </div>

                <div class="input-box4">
                    <span class="details">Other:</span>
                    <input type="checkbox" id="other" name="other" {{ old('other') ? 'checked' : '' }}>
                </div>
            </div>
        </fieldset>

        <!-- =================================Human Resources ========================================= -->
        <fieldset class="fieldset" style="display:inline;">
            <legend class="legend">Human Resources</legend>
            <div class="triage-details" style="display:inline;">
                <div class="input-box4">
                    <span class="details">ALS:</span>
                    <input type="checkbox" id="hrals" name="hrals" {{ old('hrals') ? 'checked' : '' }}>
                </div>

                <div class="input-box4">
                    <span class="details">Doctor:</span>
                    <input type="checkbox" id="hrdoctor" name="hrdoctor" {{ old('hrdoctor') ? 'checked' : '' }}>
                </div>

                <div class="input-box4">
                    <span class="details">NSRI:</span>
                    <input type="checkbox" id="nsri" name="nsri" {{ old('nsri') ? 'checked' : '' }}>
                </div>

                <div class="input-box4">
                    <span class="details">Sharks Board:</span>
                    <input type="checkbox" id="shark" name="shark" {{ old('shark') ? 'checked' : '' }}>
                </div>

                <div class="input-box4">
                    <span class="details">Managers:</span>
                    <input type="checkbox" id="managers" name="managers" {{ old('managers') ? 'checked' : '' }}>
                </div>

                <div class="input-box4">
                    <span class="details">BLS:</span>
                    <input type="checkbox" id="bls" name="bls" {{ old('bls') ? 'checked' : '' }}>
                </div>

                <div class="input-box4">
                    <span class="details">Drivers:</span>
                    <input type="checkbox" id="drivers" name="drivers" {{ old('drivers') ? 'checked' : '' }}>
                </div>
            </div> <br>

            <div class="triage-details" style="display:inline;">
                <div class="input-box4">
                    <span class="details">Fire Fighters:</span>
                    <input type="checkbox" id="fighters" name="fighters" {{ old('fighters') ? 'checked' : '' }}>
                </div>

                <div class="input-box4">
                    <span class="details">SAPS:</span>
                    <input type="checkbox" id="hrSAPS" name="hrSAPS" {{ old('hrSAPS') ? 'checked' : '' }}>
                </div>

                <div class="input-box4">
                    <span class="details">Navy:</span>
                    <input type="checkbox" id="navy" name="navy" {{ old('navy') ? 'checked' : '' }}>
                </div>

                <div class="input-box4">
                    <span class="details">Airforce:</span>
                    <input type="checkbox" id="airforce" name="airforce" {{ old('airforce') ? 'checked' : '' }}>
                </div>

                <div class="input-box4">
                    <span class="details">Task Force:</span>
                    <input type="checkbox" id="task" name="task" {{ old('task') ? 'checked' : '' }}>
                </div>

                <div class="input-box4">
                    <span class="details">Army:</span>
                    <input type="checkbox" id="hrArmy" name="hrArmy" {{ old('hrArmy') ? 'checked' : '' }}>
                </div>

                <div class="input-box4">
                    <span class="details">ILS:</span>
                    <input type="checkbox" id="ils" name="ils" {{ old('ils') ? 'checked' : '' }}>
                </div>
            </div> <br>
            <div class="triage-details" style="display:inline;">
                <div class="input-box4">
                    <span class="details">Co-ordination:</span>
                    <input type="checkbox" id="hrCo" name="hrCo" {{ old('hrCo') ? 'checked' : '' }}>
                </div>

                <div class="input-box4">
                    <span class="details">Mountain Rescue:</span>
                    <input type="checkbox" id="hrRescue" name="hrRescue" {{ old('hrRescue') ? 'checked' : '' }}>
                </div>
            </div>
        </fieldset>

        <!-- ============================================ Health Institutions ========================================= -->
        <fieldset class="fieldset" style="display:inline;">
            <legend class="legend">Health Institutions</legend>
            <div class="caller-details" style="display:inline;">
                <div class="input-box4">
                    <label style="float:left;">District:</label>
                    <select class="form-control input-sm form-control-sm" id="district2" name="district2" required>
                        <option value="">Select District</option>
                        @foreach($districts as $district)
                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="input-box4">
                    <span class="details">Institution:</span>
                    <select class="form-control input-sm form-control-sm" name="institution2" id="institution2" required>
                        <option value="">Select Institution</option>
                        @foreach($institutions as $institution)
                            <option value="{{ $institution->id }}">{{ $institution->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="input-box4">
                    <span class="details">Type:</span>
                    <select name="type" id="type">
                        <option value="*">Please Select Institution Type</option>
                        <option value="Hospital">Hospital</option>
                        <option value="Clinic">Clinic</option>
                    </select>
                </div>
                <div class="input-box4">
                    <span class="details">Blue:</span>
                    <input type="text" name="health_blue" required>
                </div>

                <div class="input-box4">
                    <span class="details">Red:</span>
                    <input type="text" name="health_red" required>
                </div>

                <div class="input-box4">
                    <span class="details">Yellow:</span>
                    <input type="text" name="health_yellow" required>
                </div>

                <div class="input-box4">
                    <span class="details">Green:</span>
                    <input type="text" name="health_green" required>
                </div>

                <div class="input-box4">
                    <span class="details">Total:</span>
                    <input type="text" name="health_total" required>
                </div>
            </div>
        </fieldset>

        <!-- ============================================ Response Details ========================================= -->
        <fieldset class="fieldset" style="display:inline;">
            <legend class="legend">Response Details</legend>
            <div class="caller-details" style="display:inline;">
                <div class="input-box4">
                    <span class="details">Response Time:</span>
                    <input type="text" name="response_time" required>
                </div>

                <div class="input-box4">
                    <span class="details">Incident Time:</span>
                    <input type="text" name="incident_time" required>
                </div>

                <div class="input-box4">
                    <span class="details">Duration Scene:</span>
                    <input type="text" name="duration" required>
                </div>

                <div class="input-box4">
                    <span class="details">Total Time:</span>
                    <input type="text" name="total_time" required>
                </div>

                <div class="input-box4">
                    <span class="details">Distance to Hospital:</span>
                    <input type="text" name="distance" required>
                </div>
            </div>
        </fieldset>

        <!-- =================================Supporting Services ========================================= -->
        <fieldset class="fieldset" style="display:inline;">
            <legend class="legend">Supporting Services</legend>
            <div class="triage-details" style="display:inline;">
                <div class="input-box4">
                    <span class="details">Private EMS:</span>
                    <input type="checkbox" id="private_ems" name="private_ems" {{ old('private_ems') ? 'checked' : '' }}>
                </div>

                <div class="input-box4">
                    <span class="details">Fire Services:</span>
                    <input type="checkbox" id="services" name="services" {{ old('services') ? 'checked' : '' }}>
                </div>

                <div class="input-box4">
                    <span class="details">Local Authority:</span>
                    <input type="checkbox" id="authority" name="authority" {{ old('authority') ? 'checked' : '' }}>
                </div>

                <div class="input-box4">
                    <span class="details">Police:</span>
                    <input type="checkbox" id="police" name="police" {{ old('police') ? 'checked' : '' }}>
                </div>

                <div class="input-box4">
                    <span class="details">Air Force:</span>
                    <input type="checkbox" id="air_force" name="air_force" {{ old('air_force') ? 'checked' : '' }}>
                </div>

                <div class="input-box4">
                    <span class="details">Road Traffic Inspectorate:</span>
                    <input type="checkbox" id="inspectorate" name="inspectorate" {{ old('inspectorate') ? 'checked' : '' }}>
                </div>
            </div> <br>

            <div class="triage-details" style="display:inline;">
                <div class="input-box4">
                    <span class="details">MRCC Activated:</span>
                    <select name="mrcc" id="mrcc">
                        <option value="*">Please Choose Y/N</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>

                <div class="input-box4">
                    <span class="details">First On Scene:</span>
                    <select class="form-control input-sm form-control-sm" id="onScene_id" name="onScene_id" required>
                        <option value="">Select First On Scene</option>
                        @foreach($first_onScenes as $scenes)
                            <option value="{{ $scenes->id }}">{{ $scenes->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </fieldset>

        <!-- ====================================== Call Status =============================================== -->
        <fieldset class="fieldset" style="display:inline;">
            <legend class="legend">Call Status</legend>
            <div class="user-details" style="display:inline;">
                <div class="input-box1">
                    <span class="details">Additional Information:</span>
                    <textarea id="w3review" name="additional_info" required></textarea>
                </div>
            </div>
        </fieldset>
    </div>
    <a href="{!!URL::route('login')!!}" class="btn btn-info" role="button">CANCEL</a>
    {!! Form::submit('CAPTURE', array('class' => 'btn btn-primary')) !!}
    {!! Form::close() !!}
</div>
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
</script>

<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
    <script src="script.js"></script> -->
</body>
</html>