<!-- app/views/daily_operational/create.blade.php -->

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
        {!! Form::model(new App\Models\InstitutionDailyStatus, ['route' => ['storeDOS']]) !!}
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
                            <span class="name" style="color:black; "><strong>DAILY OPERATIONAL STATUS</strong></span>
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
                            <span class="details">Date:</span>
                            <input type="date" name="date_captured" required>
                        </div>
                        <div class="input-box4">
                            <span class="details">Shift:</span>
                            <select name="shift" id="shift" required>
                                <option value="*">Select Shift</option>
                                <option value="Day">Day</option>
                                <option value="Night">Night</option>
                            </select>
                        </div>
                        <div class="input-box4">
                            <span class="details">Name:</span>
                            <input type="text" name="name" required>
                        </div>
                        <div class="input-box4">
                            <span class="details">Position:</span>
                            <input type="text" name="position" required>
                        </div>
                    </div>
                </fieldset>

                <!-- ============================================ Ammbulance Schedule ========================================= -->
                <fieldset class="fieldset" style="display:inline;">
                    <legend class="legend"></legend>
                    <div class="container mt-5">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Districts</th>
                                    @foreach($districts as $district)
                                        <th>{{ $district->name }}</th>
                                    @endforeach
                                    <th>Total</th>
                                </tr>
                                <tr>
                                    <td>AMBULANCES</td>
                                </tr>
                            </thead>

                            <tbody id="table-body">
                                @foreach($ambulances as $ambulance)
                                    <tr>
                                        <input type="hidden" name="ambulances[]" value="{{ $ambulance }}">
                                        <td>{{ $ambulance }}</td>
                                            @foreach ($districts as $district)
                                                <td>
                                                    <input type="number" name="district[{{ $district->id }}][ambulance_{{ $ambulance }}]"
                                                           class="form-control district-input" data-district-id="{{ $district->id }}" step="any">
                                                </td>
                                            @endforeach
                                        <td class="row-total">0.00</td>
                                    </tr>
                                @endforeach
                            </tbody>

                            <tfoot>
                                <tr>
                                    <td>Total Ambulances</td>
                                    @foreach ($districts as $district)
                                        <td><span class="district-total" data-district-id="{{ $district->id }}">0.00</span></td>
                                    @endforeach
                                    <td><span id="grand-total">0.00</span></td>
                                </tr>
                            </tfoot>
                        </table>

                        <!-- pts buses -->
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <td>PTS BUSES</td>
                            </tr>
                            </thead>

                            <tbody id="table-body2">
                            @foreach($ptsBuses as $ptsBus)
                                <tr>
                                    <input type="hidden" name="ptsBus[]" value="{{ $ptsBus }}">
                                    <td>{{ $ptsBus }}</td>
                                    @foreach ($districts as $district)
                                        <td>
                                            <input type="number" name="district[{{ $district->id }}][ptsBus_{{ $ptsBus }}]"
                                                   class="form-control district-input2" data-district-id="{{ $district->id }}" step="any">
                                        </td>
                                    @endforeach
                                    <td class="row-total2">0.00</td>
                                </tr>
                            @endforeach
                            </tbody>

                            <tfoot>
                            <tr>
                                <td>Total Buses</td>
                                @foreach ($districts as $district)
                                    <td><span class="district-total2" data-district-id="{{ $district->id }}">0.00</span></td>
                                @endforeach
                                <td><span id="grand-total2">0.00</span></td>
                            </tr>
                            </tfoot>
                        </table>

                        <!-- OPERATIONAL SUPPORT -->
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <td>OPERATIONAL SUPPORT</td>
                            </tr>
                            </thead>

                            <tbody id="table-body3">
                            @foreach($supports as $support)
                                <tr>
                                    <input type="hidden" name="support[]" value="{{ $support }}">
                                    <td>{{ $support }}</td>
                                    @foreach ($districts as $district)
                                        <td>
                                            <input type="number" name="district[{{ $district->id }}][support_{{ $support }}]"
                                                   class="form-control district-input3" data-district-id="{{ $district->id }}" step="any">
                                        </td>
                                    @endforeach
                                    <td class="row-total3">0.00</td>
                                </tr>
                            @endforeach
                            </tbody>

                            <tfoot>
                            <tr>
                                <td>Total Operational Support</td>
                                @foreach ($districts as $district)
                                    <td><span class="district-total3" data-district-id="{{ $district->id }}">0.00</span></td>
                                @endforeach
                                <td><span id="grand-total3">0.00</span></td>
                            </tr>
                            </tfoot>
                        </table>

                        <!-- STAFF LEAVE -->
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <td>STAFF LEAVE</td>
                            </tr>
                            </thead>

                            <tbody id="table-body4">
                                @foreach($staff_leaves as $staff)
                                    <tr>
                                        <input type="hidden" name="staff[]" value="{{ $staff }}">
                                        <td>{{ $staff }}</td>
                                        @foreach ($districts as $district)
                                            <td>
                                                <input type="number" name="district[{{ $district->id }}][staff_{{ $staff }}]"
                                                   class="form-control district-input4" data-district-id="{{ $district->id }}" step="any">
                                            </td>
                                        @endforeach
                                        <td class="row-total4">0.00</td>
                                    </tr>
                                @endforeach
                            </tbody>

                            <tfoot>
                            <tr>
                                <td>Total Staff on Leave</td>
                                @foreach ($districts as $district)
                                    <td><span class="district-total4" data-district-id="{{ $district->id }}">0.00</span></td>
                                @endforeach
                                <td><span id="grand-total4">0.00</span></td>
                            </tr>
                            </tfoot>
                        </table>

                        <!-- OVERTIME -->
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <td>OVERTIME</td>
                            </tr>
                            </thead>

                            <tbody id="table-body5">
                                @foreach($overtimes as $overtime)
                                    <tr>
                                        <input type="hidden" name="overtime[]" value="{{ $overtime }}">
                                        <td>{{ $overtime }}</td>
                                        @foreach ($districts as $district)
                                            <td>
                                                <input type="number" name="district[{{ $district->id }}][overtime_{{ $overtime }}]"
                                                   class="form-control district-input5" data-district-id="{{ $district->id }}" step="any">
                                            </td>
                                        @endforeach
                                        <td class="row-total5">0.00</td>
                                    </tr>
                                @endforeach
                            </tbody>

                            <tfoot>
                            <tr>
                                <td>Total Overtime Staff</td>
                                @foreach ($districts as $district)
                                    <td><span class="district-total5" data-district-id="{{ $district->id }}">0.00</span></td>
                                @endforeach
                                <td><span id="grand-total5">0.00</span></td>
                            </tr>
                            </tfoot>
                        </table>
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
        // Bind the update function to the inputs for the first time
        document.querySelectorAll('.district-input').forEach(input => {
            input.addEventListener('input', updateTotals);
        });

        function updateTotals() {
            // Update row total
            let row = this.closest('tr');
            let rowTotal = 0;

            // Sum up the inputs for the row
            row.querySelectorAll('.district-input').forEach(input => {
                rowTotal += parseFloat(input.value) || 0; // Ensure you add a default of 0 for invalid input
            });

            // Update the text of the row total
            row.querySelector('.row-total').textContent = rowTotal.toFixed(2);

            // Update district totals
            let districtId = this.dataset.districtId;
            let districtTotal = 0;

            // Sum up the inputs for the given district
            document.querySelectorAll(`.district-input[data-district-id="${districtId}"]`).forEach(input => {
                districtTotal += parseFloat(input.value) || 0;
            });

            // Find the district total element and update its value
            let districtTotalElement = document.querySelector(`.district-total[data-district-id="${districtId}"]`);
            if (districtTotalElement) {
                districtTotalElement.textContent = districtTotal.toFixed(2); // Update the district total text
            } else {
                // If the district total element is missing, log an error or add new element
                console.error(`District total element for districtId ${districtId} not found.`);
            }

            // Update grand total
            let grandTotal = 0;

            // Sum up all the row totals
            document.querySelectorAll('.row-total').forEach(rowTotalCell => {
                grandTotal += parseFloat(rowTotalCell.textContent) || 0; // Ensure you add a default of 0 for invalid totals
            });

            // Update the grand total element with the final value
            let grandTotalElement = document.getElementById('grand-total');
            if (grandTotalElement) {
                grandTotalElement.textContent = grandTotal.toFixed(2); // Update the grand total text
            } else {
                console.error("Grand total element not found.");
            }
        }

        // PTS BUSES
        // Bind the update function to the inputs for the first time
        document.querySelectorAll('.district-input2').forEach(input => {
            input.addEventListener('input', updateTotals2);
        });

        // Function to update the totals
        function updateTotals2() {
            // Update row total
            let row = this.closest('tr');
            let rowTotal = 0;
            row.querySelectorAll('.district-input2').forEach(input => {
                rowTotal += parseFloat(input.value) || 0;
                });
            row.querySelector('.row-total2').textContent = rowTotal.toFixed(2);

            // Update district totals
            let districtId = this.dataset.districtId;
            let districtTotal = 0;
            document.querySelectorAll(`.district-input2[data-district-id="${districtId}"]`).forEach(input => {
                districtTotal += parseFloat(input.value) || 0;
            });
            document.querySelector(`.district-total2[data-district-id="${districtId}"]`).textContent = districtTotal.toFixed(2);

            // Update grand total
            let grandTotal = 0;
            document.querySelectorAll('.row-total2').forEach(rowTotalCell => {
                grandTotal += parseFloat(rowTotalCell.textContent) || 0;
            });
            document.getElementById('grand-total2').textContent = grandTotal.toFixed(2);
        }

        // OPERATIONAL SUPPORT
        // Bind the update function to the inputs for the first time
        document.querySelectorAll('.district-input3').forEach(input => {
            input.addEventListener('input', updateTotals3);
        });

        // Function to update the totals
        function updateTotals3() {
            // Update row total
            let row = this.closest('tr');
            let rowTotal = 0;
            row.querySelectorAll('.district-input3').forEach(input => {
                rowTotal += parseFloat(input.value) || 0;
            });
            row.querySelector('.row-total3').textContent = rowTotal.toFixed(2);

            // Update district totals
            let districtId = this.dataset.districtId;
            let districtTotal = 0;
            document.querySelectorAll(`.district-input3[data-district-id="${districtId}"]`).forEach(input => {
                districtTotal += parseFloat(input.value) || 0;
            });
            document.querySelector(`.district-total3[data-district-id="${districtId}"]`).textContent = districtTotal.toFixed(2);

            // Update grand total
            let grandTotal = 0;
            document.querySelectorAll('.row-total3').forEach(rowTotalCell => {
                grandTotal += parseFloat(rowTotalCell.textContent) || 0;
            });
            document.getElementById('grand-total3').textContent = grandTotal.toFixed(2);
        }

        // STAFF LEAVE
        // Bind the update function to the inputs for the first time
        document.querySelectorAll('.district-input4').forEach(input => {
            input.addEventListener('input', updateTotals4);
        });

        // Function to update the totals
        function updateTotals4() {
            // Update row total
            let row = this.closest('tr');
            let rowTotal = 0;
            row.querySelectorAll('.district-input4').forEach(input => {
                rowTotal += parseFloat(input.value) || 0;
            });
            row.querySelector('.row-total4').textContent = rowTotal.toFixed(2);

            // Update district totals
            let districtId = this.dataset.districtId;
            let districtTotal = 0;
            document.querySelectorAll(`.district-input4[data-district-id="${districtId}"]`).forEach(input => {
                districtTotal += parseFloat(input.value) || 0;
            });
            document.querySelector(`.district-total4[data-district-id="${districtId}"]`).textContent = districtTotal.toFixed(2);

            // Update grand total
            let grandTotal = 0;
            document.querySelectorAll('.row-total4').forEach(rowTotalCell => {
                grandTotal += parseFloat(rowTotalCell.textContent) || 0;
            });
            document.getElementById('grand-total4').textContent = grandTotal.toFixed(2);
        }

        // OVERTIME
        // Bind the update function to the inputs for the first time
        document.querySelectorAll('.district-input5').forEach(input => {
            input.addEventListener('input', updateTotals5);
        });

        // Function to update the totals
        function updateTotals5() {
            // Update row total
            let row = this.closest('tr');
            let rowTotal = 0;
            row.querySelectorAll('.district-input5').forEach(input => {
                rowTotal += parseFloat(input.value) || 0;
            });
            row.querySelector('.row-total5').textContent = rowTotal.toFixed(2);

            // Update district totals
            let districtId = this.dataset.districtId;
            let districtTotal = 0;
            document.querySelectorAll(`.district-input5[data-district-id="${districtId}"]`).forEach(input => {
                districtTotal += parseFloat(input.value) || 0;
            });
            document.querySelector(`.district-total5[data-district-id="${districtId}"]`).textContent = districtTotal.toFixed(2);

            // Update grand total
            let grandTotal = 0;
            document.querySelectorAll('.row-total5').forEach(rowTotalCell => {
                grandTotal += parseFloat(rowTotalCell.textContent) || 0;
            });
            document.getElementById('grand-total5').textContent = grandTotal.toFixed(2);
        }
    </script>

    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
    <script src="script.js"></script> -->
    </body>
</html>