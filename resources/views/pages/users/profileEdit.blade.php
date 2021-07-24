@extends('layouts.customerApp', ['activePage' => 'profile', 'navName' => 'Profile' ,'title' => 'toqeer abbas',  
'activeButton' => 'Profile'])
     
 @section('content')
     <div class="content">
         <div class="container">
             <div class="row">
                
                     <div class="container">
                         <form method="POST" action="{{ route('userInfo.update', $user->id) }}">
                            @method('PATCH')
                            @csrf
                         
                             <div class="form-group mt-5">
                                <label> Name :</label>
                                <input type="text" class="form-control"   name="name" 
                                    placeholder="Enter your Name " value="{{ $user->name }}">
                                @error('name')
                                    <div style="color: tomato">{{ $message }}</div>
                                @enderror
                            </div>
    
                            
                            {{-- CNIC --}}
                            <div class="form-group mt-5">
                                <label>CNIC :</label>
                                <input type="text" class="form-control"  name="cnic" 
                                    placeholder="Enter CNIC XXXXX_XXXXXXX_X" value="{{ $user->cnic }}">
                                @error('cnic')
                                    <div style="color: tomato">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- DOB --}}
                            <div class="form-group mt-5">
                                <label>DOB :</label>
                                <input type="date" class="form-control"  name="dob" 
                                    placeholder="Enter DOB " value="{{ $user->dob }}">
                                @error('dob')
                                    <div style="color: tomato">{{ $message }}</div>
                                @enderror
                            </div>
    
    
                            {{-- Phone --}}
                            <div class="form-group mt-5">
                                <label>Phone :</label>
                                <input type="text" class="form-control"  name="phone" 
                                    placeholder="Enter phone " value="{{ $user->phone }}">
                                @error('phone')
                                    <div style="color: tomato">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- Address --}}
                            <div class="form-group mt-5">
                                <label>Address :</label>
                                <input type="text" class="form-control"  name="address" 
                                    placeholder="Enter address " value="{{ $user->address }}">
                                @error('address')
                                    <div style="color: tomato">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            {{-- Email --}}
                            <div class="form-group mt-5">
                                <label>Email :</label>
                                <input type="text" class="form-control"  name="email" 
                                    placeholder="abc@gmail.com "value="{{ $user->email }}">
                                @error('email')
                                    <div style="color: tomato">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- Password --}}
                            <div class="form-group mt-5  
                            "  id="show_hide_password">
                                <label>Password :</label>
                                <br>
                                <input type="password" class="form-control d-inline col-11"    id="password"  name="password"  
                                    placeholder="Enter Password "  required >  
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
                                <input type="password" class="form-control"     name="retypePassword" 
                                    placeholder="Retype Passowrd "  required: true, >
                                @error('retypePassword')
                                    <div style="color: tomato">{{ $message }}</div>
                                @enderror
                            </div>
    
    
    
    
                            <button type="submit" class="btn btn-primary mt-2">Update</button>
                                <a href="{{ url('/customerDashboard') }}" class="btn btn-light">Cancel</a>

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

 