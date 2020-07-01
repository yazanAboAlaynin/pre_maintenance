@extends('layouts.admin')

@section('content')

    <div class="container">

        <h1>Orders:</h1>

        <br/>
        <br/>

        <table class="table table-bordered table-striped data-table">

            <thead>

            <tr>

                <th>id</th>

                <th>image</th>

                <th>name</th>
                <th>vehicle_id</th>
                <th>date_to_change</th>
                <th>description</th>
                <th>markets</th>




                <th width="100px">Action</th>

            </tr>

            </thead>

            <tbody>

            </tbody>

        </table>

    </div>

    <script type="text/javascript">

        $(function () {

            var table = $('.data-table').DataTable({

                processing: true,

                serverSide: true,

                ajax: "{{ route('admin.vehicle.parts',$id) }}",

                columns: [

                    {data: 'id', name: 'id'},

                    {
                        "name": "image",
                        "data": "image",
                        "render": function (data, type, full, meta) {
                            return "<img src=\"/storage/" + data + "\" height=\"60\" />";
                        },
                        "title": "Image",
                        "orderable": true,
                        "searchable": true
                    },

                    {data: 'name', name: 'name'},
                    {data: 'vehicle_id', name: 'vehicle_id'},
                    {data: 'date_to_change', name: 'date_to_change'},
                    {data: 'description', name: 'description'},
                    {data: 'markets', name: 'markets'},

                    {data: 'action', name: 'action', orderable: false, searchable: false},

                ]

            });



        });

        function del(id) {

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    $('.data-table').DataTable().ajax.reload();
                    alert('Data Deleted');
                }
            };

            xhttp.open("get", "{{ route("admin.part.delete") }}?id=" + id, true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send();

        }

        function parts(id) {
            window.location.href = 'vehicle/'+id+'/parts';
        }

    </script>


@endsection