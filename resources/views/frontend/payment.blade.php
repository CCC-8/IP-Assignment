@extends('App')
@section('body')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&family=Work+Sans:wght@800&display=swap');

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;

        }

        .menu-item {
            display: none;
        }

        .footer-section {
            display: none;
        }

        .container {
            margin: 20px auto;
            max-width: 1000px;
            background-color: white;
            padding: 0;
        }


        .form-control {
            height: 25px;
            width: 150px;
            border: none;
            border-radius: 0;
            font-weight: 800;
            padding: 0 0 5px 0;
            background-color: transparent;
            box-shadow: none;
            outline: none;
            border-bottom: 2px solid #ccc;
            margin: 0;
            font-size: 14px;
        }

        .form-control:focus {
            box-shadow: none;
            border-bottom: 2px solid #ccc;
            background-color: transparent;
        }

        .form-control2 {
            font-size: 14px;
            height: 20px;
            width: 63px;
            border: none;
            border-radius: 0;
            font-weight: 800;
            padding: 0 0 5px 0;
            background-color: transparent;
            box-shadow: none;
            outline: none;
            border-bottom: 2px solid #ccc;
            margin: 0;
        }

        .form-control2:focus {
            box-shadow: none;
            border-bottom: 2px solid #ccc;
            background-color: transparent;
        }

        .form-control3 {
            font-size: 14px;
            height: 20px;
            width: 30px;
            border: none;
            border-radius: 0;
            font-weight: 800;
            padding: 0 0 5px 0;
            background-color: transparent;
            box-shadow: none;
            outline: none;
            border-bottom: 2px solid #ccc;
            margin: 0;
        }

        .form-control3:focus {
            box-shadow: none;
            border-bottom: 2px solid #ccc;
            background-color: transparent;
        }

        p {
            margin: 0;
        }

        img {
            width: 100%;
            height: 100%;
            object-fit: fill;
        }

        .text-muted {
            font-size: 10px;
        }

        .textmuted {
            color: #6c757d;
            font-size: 13px;
        }

        .fs-14 {
            font-size: 14px;
        }

        .btn.btn-primary {
            width: 100%;
            height: 55px;
            border-radius: 0;
            padding: 13px 0;
            background-color: black;
            border: none;
            font-weight: 600;
        }

        .btn.btn-primary:hover .fas {
            transform: translateX(10px);
            transition: transform 0.5s ease
        }


        .fw-900 {
            font-weight: 900;
        }

        ::placeholder {
            font-size: 12px;
        }

        .ps-30 {
            padding-left: 30px;
        }

        .h4 {
            font-family: 'Work Sans', sans-serif !important;
            font-weight: 800 !important;
        }

        .textmuted,
        h5,
        .text-muted {
            font-family: 'Poppins', sans-serif;
        }
    </style>

    <div class="container">
        <div class="row m-0">
            <div class="col-lg-7 pb-5 pe-lg-5">
                <div class="row">
                    <div class="col-12">
                        <img src="https://images.unsplash.com/photo-1562790351-d273a961e0e9?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=465&q=80"
                            alt="" style="width: 80%; z-index: 1">
                    </div>
                </div>
            </div>
            <div class="col-lg-5 p-0 ps-lg-4">
                <div class="row m-0">
                    <div class="col-12 px-4">
                        <div class="d-flex align-items-end mt-4 mb-2">
                            <p class="h4 m-0"><span class="pe-1">{{ $reservation->roomType }} Room</span></p>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <p class="textmuted">Check In</p>
                            <p class="fs-14 fw-bold">{{ $reservation->checkInDate }}</p>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <p class="textmuted">Check Out</p>
                            <p class="fs-14 fw-bold">{{ $reservation->checkOutDate }}</p>
                        </div>
                        @foreach ($rooms as $room)
                            @if ($reservation->roomType == $room->name)
                                <?php
                                $checkInDate = new DateTime($reservation->checkInDate);
                                $checkOutDate = new DateTime($reservation->checkOutDate);
                                $totalMealCost = $reservation->totalMealCost;
                                $interval = $checkInDate->diff($checkOutDate);
                                $numberOfDays = $interval->days;
                                $total = $numberOfDays * $room->pricePerNight + $totalMealCost;
                                ?>
                                <div class="d-flex justify-content-between mb-2">
                                    <p class="textmuted">Meal</p>
                                    <p class="fs-14 fw-bold">RM {{ $totalMealCost }}</p>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <p class="textmuted">Price * Night</p>
                                    <p class="fs-14 fw-bold">RM {{ $room->pricePerNight }} x {{ $numberOfDays }}</p>
                                </div>
                                <div class="d-flex justify-content-between mb-3">
                                    <p class="textmuted fw-bold">Total</p>
                                    <div class="d-flex align-text-top ">
                                        <span class="fas fa-dollar-sign mt-1 pe-1 fs-14 "></span><span
                                            class="h4">RM {{ $total }}</span>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <form action="/Checkout/{{ $reservation->id }}" method="post">
                        @csrf
                        <div class="col-12 px-0">
                            <div class="row bg-light m-0">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="col-12 px-4 my-4">
                                    <p class="fw-bold">Payment Details</p>
                                </div>
                                <div class="col-12 px-4">
                                    <div class="d-flex  mb-4">
                                        <span class="">
                                            <p class="text-muted">Card number</p>
                                            <input class="form-control" id="card-number" name="card_number" type="text"
                                                placeholder="1234 5678 9012 3456" required>
                                        </span>
                                        <div class=" w-100 d-flex flex-column align-items-end">
                                            <p class="text-muted">Expires</p>
                                            <input class="form-control2" id="card-exp" name="card_exp" type="text"
                                                placeholder="MM/YYYY" required>
                                        </div>
                                    </div>
                                    <div class="d-flex mb-5">
                                        <span class="me-5">
                                            <p class="text-muted">Cardholder name</p>
                                            <input class="form-control" id="cardholder-name" name="cardholder_name"
                                                style="text-transform: uppercase" type="text" placeholder="Name"
                                                required>
                                        </span>
                                        <div class="w-100 d-flex flex-column align-items-end">
                                            <p class="text-muted">CVV</p>
                                            <input class="form-control3" id="card-cvv" name="card_cvv" type="text"
                                                placeholder="XXX" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-0">
                                <div class="col-12  mb-4 p-0">
                                    <button class="btn btn-primary" type="submit">Checkout</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
