@extends('layouts.app', ['activePage' => 'register', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim &
UPDIVISION'])

@section('content')
    <div class="full-page register-page section-image" data-color="yellow"
        data-image="{{ asset('light-bootstrap/img/bg.jpg') }}">
        <div class="content">
            <div class="container">
                <div class="card card-register card-plain text-center">
                    <div class="card-body ">
                        <div class="row">

                            <div class="col-md-6 ">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="card card-plain">
                                        <div class="content">
                                            <div class="form-row">
                                                {{-- First Name --}}
                                                <div class="form-group col ">
                                                    <input type="text" class="form-control" name="first_name"
                                                        placeholder="Enter First Name ">
                                                    @error('first_name')
                                                        <div style="color: tomato">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                {{-- Last Name --}}
                                                <div class="form-group col ">
                                                    <input type="text" class="form-control" name="last_name"
                                                        placeholder="Enter Last Name ">
                                                    @error('last_name')
                                                        <div style="color: tomato">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-row">


                                                <div class="form-group col">
                                                    <input type="text" name="name" id="name" class="form-control"
                                                        placeholder="{{ __('Name') }}" value="{{ old('name') }}"
                                                        required autofocus>
                                                </div>

                                                {{-- Father Name --}}
                                                <div class="form-group col">
                                                    <input type="text" class="form-control" name="father_name"
                                                        placeholder="Enter Father Name ">
                                                    @error('father_name')
                                                        <div style="color: tomato">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="form-row">
                                                {{-- CNIC --}}
                                                <div class="form-group  col">
                                                    <input type="text" class="form-control" name="cnic"
                                                        placeholder="Enter CNIC XXXXX_XXXXXXX_X">
                                                    @error('cnic')
                                                        <div style="color: tomato">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col"> {{-- is-invalid make border red --}}
                                                    <input type="email" name="email" value="{{ old('email') }}"
                                                        placeholder="Enter email" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col">
                                                    <input type="password" name="password" class="form-control" required>
                                                </div>
                                                <div class="form-group col">
                                                    <input type="password" name="password_confirmation"
                                                        placeholder="Password Confirmation" class="form-control" required
                                                        autofocus>
                                                </div>

                                            </div>



                                            <div class="form-row">
                                                {{-- DOB --}}
                                                <div class="form-group col">
                                                    <input type="date" class="form-control" name="dob"
                                                        placeholder="Enter DOB ">
                                                    @error('dob')
                                                        <div style="color: tomato">{{ $message }}</div>
                                                    @enderror
                                                </div>


                                                {{-- Phone --}}
                                                <div class="form-group col ">
                                                    <input type="text" class="form-control" name="phone"
                                                        placeholder="Enter phone ">
                                                    @error('phone')
                                                        <div style="color: tomato">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="form-row">
                                                {{-- Account Type --}}
                                                <div class="form-group  col  w-50">
                                                    <select id="account_id" name="account_id" class="form-control">
                                                        @foreach ($account as $accounts)
                                                            <option value="{{ $accounts->id }}">
                                                                <a class="dropdown-item" name="accounts_id"
                                                                    href="{{ route('account.show', $accounts->id) }}">{{ $accounts->name }}</a>
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                {{-- Country --}}
                                                <div class="form-group col  w-50">
                                                    <select id="country" name="country_id" class="form-control">
                                                        @foreach ($country as $countries)
                                                            <option value="{{ $countries->id }}">
                                                                <a class="dropdown-item" name="countries_id"
                                                                    href="{{ route('country.show', $countries->id) }}">{{ $countries->name }}</a>
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                {{-- State --}}
                                                <div class="form-group col w-50">
                                                    <select id="state" name="state_id" class="form-control">
                                                        @foreach ($state as $states)
                                                            <option value="{{ $states->id }}">
                                                                <a class="dropdown-item" name="state_id"
                                                                    href="{{ route('state.show', $states->id) }}">{{ $states->name }}</a>
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>


                                                {{-- City --}}
                                                <div class="form-group col w-50">
                                                    <select id="city" name="city_id" class="form-control">
                                                        @foreach ($city as $cities)
                                                            <option value="{{ $cities->id }}">
                                                                <a class="dropdown-item" name="cities_id"
                                                                    href="{{ route('city.show', $cities->id) }}">{{ $cities->name }}</a>
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                {{-- Area --}}
                                                <div class="form-group col w-50">
                                                    <select id="area" name="area_id" class="form-control">
                                                        @foreach ($area as $areas)
                                                            <option value="{{ $areas->id }}">
                                                                <a class="dropdown-item" name="areas_id"
                                                                    href="{{ route('area.show', $areas->id) }}">{{ $areas->name }}</a>
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>


                                                {{-- Organization --}}
                                                <div class="form-group col  w-50">
                                                    <select id="org" name="organization_id" class="form-control">
                                                        @foreach ($organization as $organizations)
                                                            <option value="{{ $organizations->id }}">
                                                                <a class="dropdown-item" name="organizations_id"
                                                                    href="{{ route('branch.show', $organizations->id) }}">{{ $organizations->name }}</a>
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="form-row">

                                                {{-- Branch --}}
                                                <div class="form-group  col w-50">
                                                    <select id="branch" name="branch_id" class="form-control">
                                                        @foreach ($branch as $branches)
                                                            <option value="{{ $branches->id }}">
                                                                <a class="dropdown-item" name="branches_id"
                                                                    href="{{ route('branch.show', $branches->id) }}">{{ $branches->name }}</a>
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                {{-- Address --}}
                                                <div class="form-group col ">
                                                    <input type="text" class="form-control" name="address"
                                                        placeholder="Enter address ">
                                                    @error('address')
                                                        <div style="color: tomato">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                            </div>













                                            <div class="form-group d-flex justify-content-center">
                                                <div class="form-check rounded col-md-10 text-left">
                                                    <label class="form-check-label text-white d-flex align-items-center">
                                                        <input class="form-check-input" name="agree" type="checkbox"
                                                            required>
                                                        <span class="form-check-sign"></span>
                                                        <b>{{ __('Agree with terms and conditions') }}</b>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="footer text-center">
                                                <button type="submit"
                                                    class="btn btn-fill btn-neutral btn-wd">{{ __('Create Free Account') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col">
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-warning alert-dismissible fade show">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close"> &times;</a>
                                        {{ $error }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            demo.checkFullPageBackgroundImage();

            setTimeout(function() {
                // after 1000 ms we add the class animated to the login/register card
                $('.card').removeClass('card-hidden');
            }, 700)
        });
    </script>
@endpush
