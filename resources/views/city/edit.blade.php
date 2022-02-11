@extends('layouts.master')

@section('content')

  <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

    </div>
    @php
        // dd($users);
    @endphp
    <div class="row">

        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-title clearfix">
                    <h3 class="float-left">City Create</h3>
                    <a href="{{ route('cities.index') }}" class="btn btn-success float-right">Back State List</a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('cities.update',['city'=>$city->id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="states_id" class="col-md-4 col-form-label text-md-end">{{ __('Country Name') }}</label>

                            <div class="col-md-6">

                                <select class="form-control" id="states_id" name="states_id" >
                                    @foreach($states as $state)
                                        @if($city->states_id == $state->id)

                                        <option  value="{{ $state->id }}" >{{ $state->name }}</option>
                                        @endif
                                    @endforeach

                                  </select>

                                @error('states_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('City Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',$city->name) }}"  autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>


@endsection
