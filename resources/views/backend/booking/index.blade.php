@extends('backend.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                       <a href="/booking/create" class="btn btn-primary btn-sm">New Booking</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-striped table-bordered" id="datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Team</th>
                                    <th>Contact Person</th>
                                    <th>Mobile</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($booking as $booking)
                                    <tr>
                                        <td>{{ $booking->id }}</td>
                                        <td>{{ $booking->date }}</td>
                                        <td>{{ $booking->time }}</td>
                                        <td>{{ $booking->user->team }}</td>
                                        <td>{{ $booking->user->name }}</td>
                                        <td><a href="tel:+977{{ $booking->user->mobile }}">{{ $booking->user->mobile }}</a></td>
                                        <td class="{{ $booking->status==0 ? 'text-danger' : 'text-success' }}">{{ $booking->status == 0 ? 'Not Confirmed' : 'Booked' }}</td>
                                        <td>
                                           
                                            <form action="/booking/{{ $booking->id }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="/booking/{{ $booking->id }}/edit" class="btn btn-primary btn-sm">Edit</a>
                                                <button type="submit" class="btn btn-danger btn-sm" {{ $booking->status == 1 ? 'hidden' : '' }}>Delete</button>
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
    </div>
@endsection