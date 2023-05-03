<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

        <script src= "backend/js/create.js"></script>
        <link rel="stylesheet" href="/backend/css/style.css ">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-SQzO1rqhCLjCvtf8OQWl5rx5wGp5cdxv/8rqLbUqlD9UzB6UfB6Uzsk6I2V7L1cw" crossorigin="anonymous"></script>





    </head>
    <body>
        <div class="info">{{ session('info') }}</div>
        <div class="nav-side-menu">
            <div class="brand">Hotel Management (Admin)</div>
            <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

            <div class="menu-list">

                <ul id="menu-content" class="menu-content collapse out">
                    <li>
                        <a href="/backend/dashboard">
                            <i class="fa fa-dashboard fa-lg"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="/backend/users">
                            <i class="fa fa-user fa-lg"></i> Users
                        </a>
                    </li>
                    <li>
                        <a href="/backend/rooms">
                            <i class="fa fa-bed fa-lg"></i> Rooms
                        </a>
                    </li>
                    <li>
                        <a href="/backend/reservations">
                            <i class="fa fa-book fa-lg"></i> Reservations
                        </a>
                    </li>
                    <li>
                        <a>
                            <form method="post" action="/adminlogout">
                                @csrf
                                <button type="submit" class="btn text-white text-xl-left" onclick="event.preventDefault(); this.closest('form').submit();"><i class="fa fa-sign-out fa-lg "></i> Logout</button>
                            </form>
                        </a>                      
                    </li>

                </ul>
            </div>
        </div>

        <main>
            @yield('body')
        </main>   

    </body>
</html>