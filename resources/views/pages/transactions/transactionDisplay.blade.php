@extends('layouts.app', ['activePage' => 'transactionDisplay', 'navName' => 'transactions' ,'title' => 'transactions',
'activeButton' => 'transactions'])
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
                            <h6 class="card-title">Transactions</h6>
                            <p class="card-description">All the transactions are listed here. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="{{ route('transaction.create') }}"><button class="btn btn-primary">
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
                                                UserName
                                            </th>
                                            <th>
                                                CardType
                                            </th>
                                            <th>
                                                Net Amount
                                            </th>
                                            <th>
                                                Earn Points
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
                                        @foreach ($tran as $key => $transaction)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                {{-- <td>{{route('transaction/getUser/'[$transaction->user_id] ) }} </td> --}}
                                                <td>{{ $transaction->first_name }}</td>
                                                <td>{{ $transaction->title }}</td>
                                                <td>{{ $transaction->net_amount }}</td>
                                                <td>{{ $transaction->earn_points }}</td>
                                                <td>{{ $transaction->description }}</td>

                                                {{-- <td>
                                                    {{ \Carbon\Carbon::parse($state->created_at)->diffForhumans() }}
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($state->updated_at)->diffForhumans() }}
                                                </td> --}}
                                                <td>
                                                    <form class="d-inline-block"
                                                        action="{{ route('transaction.destroy', $transaction->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-icon-text">
                                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                            Delete
                                                        </button>
                                                    </form>

                                                    <a style="margin-left : 5px; width: 100px; height:40px"
                                                        href="{{ route('transaction.edit', $transaction->id) }}"
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
