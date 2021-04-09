@extends('backend.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                       <a href="/fustalevents/create" class="btn btn-primary btn-sm">New Events</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-striped table-bordered" id="datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Tie-sheet Date</th>
                                    <th>Last Entry Date</th>
                                    <th>Venue</th>
                                    <th>Event Organiser</th>
                                    <th>Contact</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($events as $event)
                                    <tr>
                                        <td>{{ $event->id }}</td>
                                        <td>{{ $event->title }}</td>
                                        <td>{{ $event->tiesheet_date }}</td>
                                        <td>{{ $event->lastentry_date }}</td>
                                        <td>{{ $event->venue }}</td>
                                        <td>{{ $event->organiser }}</td>
                                        <td>{{ $event->contact }}</td>
                                        <td>
                                           <a href="/fustalevents/{{ $event->id }}/edit">Edit</a>
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