@extends('App')
@section('body')

    <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self'; style-src 'self';">

    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Our Rooms</h2>
                        <div class="bt-option">
                            <a href="./home.html">Home</a>
                            <span>Rooms</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Room Details Section Begin -->
    <section class="room-details-section spad">
        <div class="container">
            <div class="row">
                {{-- Room Details Section Start --}}
                <div class="col-lg-8">
                    <div class="room-details-item">
                        <img src={{ $room->image }} style="width: 100%" alt="">
                        <div class="rd-text">
                            <div class="rd-title">
                                <h3>{{ $room->name }} Room</h3>
                                {{-- <div class="rdt-right">
                                    <a href="#">Book Now</a>
                                </div> --}}
                            </div>
                            <h2>RM{{ $room->pricePerNight }}<span> / Pernight</span></h2>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Capacity:</td>
                                        <td>Max person {{ $room->roomCapacity }}</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Amenities:</td>
                                        <td>
                                            @if ($room->hasJacuzzi == 1)
                                                Jacuzzi: Yes<br>
                                            @else
                                                Jacuzzi: No<br>
                                            @endif
                                            @if ($room->hasBalcony == 1)
                                                Balcony: Yes<br>
                                            @else
                                                Balcony: No<br>
                                            @endif
                                            @if ($room->hasSeaView == 1)
                                                Sea View: Yes<br>
                                            @else
                                                Sea View: No<br>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- Room Details Section End --}}

                {{-- Booking Form Section Start --}}
                <div class="col-lg-4">
                    <div class="room-booking">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h3>Your Reservation</h3>
                        <form action="/Reservation" method="post">
                            @csrf
                            <div class="check-date">
                                <label for="check-in-date">Check In:</label>
                                <input type="date" class="date-input" id="check-in-date" name="check_in_date" required>
                                {{-- <i class="icon_calendar"></i> --}}
                            </div>
                            <div class="check-date">
                                <label for="check-out-date">Check Out:</label>
                                <input type="date" class="date-input" id="check-out-date" name="check_out_date" required>
                                {{-- <i class="icon_calendar"></i> --}}
                            </div>
                            <div class="check-date">
                                <label for="num-of-guest">Guests:</label>
                                <input type="number" id="num-of-guests" name="num_of_guests" required>
                            </div>
                            <div class="check-date">
                                <label for="room-type">Room Type:</label>
                                <input type="text" id="room-type" name="room_type" value="{{ $room->name }}" readonly>
                            </div><br>
                            <div>
                                <label for="breakfast">Breakfast (RM20)</label>
                                <input type="checkbox" id="breakfast" name="meal_plans[]" value="breakfast">
                            </div>
                            <div>
                                <label for="lunch">Lunch (RM25)</label>
                                <input type="checkbox" id="lunch" name="meal_plans[]" value="lunch">
                            </div>
                            <div>
                                <label for="dinner">Dinner (RM30)</label>
                                <input type="checkbox" id="dinner" name="meal_plans[]" value="dinner">
                            </div>
                            <button type="submit">Book Now</button>
                        </form>
                    </div>
                </div>
                {{-- Booking Form Section End --}}

            </div>
        </div>
    </section>
    <!-- Room Details Section End -->
@endsection
