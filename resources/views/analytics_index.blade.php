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
                    <span class="fs-4">Analytics</span>
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
                                            <th>Url</th>
                                            <th>View count</th>
                                            <th>Code</th>
                                            <th>Expired</th>
                                            <th>Action</th>
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
    ajax: "{{ url('/analytics/data') }}",
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
        {"data": "url_data","orderable":false},
        {"data": "visit_count","orderable":false},
        {"data": "code","orderable":false},
        {
            "data": null,
            "orderable":false,
            "render": function(data, type, row, meta) 
            { 
                return Date.now() >= new Date(row.expiry_at); 
            }, 
        },
        {
            "data": null,
            "orderable":false,
            "render": function(data, type, row, meta) 
            { 
                let url_id = row.id
                return `<a class="btn btn-primary" href="/analytics/details/${url_id}" role="button">Details</a>` 
            }, 
        },

    ]
            
});

</script>