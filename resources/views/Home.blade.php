<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
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
</head>

<body>
    <header>
        <h1>Country Side Camp</h1>
    </header>
    <nav>
        <a href="{{ route('Home.index') }}">Home</a>
        <a href="{{ route('room.index') }}">Rooms</a>
        <a href="{{ route('user_camp.create') }}">User</a>
        <a href="{{ route('staff.index') }}">Staff</a>
        <a href="{{ route('owners.index') }}">Owner</a>
        <a href="{{ route('schedule.index') }}">Schedule</a>
        <a href="{{ route('camp.index') }}">Camp</a>
        <a href="{{ route('buildings.index') }}">Buildings</a>

        <div class="nav-button">
           <a href="{{ route('login&signup.index')}}">
            <button style="margin-left: 50%; border-radius: 12%;" class="btn white-btn" id="loginBtn"
                onclick="login()">log In
            <button style="border-radius: 12%;" class="btn" id="signupBtn" onclick="register()">Sign up
            </button>
        </a>
        </div>
        <div class="nav-menu-btn">
            <i class="bx bx-menu" onclick="myMenuFunction()"></i>
        </div>
    </nav>
    <section>
        <div class="intro">
            Welcome to your website - Your Perfect Getaway Destination!
        </div>
        <div class="features">
            <div class="feature">
                <h2>Comfortable Rooms</h2>
                <p>
                    Relax in our cozy rooms with beautiful views of the countryside.
                </p>
            </div>
            <div class="feature">
                <h2>Delicious Dining</h2>
                <p>Enjoy mouthwatering dishes made from fresh, local ingredients.</p>
            </div>
            <div class="feature">
                <h2>Exciting Activities</h2>
                <p>
                    Explore nature trails, go horseback riding, or simply unwind by the
                    nature .
                </p>
            </div>
        </div>
    </section>

    <footer>
        &copy; 2024 . All rights reserved.
    </footer>
</body>

</html>
