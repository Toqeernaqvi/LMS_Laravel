@extends('layouts.app', ['activePage' => 'areaDisplay', 'navName' => 'Areas' ,'title' => 'areas',
'activeButton' => 'location'])
<!-- Bootstrap CSS -->
 <link href="{{ asset('css/app.css') }}" rel="stylesheet">

@section('content')
    <div class="content">
        <div class="container">

            <div class="form-group col-md-4">
                <label>Select Country</label>
                <select id="country" class="form-control">

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
                <select id="state" class="form-control">


                    <option selected="selected">

                    </option>
                </select>
            </div>

            <div class="form-group col-md-4">
                <label>Select City</label>
                <select id="city" class="form-control">


                    <option selected="selected">

                    </option>
                </select>
            </div>


            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">

                        <div class="card-body">
                            <h6 class="card-title">Areas</h6>
                            <p class="card-description">All the areas are listed here. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="{{ route('area.create') }}"><button class="btn btn-primary">
                                        Create</button></a>
                            </p>

                            <div class="table-responsive">
                                <table id="dataTableExample" class="table">
                                    <thead>
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                Name
                                            </th>
                                            <th>
                                                ShortName
                                            </th>
                                            <th>
                                                Description
                                            </th>
                                            {{-- <th>
                                                Created At
                                            </th>
                                            <th>
                                                Updated At
                                            </th> --}}
                                            <th>
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="content">
                                        @foreach ($area as $key => $area)

                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $area->name }}</td>
                                                <td>{{ $area->shortName }}</td>
                                                <td>{{ $area->description }}</td>

                                                {{-- <td>
                                                    {{ \Carbon\Carbon::parse($area->created_at)->diffForhumans() }}
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($area->updated_at)->diffForhumans() }}
                                                </td> --}}
                                                <td>
                                                    <form class="d-inline-block"
                                                        action="{{ route('area.destroy', $area->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-icon-text">
                                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                            Delete
                                                        </button>
                                                    </form>

                                                    <a style="margin-left : 5px; width: 100px; height:40px"
                                                        href="{{ route('area.edit', $area->id) }}"
                                                        class="btn btn-warning  ">
                                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                                        Edit
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    Jquery Cdn
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
        
        $('#city').change(function() {
                console.log("jdsjas");

                $.ajax({
                    type: "GET",
                    // var dataId = 
                    // alert($("#country").attr("data-id")); // output : id_12345


                    url: "getArea/" + $('#city').val(),
                    success: function(res) {
                        if (res) {
                            $("#content tr").remove();
                            var urlEdit = '{{ route('area.edit', $area->id) }}';
                            var urlDelete = '{{ route('area.destroy', $area->id) }}';
                            var trHTML = '';
                            $.each(res, function(index) {
                                urlEdit = urlEdit.replace('$area->id', res[index].id);
                                urlDelete = urlDelete.replace('$area->id', res[index].id);

                                trHTML +=
                                    '<tr><td>' +
                                    res[index].id +
                                    '</td><td>' +
                                    res[index].name +
                                    '</td><td>' +
                                    res[index].shortName +
                                    '</td><td>' +
                                    res[index].description +
                                    '</td>' +
                                    '<td><form class="d-inline-block"action="' + urlDelete +
                                    '" method="POST">@csrf @method('DELETE')<button type="submit" class="btn btn-danger btn-icon-text"> <i class="fa fa-trash-o" aria-hidden="true"></i> Delete </button> </form> <a style="margin-left : 5px; width: 100px; height:40px" href="' +
                                    urlEdit +
                                    '" class="btn btn-warning  "><i class="fa fa-pencil" aria-hidden="true"></i> Edit </a> </td>'

                                    +
                                    '<tr>';
                            });


                            console.log(trHTML);
                            $('#content').append(trHTML);
                        }

                    }
                });

            });



    </script>

@endsection
