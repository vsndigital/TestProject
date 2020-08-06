@extends('layout')

@section('content')
<div id="wrapper">
    <div id="page" class="container">
        <div id="content">
            <div class="title">
                @foreach($articles as $article)
                    <h3><a href="/articles/{{ $article->id }}">{{$article->title}}</a> </h3>
                    <p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
                    <span class="byline"> {{ $article->excerpt }}</span> 
                @endforeach
            </div>
        </div>
        
    </div>
</div>
@endsection('content')
