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
                                <select id="time" class="form-control" name="time">
                                    <option value="06:00">06:00</option>
                                    <option value="07:00">07:00</option>
                                    <option value="08:00">08:00</option>
                                    <option value="09:00">09:00</option>
                                    <option value="10:00">10:00</option>
                                    <option value="11:00">11:00</option>
                                    <option value="12:00">12:00 </option>
                                    <option value="13:00">13:00</option>
                                    <option value="14:00">15:00</option>
                                    <option value="15:00">15:00</option>
                                    <option value="16:00">16:00</option>
                                    <option value="17:00">17:00</option>
                                    <option value="18:00">18:00</option>
                                    <option value="19:00">19:00</option>
                                    <option value="20:00">20:00</option>

                                </select>
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