<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/sign_up/sign.css') }}">
    <link rel="stylesheet" href="{{ asset('css/staff/create.css') }}">
    <title>Log In & Sign Up</title>
</head>
<style>
        body {
            background-image: url({{ asset('images/01.jpg') }});
            background-size: cover;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;

        }

        header {

            color: #fff;
            padding: 20px;
            text-align: center;
        }

        nav {

            padding: 10px;
            text-align: center;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            padding: 10px;
            margin: 0 5px;
        }

        section {
            padding: 20px;
            text-align: center;
        }

        .intro {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .features {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .feature {
            width: 300px;
            background-color: #fff;
            margin: 10px;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        footer {

            color: #fff;
            padding: 20px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .feature {
            background-color: rgba(255, 255, 255, 0.3);
        }
    </style>
<body>
 <div class="wrapper">
    <nav class="nav">
        <div class="nav-logo">
            <p>CountrySide</p>
        </div>
        <div class="nav-menu" id="navMenu">
            <ul>
                <li><a href="{{ route('Home.index') }}" class="link active">Home</a></li>
                <li><a href="{{ route('room.index') }}" class="link ">Rooms</a></li>
                <li><a href="{{ route('user_camp.create') }}" class="link">User</a></li>
                <li><a href="{{ route('staff.index') }}" class="link">Staff</a></li>
                <li><a href="{{ route('owners.index') }}" class="link">Owner</a></li>
                <li><a href="{{ route('schedule.index') }}" class="link">Schedule</a></li>
                <li><a href="{{ route('camp.index') }}" class="link">camp</a></li>
                <li><a href="{{ route('buildings.index') }}" class="link">buildings</a></li>


            </ul>
        </div>
        <div class="nav-button">
                <button class="btn white-btn" id="loginBtn" onclick="login()">Log In</button>
                <button class="btn" id="signupBtn" onclick="register()">Sign Up</button>
        </div>
        <div class="nav-menu-btn">
            <i class="bx bx-menu" onclick="myMenuFunction()"></i>
        </div>
    </nav>
<!----------------------------- Form box ----------------------------------->
    <div class="form-box">

        <!------------------- Log In form -------------------------->
        <div class="login-container" id="login">
            <div class="top">
                <span>Don't have an account? <a href="#" onclick="register()">Sign Up</a></span>
                <header>Log In</header>
            </div>
            <div class="input-box">
                <input type="text" class="input-field" placeholder="Email">
                <i class="bx bx-user"></i>
            </div>
            <div class="input-box">
                <input type="password" class="input-field" placeholder="Password">
                <i class="bx bx-lock-alt"></i>
            </div>
            <div class="input-box">
                <input type="submit" class="submit" value="Log In">
            </div>
            <div class="two-col">
                <div class="one">
                    <input type="checkbox" id="login-check">
                    <label for="login-check"> Remember Me</label>
                </div>
                <div class="two">
                    <label><a href="#">Forgot password?</a></label>
                </div>
            </div>
        </div>
        <!------------------- Sign Up form -------------------------->
        <div class="signup-container" id="signup">
            <div class="top">
                <span>Have an account? <a href="#" onclick="login()">Log In</a></span>
                <header>Sign Up</header>
            </div>
            <div class="two-forms">
                <div class="input-box">
                    <input type="text" class="input-field" placeholder="Firstname">
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-box">
                    <input type="text" class="input-field" placeholder="Lastname">
                    <i class="bx bx-user"></i>
                </div>
            </div>
            <div class="input-box">
                <input type="text" class="input-field" placeholder="Email">
                <i class="bx bx-envelope"></i>
            </div>
            <div class="input-box">
                <input type="tel" class="input-field" placeholder="Phone Number">
                <i class='bx bx-phone'></i>
            </div>
            <div class="input-box">
                <input type="text" class="input-field" placeholder="Job Title">
                <i class='bx bx-briefcase'></i>
            </div>
            <div class="input-box">
                <input type="text" class="input-field" placeholder="Your Address">
                <i class='bx bx-home-alt'></i>
            </div>
            <div class="input-box">
                <input type="password" class="input-field" placeholder="Password">
                <i class="bx bx-lock-alt"></i>
            </div>
            <div class="input-box">
                <input type="submit" class="submit" value="Register">
            </div>
            <div class="two-col">
                <div class="one">
                    <input type="checkbox" id="signup-check">
                    <label for="signup-check"> Remember Me</label>
                </div>
                <div class="two">
                    <label><a href="#">Terms & conditions</a></label>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

   function myMenuFunction() {
    var i = document.getElementById("navMenu");
    if(i.className === "nav-menu") {
        i.className += " responsive";
    } else {
        i.className = "nav-menu";
    }
   }

</script>
<script>
    var a = document.getElementById("loginBtn");
    var b = document.getElementById("signupBtn");
    var x = document.getElementById("login");
    var y = document.getElementById("signup");
    function login() {
        x.style.left = "4px";
        y.style.right = "-520px";
        a.className += " white-btn";
        b.className = "btn";
        x.style.opacity = 1;
        y.style.opacity = 0;
    }
    function register() {
        x.style.left = "-510px";
        y.style.right = "5px";
        a.className = "btn";
        b.className += " white-btn";
        x.style.opacity = 0;
        y.style.opacity = 1;
    }
</script>
</body>
</html>
