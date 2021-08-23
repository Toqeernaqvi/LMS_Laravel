@extends('layouts.customerApp', ['activePage' => 'rewards', 'navName' => 'rewards' ,'title' => 'toqeer abbas',
'activeButton' => 'Rewards'])

@section('content')
    <div class="content">
        <div class="container">
            <div class="row">


                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">

                        <div class="card-body">
                            <h6 class="card-title">Transactions</h6>
                            <p class="card-description">All the transactions are listed here. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              
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
                                            {{-- <th>
                                                    CardType
                                                </th> --}}
                                            <th>
                                                Net Amount
                                            </th>
                                            <th>
                                                Earn Points
                                            </th>
                                            <th>
                                                Description
                                            </th>
                                            <th>
                                                Date
                                            </th>
                                            {{-- <th>
                                                    Updated At
                                                </th> --}}

                                        </tr>
                                    </thead>
                                    <tbody id="content">
                                        @foreach ($tran as $key => $transaction)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                {{-- <td>{{route('transaction/getUser/'[$transaction->user_id] ) }} </td> --}}
                                                <td>{{ $transaction->name }}</td>
                                                {{-- <td>{{ $transaction->title }}</td> --}}
                                                <td>{{ $transaction->net_amount }}</td>
                                                <td>{{ $transaction->earn_points }}</td>
                                                <td>{{ $transaction->description }}</td>
                                                <td> {{ $transaction->earn_points }}</td>

                                                <td>
                                                    {{ \Carbon\Carbon::parse($transaction->created_at)->diffForhumans() }}
                                                </td>
                                                {{-- <td>
                                                        {{ \Carbon\Carbon::parse($state->updated_at)->diffForhumans() }}
                                                    </td> --}}




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
<script>
     $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: "/getAllPoints",

                success: function(res) {

                    if (res) {
                        $.each(res, function(index) {

                            html = '<h6>' + res[index] + '</h6>';


                            $(".total_points").append(html);
                        });

                    } else {
                        $(".total_points").empty();
                    }
                }
            });
        });

</script>
    @endsection
