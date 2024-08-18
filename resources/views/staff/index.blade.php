<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/staff/create.css') }}" />
    <meta charset="UTF-8">
    <title>تنسيق الجدول</title>
    <style>
        body {
            background-image: url({{ asset('images/01.jpg') }});
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: black;
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

        table {
            width: 100%;
            /* اجعل الجدول يغطي كامل العرض */
            border-collapse: collapse;
            /* إزالة المسافات بين الخلايا */
        }

        th,
        td {
            border: 1px solid #ddd;
            /* حدود بسيطة بين الخلايا */
            padding: 8px;
            /* هوامش داخلية للخلايا */
            text-align: left;
            /* محاذاة النص */
        }

        th {
            background-color: #f2f2f2;
            /* لون خلفية للرأس */
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
            /* لون خلفية للصفوف الزوجية */
        }

        tr:hover {
            background-color: #f1f1f1;
            /* لون خلفية عند المرور فوق الصف */
        }

        .icon-row {
            display: inline-flex;
            /* لجعل الأيقونات في خط واحد */
            gap: 10px;
            /* مسافة بين الأيقونات */
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
    </>
@endif
</div>
<div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table class="min-w-full text-center text-sm font-light">
                    <thead
                        class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900">
                        <tr>
                            <th scope="col" class="text-black bg-gray-200 px-6 py-4">
                                #
                            </th>
                            <th scope="col" class="text-black bg-gray-200 px-6 py-4">
                                staff_name
                            </th>
                            <th scope="col" class="text-black bg-gray-200 px-6 py-4">
                                phone_number
                            </th>
                            <th scope="col" class="text-black bg-gray-200 px-6 py-4">
                                camp_name
                            </th>
                            <th scope="col" class="text-black bg-gray-200 px-6 py-4">
                                birth_date
                            </th>
                            <th scope="col" class="text-black bg-gray-200 px-6 py-4">
                                ACTIONS
                            </th>
                        </tr>
                    </thead>
                    <tbody>
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
                                    <li><a href="{{ route('camp.index') }}" class="link">camp</a></li>

                                </ul>
                            </div>
                            <div class="nav-button">
                                <a href="login&signup.html">
                                    <button class="btn white-btn" id="loginBtn" onclick="login()">Log In</button>
                                    <button class="btn" id="signupBtn" onclick="register()">Sign Up</button>
                                </a>
                            </div>
                            <div class="nav-menu-btn">
                                <i class="bx bx-menu" onclick="myMenuFunction()"></i>
                            </div>
                        </nav>
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

                            @forelse ($staff as $staff)
                                <tr class="border-b dark:border-neutral-500">
                                    <td class="whitespace-nowrap  px-6 py-4 font-medium">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4 font-medium">
                                        {{ $staff->staff_name }}
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4 font-medium">
                                        {{ $staff->phone_number }}
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4 font-medium">
                                        {{ $staff->camp->camp_name }}
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4 font-medium">
                                        {{ $staff->birthdate }}
                                    </td>
                                    <td>
                                        <div class="flex justify-between p-2">
                                            <div class="">
                                                <a href="{{ route('staff.edit', $staff->id) }}">
                                                    <i class="fa-solid fa-user-pen" style="color:blue"></i></a>
                                            </div>
                                            <div>
                                                <form method="post"
                                                    action="{{ route('staff.destroy', $staff->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"><i class="fa-solid fa-trash"
                                                            style="color:rgb(255, 0, 0)"></i></button>
                                                </form>
                                            </div>
                                        </div>
                        </div>
            </div>
            </td>
            </tr>
        @empty
            @endforelse
            </table>
            <div class="flex justify-end p-1 m-0 ">
                <button class="bg-blue-500 bg-blue-700 text-white font-bold py-2 px-4 rounded  flex justify-end">
                    <a href="{{ route('staff.create') }}">ADD NEW STAFF</a>
                </button>
            </tbody>
        </div>
    </div>
</div>
</div>

</html>
