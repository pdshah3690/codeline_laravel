@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Films
                <a href="{{route('films.create')}}" class="btn btn-primary pull-right">Create Film</a>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Realease Date</th>
                                <th>Rating</th>
                                <th>Ticket Price</th>
                                <th>Country</th>
                                <th>Genre</th>
                                <th>Photo</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($films as $f)
                                <tr>
                                    <td>{{$f->name}}</td>
                                    <td>{{$f->description}}</td>
                                    <td>{{$f->release_date}}</td>
                                    <td>{{$f->rating}}</td>
                                    <td>{{$f->ticket_price}}</td>
                                    <td>{{$f->country->name}}</td>
                                    <td>
                                        @foreach($f->filmGenre as $g)
                                            <span>{{$g->genre->name}}</span>
                                        @endforeach
                                    </td>
                                    <td>{{$f->photo}}</td>
                                    <td>
                                        <a href="{{route('films.slug', $f->slug)}}">View</a>
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
