<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/rooms/style.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: url('{{ asset('images/01.jpg') }}');
            background-size: cover;
            background-repeat: no-repeat;
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

        .card {
            min-height: 300px;
            background-color: rgba(255, 255, 255, 0.3);
        }


        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;

        }

        #rooms {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }

        .room {
            width: 300px;
            margin: 15px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .room:hover {
            transform: scale(1.05);
        }

        .room img {
            max-width: 100%;
            border-radius: 10px;
        }

        .room h1 {
            text-align: center;
            margin-bottom: 10px;
        }

        .room .actions {
            display: flex;
            justify-content: space-between;
            padding: 10px;
        }

        .book-btn {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .book-btn:hover {
            background-color: #218838;
        }

        .action-btn {
            background: none;
            border: none;
            cursor: pointer;
        }

        .action-btn .icon {
            color: blue;
            transition: color 0.3s;
        }

        .action-btn .icon:hover {
            color: darkblue;
        }
    </style>
</head>
@if (session()->has('status'))
    <div
        class="flex items-center justify-center px-2 py-1 m-1 font-medium text-green-700 bg-white bg-green-100 border border-green-300 rounded-md ">
        <div slot="avatar">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="w-5 h-5 mx-2 feather feather-check-circle">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                <polyline points="22 4 12 14.01 9 11.01"></polyline>
            </svg>
        </div>
        <div class="flex-initial max-w-full text-xl font-normal">
            {{ session('status') }}</div>
        <div class="flex flex-row-reverse flex-auto">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="w-5 h-5 ml-2 rounded-full cursor-pointer feather feather-x hover:text-green-400">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </div>
        </div>
    </div>
    </div>
@endif

<body>
    <nav class="nav">
        <div class="nav-logo">
            <p>CountrySide</p>
        </div>
        <div class="nav-menu" id="navMenu">
            <ul>
                <li><a href="{{ route('Home.index') }}" class="link active">Home</a></li>
                <li><a href="{{ route('room.index') }}" class="link ">ROOMS</a></li>
                <li><a href="{{ route('user_camp.create') }}" class="link">User</a></li>
                <li><a href="{{ route('staff.index') }}" class="link">Staff</a></li>
                <li><a href="{{ route('owners.index') }}" class="link">Owner</a></li>
                <li><a href="{{ route('schedule.index') }}" class="link">Schedule</a></li>
                <li><a href="{{ route('camp.index') }}" class="link">Camp</a></li>
                <li><a href="{{ route('buildings.index') }}" class="link">Buildings</a></li>

            </ul>
        </div>
        <div class="nav-button">
            <a href="{{ route('login&signup.index') }}">
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
    <body>
        @forelse ($buildings as $buildings)
            <section id="rooms">
                <div class="room">
                    <img src="{{ asset('images/6.jpg') }}" alt="">
                    <h1> id:{{ $loop->iteration }}</h1>
                    <h1> building_name:{{ $buildings->building_name }}</h3>
                        <h1> camp_name:{{ $buildings->camp->camp_name }}</h1>
                        <h1> room_number:{{ $buildings->rooms->room_number }}</h1>
                        <div class="flex justify-end p-1 m-0 ">
                            <button
                                class="bg-blue-500 bg-blue-700 text-white font-bold py-2 px-4 rounded  flex justify-end">
                                <a href="{{ route('buildings.create') }}">ADD NEW building</a>
                            </button>
                        </div>
                        <div class="flex justify-between p-2 ">
                            <div class="">
                                <a href="{{ route('buildings.edit', $buildings->id) }}">
                                    <i class="fa-solid fa-user-pen" style="color:blue"></i></a>
                            </div>
                        </div>
                </div>
            @empty
        @endforelse
        </section>

    </body>

</html
