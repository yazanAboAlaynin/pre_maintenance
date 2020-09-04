@extends('layouts.admin')

@section('content')

    <div class="container">

        <h1>Vehicles:</h1>

        <br/>
        <br/>

        <table class="table table-bordered table-striped data-table">

            <thead>

            <tr>

                <th>id</th>

                <th>image</th>

                <th>name</th>
                <th>year</th>
                <th>make</th>
                <th>model</th>
                <th>guide_url</th>

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

                ajax: "{{ route('admin.vehicles') }}",

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
                    {data: 'year', name: 'year'},
                    {data: 'make', name: 'make'},
                    {data: 'model', name: 'model'},
                    {data: 'guide_url', name: 'guide_url'},




                    {data: 'action', name: 'action', orderable: false, searchable: false},

                ]

            });



        });
        function update(id) {
            window.location.href = 'vehicle/'+id+'/update';
        }
        function addPart(id) {
            window.location.href = 'vehicle/'+id+'/add/part';
        }

        function del(id) {

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    $('.data-table').DataTable().ajax.reload();
                    alert('Data Deleted');
                }
            };

            xhttp.open("get", "{{ route("admin.vehicle.delete") }}?id=" + id, true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send();

        }

        function parts(id) {
            window.location.href = 'vehicle/'+id+'/parts';
        }

    </script>


@endsection
