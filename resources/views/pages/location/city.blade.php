@extends('layouts.app', ['activePage' => 'city', 'navName' => 'City' ,'title' => 'City',
'activeButton' => 'location'])
@csrf
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <!doctype html>
                <html lang="en">

                <head>
                    <title>Title</title>
                    <!-- Required meta tags -->
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

                    <!-- Bootstrap CSS -->
                    {{-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> --}}
                </head>

                <body>
                    <div class="container mt-5">
                        <form method="POST" action="{{ route('city.store') }}">
                            @csrf
                            <div class="form-group col-md-4">
                                <label for="inputState">Select Country</label>
                                <select id="country"  name="country_id"  class="form-control">

                                    @foreach ($country as $countries)
                                        <option value="{{ $countries->id }}">
                                            <a class="dropdown-item" name="country[]"
                                                href="{{ route('state.show', $countries->id) }}">{{ $countries->name }}</a>

                                        </option>

                                    @endforeach
                                    <option selected="selected">

                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Select State</label>
                                <select id="state"  name="state_id"  class="form-control">


                                    <option selected="selected">

                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Country">City Name :</label>
                                <input type="text" class="form-control" id="title" aria-describedby="emailHelp"
                                  name="name"  placeholder="Enter City Name ">
                            </div>
                            <div class="form-group">
                                <label for="ShortName">ShortName :</label>
                                <input type="text" class="form-control" id="shortname" aria-describedby="emailHelp"
                                  name="shortName"  placeholder="Enter ShortName ">
                            </div>

                            <div class="form-group">
                                <label for="Description">Description :</label>
                                <input type="text" class="form-control" id="shortname" aria-describedby="emailHelp"
                                   name="Description"  placeholder="Enter Description ">
                            </div>

                            <button type="submit" class="btn btn-primary mt-2">Submit</button>
                        </form>
                    </div>

                    {{-- <!-- Optional JavaScript -->
                    <!-- jQuery first, then Popper.js, then Bootstrap JS 5 -->
                    <script src="js/bootstrap.js"></script>
                    <script src="js/bootstrap.bundle.js"></script> --}}

                    {{-- Jquery Cdn --}}
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                    <script type=text/javascript>
                        $('#country').change(function() {
                            var countryID = $(this).val();
                            if (countryID) {
                                $.ajax({
                                    type: "GET",
                                    url: "getState/" + $('#country').val(),
                                    success: function(res) {
                                        if (res) {
                                            $("#state").empty();
                                            $("#state").append('<option>Select State</option>');
                                            $.each(res, function(index) {
                                                console.log(res);
                                                $("#state").append('<option value="' + res[
                                                        index].id + '">' + res[index].name +
                                                    '</option>');
                                            });

                                        } else {
                                            $("#state").empty();
                                        }
                                    }
                                });
                            } else {
                                $("#state").empty();

                            }
                        });

                    </script>

                </body>

                </html>

            </div>
        </div>
    </div>
@endsection
