<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Crispy Url | Url shortner</title>

        <!-- Bootstrap 5 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        
    </head>
    <body>
    <main>
  <div class="container py-4">
    <header class="pb-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
         <span class="fs-4">Url Shortner Service</span>
      </a>
    </header>
    @if(session('message'))
        <h6 class="alert alert-success">
            {{ session('message') }}
        </h6>
    @endif
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    Please enter your URL below
                </div>
                <form method="post" action="{{url('create-url')}}" novalidate>
                    @csrf
                    <div class="card-body">
                        <div class="row g-3 align-items-center">
                            <div class="col-12">
                                <input type="text" id="url_data" name="url_data" class="form-control @error('url_data') is-invalid @enderror" aria-describedby="passwordHelpInline">
                                @error('url_data')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>       
                    </div>

                    <div class="card-footer text-muted">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

   
   
  </div>
</main>
    </body>
</html>
