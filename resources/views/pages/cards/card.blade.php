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
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Card Name "
                                data-placement="bottom">
                            @error('name')
                                <div style="color: tomato">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ShortName">ShortName :</label>
                            <input type="text" class="form-control" id="shortName" name="shortName" aria-describedby=""
                                placeholder="Enter ShortName " data-placement="bottom">
                        </div>
                        <div class="form-group">
                            <label for="Description">Joining Bonus :</label>
                            <input type="number" class="form-control" id="joining_bonus" name="joining_bonus"
                                placeholder="Enter Joining Bonus " data-placement="bottom">
                        </div>


                        <div class="form-group">
                            <label for="Description">Minimum Bonus :</label>
                            <input type="number" class="form-control" id="minimum_bonus" name="minimum_bonus"
                                placeholder="Enter Minimum Bonus " data-placement="bottom">
                        </div>

                        <div class="form-group">
                            <label for="Description">Validaty :</label>
                            <input type="date" class="form-control" id="validaty" name="validaty" placeholder="Enter Date ">
                        </div>

                        <div class="form-group">
                            <label for="Description">Description :</label>
                            <input type="text" class="form-control" id="description" name="description"
                                placeholder="Enter Description ">
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
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {

        $('#title').tooltip({
            'trigger': 'focus',
            'title': 'Enter Card Title like Standard'
        });
        $('#shortName').tooltip({
            'trigger': 'focus',
            'title': 'Enter Shortname like std'
        });
        $('#joining_bonus').tooltip({
            'trigger': 'focus',
            'title': 'Enter joining_bonus like 1000'
        });
        $('#minimum_bonus').tooltip({
            'trigger': 'focus',
            'title': 'Enter minimum_bonus like 300'
        });


    });
</script>
