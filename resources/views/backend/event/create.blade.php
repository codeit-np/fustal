@extends('backend.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/fustalevents">Go Back</a>
                    </div>
                    <div class="card-body">
                        <form action="/fustalevents" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Event Title</label>
                                <input id="title" class="form-control" type="title" name="title" required>
                            </div>

                            <div class="form-group">
                                <label for="tiesheet_date">Tie-Sheet Date</label>
                                <input id="tiesheet_date" class="form-control" type="date" name="tiesheet_date">
                            </div>
                            <div class="form-group">
                                <label for="lastentry_date">Last Entry Date</label>
                                <input id="lastentry_date" class="form-control" type="date" name="lastentry_date">
                            </div>
                            <div class="form-group">
                                <label for="venue">Venue</label>
                                <input id="venue" class="form-control" type="text" name="venue">
                            </div>

                            <div class="form-group">
                                <label for="organiser">Event Organiser</label>
                                <input id="organiser" class="form-control" type="text" name="organiser">
                            </div>

                            <div class="form-group">
                                <label for="contact">contact</label>
                                <input id="contact" class="form-control" type="text" name="contact">
                            </div>

                            <div class="form-group">
                                <label for="description">Event Description</label>
                                <textarea id="description" class="form-control" name="description" rows="3"></textarea>
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