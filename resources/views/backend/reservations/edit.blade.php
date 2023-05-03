@extends('backend/AdminApp')
@section('body') 

<div id="content">
    <div class="container">
        <h1>Edit Reservation</h1>
        
        <form class="form" method="post" action="/backend/reservations/{{$reservation->id}}" enctype="multipart/form-data">
            @csrf
            @method('put')


            <div class="form-group">
                <label for="checkInDate">Check In Date:</label>
                <input type="date" class="form-control" id="checkInDate" placeholder="Enter Check In Date" name="checkInDate" value="{{ old('checkInDate',$reservation) }}">
            </div>
            @error('checkInDate')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="checkOutDate">Check Out Date:</label>
                <input type="date" class="form-control" id="checkOutDate" placeholder="Enter Check Out Date" name="checkOutDate" value="{{ old('checkOutDate',$reservation) }}">
            </div>
            @error('checkOutDate')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="numOfGuests">Number of Guests:</label>
                <input type="number" class="form-control" id="numOfGuests" placeholder="Enter Num Of Guests" name="numOfGuests" value="{{ old('numOfGuests',$reservation) }}">
            </div>
            @error('numOfGuests')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
             <div class="form-group">
                <label for="roomType">Room Type:</label>
                <input type="text" class="form-control" id="roomType" placeholder="Enter Room Type" name="roomType" value="{{ old('roomType',$reservation) }}">
            </div>
            @error('roomType')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="user_id">User ID:</label>
                <input type="text" class="form-control" id="user_id" placeholder="Enter User ID" name="user_id" value="{{ old('user_id',$reservation) }}" readonly>
            </div>
            @error('user_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="paymentStatus">Payment Status:</label>
                <input type="text" class="form-control" id="paymentStatus" placeholder="Enter User ID" name="paymentStatus" value="{{ old('paymentStatus',$reservation) }}" readonly>
            </div>
            @error('paymentStatus')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="totalMealCost">Total Meal Cost:</label>
                <input type="number" class="form-control" id="totalMealCost" placeholder="Enter Total Meal Cost" name="totalMealCost" value="{{ old('totalMealCost',$reservation) }}">
            </div>
            @error('totalMealCost')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>


<style>
    #content{
        margin-left:340px;
        width:75%;
    }
    #example{
        text-align:center;
    }
    #example th{
        text-align:center;
    }
</style>
<script>
    $(document).ready(function () {
        var table = $('#example').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'colvis']
        });

        table.buttons().container()
                .appendTo('#example_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection

