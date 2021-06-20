@extends('layouts.app', ['activePage' => 'cards', 'navName' => 'cards' ,'title' => 'LMS',
'activeButton' => 'cards'])


@section('content')
    <div class="content">
        <div class="container">
            <div class="row">

                <div class="container">


                    <form method="POST" action="{{ route('card.store') }}">
                        @csrf
                        <div class="form-group mt-5">
                            <label for="Organization">Card :</label>
                            <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp"
                                placeholder="Enter Card Name ">
                            @error('name')
                                <div style="color: tomato">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ShortName">ShortName :</label>
                            <input type="text" class="form-control" id="shortName" name="shortName" aria-describedby=""
                                placeholder="Enter ShortName ">
                        </div>
                        <div class="form-group">
                            <label for="Description">Joining Bonus :</label>
                            <input type="number" class="form-control" id="joining_bonus" name="joining_bonus"
                                placeholder="Enter Joining Bonus ">
                        </div>


                        <div class="form-group">
                            <label for="Description">Minimum Bonus :</label>
                            <input type="number" class="form-control" id="minimum_bonus" name="minimum_bonus"
                                placeholder="Enter Minimum Bonus ">
                        </div>

                        <div class="form-group">
                            <label for="Description">Validaty :</label>
                            <input type="date" class="form-control" id="validaty" name="validaty" placeholder="Enter Date ">
                        </div>

                        <div class="form-group">
                            <label for="Description">Description :</label>
                            <input type="text" class="form-control" id="description" name="description"
                                aria-describedby="emailHelp" placeholder="Enter Description ">
                        </div>




                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                        <a href="{{ route('card.index') }}" class="btn btn-light">Cancel</a>

                    </form>
                </div>

                <!-- Optional JavaScript -->
                <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                <!-- jQuery first, then Popper.js, then Bootstrap JS 5 -->
                <script src="js/bootstrap.js"></script>
                <script src="js/bootstrap.bundle.js"></script>

            </div>


        </div>
    </div>
    </div>
@endsection
