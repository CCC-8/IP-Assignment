@extends('App')
@section('body')
    <header>
        <style>
            * {
                margin: 0;
                padding: 0;
                font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
                box-sizing: border-box;
                font-size: 14px;
            }

            .menu-item,
            .footer-section {
                display: none;
            }

            img {
                max-width: 100%;
            }

            body {
                -webkit-font-smoothing: antialiased;
                -webkit-text-size-adjust: none;
                width: 100% !important;
                height: 100%;
                line-height: 1.6;
            }

            /* Let's make sure all tables have defaults */
            table td {
                vertical-align: top;
            }

            body {
                background-color: #f6f6f6;
            }

            .body-wrap {
                background-color: #f6f6f6;
                width: 100%;
            }

            .container {
                display: block !important;
                max-width: 600px !important;
                margin: 0 auto !important;
                /* makes it centered */
                clear: both !important;
            }

            .content {
                max-width: 600px;
                margin: 0 auto;
                display: block;
                padding: 20px;
            }

            .main {
                background: #fff;
                border: 1px solid #e9e9e9;
                border-radius: 3px;
            }

            .content-wrap {
                padding: 20px;
            }

            .content-block {
                padding: 0 0 20px;
            }

            .header {
                width: 100%;
                margin-bottom: 20px;
            }

            .footer {
                width: 100%;
                clear: both;
                color: #999;
                padding: 20px;
            }

            .footer a {
                color: #999;
            }

            .footer p,
            .footer a,
            .footer unsubscribe,
            .footer td {
                font-size: 12px;
            }

            h1,
            h2,
            h3 {
                font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
                color: #000;
                margin: 40px 0 0;
                line-height: 1.2;
                font-weight: 400;
            }

            h1 {
                font-size: 32px;
                font-weight: 500;
            }

            h2 {
                font-size: 24px;
            }

            h3 {
                font-size: 18px;
            }

            h4 {
                font-size: 14px;
                font-weight: 600;
            }

            p,
            ul,
            ol {
                margin-bottom: 10px;
                font-weight: normal;
            }

            p li,
            ul li,
            ol li {
                margin-left: 5px;
                list-style-position: inside;
            }

            a {
                color: #1ab394;
                text-decoration: underline;
            }

            .btn-primary {
                text-decoration: none;
                color: #FFF;
                background-color: #1ab394;
                border: solid #1ab394;
                border-width: 5px 10px;
                line-height: 2;
                font-weight: bold;
                text-align: center;
                cursor: pointer;
                display: inline-block;
                border-radius: 5px;
                text-transform: capitalize;
            }

            .last {
                margin-bottom: 0;
            }

            .first {
                margin-top: 0;
            }

            .aligncenter {
                text-align: center;
            }

            .alignright {
                text-align: right;
            }

            .alignleft {
                text-align: left;
            }

            .clear {
                clear: both;
            }

            .alert {
                font-size: 16px;
                color: #fff;
                font-weight: 500;
                padding: 20px;
                text-align: center;
                border-radius: 3px 3px 0 0;
            }

            .alert a {
                color: #fff;
                text-decoration: none;
                font-weight: 500;
                font-size: 16px;
            }

            .alert.alert-warning {
                background: #f8ac59;
            }

            .alert.alert-bad {
                background: #ed5565;
            }

            .alert.alert-good {
                background: #1ab394;
            }

            .invoice {
                margin: 40px auto;
                text-align: left;
                width: 80%;
            }

            .invoice td {
                padding: 5px 0;
            }

            .invoice .invoice-items {
                width: 100%;
            }

            .invoice .invoice-items td {
                border-top: #eee 1px solid;
            }

            .invoice .invoice-items .total td {
                border-top: 2px solid #333;
                border-bottom: 2px solid #333;
                font-weight: 700;
            }

            @media only screen and (max-width: 640px) {

                h1,
                h2,
                h3,
                h4 {
                    font-weight: 600 !important;
                    margin: 20px 0 5px !important;
                }

                h1 {
                    font-size: 22px !important;
                }

                h2 {
                    font-size: 18px !important;
                }

                h3 {
                    font-size: 16px !important;
                }

                .container {
                    width: 100% !important;
                }

                .content,
                .content-wrap {
                    padding: 10px !important;
                }

                .invoice {
                    width: 100% !important;
                }
            }
        </style>
    </header>

    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" style="text-decoration: none" data-toggle="tab" href="#upcoming-reservations"
                role="tab">Upcoming
                Reservations</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" style="text-decoration: none" data-toggle="tab" href="#past-reservations" role="tab">Past
                Reservations</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="upcoming-reservations" role="tabpanel">
            @foreach ($upcomingReservations as $item)
                @foreach ($rooms as $item2)
                    @if ($item->roomType == $item2->name)
                        <table class="body-wrap">
                            <tbody>
                                <tr>
                                    <td class="container" width="600">
                                        <div class="content">
                                            <table class="main" width="100%" cellpadding="0" cellspacing="0">
                                                <tbody>
                                                    <tr>
                                                        <td class="content-wrap aligncenter">
                                                            <table width="100%" cellpadding="0" cellspacing="0">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="content-block">
                                                                            <h2>Thanks for booking your hotel with us
                                                                            </h2>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="content-block">
                                                                            <table class="invoice">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                            Reservation
                                                                                            #{{ $item->id }}<br>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <table class="invoice-items"
                                                                                                cellpadding="0"
                                                                                                cellspacing="0">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td>Room Type
                                                                                                        </td>
                                                                                                        <td
                                                                                                            class="alignright">
                                                                                                            {{ $item->roomType }}
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td>Number of
                                                                                                            Guests
                                                                                                        </td>
                                                                                                        <td
                                                                                                            class="alignright">
                                                                                                            {{ $item->numOfGuests }}
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td>Check In
                                                                                                        </td>
                                                                                                        <td
                                                                                                            class="alignright">
                                                                                                            {{ $item->checkInDate }}
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td>Check Out
                                                                                                        </td>
                                                                                                        <td
                                                                                                            class="alignright">
                                                                                                            {{ $item->checkOutDate }}
                                                                                                        </td>
                                                                                                    </tr>

                                                                                                    <?php
                                                                                                    $checkInDate = new DateTime($item->checkInDate);
                                                                                                    $checkOutDate = new DateTime($item->checkOutDate);
                                                                                                    $totalMealCost = $item->totalMealCost;
                                                                                                    $interval = $checkInDate->diff($checkOutDate);
                                                                                                    $numberOfDays = $interval->days;
                                                                                                    $total = $numberOfDays * $item2->pricePerNight + $totalMealCost;
                                                                                                    ?>
                                                                                                    <tr>
                                                                                                        <td>Meal
                                                                                                        </td>
                                                                                                        <td
                                                                                                            class="alignright">
                                                                                                            RM {{ $item->totalMealCost }}
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td>Price /
                                                                                                            Night</td>
                                                                                                        <td
                                                                                                            class="alignright">
                                                                                                            RM
                                                                                                            {{ $item2->pricePerNight }}
                                                                                                            x
                                                                                                            {{ $numberOfDays }}
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr class="total">
                                                                                                        <td class="alignright"
                                                                                                            width="80%">
                                                                                                            Total</td>
                                                                                                        <td
                                                                                                            class="alignright">
                                                                                                            RM
                                                                                                            {{ $total }}
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="content-block">
                                                                            @if ($item->paymentStatus == 'Unpaid')
                                                                                <h3
                                                                                    style="font-weight: bold; color: red; margin-top: -20px">
                                                                                    {{ $item->paymentStatus }}</h3><br>
                                                                                <a href="/Payment/{{ $item->id }}">Proceed
                                                                                    to checkout</a>
                                                                            @elseif ($item->paymentStatus == 'Paid')
                                                                                <h3
                                                                                    style="font-weight: bold; color: #1ab394; margin-top: -20px">
                                                                                    {{ $item->paymentStatus }}</h3>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    @endif
                @endforeach
            @endforeach
        </div>
        <div class="tab-pane" id="past-reservations" role="tabpanel">
            @foreach ($pastReservations as $item)
                @foreach ($rooms as $item2)
                    @if ($item->roomType == $item2->name)
                        <table class="body-wrap">
                            <tbody>
                                <tr>
                                    <td class="container" width="600">
                                        <div class="content">
                                            <table class="main" width="100%" cellpadding="0" cellspacing="0">
                                                <tbody>
                                                    <tr>
                                                        <td class="content-wrap aligncenter">
                                                            <table width="100%" cellpadding="0" cellspacing="0">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="content-block">
                                                                            <h2>Thanks for booking your hotel with us
                                                                            </h2>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="content-block">
                                                                            <table class="invoice">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>(** Customer Name **)<br>
                                                                                            Reservation
                                                                                            #{{ $item->id }}<br>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <table class="invoice-items"
                                                                                                cellpadding="0"
                                                                                                cellspacing="0">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td>Room Type
                                                                                                        </td>
                                                                                                        <td
                                                                                                            class="alignright">
                                                                                                            {{ $item->roomType }}
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td>Number of
                                                                                                            Guests
                                                                                                        </td>
                                                                                                        <td
                                                                                                            class="alignright">
                                                                                                            {{ $item->numOfGuests }}
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td>Check In
                                                                                                        </td>
                                                                                                        <td
                                                                                                            class="alignright">
                                                                                                            {{ $item->checkInDate }}
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td>Check Out
                                                                                                        </td>
                                                                                                        <td
                                                                                                            class="alignright">
                                                                                                            {{ $item->checkOutDate }}
                                                                                                        </td>
                                                                                                    </tr>

                                                                                                    <?php
                                                                                                    $checkInDate = new DateTime($item->checkInDate);
                                                                                                    $checkOutDate = new DateTime($item->checkOutDate);
                                                                                                    $interval = $checkInDate->diff($checkOutDate);
                                                                                                    $numberOfDays = $interval->days;
                                                                                                    $total = $numberOfDays * $item2->pricePerNight;
                                                                                                    ?>
                                                                                                    <tr>
                                                                                                        <td>Meal
                                                                                                        </td>
                                                                                                        <td
                                                                                                            class="alignright">
                                                                                                            @if (isset($totalMealCost))
                                                                                                                RM
                                                                                                                {{ $totalMealCost }}
                                                                                                            @endif
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td>Price /
                                                                                                            Night</td>
                                                                                                        <td
                                                                                                            class="alignright">
                                                                                                            RM
                                                                                                            {{ $item2->pricePerNight }}
                                                                                                            x
                                                                                                            {{ $numberOfDays }}
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>

                                                                                                    </tr>
                                                                                                    <tr class="total">
                                                                                                        <td class="alignright"
                                                                                                            width="80%">
                                                                                                            Total</td>
                                                                                                        <td
                                                                                                            class="alignright">
                                                                                                            RM
                                                                                                            {{ $total }}
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="content-block">
                                                                            @if ($item->paymentStatus == 'Unpaid')
                                                                                <h3
                                                                                    style="font-weight: bold; color: red; margin-top: -20px">
                                                                                    {{ $item->paymentStatus }}</h3><br>
                                                                                <a href="/Payment">Proceed to checkout</a>
                                                                            @elseif ($item->paymentStatus == 'Paid')
                                                                                <h3
                                                                                    style="font-weight: bold; color: #1ab394; margin-top: -20px">
                                                                                    {{ $item->paymentStatus }}</h3>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>
    
@endsection
