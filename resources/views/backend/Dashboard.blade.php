@extends('backend/AdminApp')
@section('body') 

<?php
$dataPoints1 = array(
    array("y" => $resultDate[0], "label" => "Jan"),
    array("y" => $resultDate[1], "label" => "Feb"),
    array("y" => $resultDate[2], "label" => "March"),
    array("y" => $resultDate[3], "label" => "April"),
    array("y" => $resultDate[4], "label" => "May"),
    array("y" => $resultDate[5], "label" => "June"),
    array("y" => $resultDate[6], "label" => "July"),
    array("y" => $resultDate[7], "label" => "Aug"),
    array("y" => $resultDate[8], "label" => "Sept"),
    array("y" => $resultDate[9], "label" => "Oct"),
    array("y" => $resultDate[10], "label" => "Nov"),
    array("y" => $resultDate[11], "label" => "Dec"),
);

$dataPoints2 = array(
    array("label" => "Premium", "y" => ($resultRoomType[0] / $resultRoomType[3]) * 100),
    array("label" => "Luxury", "y" => ($resultRoomType[1] / $resultRoomType[3]) * 100),
    array("label" => "Normal", "y" => ($resultRoomType[2] / $resultRoomType[3]) * 100)
);
?>
<div id="content">
    <div class="my-lg-3">
        <div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">
            <h2 class="font-weight-bold mb-lg-5" style="text-align:center;">Latest Actions Performed</h2>
            <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">Admin Name

                        </th>
                        <th class="th-sm">Action Performed

                        </th>
                        <th class="th-sm">Data Effects

                        </th>
                       
                    </tr>
                </thead>
                <tbody>
                    @foreach($adminActions as $adminAction)
                    <tr>
                        <td>{{$adminAction->adminUsername}}</td>
                        <td>{{$adminAction->action}}</td>
                        <td>{{$adminAction->data}}</td>
                      
                    </tr>   
                    @endforeach
            </table>
        </div>




        <div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">
            <div id="chartContainer1" style="height: 370px; width: 100%;"></div>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        </div>

        <div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">
            <div id="chartContainer2" style="height: 370px; width: 100%;"></div>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        </div>
    </div>
</html> 



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
    $(document).ready(function () {
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });
</script>
<script>
    window.onload = function () {

        var chart1 = new CanvasJS.Chart("chartContainer1", {
            title: {
                text: "Monthly Reservations Report For Year <?php echo date("Y"); ?>"
            },
            axisY: {
                title: "Number of Reservations"
            },
            data: [{
                    type: "line",
                    dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
                }]
        });
        chart1.render();


        var chart2 = new CanvasJS.Chart("chartContainer2", {
            animationEnabled: true,
            title: {
                text: "Room Type Reservation Report"
            },
            subtitles: [{
                    text: "Year <?php echo date("Y"); ?>"
                }],
            data: [{
                    type: "pie",
                    yValueFormatString: "#,##0.00\"%\"",
                    indexLabel: "{label} ({y})",
                    dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
                }]
        });
        chart2.render();

    };

</script>
@endsection
