<!-- app/views/complaint_management/add.blade.php -->

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
<body>

<!-- NAVIGATION WITH LOGO AND USER PROFILE -->
{!! Form::model(new App\Models\ComplaintManagement, ['route' => ['storeComMan']]) !!}
    <!-- ============================================================= -->
    <div class="row" style=" background-color: white;">
        <div class="column" style="float:left;">
            <img src="img/gov_logo2.png" style="margin-left:5%; width:250px; height:100px;">
        </div>
        <div class="column" style="width:20%; float:right;">
            <div class="column" style="width:12%; float:right;">
                <img src="img/pic.png" alt="profile_pic" style="height:60px; width:60px; margin-top:20px;">
            </div>
            <div class="column" style=" margin-top:30px; float:right; ">
                <span class="name" style="color:black; ">RIKWEST SILINDZA</span>
                <li ><a href="test.php"><span  style="color:black;  align: center;"><i class="fas fa-cog"></i></span>Edit</a>
                    <a href="index.php"><span style="color:black; margin-left:20px;"><i class="fas fa-sign-out-alt"></i></span>Logout</a></li>
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
                    <a href="dashboard" class="sidebar-link">
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
                            <a href="users.php" class="sidebar-link">All Users</a>
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
            <div class="navbar" style="background-color: yellow; margin-left:-15px; margin-top:-15px;">
                <!-- ================================ SEARCH BAR ================================ -->
                <div class="row1" style=" background-color: yellow; width:100%;">
                    <div class="column1" style="float:left; width:40%;">
                        <span class="name" style="color:black; "><strong>COMPLAINTS MANAGEMENT</strong></span>
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

            <!-- ============================================ Call Information ========================================= -->
            <fieldset class="fieldset" style="display:inline;">
                <legend class="legend">Call Information</legend>
                <div class="user-details" style="display:inline;">
                    <div class="input-box4">
                        <span class="details">Caller Name:</span>
                        <input type="text" name="name">
                    </div>
                    <div class="input-box4">
                        <span class="details">Telephone No:</span>
                        <input type="text" name="telephoneNo">
                    </div>
                    <div class="input-box4">
                        <span class="details">Mobile No:</span>
                        <input type="text" name="mobileNo">
                    </div>
                    <div class="input-box4">
                        <span class="details">e-Mail Address:</span>
                        <input type="text" name="email">
                    </div>
                </div>
                <div class="user-details" style="display:inline;">
                    <div class="input-box4">
                        <span class="details">Caller Type:</span>
                        <select name="caller_type" id="caller_type">
                            <option value="*">Choose Caller Type</option>
                            <option value="Internal">Internal</option>
                            <option value="External">External</option>
                        </select>
                    </div>
                    <div class="input-box4">
                        <span class="details">Company:</span>
                        <input type="text" name="company">
                    </div>
                    <div class="input-box4">
                        <span class="details">Contact Person:</span>
                        <input type="text" name="contact_person">
                    </div>
                    <div class="input-box4">
                        <span class="details">Location:</span>
                        <input type="text" name="location">
                    </div>
                </div>
            </fieldset>
            <!-- ====================================== What Happened? =============================================== -->
            <fieldset class="fieldset" style="display:inline;">
                <legend class="legend">What Happened?</legend>
                <div class="user-details" style="display:inline;">
                    <div class="input-box4" style="width:33%;">
                        <span class="details">Complaint Type:</span>
                        <select class="form-control input-sm form-control-sm" name="type_id" id="type_id">
                            <option value="">Select Complaint Type</option>
                            @foreach($complaint_types as $type)
                                <option value="{{$type->id}}" @if(old('type_id')==$type->id)
                                selected="selected"@endif>{{$type->type}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-box4" style="width:33%;">
                        <span class="details">Location of Incident:</span>
                        <input type="text" name="location_ofIncident">
                    </div>
                    <div class="input-box4" style="width:33%;">
                        <span class="details">District of Incident:</span>
                        <select class="form-control input-sm form-control-sm" name="district_id" id="district_id">
                            <option value="">Select District</option>
                            @foreach($districts as $district)
                                <option value="{{$district->id}}" @if(old('district_id')==$district->id)
                                selected="selected"@endif>{{$district->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="user-details" style="display:inline;">
                    <div class="input-box1">
                        <span class="details">Additional Complaint Information:</span>
                        <textarea id="w3review" name="additional_info"></textarea>
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