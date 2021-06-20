@extends('layouts.app', ['activePage' => 'userDisplay', 'navName' => 'USers' ,'title' => 'toqeer abbas',
'activeButton' => 'users'])
<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Users</h6>
                            <p class="card-description">All the Users are listed here. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="{{ route('userInfo.create') }}"><button class="btn btn-primary">
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
                                                Father Name
                                            </th>
                                            <th>
                                               CNIC
                                            </th>
                                            <th>
                                               DOB
                                            </th>
                                            <th>
                                               email
                                             </th>
                                             <th>
                                               phone
                                             </th>
                                             <th>
                                                Address
                                              </th>
                                            {{-- <th>
                                                Organization
                                            </th>
                                            <th>
                                                Branch
                                            </th>
                                            <th>
                                                Country
                                            </th>
                                            <th>
                                                State
                                            </th>
                                            <th>
                                                City
                                            </th>
                                            <th>
                                                Area
                                            </th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($userInfo as $key => $users)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $users->first_name }}   {{ $users->last_name}}</td>
                                                <td>{{ $users->father_name }}</td>
                                                <td>{{ $users->cnic }}</td>
                                                <td>{{ $users->dob }}</td>
                                                <td>{{ $users->email }}</td>
                                             
                                                <td>{{ $users->phone }}</td>
                                                <td>{{ $users->address }}</td>
                                                {{-- <td>{{ $users->account_id }}</td>
                                                <td>{{ $users->organization_id }}</td>
                                                <td>{{ $users->branch_id }}</td>
                                                <td>{{ $users->country_id }}</td>
                                                <td>{{ $users->state_id }}</td>
                                                <td>{{ $users->city_id }}</td>
                                                <td>{{ $users->area_id }}</td> --}}
                                         

                                        
                                                <td>
                                                    <form class="d-inline-block"
                                                        action="{{ route('userInfo.destroy', $users->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-icon-text">
                                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                            Delete
                                                        </button>
                                                    </form>

                                                    <a style="margin-left : 5px; width: 100px; height:40px"
                                                        href="{{ route('userInfo.edit', $users->id) }}"
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
@endsection
