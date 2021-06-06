@extends('layouts.app', ['activePage' => 'organization', 'navName' => 'Organization' ,'title' => 'toqeer abbas',  
'activeButton' => 'Organizations'])
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
             
 @section('content')
     <div class="content">
         <div class="container">
             <div class="row">
                
                     <div class="container">
                         <form method="POST" action="{{ route('organization.update', $organization->id) }}">
                            @method('PATCH')
                            @csrf
                        
                             <div class="form-group mt-5">
                                 <label for="Organization">Organization :</label>
                                 <input type="text" class="form-control" id="name"  name="name"aria-describedby="emailHelp"
                                     placeholder="Enter Organization Name " value="{{ $organization->name }}">
                             </div>
                             <div class="form-group">
                                 <label for="ShortName">ShortName :</label>
                                 <input type="text" class="form-control" id="shortName" name="shortName" aria-describedby="emailHelp"
                                     placeholder="Enter ShortName " value="{{ $organization->shortName }}">
                             </div>

                             <div class="form-group">
                                 <label for="Description">Description :</label>
                                 <input type="text" class="form-control" id="description" name="description" aria-describedby="emailHelp"
                                     placeholder="Enter Description " value="{{ $organization->description }}">
                             </div>

                             <button type="submit" class="btn btn-primary mt-2">Update</button>
                             <a href="{{ route('organization.index') }}" class="btn btn-light">Cancel</a>

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

 