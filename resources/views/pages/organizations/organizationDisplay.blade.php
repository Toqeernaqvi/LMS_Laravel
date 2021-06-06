@extends('layouts.app', ['activePage' => 'organizationDisplay', 'navName' => 'Organization' ,'title' => 'toqeer abbas',
'activeButton' => 'organizations'])
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
                            <h6 class="card-title">Organization</h6>
                            <p class="card-description">All the organization are listed here. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="{{ route('organization.create') }}"><button class="btn btn-primary">
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
                                    <tbody>
                                        @foreach ($organization as $key => $organization)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $organization->name }}</td>
                                                <td>{{ $organization->shortName }}</td>
                                                <td>{{ $organization->description }}</td>

                                                {{-- <td>
                                                    {{ \Carbon\Carbon::parse($organization->created_at)->diffForhumans() }}
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($organization->updated_at)->diffForhumans() }}
                                                </td> --}}
                                                <td>
                                                    <form class="d-inline-block"
                                                        action="{{ route('organization.destroy', $organization->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-icon-text">
                                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                            Delete
                                                        </button>
                                                    </form>

                                                    <a style="margin-left : 5px; width: 100px; height:40px"
                                                        href="{{ route('organization.edit', $organization->id) }}"
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
