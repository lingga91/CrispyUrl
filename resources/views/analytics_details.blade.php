<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Crispy Url | Analytics</title>

        <!-- Bootstrap 5 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

         <!-- Jquery-->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
       
        <!-- Datatable -->
        <link href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css" rel="stylesheet">
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>

        
    </head>
    <body>
        <main>
            <div class="container py-4">
                <header class="pb-3 mb-4 border-bottom">
                <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                    <span class="fs-4">Details of : {{$url_data}}</span>
                </a>
                </header>
                
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="card">
                            <div class="card-body">
                                <table id="analytics" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>IP Address</th>
                                            <th>Datetime</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>

<script>

new DataTable('#analytics', {
    ajax: '{{ url("/analytics/visitor/$id") }}',
    processing: true,
    serverSide: true,
    searching: false,
    "columns": [
        {
            "data": null,
            "orderable":false,
            "render": function(data, type, row, meta) 
            { 
                // Calculate the running number based on the row index 
                var runningNumber = meta.row + 1; 
                return runningNumber; 
            }, 
        },
        {"data": "ip_address","orderable":false},
        {
            "data": null,
            "orderable":false,
            "render": function(data, type, row, meta) 
            { 
                return new Date(row.created_at).toLocaleDateString('en-us', { year:"numeric", month:"short", day:"numeric",hour:"numeric",minute:"numeric"}); 
            }, 
        },

    ]
            
});

</script>