@extends('backend.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                       <a href="/teamplayers/create" class="btn btn-primary btn-sm">New Players</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-striped table-bordered" id="datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Team</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($players as $player)
                                    <tr>
                                        <td>{{ $player->id }}</td>
                                        <td>{{ $player->name }}</td>
                                        <td>{{ $player->position }}</td>
                                        <td>{{ $player->user->team }}</td>
                                        <td>
                                           <a href="/teamplayers/{{ $player->id }}/edit">Edit</a>
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