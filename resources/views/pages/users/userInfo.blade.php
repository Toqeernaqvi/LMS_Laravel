@extends('layouts.app', ['activePage' => 'users', 'navName' => 'Users' ,'title' => 'toqeer abbas',
'activeButton' => 'Users'])
 
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="container">
                    <form method="POST" action="{{ route('userInfo.store') }}">
                        @csrf
                        {{-- First Name --}}
                        <div class="form-group mt-5">
                            <label>First Name :</label>
                            <input type="text" class="form-control"   name="first_name" 
                                placeholder="Enter First Name ">
                            @error('first_name')
                                <div style="color: tomato">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Last Name --}}
                        <div class="form-group mt-5">
                            <label>Last Name :</label>
                            <input type="text" class="form-control"  name="last_name" 
                                placeholder="Enter First Name ">
                            @error('last_name')
                                <div style="color: tomato">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- Father Name --}}
                        <div class="form-group mt-5">
                            <label>Father Name :</label>
                            <input type="text" class="form-control"  name="father_name" 
                                placeholder="Enter Father Name ">
                            @error('father_name')
                                <div style="color: tomato">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- CNIC --}}
                        <div class="form-group mt-5">
                            <label>CNIC :</label>
                            <input type="text" class="form-control"  name="cnic" 
                                placeholder="Enter CNIC XXXXX_XXXXXXX_X">
                            @error('cnic')
                                <div style="color: tomato">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- DOB --}}
                        <div class="form-group mt-5">
                            <label>DOB :</label>
                            <input type="date" class="form-control"  name="dob" 
                                placeholder="Enter DOB ">
                            @error('dob')
                                <div style="color: tomato">{{ $message }}</div>
                            @enderror
                        </div>


                        {{-- Phone --}}
                        <div class="form-group mt-5">
                            <label>Phone :</label>
                            <input type="text" class="form-control"  name="phone" 
                                placeholder="Enter phone ">
                            @error('phone')
                                <div style="color: tomato">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- Address --}}
                        <div class="form-group mt-5">
                            <label>Address :</label>
                            <input type="text" class="form-control"  name="address" 
                                placeholder="Enter address ">
                            @error('address')
                                <div style="color: tomato">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- Account Type --}}
                        <div class="form-group mt-5 w-50">
                            <label for="inputState">Account Type</label>
                            <select id="account_id" name="account_id" class="form-control">
                                @foreach ($account as $accounts)
                                    <option value="{{ $accounts->id }}">
                                        <a class="dropdown-item" name="accounts_id"
                                            href="{{ route('account.show', $accounts->id) }}">{{ $accounts->name }}</a>
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Country --}}
                        <div class="form-group mt-5 w-50">
                            <label >Select Country</label>
                            <select id="country" name="country_id" class="form-control">
                                @foreach ($country as $countries)
                                    <option value="{{ $countries->id }}">
                                        <a class="dropdown-item" name="countries_id"
                                            href="{{ route('country.show', $countries->id) }}">{{ $countries->name }}</a>
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- State --}}
                        <div class="form-group mt-5 w-50">
                            <label >Select State</label>
                            <select id="state" name="state_id" class="form-control">
                                @foreach ($state as $states)
                                    <option value="{{ $states->id }}">
                                        <a class="dropdown-item" name="state_id"
                                            href="{{ route('state.show', $states->id) }}">{{ $states->name }}</a>
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        {{-- City --}}
                        <div class="form-group mt-5 w-50">
                            <label >Select City</label>
                            <select id="city" name="city_id" class="form-control">
                                @foreach ($city as $cities)
                                    <option value="{{ $cities->id }}">
                                        <a class="dropdown-item" name="cities_id"
                                            href="{{ route('city.show', $cities->id) }}">{{ $cities->name }}</a>
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        {{-- Area --}}
                        <div class="form-group mt-5 w-50">
                            <label >Select Area</label>
                            <select id="area" name="area_id" class="form-control">
                                @foreach ($area as $areas)
                                    <option value="{{ $areas->id }}">
                                        <a class="dropdown-item" name="areas_id"
                                            href="{{ route('area.show', $areas->id) }}">{{ $areas->name }}</a>
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        {{-- Organization --}}
                        <div class="form-group mt-5 w-50">
                            <label >Select Organization</label>
                            <select id="org" name="organization_id" class="form-control">
                                @foreach ($organization as $organizations)
                                    <option value="{{ $organizations->id }}">
                                        <a class="dropdown-item" name="organizations_id"
                                            href="{{ route('branch.show', $organizations->id) }}">{{ $organizations->name }}</a>
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        {{-- Branch --}}
                        <div class="form-group mt-5 w-50">
                            <label >Select Branch</label>
                            <select id="branch" name="branch_id" class="form-control">
                                @foreach ($branch as $branches)
                                    <option value="{{ $branches->id }}">
                                        <a class="dropdown-item" name="branches_id"
                                            href="{{ route('branch.show', $branches->id) }}">{{ $branches->name }}</a>
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Email --}}
                        <div class="form-group mt-5">
                            <label>Email :</label>
                            <input type="text" class="form-control"  name="email" 
                                placeholder="abc@gmail.com ">
                            @error('email')
                                <div style="color: tomato">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- Password --}}
                          
                          <div class="form-group mt-5  
                          "  id="show_hide_password">
                              <label>Password :</label>
                              <br>
                              <input type="password" class="form-control d-inline col-11"   name="password"  
                                  placeholder="Enter Password "  >  
                                  <div class="input-group-addon d-inline">
                                      <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                    </div>

                              @error('password')
                                  <div style="color: tomato">{{ $message }}</div>
                              @enderror
                          </div>

                        {{-- Retype Password --}}
                        <div class="form-group mt-5">
                            <label>Retype Password :</label>
                            <input type="password" class="form-control"  name="retypePassword" 
                                placeholder="Retype Passowrd ">
                            @error('retypePassword')
                                <div style="color: tomato">{{ $message }}</div>
                            @enderror
                        </div>




                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                            <a href="{{ route('userInfo.index') }}" class="btn btn-light">Cancel</a>

                    </form>
                </div>
 

            </div>


        </div>
    </div>
    </div>

    {{-- Jquery Cdn --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        a, a:hover{
  color:#333
}
    </style>
<script>
    $(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
});
</script>
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

        // City DropDown Change
       
        $('#city').change(function() {
            var cityID = $(this).val();
            if (cityID) {
                $.ajax({
                    type: "GET",
                    url: "getArea/" + $('#city').val(),
                    success: function(res) {
                        if (res) {
                            $("#area").empty();
                            $("#area").append('<option>Select Area</option>');
                            $.each(res, function(index) {
                                console.log(res);
                                $("#area").append('<option value="' + res[index].id +
                                    '">' + res[index].name + '</option>');
                            });

                        } else {
                            $("#area").empty();
                        }
                    }
                });
            } else {
                $("#area").empty();

            }
        });

        //Organization Dropdown Change
        $('#org').change(function() {
            var branchID = $(this).val();
            if (branchID) {
                $.ajax({
                    type: "GET",
                    url: "getBranch/" + $('#org').val(),
                    success: function(res) {
                        if (res) {
                            $("#branch").empty();
                            $("#branch").append('<option>Select Branch</option>');
                            $.each(res, function(index) {
                                console.log(res);
                                $("#branch").append('<option value="' + res[index].id +
                                    '">' + res[index].name + '</option>');
                            });

                        } else {
                            $("#branch").empty();
                        }
                    }
                });
            } else {
                $("#branch").empty();

            }
        });

    </script>
@endsection
