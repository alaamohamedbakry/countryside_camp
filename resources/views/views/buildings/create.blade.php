<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <!--font awesome(for icons)-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <!--css file-->
    <link rel="stylesheet" href="{{ asset('css/camp/create.css') }}" />
    <title>camp Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url({{ asset('images/01.jpg') }});
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .nav {
            position: fixed;
            top: 0;
            display: flex;
            justify-content: space-around;
            width: 100%;
            height: 100px;
            line-height: 100px;
            background: linear-gradient(rgba(39, 39, 39, 0.6), transparent);
            z-index: 100;
        }

        .nav-logo p {
            color: white;
            font-size: 25px;
            font-weight: 600;
        }

        .nav-menu ul {
            display: flex;
        }

        .nav-menu ul li {
            list-style-type: none;
        }

        .nav-menu ul li .link {
            text-decoration: none;
            font-weight: 500;
            color: #fff;
            padding-bottom: 15px;
            margin: 0 25px;
        }

        .link:hover,
        .active {
            border-bottom: 2px solid #fff;
        }

        .nav-button .btn {
            width: 130px;
            height: 40px;
            font-weight: 500;
            background: rgba(255, 255, 255, 0.4);
            border: none;
            border-radius: 30px;
            cursor: pointer;
            transition: .3s ease;
        }

        .btn:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        #signupBtn {
            margin-left: 15px;
        }

        .btn.white-btn {
            background: rgba(255, 255, 255, 0.7);
        }

        .btn.btn.white-btn:hover {
            background: rgba(255, 255, 255, 0.5);
        }

        .nav-menu-btn {
            display: none;
        }

        .container {
            margin-top: 100px;
            margin-right: 27%;
            margin-left: 27%;
            max-width: 600px;
            background-color: rgba(255, 255, 255, 0.2);
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            color: #333;
            margin-bottom: 30px;
            text-align: center;
        }

        .camp-info {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            width: 100%;
        }

        .camp-info input {
            margin: 10px 0;
            padding: 10px;
            background-color: rgba(255, 255, 255, 0.5);
            width: calc(100% - 20px);
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .camp-info input[type="submit"] {
            background-color: #FF6F61;
            color: #fff;
            cursor: pointer;
        }

        .owner-info p strong {
            margin-right: 10px;
            color: #333;
        }

        .shape {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: #FF6F61;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .shape img {
            width: 50px;
            height: auto;
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
                <li><a href="{{ route('staff.index') }}" class="link">Staff</a></li>
                <li><a href="{{ route('owners.index') }}" class="link">Owner</a></li>
                <li><a href="{{ route('schedule.index') }}" class="link">Schedule</a></li>
                <li><a href="{{ route('camp.index') }}" class="link">Camp</a></li>
                <li><a href="{{ route('buildings.index') }}" class="link">Buildings</a></li>

            </ul>
        </div>
        <div class="nav-button">
            <a href="">
                <button class="btn white-btn" id="loginBtn" onclick="login()">Log In</button>
            </a>
            <a href="">
                <button class="btn" id="signupBtn" onclick="register()">Sign Up</button>
            </a>
        </div>
        <div class="nav-menu-btn">
            <i class="bx bx-menu" onclick="myMenuFunction()"></i>
        </div>
    </nav>
    <div class="container">
        <h1>ROOM Page</h1>
        <form enctype="multipart/form-data" method="POST" action="{{ route('buildings.store') }}"
            class="p-2 border rounded-2xl">
            @csrf
            <div class="user-details">
                <div class="input-box">
                    <x-input-label for='building_name'>building_name</x-input-label>
                    <x-text-input value="{{ old('building_name') }}" class="w-full" name='building_name'></x-text-input>
                    @error('building_name')
                        <x-input-label for='building_name' class="font-bold text-red-800">{{ $message }}</x-input-label>
                    @enderror
                </div>
                <div class="input-box">
                    <x-input-label for='camp_id'>Camp</x-input-label>
                    <select name="camp_id">
                        <option selected disabled value="">Select Item</option>
                        @foreach ($camp as $camp)
                            <option value="{{ $camp->id }}">{{ $camp->camp_name }}</option>
                        @endforeach
                    </select>
                    @error('camp_id')
                        <x-input-label for='camp_id' class="text-red-800 font-bold">{{ $message }}</x-input-label>
                    @enderror
                </div>
                <div class="input-box">
                    <x-input-label for='rooms_id'>Room</x-input-label>
                    <select name="rooms_id">
                        <option selected disabled value="">Select Item</option>
                        @foreach ($room as $room)
                            <option value="{{ $room->id }}">{{ $room->room_number }}</option>
                        @endforeach
                    </select>
                    @error('rooms_id')
                        <x-input-label for='rooms_id' class="text-red-800 font-bold">{{ $message }}</x-input-label>
                    @enderror
                </div>
                <div class="flex justify-end mt-3">
                    <x-primary-button>
                        Save
                    </x-primary-button>
                </div>
            </div>
    </div>
    </form>
    </div>
    </div>
    </div>
    </div>
</body>
