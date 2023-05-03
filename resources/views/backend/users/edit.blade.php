@extends('backend/AdminApp')
@section('body') 

<div id="content">
    <div class="container">
        <h1>Edit User</h1>
        
        <form class="form" method="post" action="/backend/users/{{$user->id}}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username" value="{{ old('username',$user) }}">
            </div>
            @error('username')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter you email" name="email" value="{{ old('email',$user) }}">
            </div>
             @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="pwd">Phone Number:</label>
                <input type="text" class="form-control" id="phoneno" placeholder="Enter Phone Number" name="phoneno" value="{{ old('phoneno',$user) }}">
            </div>
            @error('phoneno')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" value="{{ old('password',$user) }}" hidden>
            </div>
             @error('password')
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

