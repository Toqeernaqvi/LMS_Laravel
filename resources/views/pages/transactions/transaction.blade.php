@extends('layouts.app', ['activePage' => 'transactions', 'navName' => 'transaction' ,'title' => 'toqeer abbas',
'activeButton' => 'transactions'])
@csrf
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">

                <div class="container mt-5">
                    <form method="POST" action="{{ route('transaction.store') }}">
                        @csrf
                        <div class="form-group mt-5 w-50">
                            <label>Select Users</label>
                            <select id="user_id" name="user_id" class="form-control">
                                @foreach ($user as $user)
                                    <option value="{{ $user->id }}">
                                        <a class="dropdown-item" name="user_id"
                                            href="{{ route('userInfo.show', $user->id) }}">{{ $user->first_name }}</a>
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-5 w-50">
                            <label>Select Card Type</label>
                            <select id="card_id" name="card_id" class="form-control">
                                @foreach ($card as $card)
                                    <option value="{{ $card->id }}">
                                        <a class="dropdown-item" name="card_id"
                                            href="{{ route('card.show', $card->id) }}">{{ $card->title }}</a>
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Net Amount :</label>
                            <input type="number" class="form-control" id="net_amount" name="net_amount" aria-describedby=""
                                placeholder="Enter Net Amount " data-placement="bottom">
                            @error('net_amount')
                                <div style="color: tomato">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="EarnPoints">Earn Points :</label>
                            <input type="number" class="form-control" id="earn_points" name="earn_points"
                                placeholder="Earn Points " readonly>
                        </div>

                        <div class="form-group">
                            <label for="Description">Description :</label>
                            <input type="text" class="form-control" id="description" name="description"
                                placeholder="Enter Description ">
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                        <a href="{{ route('transaction.index') }}" class="btn btn-light">Cancel</a>

                    </form>
                </div>



                </body>

                </html>

            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script>
        $('input').keyup(function() {
            var card = $("#card_id").val();
            var amount = Number($("#net_amount").val());
            if (card == 1) {
                var res = amount / 100;
                var ans = res * 10;
            }
            if (card == 2) {
                var res = amount / 100;
                var ans = res * 20;
            }
            if (card == 3) {
                var res = amount / 100;
                var ans = res * 30;
            }
            var earn_points = ans;
            $("#earn_points").val(earn_points);


        })
    </script>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {


        $('#net_amount').tooltip({
            'trigger': 'focus',
            'title': 'Enter net_amount like 1000'
        });


    });
</script>
