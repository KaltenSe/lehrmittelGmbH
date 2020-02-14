@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('article') }}" class="form-inline">
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelectSort">Sortierung</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelectSort">
                            <option selected value="name">Name</option>
                            <option value="price">Preis</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <select class="custom-select" id="inputGroupSelectOrder">
                            <option selected value="asc">aufsteigend</option>
                            <option value="desc">absteigend</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Refresh</button>
            </form>
            @foreach ($articles as $article)
                <div class="card">
                    <img src="{{ $article->Bild }}" class="card-img-left" alt=":c">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->Name }}</h5>
                        <p class="card-text">{{ $article->Beschreibung }}</p>
                        <a href="{{ route('details') }}" class="btn btn-primary">Details</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
