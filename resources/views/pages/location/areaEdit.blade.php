@extends('layouts.app', ['activePage' => 'area', 'navName' => 'Area' ,'title' => 'Area Update',  
'activeButton' => 'location'])
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
             
 @section('content')
     <div class="content">
         <div class="container">
             <div class="row">
        
                     <div class="container">
                         <form method="POST" action="{{ route('area.update', $area->id) }}">
                            @method('PATCH')

                            @csrf
                            <div class="form-group col-md-4">
                                <label>Select Country</label>
                                <select id="country" name="country_id" class="form-control">
    
                                    @foreach ($country as $country)
                                        <option value="{{ $country->id }}">
                                            <a class="dropdown-item" name="country"
                                                href="{{ route('area.show', $country->id) }}">{{ $country->name }}</a>
    
                                        </option>
    
                                    @endforeach
                       
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Select State</label>
                                <select id="state_id" name="state_id" class="form-control">
                                    @foreach ($state as $state)
                                        <option value="{{ $state->id }}">
                                            <a class="dropdown-item" name="state_id"
                                                href="{{ route('area.show', $state->id) }}">{{ $state->name }}</a>
                                        </option>
                                    @endforeach
                                </select>
                            </div>

    
                            <div class="form-group col-md-4">
                                <label for="inputState">Select City</label>
                                <select id="city_id" name="city_id" class="form-control">
                                    @foreach ($city as $city)
                                        <option value="{{ $city->id }}">
                                            <a class="dropdown-item" name="state_id"
                                                href="{{ route('area.show', $city->id) }}">{{ $city->name }}</a>
                                        </option>
                                    @endforeach
                                </select>
                            </div>



                             <div class="form-group ">
                                 <label for="Country">Area :</label>
                                 <input type="text" class="form-control" id="name"  name="name"aria-describedby="emailHelp"
                                     placeholder="Enter Area Name " value="{{ $area->name }}">
                             </div>
                             <div class="form-group">
                                 <label for="ShortName">ShortName :</label>
                                 <input type="text" class="form-control" id="shortName" name="shortName" aria-describedby="emailHelp"
                                     placeholder="Enter ShortName " value="{{ $area->shortName }}">
                             </div>

                             <div class="form-group">
                                 <label for="Description">Description :</label>
                                 <input type="text" class="form-control" id="description" name="description" aria-describedby="emailHelp"
                                     placeholder="Enter Description " value="{{ $area->description }}">
                             </div>

                             <button type="submit" class="btn btn-primary mt-2">Update</button>
                             <a href="{{ route('area.index') }}" class="btn btn-light">Cancel</a>

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

     
    {{-- Jquery Cdn --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
{{-- 
    <script type=text/javascript>
        //Country Dropdown Change
        $('#country').change(function() {
            var countryID = $(this).val();
            if (countryID) {
                $.ajax({
                    type: "GET",
                    url: "getState/" + $('#country').val(),
                    success: function(res) {
                        if (res) {
                            $("#state").empty();
                            $("#state").append('<option>Select State</option>');
                            $.each(res, function(index) {
                                console.log(res);
                                $("#state").append('<option value="' + res[index].id +
                                    '">' + res[index].name + '</option>');
                            });

                        } else {
                            $("#state").empty();
                        }
                    }
                });
            } else {
                $("#state").empty();

            }
        });

        //State Dropdown Change
        $('#state').change(function() {
            var stateID = $(this).val();
            if (stateID) {
                $.ajax({
                    type: "GET",
                    url: "getCity/" + $('#state').val(),
                    success: function(res) {
                        if (res) {
                            $("#city").empty();
                            $("#city").append('<option>Select City</option>');
                            $.each(res, function(index) {
                                console.log(res);
                                $("#city").append('<option value="' + res[index].id +
                                    '">' + res[index].name + '</option>');
                            });

                        } else {
                            $("#city").empty();
                        }
                    }
                });
            } else {
                $("#city").empty();

            }
        });

    </script> --}}

 @endsection

 