<!-- app/views/user/login.blade.php -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="css/index.css" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="main"  style="background: url('images/background.jpg') no-repeat;">
                <div class="navbar">
                    <div class="icon">
                        <p class="logo"><span style="color: white;">Smart</span><span style="color:yellow;">GOV</span></p>
                    </div>
                </div>
                <hr class="hr">
                <div class="content">
                    <div class="form">
                        <img src="images/gov_logo.png" class="login_logo">
                        <!-- --------------------------------DISPLAY ERROR AND SUCCESS MESSAGE-------------------------------- -->

                        <div style="display: flex; align-items: center;">
                            <i class="fa fa-user" style="margin-top: 20px;"> | </i>
                            <input type="text" placeholder="USERNAME" style="flex: 1;" require name="email">
                        </div>

                        <div style="display: flex; align-items: center;">
                            <i class="fa fa-lock" style="margin-top: 20px;"> | </i>
                            <input type="password" placeholder="PASSWORD" style="flex: 1;" require name="password">
                        </div>

                        <div class="g-recaptcha" data-sitekey="6LcePAATAAAAAGPRWgx90814DTjgt5sXnNbV5WaW"></div>

                        {!! Form::submit('Login', array('class' => 'btn btn-info btn-block')) !!}
                        <a href="{{ route('addUser') }}" class="btnn"style="color:white;">
                            Register
                        </a>

                        <p class="link">FORGOT PASSWORD? <br>
                        <a href="reset.php">CLICK HERE </a></p>
                        <!-- <p class="liw">Log in with</p> -->
                    </div>
                </div>
            </div>
            <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
            <script src='https://www.google.com/recaptcha/api.js'></script>
        </form>
    </body>
</html>