@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$film->name}}</div>

                <div class="card-body">
                    <div class="card-content">
                        <div class="col-md-12">
                            <h4>{{$film->name}}</h4>
                            <p>{{$film->description}}</p>
                        </div>
                        <div class="col-md-12">
                            <p><label>Release Date: </label><span>{{$film->realease_date}}</span></p>
                            <p><label>Price :</label><span>${{$film->ticket_price}}</span></p>
                            <label>Genre :</label>
                            @foreach($film->filmGenre as $g)
                                <span class="genre">
                                    {{$g->genre->name}}
                                </span>
                            @endforeach
                            <label>Country :</label><span>{{$film->country->name}}</span>
                            <p><label>Ratings :</label><span><input type="hidden" class="rating" value="{{$film->rating}} data-readonly"/>
</span></p>
                        </div>
                        <a href="{{route('films.index')}}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $('input').rating();
    });
</script>
@endsection