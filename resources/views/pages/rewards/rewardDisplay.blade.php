@extends('layouts.app', ['activePage' => 'rewardDisplay', 'navName' => 'reward' ,'title' => 'rewards',
'activeButton' => 'rewards'])

@section('content')
    <div class="content">
        <div class="container">
 

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">

                        <div class="card-body">
                            <h6 class="card-title">Rewards</h6>
                            <p class="card-description">All the rewards are listed here. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="{{ route('reward.create') }}"><button class="btn btn-primary">
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
                                                Title
                                            </th>
                                            <th>
                                                Total Points
                                            </th>
                                            <th>
                                                Reward
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
                                        @foreach ($reward as $key => $reward)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                                 
                                                <td>{{ $reward->title }}</td>
                                                <td>{{ $reward->total_points }}</td>
                                                 

                                                <td><img src="{{ asset('uploads/'.$reward->name)}}"  width="50" height="50" alt="job image" title="job image"></td>
                                                {{-- <td>{{ $rewards->pic }}</td> --}}
                                                <td>{{ $reward->description }}</td>

                                                {{-- <td>
                                                    {{ \Carbon\Carbon::parse($state->created_at)->diffForhumans() }}
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($state->updated_at)->diffForhumans() }}
                                                </td> --}}
                                                <td>
                                                    <form class="d-inline-block"
                                                        action="{{ route('reward.destroy', $reward->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-icon-text">
                                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                            Delete
                                                        </button>
                                                    </form>

                                                    <a style="margin-left : 5px; width: 100px; height:40px"
                                                        href="{{ route('reward.edit', $reward->id) }}"
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

        

    @endsection
