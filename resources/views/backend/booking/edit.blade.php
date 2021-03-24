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
                        <form action="/booking/{{ $booking->id }}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="date">Select Date</label>
                                <input id="date" class="form-control" type="date" name="date" required value="{{ $booking->date }}">
                            </div>

                            <div class="form-group">
                                <label for="time">Select Time</label>
                                <input id="time" class="form-control" type="time" name="time" required value="{{ $booking->time }}">
                            </div>

                            <div class="form-group">
                                <label for="user_id">Select Team</label>
                                <select id="user_id" class="form-control" name="user_id">
                                    @foreach ($team as $team)
                                        <option value="{{ $team->id }}" {{ $team->id == $booking->user_id ? 'selected' : '' }}>{{ $team->team }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="status">Confirm</label>
                                <select id="status" class="form-control" name="status">
                                   <option value="0">Not Confirm</option>
                                   <option value="1">Confirm</option>
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