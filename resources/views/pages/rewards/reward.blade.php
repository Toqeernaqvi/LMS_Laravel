@extends('layouts.app', ['activePage' => 'rewards', 'navName' => 'rewards' ,'title' => 'toqeer abbas',
'activeButton' => 'rewards'])
@csrf
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
            
                    <div class="container mt-5">
                        <form method="POST" action="{{ route('reward.store') }}" enctype="multipart/form-data">
                            @csrf
                         
                            <div class="form-group">
                                <label for="Title">Title :</label>
                                <input type="text" class="form-control" id="title" name="title"
                                     placeholder="Enter Title ">
                            </div>

                            <div class="form-group">
                                <label for="Total Points">Total Points :</label>
                                <input type="text" class="form-control" id="total_points" name="total_points"
                                     placeholder="Enter Total Points">
                            </div>


                            
                            <div class="form-group">
                                <label for="Image">Image :</label>
                                <input type="file" class="form-control" id="image" name="image"
                                     placeholder="Upload Image">
                                     @error('image')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                            </div>


                            <div class="form-group">
                                <label for="Description">Description :</label>
                                <input type="text" class="form-control" id="description" name="description"
                                     placeholder="Enter Description ">
                            </div>

                            <button type="submit" class="btn btn-primary mt-2">Submit</button>
                            <a href="{{ route('transaction.index') }}" class="btn btn-light">Cancel</a>

                        </form>
                    </div>

   

                </body>

                </html>

            </div>
        </div>
    </div>
@endsection
