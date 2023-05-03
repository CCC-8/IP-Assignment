@extends('backend/AdminApp')
@section('body') 
<div id="content">

    <h1 class="mb-xl-5">Rooms List</h1>

    <a href="rooms/create"><button class="btn btn-primary">Create</button></a>
    
    <table id="example" class="table table-striped table-bordered my-3" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Room Capacity</th>
                <th>Price Per Night</th>
                <th>Jacuzzi</th>
                <th>Balcony</th>
                <th>Sea View</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rooms as $room)
            <tr>
                <th>{{$room->id}}</th>
                <td>{{$room->name}}</td>
                <td>{{$room->roomCapacity}}</td>
                <td>{{$room->pricePerNight}}</td>
                <td>{{$room->hasJacuzzi}}</td>
                <td>{{$room->hasBalcony}}</td>
                <td>{{$room->hasSeaView}}</td>
                <td>{{$room->image}}</td>   
                <td>
                    <a href="rooms/{{$room->id}}/edit" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <a href="/backend/rooms/{{$room->id}}" class="btn btn-danger">Delete</a>
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
