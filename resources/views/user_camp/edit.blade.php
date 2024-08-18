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
            margin-top: 120px;
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
                <li><a href="{{ route('buildings.index') }}">Buildings</a></li>


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
    <div class="wrapper">
        <div class="title">Booking Space</div>
        <div class="content">
            <form method="POST" action="{{ route('user_camp.update', $user_camp->id) }}">
                @csrf
                @method('PATCH')
                <div class="user-details">
                    <div class="input-box">
                        <x-input-label for='user_name'>USER_NAME</x-input-label>
                        <x-text-input value="{{ old('user_name', $user_camp->user_name) }}" class="w-full"
                            name='user_name'></x-text-input>
                        @error('user_name')
                            <x-input-label for='user_name'
                                class="text-red-800 font-bold">{{ $message }}</x-input-label>
                        @enderror
                    </div>
                    <div class="input-box">
                        <x-input-label for='user_password'>User_password</x-input-label>
                        <x-text-input value="{{ old('user_password', $user_camp->user_password) }}" class="w-full"
                            name='user_password'></x-text-input>
                        @error('user_password')
                            <x-input-label for='user_password'
                                class="text-red-800 font-bold">{{ $message }}</x-input-label>
                        @enderror
                    </div>
                    <div class="input-box">
                        <x-input-label for='phone_number'>phone_number</x-input-label>
                        <x-text-input value="{{ old('phone_number', $user_camp->phone_number) }}" class="w-full"
                            name='phone_number'></x-text-input>
                        @error('phone_number')
                            <x-input-label for='phone_number'
                                class="text-red-800 font-bold">{{ $message }}</x-input-label>
                        @enderror
                    </div>
                    <div class="input-box">
                        <x-input-label for='number_guests'>number_guests</x-input-label>
                        <x-text-input value="{{ old('number_guests', $user_camp->number_guests) }}" class="w-full"
                            name='number_guests'></x-text-input>
                        @error('number_guests')
                            <x-input-label for='number_guests'
                                class="text-red-800 font-bold">{{ $message }}</x-input-label>
                        @enderror
                    </div>
                    <div class="input-box">
                        <x-input-label for='city'>city</x-input-label>
                        <x-text-input value="{{ old('city', $user_camp->city) }}" class="w-full"
                            name='city'></x-text-input>
                        @error('city')
                            <x-input-label for='city'
                                class="text-red-800 font-bold">{{ $message }}</x-input-label>
                        @enderror
                    </div>

                    <div class="col">
                        <x-input-label for="entry_date"> entry_date</x-input-label>
                        <x-text-input type="date" name="entry_date" class="w-full"
                            value="{{ old('entry_date', isset($user_camp->entry_date) ? date('Y-m-d', strtotime($user_camp->entry_date)) : '') }}" />
                        @error('entry_date')
                            <x-input-label for="entry_date"
                                class="font-bold text-red-800">{{ $message }}</x-input-label>
                        @enderror

                    </div>

                    <div class="col">
                        <x-input-label for="end_date"> end_date</x-input-label>
                        <x-text-input type="date" name="end_date" class="w-full"
                            value="{{ old('end_date', isset($user_camp->end_date) ? date('Y-m-d', strtotime($user_camp->end_date)) : '') }}" />
                        @error('end_date')
                            <x-input-label for="end_date"
                                class="font-bold text-red-800">{{ $message }}</x-input-label>
                        @enderror

                    </div>
                    <div class="input-box ">
                        <div>
                            <x-input-label for='camp_id'>camp</x-input-label>
                            <select name="camp_id">
                                <option selected disabled value="">Select Item</option>
                                @foreach ($camp as $camp)
                                    <option @selected($camp == $user_camp->camp) value="{{ $camp->id }}">
                                        {{ $camp->camp_name }}</option>
                                @endforeach
                            </select>
                            @error('camp_id')
                                <x-input-label for='camp_id'
                                    class="text-red-800 font-bold">{{ $message }}</x-input-label>
                            @enderror
                        </div>
                    </div>
                    <div class="input-box ">
                        <div>
                            <x-input-label for='rooms_id'>room</x-input-label>
                            <select name="rooms_id">
                                <option selected disabled value="">Select Item</option>
                                @foreach ($room as $room)
                                    <option @selected($room == $user_camp->room) value="{{ $room->id }}">
                                        {{ $room->room_number }}</option>
                                @endforeach
                            </select>
                            @error('rooms_id')
                                <x-input-label for='rooms_id'
                                    class="text-red-800 font-bold">{{ $message }}</x-input-label>
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-end mt-3">
                        <x-primary-button>
                            Update
                        </x-primary-button>
                    </div>
            </form>
        </div>
    </div>
    </div>
    </div>

    </html>
