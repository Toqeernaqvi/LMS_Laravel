@extends('layouts.app', ['activePage' => 'area', 'navName' => 'Area' ,'title' => 'Area',
'activeButton' => 'location'])
@csrf
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">


                <div class="container mt-5">
                    <form method="POST" action="{{ route('area.store') }}">
                        @csrf
                        <div class="form-group col-md-4">
                            <label>Select Country</label>
                            <select id="country" name="country_id" class="form-control">

                                @foreach ($country as $country)
                                    <option value="{{ $country->id }}">
                                        <a class="dropdown-item" name="country"
                                            href="{{ route('city.show', $country->id) }}">{{ $country->name }}</a>

                                    </option>

                                @endforeach
                                <option selected="selected">

                                </option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Select State</label>
                            <select id="state" name="state_id" class="form-control">


                                <option selected="selected">

                                </option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Select City</label>
                            <select id="city" name="city_id" class="form-control">


                                <option selected="selected">

                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Country">Area Name :</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Area Name ">
                        </div>
                        <div class="form-group">
                            <label for="ShortName">ShortName :</label>
                            <input type="text" class="form-control" id="shortName" name="shortName"
                                placeholder="Enter ShortName ">
                        </div>

                        <div class="form-group">
                            <label for="Description">Description :</label>
                            <input type="text" class="form-control" id="Description" name="Description"
                                placeholder="Enter Description ">
                        </div>

                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    </form>
                </div>






            </div>
        </div>
    </div>

    {{-- Jquery Cdn --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type=text/javascript>
        //Country Dropdown Change
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
                                $("#state").append('<option value="' + res[index].id +
                                    '">' + res[index].name + '</option>');
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

        //State Dropdown Change
        $('#state').change(function() {
            var stateID = $(this).val();
            if (stateID) {
                $.ajax({
                    type: "GET",
                    url: "getCity/" + $('#state').val(),
                    success: function(res) {
                        if (res) {
                            $("#city").empty();
                            $("#city").append('<option>Select City</option>');
                            $.each(res, function(index) {
                                console.log(res);
                                $("#city").append('<option value="' + res[index].id +
                                    '">' + res[index].name + '</option>');
                            });

                        } else {
                            $("#city").empty();
                        }
                    }
                });
            } else {
                $("#city").empty();

            }
        });

    </script>
@endsection
