<html>

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

</html>

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
    <div class="wrapper">
        <div class="title">Booking Space</div>
        <div class="content">
            <form method="POST" action="{{ route('room.update', $room->id) }}" class="border rounded-2xl p-2">
                @csrf
                @method('PATCH')
                <div class="user-details">
                    <div class="input-box">
                        <x-input-label for='room_number'>room_number</x-input-label>
                        <x-text-input value="{{ old('room_number', $room->room_number) }}" class="w-full"
                            name='room_number'></x-text-input>
                        @error('room_number')
                            <x-input-label for='room_number'
                                class="text-red-800 font-bold">{{ $message }}</x-input-label>
                        @enderror
                    </div>
                    <div class="input-box">
                        <x-input-label for='capcity'>capcity</x-input-label>
                        <x-text-input value="{{ old('capcity', $room->capcity) }}" class="w-full"
                            name='capcity'></x-text-input>
                        @error('capcity')
                            <x-input-label for='capcity'
                                class="text-red-800 font-bold">{{ $message }}</x-input-label>
                        @enderror
                    </div>
                    <div class="input-box">
                        <x-input-label for='price'>price</x-input-label>
                        <x-text-input value="{{ old('price', $room->price) }}" class="w-full"
                            name='price'></x-text-input>
                        @error('price')
                            <x-input-label for='price'
                                class="text-red-800 font-bold">{{ $message }}</x-input-label>
                        @enderror
                    </div>
                    <div class="input-box">
                        <x-input-label for='number_bed'>beds</x-input-label>
                        <x-text-input value="{{ old('number_bed', $room->number_bed) }}" class="w-full"
                            name='number_bed'></x-text-input>
                        @error('number_bed')
                            <x-input-label for='number_bed'
                                class="text-red-800 font-bold">{{ $message }}</x-input-label>
                        @enderror
                    </div>
                    <div class="input-box">
                        <x-input-label for='camp_id'>camp</x-input-label>
                        <select name="camp_id">
                            <option selected disabled value="">Select Item</option>
                            @foreach ($camp as $camp)
                                <option @selected($camp == $room->camp) value="{{ $camp->id }}">
                                    {{ $camp->camp_name }}</option>
                            @endforeach
                        </select>
                        @error('camp_id')
                            <x-input-label for='camp_id'
                                class="text-red-800 font-bold">{{ $message }}</x-input-label>
                        @enderror
                    </div>
                    <div class="flex justify-end mt-3">
                        <x-primary-button>
                            Update
                        </x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
</body>
