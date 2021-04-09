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
                                <select id="time" class="form-control" name="time">
                                    <option value="06:00" {{ $booking->time == "06:00" ? 'selected' : '' }}>6:00</option>
                                    <option value="07:00" {{ $booking->time == "07:00" ? 'selected' : '' }}>7:00</option>
                                    <option value="08:00" {{ $booking->time == "08:00" ? 'selected' : '' }}>8:00</option>
                                    <option value="09:00" {{ $booking->time == "09:00" ? 'selected' : '' }}>9:00</option>
                                    <option value="10:00" {{ $booking->time == "10:00" ? 'selected' : '' }}>10:00</option>
                                    <option value="11:00" {{ $booking->time == "11:00" ? 'selected' : '' }}>11:00</option>
                                    <option value="12:00" {{ $booking->time == "12:00" ? 'selected' : '' }}>12:00</option>
                                    <option value="13:00" {{ $booking->time == "13:00" ? 'selected' : '' }}>13:00</option>
                                    <option value="14:00" {{ $booking->time == "14:00" ? 'selected' : '' }}>14:00</option>
                                    <option value="15:00" {{ $booking->time == "15:00" ? 'selected' : '' }}>15:00</option>
                                    <option value="16:00" {{ $booking->time == "16:00" ? 'selected' : '' }}>16:00</option>
                                    <option value="17:00" {{ $booking->time == "17:00" ? 'selected' : '' }}>17:00</option>
                                    <option value="18:00" {{ $booking->time == "18:00" ? 'selected' : '' }}>18:00</option>
                                    <option value="19:00" {{ $booking->time == "19:00" ? 'selected' : '' }}>19:00</option>
                                    <option value="20:00" {{ $booking->time == "20:00" ? 'selected' : '' }}>20:00</option>
                                    <option value="21:00" {{ $booking->time == "21:00" ? 'selected' : '' }}>21:00</option>

                                </select> 
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