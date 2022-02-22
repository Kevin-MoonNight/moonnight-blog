<div {{$attributes}}>
    <like-button
        like-count="{{$likes->count()}}"
        liked="{{$likes->contains(auth()->user())?'true':'false'}}"
        article-slug="{{$article->slug}}"
    ></like-button>
</div>
