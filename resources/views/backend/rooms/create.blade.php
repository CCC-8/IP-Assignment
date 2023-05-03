@extends('backend/AdminApp')
@section('body') 

<div id="content">
    <div class="container">
        <h1>Create New Room</h1>

        <form class="form" method="post" action="/backend/rooms" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="{{ old('name') }}">
            </div>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="roomCapacity">Room Capacity:</label>
                <input type="text" class="form-control" id="roomCapacity" placeholder="Enter Room Capacity" name="roomCapacity" value="{{ old('roomCapacity') }}">
            </div>
            @error('roomCapacity')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="pricePerNight">Price Per Night:</label>
                <input type="text" class="form-control" id="pricePerNight" placeholder="Enter Price Per Night" name="pricePerNight" value="{{ old('pricePerNight') }}">
            </div>
            @error('pricePerNight')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="hasJacuzzi">Has Jacuzzi:</label>
                <input type="text" class="form-control" id="hasJacuzzi" placeholder="Enter has Jacuzzi" name="hasJacuzzi" value="{{ old('hasJacuzzi') }}">
            </div>
            @error('hasJacuzzi')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="hasBalcony">Has Balcony:</label>
                <input type="text" class="form-control" id="hasBalcony" placeholder="Enter has Balcony" name="hasBalcony" value="{{ old('hasBalcony') }}">
            </div>
            @error('hasBalcony')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="hasSeaView">Has Sea View:</label>
                <input type="text" class="form-control" id="hasSeaView" placeholder="Enter has Sea View" name="hasSeaView" value="{{ old('hasSeaView') }}">
            </div>
            @error('hasSeaView')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        
            <div class="form-group ">
                <label for="image" class="upload">Photo:
                    <input type="file" class="form-control" id="image" placeholder="Insert Image" name="image" accept="image/*" hidden>
                    <img src="/backend/photos/0.jpg">
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

    .upload img .photo {
        display: block;
        border: 1px solid #333;
        width: 200px;
        height: 200px;
        object-fit: cover;
    }
    
</style>
<script src="backend/js/create.js"></script>
<script>
    $(document).ready(function () {
        var table = $('#example').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'colvis']
        });

        table.buttons().container()
                .appendTo('#example_wrapper .col-md-6:eq(0)');
    });
 
 // Image preview
$('.upload input').change(e => {
    const f = e.target.files[0];
    const img = $(e.target).siblings('img')[0];
    
    img.dataset.src ??= img.src;
    
    if (f && f.type.startsWith('image/')) {
        img.onload = e => URL.revokeObjectURL(img.src);
        img.src = URL.createObjectURL(f);
    }
    else {
        img.src = img.dataset.src;
        e.target.value = '';
    }
});
</script>
@endsection


