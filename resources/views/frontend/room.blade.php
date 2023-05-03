@extends('App')
@section('body')
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

    <!-- Rooms Section Begin -->
    <section class="rooms-section spad">
        <div class="container">
            <div class="row">

                @foreach ($rooms as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="room-item">
                            <img src={{ $item->image }} alt="">
                            <div class="ri-text">
                                <h4>{{ $item->name }} Room</h4>
                                <h3>RM{{ $item->pricePerNight }}<span> / Pernight</span></h3>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Capacity:</td>
                                            <td>Max person {{ $item->roomCapacity }}</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Amenities:</td>
                                            <td>
                                                @if ($item->hasJacuzzi == '1')
                                                    <?php echo 'Jacuzzi'; ?>
                                                @else
                                                    <?php echo 'No Jacuzzi'; ?>
                                                @endif,
                                                @if ($item->hasBalcony == '1')
                                                    <?php echo 'Balcony'; ?>
                                                @else
                                                    <?php echo 'No Balcony'; ?>
                                                @endif,
                                                @if ($item->hasSeaView == '1')
                                                    <?php echo 'Sea View'; ?>
                                                @else
                                                    <?php echo 'No Sea View'; ?>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="/RoomDetails/{{$item->id}}" class="primary-btn">More Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Rooms Section End -->
@endsection
