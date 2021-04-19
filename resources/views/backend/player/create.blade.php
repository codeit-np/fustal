@extends('backend.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/teamplayers">Go Back</a>
                    </div>
                    <div class="card-body">
                        <form action="/teamplayers" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Player Name</label>
                                <input id="name" class="form-control" type="name" name="name" required>
                            </div>
                           
                            <div class="form-group">
                                <label for="position">Position</label>
                                <input id="position" class="form-control" type="text" name="position">
                            </div>

                          <div class="form-group">
                              <label for="use_id">Team</label>
                              <select id="use_id" class="form-control" name="user_id">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->team }}</option>
                                @endforeach
                              </select>
                          </div>

                        <div class="form-group">
                            <label for="image">Upload Image</label>
                            <input id="image" class="form-control-file" type="file" name="image">
                        </div>

                            <button type="submit" class="btn btn-primary btn btn-sm">Save Record</button>
                        </form>

                        @if (session('message'))
                            <div class="alert alert-success alert-sm">{{ session('message') }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection