@extends('layouts.app', ['activePage' => 'state', 'navName' => 'State' ,'title' => 'toqeer abbas',
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
                    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
                </head>

                <body>
                    <div class="container mt-5">
                        <form method="POST" action="{{ route('state.store') }}">
                            @csrf
                            <div class="form-group mt-5 w-50">
                                <label for="inputState">Select Country</label>
                                <select id="country_id" name="country_id" class="form-control">
                                    @foreach ($country as $country)
                                        <option value="{{ $country->id }}">
                                            <a class="dropdown-item" name="country_id"
                                                href="{{ route('state.show', $country->id) }}">{{ $country->name }}</a>
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="State">State :</label>
                                <input type="text" class="form-control" id="name" name="name" 
                                    placeholder="Enter State Name " data-placement="bottom">
                                @error('name')
                                    <div style="color: tomato">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="ShortName">ShortName :</label>
                                <input type="text" class="form-control" id="shortName" name="shortName"
                                    aria-describedby="emailHelp" placeholder="Enter ShortName " data-placement="bottom">
                            </div>

                            <div class="form-group">
                                <label for="Description">Description :</label>
                                <input type="text" class="form-control" id="description" name="description"
                                    aria-describedby="emailHelp" placeholder="Enter Description ">
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Submit</button>
                            <a href="{{ route('state.index') }}" class="btn btn-light">Cancel</a>

                        </form>
                    </div>

                    <!-- Optional JavaScript -->
                    <!-- jQuery first, then Popper.js, then Bootstrap JS 5 -->
                    <script src="js/bootstrap.js"></script>
                    <script src="js/bootstrap.bundle.js"></script>


                </body>

                </html>

            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {

        $('#name').tooltip({
            'trigger': 'focus',
            'title': 'Enter State Name like Punjab'
        });
        $('#shortName').tooltip({
            'trigger': 'focus',
            'title': 'Enter Shortname like pun'
        });
    });
</script>