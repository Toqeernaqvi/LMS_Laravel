@extends('layouts.app', ['activePage' => 'transactions', 'navName' => 'Transaction' ,'title' => 'Transaction',  
'activeButton' => 'transactions'])
 
             
 @section('content')
     <div class="content">
         <div class="container">
             <div class="row">
             
                     <div class="container">
                         <form method="POST" action="{{ route('transaction.update', $transaction->id) }}">
                            @method('PATCH')

                            @csrf
                            <div  class="form-group mt-5 w-50">
                                <label for="inputState">Select Users</label>
                                <select id="user_id" name="user_id" class="form-control">
                                    @foreach ($user as $user)
                                    
                                        <option value="{{ $user->id }}">
                                            <a class="dropdown-item" name="user_id"
                                                href="{{ route('userInfo.show', $user->id) }}">{{ $user->first_name}}</a>
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        
                            <div  class="form-group mt-5 w-50">
                                <label for="inputState">Select Card Type</label>
                                <select id="card_id" name="card_id" class="form-control">
                                    @foreach ($card as $card)
                                        <option value="{{ $card->id }}">
                                            <a class="dropdown-item" name="card_id"
                                                href="{{ route('card.show', $card->id) }}">{{ $card->title }}</a>
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        
                             <div class="form-group ">
                                 <label  > Net Amount:</label>
                                 <input type="text" class="form-control" id="net_amount"  name="net_amount"aria-describedby="emailHelp"
                                     placeholder="Enter Net Amount " value="{{ $transaction->net_amount }}">
                             </div>
                             <div class="form-group">
                                 <label for="Earn Points">Earn Points :</label>
                                 <input type="text" class="form-control" id="earn_points" name="earn_points"  
                                     placeholder="Enter Earn Points " value="{{ $transaction->earn_points }}">
                             </div>

                             <div class="form-group">
                                 <label for="Description">Description :</label>
                                 <input type="text" class="form-control" id="description" name="description"  
                                     placeholder="Enter Description " value="{{ $transaction->description }}">
                             </div>

                             <button type="submit" class="btn btn-primary mt-2">Update</button>
                             <a href="{{ route('branch.index') }}" class="btn btn-light">Cancel</a>

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

 