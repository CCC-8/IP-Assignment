@extends('backend/AdminApp')
@section('body') 
<div id="content">

    <form method="post" action="/backend/rooms/{{ $room->id}}">

        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Confirmation</h5>
                    <a href="/backend/reservations"><button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button></a>
                </div>

                <div class="modal-body">
                    @csrf
                    @method('delete')
                    <h5 class="text-center">Are you sure you want to delete  {{ $room->id}} Room?</h5>
                </div>
                <div class="modal-footer">
                    <a href="/backend/rooms"><button type="button" class="btn btn-secondary">Close</button></a>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </div>
        </div>
    </form>


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
@endsection