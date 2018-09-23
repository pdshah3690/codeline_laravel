@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Film</div>

                <div class="card-body">
                    <div class="card-content">
                        <form action="{{route('films.store')}}" method="post">
                           <!-- Row -->
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control">
                                    @if($errors->has('name'))
                                        <span class="help-block help-block-error">
                                            {{ $errors->first('name') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control"></textarea>
                                    @if($errors->has('description'))
                                        <span class="help-block help-block-error">
                                            {{ $errors->first('description') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Realease Date</label>
                                    <input type="text" name="realease_date" class="form-control">
                                    @if($errors->has('realease_date'))
                                        <span class="help-block help-block-error">
                                            {{ $errors->first('realease_date') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Rating</label>
                                    <input type="number" name="rating" class="form-control" min="1" max="5">
                                    @if($errors->has('rating'))
                                        <span class="help-block help-block-error">
                                            {{ $errors->first('rating') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Ticket Price</label>
                                    <input type="text" name="ticket_price" class="form-control">
                                    @if($errors->has('ticket_price'))
                                        <span class="help-block help-block-error">
                                            {{ $errors->first('ticket_price') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Country</label>
                                    <select class="form-control" name="country_id" style="height: 40px;">
                                        @foreach($country as $c)
                                            <option value="{{$c->id}}">{{$c->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('country_id'))
                                        <span class="help-block help-block-error">
                                            {{ $errors->first('country_id') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Genre</label>
                                    <select class="form-control" name="genre_id" multiple>
                                        @foreach($genre as $g)
                                            <option value="{{$g->id}}">{{$g->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('genre_id'))
                                        <span class="help-block help-block-error">
                                            {{ $errors->first('genre_id') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Photo</label>
                                    <input type="file" name="photo">
                                    @if($errors->has('photo'))
                                        <span class="help-block help-block-error">
                                            {{ $errors->first('photo') }}
                                        </span>
                                    @endif
                                </div>
                                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                            <input type="submit" name="submit" value="submit" class="btn btn-primary">
                            <a href="{{route('films.index')}}" class="btn btn-info">Back</a>
                        </form>
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
    });
</script>
@endsection