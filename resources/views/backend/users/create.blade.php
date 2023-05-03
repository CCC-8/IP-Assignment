@extends('backend/AdminApp')
@section('body') 

<div id="content">
    <div class="container">
        <h1>Create New User</h1>
        
        <form class="form" method="post" action="/backend/users" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username" value="{{ old('username') }}">
            </div>
            @error('username')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter you email" name="email" value="{{ old('email') }}">
            </div>
             @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="pwd">Phone Number:</label>
                <input type="text" class="form-control" id="phoneno" placeholder="Enter Phone Number" name="phoneno" value="{{ old('phoneno') }}">
            </div>
            @error('phoneno')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" value="{{ old('password') }}">
            </div>
             @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
             <div class="form-group">
                <label for="password">Confirm Password:</label>
                <input type="password" class="form-control" id="conf_password" placeholder="Enter confirm password" name="conf_password">
            </div>
             @error('conf_password')
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

