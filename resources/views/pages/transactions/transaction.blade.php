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
                            <div  class="form-group mt-5 w-50">
                                <label  >Select Users</label>
                                <select id="user_id" name="user_id" class="form-control">
                                    @foreach ($user as $user)
                                        <option value="{{ $user->id }}">
                                            <a class="dropdown-item" name="user_id"
                                                href="{{ route('userInfo.show', $user->id) }}">{{ $user->first_name }}</a>
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div  class="form-group mt-5 w-50">
                                <label  >Select Card Type</label>
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
                                <label  >Net Amount :</label>
                                <input type="number" class="form-control" id="net_amount" name="net_amount" aria-describedby=""
                                    placeholder="Enter Net Amount ">
                            </div>
                            <div class="form-group">
                                <label for="EarnPoints">Earn Points :</label>
                                <input type="number" class="form-control" id="earn_points" name="earn_points"
                                    placeholder="Earn Points ">
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

                    <!-- Optional JavaScript -->
                    <!-- jQuery first, then Popper.js, then Bootstrap JS 5 -->
                    <script src="js/bootstrap.js"></script>
                    <script src="js/bootstrap.bundle.js"></script>


                </body>

                </html>

            </div>
        </div>
    </div>
@endsection
