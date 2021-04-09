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
                        <form action="/fustalevents/{{ $fustalevent->id }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="title">Event Title</label>
                                <input id="title" class="form-control" type="title" name="title" required value="{{ $fustalevent->title }}">
                            </div>

                            <div class="form-group">
                                <label for="tiesheet_date">Tie-Sheet Date</label>
                                <input id="tiesheet_date" class="form-control" type="date" name="tiesheet_date" value="{{ $fustalevent->tiesheet_date }}">
                            </div>
                            <div class="form-group">
                                <label for="lastentry_date">Last Entry Date</label>
                                <input id="lastentry_date" class="form-control" type="date" name="lastentry_date" value="{{ $fustalevent->lastentry_date }}">
                            </div>
                            <div class="form-group">
                                <label for="venue">Venue</label>
                                <input id="venue" class="form-control" type="text" name="venue" value="{{ $fustalevent->venue }}">
                            </div>

                            <div class="form-group">
                                <label for="organiser">Event Organiser</label>
                                <input id="organiser" class="form-control" type="text" name="organiser" value="{{ $fustalevent->organiser }}">
                            </div>

                            <div class="form-group">
                                <label for="contact">Contact</label>
                                <input id="contact" class="form-control" type="text" name="contact" value="{{ $fustalevent->contact }}">
                            </div>

                            <div class="form-group">
                                <label for="description">Event Description</label>
                                <textarea id="description" class="form-control" name="description" rows="3">{{ $fustalevent->description }}</textarea>
                            </div>
                            

                        <div class="form-group">
                            <label for="image">Upload Image</label>
                            <input id="image" class="form-control-file" type="file" name="image">
                        </div>

                            <button type="submit" class="btn btn-primary btn btn-sm">Save Record</button>
                        </form>

                        <div class="my-2">
                            <img src="{{ asset($fustalevent->image) }}" width="120" alt="">
                        </div>

                        @if (session('message'))
                            <div class="alert alert-success alert-sm">{{ session('message') }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection