<!DOCTYPE html>
<html lang="en">
<!--Created by Tivotal-->

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hotel Room Booking Form</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <!--font awesome(for icons)-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <!--css file-->
    <link rel="stylesheet" href="{{ asset('css/user_camp/create.css') }}" />
    <style>
        body {
            background-image: url({{ asset('images/01.jpg') }});
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: #FFFFFF;
            /* Bianco */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
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
    <div class="container">
        <h1>STAFF Page</h1>
    <div class="wrapper">
        <div class="title">Booking Space</div>
        <div class="content">
            <form method="POST" action="{{ route('staff.store') }}">
                @csrf
                <div class="user-details">
                    <div class="input-box">
                        <x-input-label for='staff_name'>staff_name</x-input-label>
                        <x-text-input value="{{ old('staff_name') }}" class="w-full" name='staff_name'></x-text-input>
                        @error('staff_name')
                            <x-input-label for='staff_name'
                                class="font-bold text-red-800">{{ $message }}</x-input-label>
                        @enderror
                    </div>
                    <div class="input-box">
                        <x-input-label for='phone_number'>phone_number</x-input-label>
                        <x-text-input value="{{ old('phone_number') }}" class="w-full"
                            name='phone_number'></x-text-input>
                        @error('phone_number')
                            <x-input-label for='phone_number'
                                class="font-bold text-red-800">{{ $message }}</x-input-label>
                        @enderror
                    </div>
                    <div class="input-box">
                        <x-input-label for='birthdate'>birthdate</x-input-label>
                        <x-text-input  type="date" value="{{ old('birthdate') }}" class="w-full"
                            name='birthdate'></x-text-input>
                        @error('birthdate')
                            <x-input-label for='birthdate'
                                class="font-bold text-red-800">{{ $message }}</x-input-label>
                        @enderror
                    </div>
                    <div class="row">
            <div class="row">
                <div class="box">
                </div>
                <div class="box">
                    <x-input-label for='camp_id'>camp</x-input-label>
                    <select name="camp_id">
                        <option value="" selected disabled>Camp</option>
                        @foreach ($camps as $camp)
                            <option value="{{ $camp->id }}">{{ $camp->camp_name }}</option>
                        @endforeach
                    </select>
                    <div class="flex justify-end mt-3">
                        <button class="btn" style="background-color: rgba(255, 255, 255, 0.3);">Book Now</button>
                    </div>
                    </form>
                </div>
            </div>
</body>
</html>
