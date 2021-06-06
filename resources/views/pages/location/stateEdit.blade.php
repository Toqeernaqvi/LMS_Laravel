@extends('layouts.app', ['activePage' => 'state', 'navName' => 'State' ,'title' => 'State',  
'activeButton' => 'location'])
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
             
 @section('content')
     <div class="content">
         <div class="container">
             <div class="row">
            
 
               

                
                     <div class="container">
                         <form method="POST" action="{{ route('state.update', $state->id) }}">
                            @method('PATCH')

                            @csrf
                            <div  class="form-group mt-5 w-50">
                                <label for="inputState">Select Country</label>
                                <select id="country_id" name="country_id" class="form-control">
                                    @foreach ($country as $country)
                                        <option value="{{ $country->id }}">
                                            <a class="dropdown-item" name="country_id"
                                                href="{{ route('state.show', $country->id) }}">{{ $country->name }}</a>
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        
                             <div class="form-group ">
                                 <label for="Country">State :</label>
                                 <input type="text" class="form-control" id="name"  name="name"aria-describedby="emailHelp"
                                     placeholder="Enter State Name " value="{{ $state->name }}">
                             </div>
                             <div class="form-group">
                                 <label for="ShortName">ShortName :</label>
                                 <input type="text" class="form-control" id="shortName" name="shortName" aria-describedby="emailHelp"
                                     placeholder="Enter ShortName " value="{{ $state->shortName }}">
                             </div>

                             <div class="form-group">
                                 <label for="Description">Description :</label>
                                 <input type="text" class="form-control" id="description" name="description" aria-describedby="emailHelp"
                                     placeholder="Enter Description " value="{{ $state->description }}">
                             </div>

                             <button type="submit" class="btn btn-primary mt-2">Update</button>
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
 @endsection

 