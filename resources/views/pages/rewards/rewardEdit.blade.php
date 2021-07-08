@extends('layouts.app', ['activePage' => 'rewards', 'navName' => 'rewards' ,'title' => 'Rewards',  
'activeButton' => 'rewards'])
 
             
 @section('content')
     <div class="content">
         <div class="container">
             <div class="row">
             
                     <div class="container">
                         <form method="POST" action="{{ route('reward.update', $reward->id) }}" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                             <div class="form-group ">
                                 <label  > Title :</label>
                                 <input type="text" class="form-control" id="title"  name="title" 
                                     placeholder="Enter Title" value="{{ $reward->title }}">
                             </div>
                             <div class="form-group">
                                 <label for="total points">Total Points :</label>
                                 <input type="text" class="form-control" id="total_points" name="total_points"  
                                     placeholder="Enter Total Points " value="{{ $reward->total_points }}">
                             </div>

                             <div class="form-group">
                                <label for="total points">Total Points :</label>
                                <input type="file" class="form-control" id="image" name="image"  
                                    placeholder="Update Picture" value="{{ $reward->name }}">
                            </div>


                             <div class="form-group">
                                 <label for="Description">Description :</label>
                                 <input type="text" class="form-control" id="description" name="description"  
                                     placeholder="Enter Description " value="{{ $reward->description }}">
                             </div>

                             <button type="submit" class="btn btn-primary mt-2">Update</button>
                             <a href="{{ route('reward.index') }}" class="btn btn-light">Cancel</a>

                         </form>
                     </div>
 

                 

               
             </div>
         </div>
     </div>
 @endsection

 