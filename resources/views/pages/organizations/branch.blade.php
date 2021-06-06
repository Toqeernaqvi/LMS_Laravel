@extends('layouts.app', ['activePage' => 'branch', 'navName' => 'Branch' ,'title' => 'toqeer abbas',
'activeButton' => 'organizations'])
@csrf
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
             
 
                    <div class="container mt-5">
                        <form method="POST" action="{{ route('branch.store') }}">
                            @csrf
                            <div  class="form-group mt-5 w-50">
                                <label  >Select Organization</label>
                                <select id="organization_id" name="organization_id" class="form-control">
                                    @foreach ($organization as $organization)
                                        <option value="{{ $organization->id }}">
                                            <a class="dropdown-item" name="organization_id"
                                                href="{{ route('branch.show', $organization->id) }}">{{ $organization->name }}</a>
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label  >Branch :</label>
                                <input type="text" class="form-control" id="name" name="name" aria-describedby=""
                                    placeholder="Enter Branch Name ">
                            </div>
                            <div class="form-group">
                                <label for="ShortName">ShortName :</label>
                                <input type="text" class="form-control" id="shortName" name="shortName"
                                    placeholder="Enter ShortName ">
                            </div>

                            <div class="form-group">
                                <label for="Description">Description :</label>
                                <input type="text" class="form-control" id="description" name="description"
                                     placeholder="Enter Description ">
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Submit</button>
                            <a href="{{ route('branch.index') }}" class="btn btn-light">Cancel</a>

                        </form>
                    </div>

                    <!-- Optional JavaScript -->
                    <!-- jQuery first, then Popper.js, then Bootstrap JS 5 -->
                    <script src="js/bootstrap.js"></script>
                    <script src="js/bootstrap.bundle.js"></script>


                </body>

                </html>

            </div>
        </div>
    </div>
@endsection
