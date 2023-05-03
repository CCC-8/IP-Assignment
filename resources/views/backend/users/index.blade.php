@extends('backend/AdminApp')
@section('body') 
<div id="content">

    <h1 class="mb-xl-5">Users List</h1>

    <a href="users/create"><button class="btn btn-primary">Create</button></a>

    <table id="example" class="table table-striped table-bordered my-3" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <th>{{$user->id}}</th>
                <td>{{$user->username}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phoneno}}</td>
                <td>
                    <a href="users/{{$user->id}}/edit" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <form method="post" action="/backend/users/{{ $user->id }}">
                        @csrf
                        @method('delete')
                         <button class="btn btn-danger">Delete</button>
                    </form>
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
