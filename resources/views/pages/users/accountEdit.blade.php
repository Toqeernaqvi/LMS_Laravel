@extends('layouts.app', ['activePage' => 'accounts', 'navName' => 'Accounts' ,'title' => 'toqeer abbas',  
'activeButton' => 'users'])
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
             
 @section('content')
     <div class="content">
         <div class="container">
             <div class="row">
             
                     <div class="container">
                         <form method="POST" action="{{ route('account.update', $account->id) }}">
                            @method('PATCH')
                            @csrf
                        
                             <div class="form-group mt-5">
                                 <label for="account">account :</label>
                                 <input type="text" class="form-control" id="name"  name="name"aria-describedby="emailHelp"
                                     placeholder="Enter account Name " value="{{ $account->name }}">
                             </div>
                             <div class="form-group">
                                 <label for="ShortName">ShortName :</label>
                                 <input type="text" class="form-control" id="shortName" name="shortName" aria-describedby="emailHelp"
                                     placeholder="Enter ShortName " value="{{ $account->shortName }}">
                             </div>

                             <div class="form-group">
                                 <label for="Description">Description :</label>
                                 <input type="text" class="form-control" id="description" name="description" aria-describedby="emailHelp"
                                     placeholder="Enter Description " value="{{ $account->description }}">
                             </div>

                             <button type="submit" class="btn btn-primary mt-2">Update</button>
                             <a href="{{ route('account.index') }}" class="btn btn-light">Cancel</a>

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

 