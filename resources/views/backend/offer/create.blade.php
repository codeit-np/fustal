@extends('backend.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/offers">Go Back</a>
                    </div>
                    <div class="card-body">
                        <form action="/offers" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="game">Game Title</label>
                                <input id="game" class="form-control" type="game" name="game" required>
                            </div>

                            <div class="form-group">
                                <label for="time">time</label>
                                <input id="time" class="form-control" type="date" name="text">
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input id="price" class="form-control" type="date" name="number">
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