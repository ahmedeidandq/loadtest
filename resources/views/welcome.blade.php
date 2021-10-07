<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Load Test</title>
  </head>
  <body>

    <br><br>
    <div class="container">

        <span>Companies: {!! $company !!}</span><br>
        <span>Offices: {!! $office !!}</span><br>
        <span>Departments: {!! $department !!}</span><br>
        <span>Positions: {!! $position !!}</span><br>
        <span>User: {!! $user !!}</span><br>
        <span>Sign Ins: {!! $sign_in_out !!}</span><br>
        <span>Requests: {!! $request !!}</span><br>

        <br>
        <form action="loadtest" method="POST">
            @csrf()
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Duplication Factor</label>
                <div class="col-sm-10">
                  <input type="" class="form-control" id="" placeholder="" name="d_factor">
                </div>
            </div>


            <input class="btn btn-primary btn-sm" type="submit">
        </form>
        

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>