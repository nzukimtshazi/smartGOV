<!-- app/views/air_ambulance/add2.blade.php -->

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
<?php
if(isset($_POST['btn_cancel'])) {
    echo"<script>location.href = 'dashboard.php?'</script>";
}
if(isset($_POST['btn_capture'])) {
    echo"<script>location.href = 'air_ambulance3.php?'</script>";
}
?>
<body>

<!-- NAVIGATION WITH LOGO AND USER PROFILE -->
{!! Form::model(new App\Models\User, ['route' => ['storeAirAmb']]) !!}
    <!-- ============================================================= -->
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

            <!-- ============================================ Respiratory ========================================= -->
            <fieldset class="fieldset" style="display:inline;">
                <legend class="legend">Respiratory</legend>
                <div class="user-details" style="display:inline;">
                    <div class="input-box5">
                        <span class="details">Respiratory:</span>
                        <input type="text" name="respiratory">
                    </div>
                    <div class="input-box5">
                        <span class="details">Rate:</span>
                        <input type="text" name="r_rate">
                    </div>
                    <div class="input-box5">
                        <span class="details">Airway Methods:</span>
                        <input type="text" name="airway">
                    </div>
                    <div class="input-box5">
                        <span class="details">PEEP:</span>
                        <input type="text" name="peep">
                    </div>
                    <div class="input-box5">
                        <span class="details">Intercostal Drain:</span>
                        <input type="text" name="intercoastal">
                    </div>
                </div>
            </fieldset>
            <!-- ========================================== Drug Infusion =========================================== -->
            <fieldset class="fieldset" style="display:inline;">
                <legend class="legend">Drug Infusion</legend>
                <div class="user-details" style="display:inline;">
                    <div class="input-box7">
                        <span class="details">Name Of Drug:</span>
                        <input type="text" name="d_name">
                    </div>
                    <div class="input-box7">
                        <span class="details">Dose:</span>
                        <input type="text" name="d_dose">
                    </div>
                    <div class="input-box7"  style="width:42%;">
                        <span class="details">Fluid Amount & Type:</span>
                        <input type="text" name="d_fluid_amount">
                    </div>
                    <div class="input-box7" style="width:7%;">
                        <span class="details">Rate:</span>
                        <input type="text" name="d_rate">
                    </div>
                    <div class="input-box7" style="width:7%;">
                        <span class="details">Start:</span>
                        <input type="time" name="d_start">
                    </div>
                    <div class="input-box7" style="width:7%;">
                        <span class="details">Stop:</span>
                        <input type="time" name="d_stop">
                    </div>
                    <div class="input-box7" style="width:7%;">
                        <span class="details">Left:</span>
                        <input type="text" name="d_left">
                    </div>
                </div>
            </fieldset>
            <!-- ========================================== Cardlovascular =========================================== -->
            <fieldset class="fieldset" style="display:inline;">
                <legend class="legend">Cardlovascular</legend>
                <div class="user-details" style="display:inline;">
                    <div class="input-box7">
                        <span class="details">Pulse Rate:</span>
                        <input type="text" name="c_rate">
                    </div>
                    <div class="input-box7">
                        <span class="details">Pulse Rhythm:</span>
                        <input type="text" name="rhythm">
                    </div>
                    <div class="input-box7">
                        <span class="details">Blood Pressure:</span>
                        <input type="text" name="c_blood">
                    </div>
                    <div class="input-box7">
                        <span class="details">IV Line Central:</span>
                        <input type="text" name="c_iv_line_c">
                    </div>
                    <div class="input-box7">
                        <span class="details">Pacemaker:</span>
                        <input type="text" name="pacemaker">
                    </div>
                    <div class="input-box7">
                        <span class="details">IV Line Peiphill:</span>
                        <input type="text" name="c_iv_line_p">
                    </div>
                    <div class="input-box7">
                        <span class="details">Arterial Line:</span>
                        <input type="text" name="c_arterial">
                    </div>
                </div>
            </fieldset>
            <!-- ========================================== Neurological =========================================== -->
            <fieldset class="fieldset" style="display:inline;">
                <legend class="legend">Neurological</legend>
                <div class="user-details" style="display:inline;">
                    <div class="input-box7">
                        <span class="details">Glasgow Coma Scale:</span>
                        <input type="text" name="n_glasgow">
                    </div>
                    <div class="input-box7">
                        <span class="details">Eyes:</span>
                        <input type="text" name="n_eyes">
                    </div>
                    <div class="input-box7">
                        <span class="details">Motor:</span>
                        <input type="text" name="n_motor">
                    </div>
                    <div class="input-box7">
                        <span class="details">Verbal:</span>
                        <input type="text" name="n_vebal">
                    </div>
                    <div class="input-box7">
                        <span class="details">Pupils:</span>
                        <input type="text" name="n_pupils">
                    </div>
                    <div class="input-box7">
                        <span class="details">Left:</span>
                        <input type="text" name="left">
                    </div>
                    <div class="input-box7">
                        <span class="details">Right:</span>
                        <select name="n_right" id="cars">
                            <option value="volvo">Value</option>
                            <option value="mercedes">Value</option>
                            <option value="audi">Value</option>
                        </select>
                    </div>
                </div>
            </fieldset>
            <!-- ========================================== Blood =========================================== -->
            <fieldset class="fieldset" style="display:inline;">
                <legend class="legend">Blood</legend>
                <div class="user-details" style="display:inline;">
                    <div class="input-box7">
                        <span class="details">ph:</span>
                        <input type="text" name="b_ph">
                    </div>
                    <div class="input-box7">
                        <span class="details">p02:</span>
                        <input type="text" name="b_p02">
                    </div>
                    <div class="input-box7">
                        <span class="details">pC02:</span>
                        <input type="text" name="b_pC02">
                    </div>
                    <div class="input-box7">
                        <span class="details">Hc03:</span>
                        <input type="text" name="b_hc03">
                    </div>
                    <div class="input-box7">
                        <span class="details">Sa03:</span>
                        <input type="text" name="b_sa03">
                    </div>
                    <div class="input-box7">
                        <span class="details">Hb:</span>
                        <input type="text" name="b_hb">
                    </div>
                    <div class="input-box7">
                        <span class="details">WWC:</span>
                        <input type="text" name="b_wwc">
                    </div>
                </div>
                <div class="user-details" style="display:inline;">
                    <div class="input-box7">
                        <span class="details">Na+:</span>
                        <input type="text" name="b_na">
                    </div>
                    <div class="input-box7">
                        <span class="details">k+:</span>
                        <input type="text" name="b_k">
                    </div>
                    <div class="input-box7">
                        <span class="details">Urea:</span>
                        <input type="text" name="b_urea">
                    </div>
                    <div class="input-box7">
                        <span class="details">Cardiac Enzmes:</span>
                        <input type="text" name="b_cardiac">
                    </div>
                    <div class="input-box7">
                        <span class="details">Torpinen T:</span>
                        <input type="text" name="b_torpinen">
                    </div>
                    <div class="input-box7">
                        <span class="details">CPK:</span>
                        <input type="text" name="b_cpk">
                    </div>
                    <div class="input-box7">
                        <span class="details">Sugar Level:</span>
                        <input type="text" name="b_sugar">
                    </div>
                </div>
            </fieldset>
            <!-- ========================================== Equipment =========================================== -->
            <fieldset class="fieldset" style="display:inline;">
                <legend class="legend">Equipment</legend>
                <div class="user-details" style="display:inline;">
                    <div class="input-box4">
                        <span class="details">Ventilator:</span>
                        <input type="text" name="e_ventilator">
                    </div>
                    <div class="input-box4">
                        <span class="details">EGG Monitor:</span>
                        <input type="text" name="e_monitor">
                    </div>
                    <div class="input-box4">
                        <span class="details">Capnograph:</span>
                        <input type="text" name="e_capnograph">
                    </div>
                    <div class="input-box4">
                        <span class="details">Cervical Traction:</span>
                        <input type="text" name="e_cervical">
                    </div>
                </div>
                <div class="user-details" style="display:inline;">
                    <div class="input-box4">
                        <span class="details">Incubator:</span>
                        <input type="text" name="e_incubator">
                    </div>
                    <div class="input-box4">
                        <span class="details">Hot Box:</span>
                        <input type="text" name="e_hot_box">
                    </div>
                    <div class="input-box4" style="width:50%">
                        <span class="details">Other:</span>
                        <input type="text" name="e_other">
                    </div>
                </div>
            </fieldset>
            <!-- ========================================== Mobilisation =========================================== -->
            <fieldset class="fieldset" style="display:inline;">
                <legend class="legend">Mobilisation</legend>
                <div class="user-details" style="display:inline;">
                    <div class="input-box4">
                        <span class="details">Time Mobile:</span>
                        <input type="time" name="m_time">
                    </div>
                    <div class="input-box4">
                        <span class="details">E.T.D:</span>
                        <input type="time" name="m_etd">
                    </div>
                    <div class="input-box4">
                        <span class="details">Arrive Refuel:</span>
                        <input type="time" name="m_a_refuel">
                    </div>
                    <div class="input-box4">
                        <span class="details">Place:</span>
                        <input type="text" name="m_place">
                    </div>
                </div>
                <div class="user-details" style="display:inline;">
                    <div class="input-box4">
                        <span class="details">Depart Refuel:</span>
                        <input type="time" name="m_d_refuel">
                    </div>
                    <div class="input-box4">
                        <span class="details">E.T.A To Scene:</span>
                        <input type="time" name="m_eta_s">
                    </div>
                    <div class="input-box4">
                        <span class="details">Arrive Scene:</span>
                        <input type="time" name="m_a_scene">
                    </div>
                    <div class="input-box4">
                        <span class="details">Person Informed:</span>
                        <input type="text" name="m_place">
                    </div>
                </div>
                <div class="user-details" style="display:inline;">
                    <div class="input-box4">
                        <span class="details">Depart Scene:</span>
                        <input type="time" name="m_d_scene">
                    </div>
                    <div class="input-box4">
                        <span class="details">E.T.A To Destination:</span>
                        <input type="time" name="m_eta_d">
                    </div>
                    <div class="input-box4">
                        <span class="details">Arrive Destination:</span>
                        <input type="time" name="m_a_destination">
                    </div>
                    <div class="input-box4">
                        <span class="details">Person Informed:</span>
                        <input type="text" name="m_place">
                    </div>
                </div>
                <div class="user-details" style="display:inline;">
                    <div class="input-box4">
                        <span class="details">Depart Destination:</span>
                        <input type="time" name="m_depart_d">
                    </div>
                    <div class="input-box4">
                        <span class="details">E.T.A To Base:</span>
                        <input type="time" name="m_eta_base">
                    </div>
                    <div class="input-box4">
                        <span class="details">Arrive Base:</span>
                        <input type="time" name="m_a_base">
                    </div>
                    <div class="input-box4">
                        <span class="details">Total Air Time:</span>
                        <input type="time" name="m_place">
                    </div>
                </div>
            </fieldset>
            <!-- ====================================== Call Status =============================================== -->
            <fieldset class="fieldset" style="display:inline;">
                <legend class="legend">Call Status</legend>
                <div class="user-details" style="display:inline;">
                    <div class="input-box1">
                        <span class="details">Additional Information:</span>
                        <textarea id="w3review" name="w3review"></textarea>
                    </div>
                </div>
            </fieldset>

            <!-- ===================================================================================== -->
        </div>
        <a href="{!!URL::route('login')!!}" class="btn btn-info" role="button">CANCEL</a>
        {!! Form::submit('CAPTURE', array('class' => 'btn btn-primary')) !!}

        {!! Form::close() !!}
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>