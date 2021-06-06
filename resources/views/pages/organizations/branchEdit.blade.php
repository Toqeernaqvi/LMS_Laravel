@extends('layouts.app', ['activePage' => 'branch', 'navName' => 'Branch' ,'title' => 'Branch',  
'activeButton' => 'organizations'])
 
             
 @section('content')
     <div class="content">
         <div class="container">
             <div class="row">
             
                     <div class="container">
                         <form method="POST" action="{{ route('branch.update', $branch->id) }}">
                            @method('PATCH')

                            @csrf
                            <div  class="form-group mt-5 w-50">
                                <label for="inputState">Select Organization</label>
                                <select id="organization_id" name="organization_id" class="form-control">
                                    @foreach ($organization as $organizations)
                                        <option value="{{ $organizations->id }}">
                                            <a class="dropdown-item" name="organizations_id"
                                                href="{{ route('branch.show', $organizations->id) }}">{{ $organizations->name }}</a>
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        
                        
                             <div class="form-group ">
                                 <label  > Branch:</label>
                                 <input type="text" class="form-control" id="name"  name="name"aria-describedby="emailHelp"
                                     placeholder="Enter Branch Name " value="{{ $branch->name }}">
                             </div>
                             <div class="form-group">
                                 <label for="ShortName">ShortName :</label>
                                 <input type="text" class="form-control" id="shortName" name="shortName"  
                                     placeholder="Enter ShortName " value="{{ $branch->shortName }}">
                             </div>

                             <div class="form-group">
                                 <label for="Description">Description :</label>
                                 <input type="text" class="form-control" id="description" name="description"  
                                     placeholder="Enter Description " value="{{ $branch->description }}">
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

 