@extends('layouts.app', ['activePage' => 'country', 'navName' => 'Country' ,'title' => 'toqeer abbas',
'activeButton' => 'location'])
<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

@section('content')
    <div class="content">
        <div class="container">
            <div class="row">

                <div class="container">


                    <form method="POST" action="{{ route('country.store') }}">
                        @csrf
                        <div class="form-group mt-5">
                            <label for="Country">Country :</label>
                            <input type="text" class="form-control" id="name" name="name" 
                                placeholder="Enter Country Name " data-placement="bottom">
                            @error('name')
                                <div style="color: tomato">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ShortName">ShortName :</label>
                            <input type="text" class="form-control" id="shortName" name="shortName"
                                 placeholder="Enter ShortName " data-placement="bottom">
                        </div>

                        <div class="form-group">
                            <label for="Description">Description :</label>
                            <input type="text" class="form-control" id="description" name="description"
                                 placeholder="Enter Description ">
                        </div>

                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                        <a href="{{ route('country.index') }}" class="btn btn-light">Cancel</a>

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

        $('#name').tooltip({
            'trigger': 'focus',
            'title': 'Enter Country Name like Pakistan'
        });
        $('#shortName').tooltip({
            'trigger': 'focus',
            'title': 'Enter Shortname like Pak'
        });
    });
</script>
