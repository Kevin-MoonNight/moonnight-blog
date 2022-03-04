<div {{$attributes}}>
    <like-button
        like-count="{{$likes->count()}}"
        liked="{{$likes->contains(auth()->user())?'true':'false'}}"
        article-id="{{$article->id}}"
    ></like-button>
</div>
