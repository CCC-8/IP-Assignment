@extends('backend/AdminApp')
@section('body') 
<div id="content">

    <h1 class="mb-xl-5">Reservations List</h1>

    <!--    <a href="reservations/create"><button class="btn btn-primary">Create</button></a>-->
        
    <a href="{{route('xmlReservation')}}"><button class="btn btn-primary">XML File</button></a>
    <a href="{{route('xsltReservation')}}"><button class="btn btn-primary">Reservation Report</button></a>

    <table id="example" class="table table-striped table-bordered my-3" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Check In Date</th>
                <th>Check Out Date</th>
                <th>Number Of Guests</th>
                <th>Room Type</th>
                <th>User ID</th>
                <th>Payment Status</th>
                <th>Total Meal Cost</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reserved)
            <tr>
                <th>{{$reserved->id}}</th>
                <td>{{$reserved->checkInDate}}</td>
                <td>{{$reserved->checkOutDate}}</td>
                <td>{{$reserved->numOfGuests}}</td>
                <td>{{$reserved->roomType}}</td>
                <td>{{$reserved->user_id}} </td>
                <td>{{$reserved->paymentStatus}} </td>
                <td>{{$reserved->totalMealCost}} </td>
                <td>
                    <a href="reservations/{{$reserved->id}}/edit" class="btn btn-primary">Edit</a>
                </td>
                <td>                
                    <a href="/backend/reservations/{{$reserved->id}}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>



 


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
