<!-- app/views/module/index.blade.php -->

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
    <link rel="stylesheet" href="css/cards.css" />
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="css/nav_profile.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .card {
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            width: 200px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card img {
            width: 100%;
            height: auto;
        }

        .card p {
            font-size: 18px;
            font-weight: bold;
            padding: 10px;
            margin: 0;
            background-color: #f4f4f4;
            color: #333;
        }
    </style>
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
<body>
<!-- NAVIGATION WITH LOGO AND USER PROFILE -->
<form action="" method="post" enctype="multipart/form-data" autocomplete="off" style="width:100%; margin-top:0px;">
    <div class="wrapper" style="height:100px; background-color:white;">
        <div class="navbar" style="background-color:white;">
            <div class="navbar_left">
                <div class="logo">
                    <img src="img/gov_logo2.png" style="margin-left:5%; width:250px; height:100px;">
                </div>
            </div>
            <div class="navbar_right">
                <div class="profile">
                    <div class="icon_wrap" style="margin-left:-20%;">
                        <span class="name" style="color:black;">User Name</span>
                        <img src="img/image.png" alt="profile_pic">
                    </div>
                    <div class="profile_dd">
                        <ul class="profile_ul">
                            <li><a class="settings" href="#"><span class="picon"><i class="fas fa-cog"></i></span>Edit</a></li>
                            <li><a class="logout" href="#"><span class="picon"><i class="fas fa-sign-out-alt"></i></span>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                    <a href="#" class="sidebar-link">
                        <i class="fa fa-book"></i>
                        <span>DASHBOARD</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                       data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="fa fa-book"></i>
                        <span>MODULES</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar1">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Air Ambulance</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Complaints</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Emergency Medical Services</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Generic Call</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Hospital / Clinic Daily Status</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Forensic / Mortuary</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="fa fa-book"></i>
                        <span>REPORTS</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                       data-bs-target="#multi" aria-expanded="false" aria-controls="multi">
                        <i class="fa fa-user"></i>
                        <span>USERS</span>
                    </a>
                    <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">All Users</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">User Role Editor</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">User Group SMS</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="fa fa-bullhorn"></i>
                        <span>NEWS & EVENTS</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="fa fa-image"></i>
                        <span>GALLERY</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="fa fa-gear"></i>
                        <span>SETTINGS</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="index.php" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>

        <div class="main p-3">
            <!-- <div class="head1"> <h1>  ALL MODULES  </h1> </div> -->
            <div class="navbar" style="background-color: yellow; margin-left:-15px; margin-top:-15px;">
                <div class="icon">
                    <h1 style="color:black;">  ALL MODULES  </h1>
                </div>
            </div>
            <div class="row">
                <div class="column" style="width: 14%; margin-top:30px; margin-left:50px;">
                    <div class="card">
                        <img src="images/air_ambulance.jpg">
                        <p>AIR AMBULANCE</p>
                    </div>
                </div>
                <div class="column" style="width: 14%; margin-top:30px;">
                    <div class="card">
                        <img src="images/EMS.html" alt="Italian Trulli">
                        <p>EMS</p>
                    </div>
                </div>
                <div class="column" style="width: 14%; margin-top:30px;">
                    <div class="card">
                        <img src="images/generic_call.jpg" alt="Italian Trulli">
                        <p>GENERIC CALL</p>
                    </div>
                </div>
                <div class="column" style="width: 14%; margin-top:30px;">
                    <div class="card">
                        <img src="images/institutions.jpg" alt="Italian Trulli">
                        <p>HOSPITAL / CLINIC STATUS</p>
                    </div>
                </div>
                <div class="column" style="width: 14%; margin-top:30px;">
                    <div class="card">
                        <img src="images/forensic.jpg" alt="Italian Trulli">
                        <p>FORENSIC / MORTUARY</p>
                    </div>
                </div>
                <div class="column" style="width: 14%; margin-top:30px;">
                    <div class="card">
                        <img src="images/complaints.jpg" alt="Italian Trulli">
                        <p>COMPLAINTS</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>
    <script src="script.js"></script>
</form>
</body>

</html>