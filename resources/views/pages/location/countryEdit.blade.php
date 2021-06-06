@extends('layouts.app', ['activePage' => 'country', 'navName' => 'Country' ,'title' => 'toqeer abbas',  
'activeButton' => 'location'])
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
             
 @section('content')
     <div class="content">
         <div class="container">
             <div class="row">
            
 
               

                
                     <div class="container">
                         <form method="POST" action="{{ route('country.update', $country->id) }}">
                            @method('PATCH')
                            @csrf
                        
                             <div class="form-group mt-5">
                                 <label for="Country">Country :</label>
                                 <input type="text" class="form-control" id="name"  name="name"aria-describedby="emailHelp"
                                     placeholder="Enter Country Name " value="{{ $country->name }}">
                             </div>
                             <div class="form-group">
                                 <label for="ShortName">ShortName :</label>
                                 <input type="text" class="form-control" id="shortName" name="shortName" aria-describedby="emailHelp"
                                     placeholder="Enter ShortName " value="{{ $country->shortName }}">
                             </div>

                             <div class="form-group">
                                 <label for="Description">Description :</label>
                                 <input type="text" class="form-control" id="description" name="description" aria-describedby="emailHelp"
                                     placeholder="Enter Description " value="{{ $country->description }}">
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

 