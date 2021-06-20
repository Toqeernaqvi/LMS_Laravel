@extends('layouts.app', ['activePage' => 'cards', 'navName' => 'card' ,'title' => 'toqeer abbas',  
'activeButton' => 'cards'])
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
             
 @section('content')
     <div class="content">
         <div class="container">
             <div class="row">
                
                     <div class="container">
                         <form method="POST" action="{{ route('card.update', $card->id) }}">
                            @method('PATCH')
                            @csrf
                        
                             <div class="form-group mt-5">
                                 <label for="Card">Card :</label>
                                 <input type="text" class="form-control" id="title"  name="title" 
                                     placeholder="Enter Card Name " value="{{ $card->title }}">
                             </div>
                             <div class="form-group">
                                 <label for="ShortName">ShortName :</label>
                                 <input type="text" class="form-control" id="shortName" name="shortName" aria-describedby="emailHelp"
                                     placeholder="Enter ShortName " value="{{ $card->shortName }}">
                             </div>
                             <div class="form-group">
                                <label for="Description">Joining Bonus :</label>
                                <input type="number" class="form-control" id="joining_bonus" name="joining_bonus" aria-describedby="emailHelp"
                                    placeholder="Enter Joining Bonus" value="{{ $card->joining_bonus }}">
                            </div>

                            <div class="form-group">
                                <label for="Description">Minimum Bonus :</label>
                                <input type="number" class="form-control" id="minimum_bonus" name="minimum_bonus" aria-describedby="emailHelp"
                                    placeholder="Enter Minimum Bonus" value="{{ $card->minimum_bonus }}">
                            </div>

                            <div class="form-group">
                                <label for="Description">Validaty :</label>
                                <input type="date" class="form-control" id="validaty" name="validaty" aria-describedby="emailHelp"
                                    placeholder="Enter Validaty Date" value="{{ $card->validaty }}">
                            </div>
                             <div class="form-group">
                                 <label for="Description">Description :</label>
                                 <input type="text" class="form-control" id="description" name="description" aria-describedby="emailHelp"
                                     placeholder="Enter Description " value="{{ $card->description }}">
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

 