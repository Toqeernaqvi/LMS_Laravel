@extends('layouts.app', ['activePage' => 'stateDisplay', 'navName' => 'States' ,'title' => 'states',
'activeButton' => 'location'])
<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@section('content')
    <div class="content">
        <div class="container">

            <div class="form-group col-md-4">
                <label for="inputState">Select Country</label>
                <select id="country" class="form-control">

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

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">

                        <div class="card-body">
                            <h6 class="card-title">States</h6>
                            <p class="card-description">All the states are listed here. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="{{ route('state.create') }}"><button class="btn btn-primary">
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
                                        @foreach ($state as $key => $state)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $state->name }}</td>
                                                <td>{{ $state->shortName }}</td>
                                                <td>{{ $state->description }}</td>

                                                {{-- <td>
                                                    {{ \Carbon\Carbon::parse($state->created_at)->diffForhumans() }}
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($state->updated_at)->diffForhumans() }}
                                                </td> --}}
                                                <td>
                                                    <form class="d-inline-block"
                                                        action="{{ route('state.destroy', $state->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-icon-text">
                                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                            Delete
                                                        </button>
                                                    </form>

                                                    <a style="margin-left : 5px; width: 100px; height:40px"
                                                        href="{{ route('state.edit', $state->id) }}"
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

        {{-- Jquery Cdn --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script type=text/javascript>
        
            $('#country').change(function() {


                $.ajax({
                    type: "GET",
                    // var dataId = 
                    // alert($("#country").attr("data-id")); // output : id_12345
                 

                    url: "getState/" + $('#country').val(),
                    success: function(res) {
                        if (res) {
                            $("#content tr").remove();
                            var urlEdit = '{{ route('state.edit', $state->id) }}';
                            var urlDelete = '{{ route('state.destroy', $state->id) }}';
                            var trHTML = '';
                            $.each(res, function(index) {
                                urlEdit = urlEdit.replace('$state->id',  res[index].id );
                                urlDelete= urlDelete.replace('$state->id',  res[index].id );

                                trHTML +=
                                    '<tr><td>' +
                                    res[index].id +
                                    '</td><td>' +
                                    res[index].name +
                                    '</td><td>' +
                                    res[index].shortName +
                                    '</td><td>' +
                                    res[index].description +
                                    '</td>'+
                                    '<td><form class="d-inline-block"action="'+urlDelete +'" method="POST">@csrf @method('DELETE')<button type="submit" class="btn btn-danger btn-icon-text"> <i class="fa fa-trash-o" aria-hidden="true"></i> Delete </button> </form> <a style="margin-left : 5px; width: 100px; height:40px" href="'+urlEdit+'" class="btn btn-warning  "><i class="fa fa-pencil" aria-hidden="true"></i> Edit </a> </td>'
                                    
                                    +'<tr>';
                            });
                            // $.each(res ){
                            //     for (i = 0; i res<.length; i++) {
                            //         console.log(res);
                            //         trHTML+=
                            //             '<tr><td>'
                            //             + res.state[i].id
                            //             + '</td><td>'
                            //             + resp.state[i].name
                            //             + '</td><td>'
                            //             + res.state[i].shortname
                            //             + '</td></tr>';
                            //     }

                            // });

                            console.log(trHTML);
                            $('#content').append(trHTML);
                        }

                    }
                });

            });

        </script>

    @endsection
