<!-- app/views/groupSms/create.blade.php -->

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
    <title>Smart Gov</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
{!! Form::model(new App\Models\SMS, ['route' => ['storeSMS']]) !!}
<!-- ============================================================= -->

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
    </aside>

    <div class="main p-3">
        <div class="navbar" style="background-color: yellow; margin-left:-15px; margin-top:-15px;">
            <!-- ================================ SEARCH BAR ================================ -->
            <div class="row1" style=" background-color: yellow; width:100%;">
                <div class="column1" style="float:left; width:40%;">
                    <span class="name" style="color:black; "><strong>USER GROUP SMS</strong></span>
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

        <!-- ============================================ Send SMS to a Group ========================================= -->
        <fieldset class="fieldset" style="display:inline;">
            <legend class="legend">Send SMS to a Group</legend>
            <div class="dept-details" style="display:inline;">
                <div class="input-box4">
                    <span class="details">Department:</span>
                    <select class="form-control input-sm form-control-sm" id="dept_id" name="dept_id" required>
                        <option value="">Select Department</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-box4">
                    <div class="groups-details" style="display:inline;">
                        <div>
                            <div class="input-box4">
                                <span class="details">Select User Group:</span>
                            </div>
                            <div class="input-box4">
                                <input type="checkbox" name="checkboxes[]" value="supervisor" id="supervisor">
                                <span class="details">Supervisors:</span>
                            </div>

                            <div class="input-box4">
                                <input type="checkbox" name="checkboxes[]" value="managers" id="managers">
                                <span class="details">General Managers:</span>
                            </div>

                            <div class="input-box4">
                                <input type="checkbox" name="checkboxes[]" value="departments" id="departments">
                                <span class="details">Head of Departments:</span>
                            </div>

                            <div class="input-box4">
                                <input type="checkbox" name="checkboxes[]" value="agents" id="agents">
                                <span class="details">Call-Centre Agents:</span>
                            </div>

                            <div class="input-box4">
                                <input type="checkbox" name="checkboxes[]" value="nurses" id="nurses">
                                <span class="details">Nurses:</span>
                            </div>
                        </div> <br>
                        <div>
                            <div class="input-box4">
                                <input type="checkbox" name="checkboxes[]" value="doctors" id="doctors">
                                <span class="details">Doctors:</span>
                            </div>

                            <div class="input-box4">
                                <input type="checkbox" name="checkboxes[]" value="pilots" id="pilots">
                                <span class="details">Pilots:</span>
                            </div>

                            <div class="input-box4">
                                <input type="checkbox" name="checkboxes[]" value="guards" id="guards">
                                <span class="details">Life Guards:</span>
                            </div>

                            <div class="input-box4">
                                <input type="checkbox" name="checkboxes[]" value="paramedics" id="paramedics">
                                <span class="details">Paramedics:</span>
                            </div>

                            <div class="input-box4">
                                <input type="checkbox" name="checkboxes[]" value="assistants" id="assistants">
                                <span class="details">Assistants:</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>

        <!-- ====================================== SMS Content =============================================== -->
        <fieldset class="fieldset" style="display:inline;">
            <legend class="legend">SMS Content</legend>
            <div class="sms-details" style="display:inline;">
                <div class="input-box1">
                    <textarea id="w3review" name="contents" required></textarea>
                    <span class="details">Remaining characters 160</span>
                </div>
            </div>
        </fieldset>
    </div>
    <a href="{!!URL::route('login')!!}" class="btn btn-info" role="button">CANCEL</a>
    {!! Form::submit('Send SMS', array('class' => 'btn btn-primary')) !!}
    {!! Form::close() !!}
</div>

</body>
</html>
