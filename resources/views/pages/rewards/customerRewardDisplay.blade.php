@extends('layouts.customerApp', ['activePage' => 'rewards', 'navName' => 'rewards' ,'title' => 'toqeer abbas',
'activeButton' => 'Rewards'])

@section('content')
    <div class="content">
        <div class="container">
            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">

                        <div class="card-body">
                            <h6 class="card-title">Rewards</h6>
                            <p class="card-description">All the rewards are listed here. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <button class="btn btn-primary">
                                    <b>Your Points : </b> {{ $tran->sum('earn_points') }}
                                </button>
                            </p>

                            <div class="table-responsive">
                                <table id="dataTableExample" class="table">
                                    <thead>
                                        <tr>
                                            <th>
                                                Reward
                                            </th>



                                        </tr>
                                    </thead>
                                    <tbody id="content">
                                        @foreach ($reward as $key => $reward)


                                            <tr style="display: flex;   flex-flow: row wrap;">

                                                <td style=""><img src="{{ asset('uploads/' . $reward->name) }}" width="50"
                                                        height="50" alt="job image" title="job image">
                                                    <h3>{{ $reward->title }}</h3>
                                                    <p><b>Total Points : </b>{{ $reward->total_points }}</p>


                                                    @if ($tran->sum('earn_points') >= $reward->total_points)
                                                        {{-- Display Modal --}}
                                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                            data-target="#exampleModal" id="btnModal"
                                                            value="{{ $reward->id }}">
                                                            Avail Offer
                                                        </button>

                                                    @else

                                                        <button class="btn btn-dark">
                                                            Collect more points
                                                        </button>
                                                    @endif
                                                </td>







                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <p class="modal-title" id="exampleModalLabel">
                                                                    <img src="{{ asset('uploads/cong.jpg') }}" width="50"
                                                                        height="50" alt="job image" title="job image">



                                                                </p>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div id="rewardData"></div>
                                                                <p><b>Please Confirm to avail this offer!</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal" id="btnYes">Yes</button>
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal" id="btnNo">No</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                </td>


                                                <td>


                                                    <hr>
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
    {{-- Jquery Cdn --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type=text/javascript>
        $('#btnModal').click(function() {

            var rewardID = $('#btnModal').val();
            var html = '';

            if (rewardID) {
                $.ajax({
                    type: "GET",
                    url: "getReward/" + $('#btnModal').val(),

                    success: function(res) {
                        console.log(res);
                        if (res) {
                            $.each(res, function(index) {
                                $("#rewardData").empty();
                                html += '<h3>' + res[index].title + '</h3>';
                                html += '<p id="total_points">' + res[index].total_points +
                                    '</p>';
                                html += '<p hidden id="reward_id">' + res[index].id + '</p>';


                                $("#rewardData").append(html);
                            });

                        } else {
                            $("#rewardData").empty();
                        }
                    }
                });
            }
        });


        // Minus Points from points Table
        $('#btnYes').click(function() {
           
            var reward_id = $('#reward_id').text();
            console.log("abc"+reward_id);

            var points = $('#total_points').text();
            console.log("abc"+points);
            var type = "Minus";

            if (reward_id) {
                $.ajax({
                    url: "/points_store",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",


                        reward_id: reward_id,
                        points: points,
                        type: type
                    },
                    success: function(res) {
                        if (res) {
                            alert("Congrats");

                        } else {
                            alert("Some Error 404");
                        }
                    }
                });
            } else {
                $("#state").empty();

            }
        });
    </script>

@endsection
