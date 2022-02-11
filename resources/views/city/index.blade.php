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
                    <h3 class="float-left">City List</h3>

                    <form class="form-inline float-left" action="{{ route('cities.index') }}">
                        @csrf
                        <div class="form-group mx-sm-3 mb-2">
                          <label for="search" class="sr-only">Search User</label>
                          <input type="text" class="form-control" id="search" name="search" placeholder="search">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Search</button>
                      </form>

                    <a href="{{ route('cities.create') }}" class="btn btn-success float-right">Create City</a>
                </div>

                <div class="card-body">
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('success') !!}</li>
                            </ul>
                        </div>
                    @endif
                    @if (\Session::has('error'))
                        <div class="alert alert-danger">
                            <ul>
                                <li>{!! \Session::get('error') !!}</li>
                            </ul>
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Country Name</th>
                            <th scope="col">City name</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($cities as $city )
                                <tr>
                                    <th scope="row">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td>
                                        @foreach ($states as $state )
                                            @if($state->id == $city->states_id)
                                                {{ $state->name }}
                                            @endif
                                        @endforeach
                                        {{-- {{ $city->country_code }} --}}
                                    </td>
                                    <td>{{ $city->name }}</td>
                                    <td>
                                        <a href="{{ route('cities.edit',['city'=>$city->id]) }}"class="btn btn-success">Edit</a>

                                        <form action="{{ route('cities.destroy',['city'=>$city->id]) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>

                                    </td>
                                </tr>

                            @endforeach

                        </tbody>
                      </table>
                </div>
            </div>

        </div>
    </div>


@endsection
