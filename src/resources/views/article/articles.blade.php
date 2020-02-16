@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($articles as $article)
                    <articles-body-component
                        Id="{{$article['Id']}}"
                        Preis="{{$article['Preis']}}"
                        Name="{{$article['Name']}}"
                        Beschreibung="{{$article['Beschreibung']}}"
                            ></articles-body-component>
                @endforeach

                <div class="p-3 pagination justify-content-center">
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
