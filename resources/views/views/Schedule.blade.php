
<!DOCTYPE html>
<html>
<head>
  <title>Summer Camp Schedule</title>


  <style>
    body {
      background-image: url('images/01.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      font-family: Arial, sans-serif;
      background-color: #eff3eb;
      margin: 0;
      padding: 0;
     }

     .nav{
            position: fixed;
            top: 0;
            display: flex;
            justify-content: space-around;
            width: 100%;
            height: 100px;
            line-height: 100px;
            background: linear-gradient(rgba(39,39,39, 0.6), transparent);
            z-index: 100;
        }
        .nav-logo p{
            color: white;
            font-size: 25px;
            font-weight: 600;
        }
        .nav-menu ul{
            display: flex;
        }
        .nav-menu ul li{
            list-style-type: none;
        }
        .nav-menu ul li .link{
            text-decoration: none;
            font-weight: 500;
            color: #fff;
            padding-bottom: 15px;
            margin: 0 25px;
        }
        .link:hover, .active{
            border-bottom: 2px solid #fff;
        }
        .nav-button .btn{
            width: 130px;
            height: 40px;
            font-weight: 500;
            background: rgba(255, 255, 255, 0.4);
            border: none;
            border-radius: 30px;
            cursor: pointer;
            transition: .3s ease;
        }
        .btn:hover{
            background: rgba(255, 255, 255, 0.3);
        }
        #signupBtn{
            margin-left: 15px;
        }
        .btn.white-btn{
            background: rgba(255, 255, 255, 0.7);
        }
        .btn.btn.white-btn:hover{
            background: rgba(255, 255, 255, 0.5);
        }
        .nav-menu-btn{
            display: none;
        }

    .container {
      max-width: 800px;
      margin-top: 120px;
      margin-left: 23%;
      padding: 20px;
      background-color: rgba(255, 255, 255, 0.3);;
      box-shadow: 0 0 10px rgba(221, 221, 226, 0.822);
    }

    h1 {
      color: #0a0a0a;
      text-align: center;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      padding: 10px;
      text-align: center;
    }

    th {
      background-color: #9eeea2e7;
    }

    tr:nth-child(even) {
      background-color: #80da9e;
    }

    tr:hover {
      background-color: #eff8f3;
    }
  </style>
</head>
<body>

  <nav class="nav">
    <div class="nav-logo">
        <p>CountrySide</p>
    </div>
    <div class="nav-menu" id="navMenu">
        <ul>
            <li><a href="{{ route('Home.index') }}" class="link active">Home</a></li>
            <li><a href="{{ route('room.index') }}" class="link ">Rooms</a></li>
            <li><a href="{{ route('user_camp.create') }}" class="link">User</a></li>
            <li><a href="{{ route('staff.create') }}" class="link">Staff</a></li>
            <li><a href="{{ route('owners.create') }}" class="link">Owner</a></li>
            <li><a href="{{ route('schedule.index') }}" class="link">Schedule</a></li>
            <li><a href="{{ route('camp.index') }}" class="link">Camp</a></li>
           <li><a href="{{ route('buildings.index') }}" class="link">Buildings</a></li>

        </ul>
    </div>
    <div class="nav-button">
        <a href="">
        <button class="btn white-btn" id="loginBtn" onclick="login()">Log In</button>
        </a>
        <button class="btn" >
            <a href="">
                <button class="btn white-btn" id="loginBtn" onclick="login()">SIGN UP</button>
            </a>
        </button>

    </div>
    <div class="nav-menu-btn">
        <i class="bx bx-menu" onclick="myMenuFunction()"></i>
    </div>
</nav>

  <div class="container">
    <h1>Summer Camp Schedule</h1>
    <table>
      <tr>
        <th>Time</th>
        <th>Activity</th>
      </tr>
      <tr>
        <td>7:00 - 8:00</td>
        <td>Breakfast</td>
      </tr>
      <tr>
        <td>8:00 - 9:00</td>
        <td>Art and Crafts</td>
      </tr>
      <tr>
        <td>9:00 - 10:00</td>
        <td>Zip Line</td>
      </tr>
      <tr>
        <td>10:00 - 11:00</td>
        <td>Swim</td>
      </tr>
      <tr>
        <td>11:00 - 12:00</td>
        <td>Basketball</td>
      </tr>
      <tr>
        <td>12:00 - 1:00</td>
        <td>Archery</td>
      </tr>
      <tr>
        <td>1:00 - 3:00</td>
        <td>Lunch</td>
      </tr>
      <tr>
        <td>3:00 - 5:00</td>
        <td>Horse Riding</td>
      </tr>
      <tr>
        <td>5:00 - 7:00</td>
        <td>Field Trip</td>
      </tr>
      <tr>
        <td>7:00 - 8:00</td>
        <td>Dinner</td>
      </tr>
      <tr>
        <td>8:00 - 11:00</td>
        <td>Starry Night Party</td>
      </tr>
    </table>
  </div>
</body>
