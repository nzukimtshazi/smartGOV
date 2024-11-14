<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <title>Webpage Design</title> -->
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="css/login.css" /> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Sidebar With Bootstrap</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<?php
session_start(); 
include "conn.php";

//FINDING CURRENT DATE AND TIME
$date_time = date("Y/m/d")."-".date("h:i:sa");

//METHOD TO VALIDATE DATA
function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST['btn_reset'])) {
//   echo"<script>location.href = 'reset_password.php?'</script>"; 
}

if(isset($_POST['btn_login'])) {
$email = validate($_POST['email']);
$password = validate($_POST['password']);
    
	//IF IT EMPTY, DISPLAY ERROR MESSAGE
    if (empty($email) || empty($password)){
		header("Location:  index.php?error=All Fields Are Required!!!"); exit();
	} else{
	    $sql = "SELECT * FROM login_details WHERE email='$email' AND passwords='$password'";
        $result = $conn-> query($sql);
        if ($result-> num_rows > 0){	
            while($row = $result-> fetch_assoc()){	
                $role = $row['role'];	
                $name = $row['name'];
                $status = $row['statuss'];
            }
            if($status == "Blocked"){
              header("Location: index.php?error=Your Account Has Been Blocked. Please Contact The Administrator."); exit();
            }else{
              $_SESSION['currentUser'] = $name;
              $_SESSION['c_email'] = $email;
             if($role == "1"){ echo"<script>location.href = 'sidebar.php?'</script>"; }
             else if($role == "2"){  echo"<script>location.href = 'sidebar.php?'</script>";  }
             else if($role == "3"){  echo"<script>location.href = 'sidebar.php?'</script>";  };
            }
        }else { header("Location: index.php?error=Incorrect Details"); exit(); }
     }
    }
?>
<body>
<form action="" method="post" enctype="multipart/form-data" autocomplete="off">
    <div class="main"  style="background-image: url('img/background.jpg'); background-repeat: no-repeat;">
        <div class="navbar">
            <div class="icon">
            <p class="logo">Smart<span style="color:yellow;">GOV</span></p>
                <!-- <h4 class="logo2">POWERED BY QUALITY DESIGNS</h4> -->
            </div>
            <!-- <h4>POWERED BY QUALITY DESIGNS</h4> -->

        </div> 
        <hr class="hr">
        <div class="content">
                <div class="form">
                    <img src="img/gov_logo.png" class="login_logo">
                    <!-- --------------------------------DISPLAY ERROR AND SUCCESS MESSAGE-------------------------------- -->
                    <?php if (isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
                    <?php if (isset($_GET['success'])) { ?>
                        <p class="success"><?php echo $_GET['success']; ?></p>
                    <?php } ?>

                    <div style="display: flex; align-items: center;">
                        <i class="fa fa-user" style="margin-top: 20px;"> | </i>
                        <input type="text" placeholder="USERNAME" style="flex: 1;" require name="email">
                    </div>
                    <div style="display: flex; align-items: center;">
                        <i class="fa fa-lock" style="margin-top: 20px;"> | </i>
                        <input type="password" placeholder="PASSWORD" style="flex: 1;" require name="password">
                    </div>
                    <div class="g-recaptcha" data-sitekey="6LcePAATAAAAAGPRWgx90814DTjgt5sXnNbV5WaW"></div>
                    <button class="btn" name="btn_login">Login</button>
                    <button class="btnn" name="btn_reg">Register</button>
                    

                    <p class="link">FORGOT PASSWORD? <br>
                    <a href="reset.php">CLICK HERE </a></p>
                    <!-- <p class="liw">Log in with</p> -->

                </div>
                    </div>
                </div>
        </div>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</form>
</body>
</html>