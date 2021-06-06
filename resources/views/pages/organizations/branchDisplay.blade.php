@extends('layouts.app', ['activePage' => 'branchDisplay', 'navName' => 'Branches' ,'title' => 'branches',
'activeButton' => 'organizations'])
<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@section('content')
    <div class="content">
        <div class="container">

            <div class="form-group col-md-4">
                <label >Select Organization</label>
                <select id="org" class="form-control">

                    @foreach ($organization as $organizations)
                        <option value="{{ $organizations->id }}">
                            <a class="dropdown-item" name="organizations[]"
                                href="{{ route('branch.show', $organizations->id) }}">{{ $organizations->name }}</a>

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
                            <h6 class="card-title">Branch</h6>
                            <p class="card-description">All the branches are listed here. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="{{ route('branch.create') }}"><button class="btn btn-primary">
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
                                        @foreach ($branch as $key => $branch)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $branch->name }}</td>
                                                <td>{{ $branch->shortName }}</td>
                                                <td>{{ $branch->description }}</td>

                                                {{-- <td>
                                                    {{ \Carbon\Carbon::parse($state->created_at)->diffForhumans() }}
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($state->updated_at)->diffForhumans() }}
                                                </td> --}}
                                                <td>
                                                    <form class="d-inline-block"
                                                        action="{{ route('branch.destroy', $branch->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-icon-text">
                                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                            Delete
                                                        </button>
                                                    </form>

                                                    <a style="margin-left : 5px; width: 100px; height:40px"
                                                        href="{{ route('branch.edit', $branch->id) }}"
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
      

      $('#org').change(function() {       
                   console.log("i am in");

                $.ajax({
                    type: "GET",
                 
                    url: "getBranch/" + $('#org').val(),
                     
                    success: function(res) {
                        if (res) {
                            $("#content tr").remove();
                    
                            var urlEdit = '{{ route('branch.edit', $branch->id) }}';
                            var urlDelete = '{{ route('branch.destroy', $branch->id) }}';
                            var trHTML = '';
                            $.each(res, function(index) {
                                urlEdit = urlEdit.replace('$branch->id',  res[index].id );
                                urlDelete= urlDelete.replace('$branch->id',  res[index].id );

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
                             

                            console.log(trHTML);
                            $('#content').append(trHTML);
                        }

                    }
                });

            });

        </script>

    @endsection
