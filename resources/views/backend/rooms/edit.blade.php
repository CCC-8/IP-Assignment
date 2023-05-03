@extends('backend/AdminApp')
@section('body') 

<div id="content">
    <div class="container">
        <h1>Edit Room</h1>

        <form class="form" method="post" action="/backend/rooms/{{$room->id}}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="{{ old('name',$room) }}">
            </div>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="roomCapacity">Room Capacity:</label>
                <input type="text" class="form-control" id="roomCapacity" placeholder="Enter Room Capacity" name="roomCapacity" value="{{ old('roomCapacity',$room) }}">
            </div>
            @error('roomCapacity')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="pricePerNight">Price Per Night:</label>
                <input type="text" class="form-control" id="pricePerNight" placeholder="Enter Price Per Night" name="pricePerNight" value="{{ old('pricePerNight',$room) }}">
            </div>
            @error('pricePerNight')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="hasJacuzzi">Has Jacuzzi:</label>
                <input type="text" class="form-control" id="hasJacuzzi" placeholder="Enter has Jacuzzi" name="hasJacuzzi" value="{{ old('hasJacuzzi',$room) }}">
            </div>
            @error('hasJacuzzi')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="hasBalcony">Has Balcony:</label>
                <input type="text" class="form-control" id="hasBalcony" placeholder="Enter has Balcony" name="hasBalcony" value="{{ old('hasBalcony',$room) }}">
            </div>
            @error('hasBalcony')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="hasSeaView">Has Sea View:</label>
                <input type="text" class="form-control" id="hasSeaView" placeholder="Enter has Sea View" name="hasSeaView" value="{{ old('hasSeaView',$room) }}">
            </div>
            @error('hasSeaView')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror 
            <div class="form-group ">
                <label for="image" class="upload">Photo:
                    <input type="file" class="form-control" id="image" placeholder="Insert Image" name="image" hidden>
                    <img src="/backend/photos/{{$room->image}}">
                </label>             
            </div>
            @error('image')
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
    .upload {
        all: unset !important;

    }
    .upload img:hover {
        cursor:pointer;

    }

    .upload img, .photo {
        display: block;
        border: 1px solid #333;
        width: 200px;
        height: 200px;
        object-fit: cover;
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




