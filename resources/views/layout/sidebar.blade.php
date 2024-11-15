<!-- app/views/layout/sidebar.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar With Bootstrap</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/sidebar.css" />
    <link rel="stylesheet" href="css/cards.css" />
    <title>Research Funding Application</title>

</head>
<body>
<div class="navbar">
    <div class="icon">
        <img src="img/image.png" style="width:200px; height:100px;">
        <!-- <p class="logo">Smart<span style="color:yellow;">GOV</span></p> -->
        <!-- <h4 class="logo2">POWERED BY QUALITY DESIGNS</h4> -->
    </div>
</div>
<div class="wrapper">

    <aside id="sidebar">
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
                        <a href="#" class="sidebar-link">Emergrncy Medical Services</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">Generic Call</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">Hospital / Clinic Daily Status</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">Forensic / Montuary</a>
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
            <a href="#" class="sidebar-link">
                <i class="lni lni-exit"></i>
                <span>Logout</span>
            </a>
        </div>
    </aside>

    <div class="main p-3">
        <!-- <div class="head1"> <h1>  ALL MODULES  </h1> </div> -->
        <div class="navbar" style="background-color: yellow;">
            <div class="icon">
                <!-- <img src="img/image.png" style="width:200px; height:100px;"> -->
                <!-- <p class="logo">Smart<span style="color:yellow;">GOV</span></p> -->
                <!-- <h4 class="logo2">POWERED BY QUALITY DESIGNS</h4> -->
                <h1>  ALL MODULES  </h1>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <div class="card">
                    <img src="img/image.png" alt="Italian Trulli">
                    <p>AIR AMBULANCE</p>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <img src="img/image.png" alt="Italian Trulli">
                    <p>EMS</p>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <img src="img/image.png" alt="Italian Trulli">
                    <p>GENERIC CALL</p>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <img src="img/image.png" alt="Italian Trulli">
                    <p>HOSPITAL / CLINIC STATUS</p>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <img src="img/image.png" alt="Italian Trulli">
                    <p>FORENSIC / MORTUARY</p>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <img src="img/image.png" alt="Italian Trulli">
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

</body>

</html>