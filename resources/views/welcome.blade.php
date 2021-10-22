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

            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Company ID</label>
                <div class="col-sm-10">
                  <input type="" class="form-control" id="" placeholder="" name="company_id">
                </div>
            </div>


            <input class="btn btn-primary btn-sm" type="submit">
        </form>
        
        <br>
        <hr>
        Merge Companies
        <br>
        <form action="mergecompanies" method="POST">
            @csrf()

            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Company IDs * Separated by comma</label>
                <div class="col-sm-10">
                  <input type="" class="form-control" id="" placeholder="" name="company_ids">
                </div>
            </div>


            <input class="btn btn-primary btn-sm" type="submit">
        </form>


        <br>
        <hr>
        Merge Companies__
        <br>
        <form action="mergecompanies_" method="POST">
            @csrf()

            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Company IDs * Separated by comma</label>
                <div class="col-sm-10">
                  <input type="" class="form-control" id="" placeholder="" name="company_ids">
                </div>
            </div>


            <input class="btn btn-primary btn-sm" type="submit">
        </form>


        <table class="table table-striped" width="100%">
            
            <thead>
                <th>Company</th>
                <th>Offices</th>
                <th>Departments</th>
                <th>Positions</th>
                <th>Users</th>
                <th>Attendance Profiles</th>
                <th>Holiday Profiles</th>
                <th>Holidays</th>
                <th>Sign Ins</th>
                <th>Penalties</th>
                <th>Requests</th>
                

            </thead>

            <tbody>
                
                @foreach($companies as $company)
                <tr>
                    <td>{!! $company ->id !!}</td>
                    <td>{!! $company ->offices() ->count() !!}</td>
                    <td>{!! $company ->departments() ->count() !!}</td>
                    <td>{!! $company ->positions() ->count() !!}</td>
                    <td>{!! $company ->users() ->count() !!}</td>
                    <td>{!! $company ->attProfiles() ->count() !!}</td>
                    <td>{!! $company ->holidayProfiles() ->count() !!}</td>
                    <td>{!! $company ->holidays() ->count() !!}</td>
                    <td>{!! $company ->users() ->join('sign_in', 'sign_in.emp_id', 'users.id') ->count() !!}</td>
                    <td>{!! $company ->users() ->join('penalties', 'penalties.emp_id', 'users.id') ->count() !!}</td>
                    <td>{!! $company ->users() ->join('requests', 'requests.emp_id', 'users.id') ->count() !!}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>