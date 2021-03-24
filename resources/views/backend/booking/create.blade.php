@extends('backend.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/booking">Go Back</a>
                    </div>
                    <div class="card-body">
                        <form action="/booking" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="date">Select Date</label>
                                <input id="date" class="form-control" type="date" name="date" required>
                            </div>

                            <div class="form-group">
                                <label for="time">Select Time</label>
                                <input id="time" class="form-control" type="time" name="time" required>
                            </div>

                            <div class="form-group">
                                <label for="user_id">Select Team</label>
                                <select id="user_id" class="form-control" name="user_id">
                                    @foreach ($team as $team)
                                        <option value="{{ $team->id }}">{{ $team->team }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary btn btn-sm">Confirm Booking</button>
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