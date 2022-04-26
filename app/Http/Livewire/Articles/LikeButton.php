<?php

namespace App\Http\Livewire\Articles;

use App\Models\Article;
use App\Models\Like;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Component;

class LikeButton extends Component
{
    use AuthorizesRequests;

    public Article $article;
    public bool $isLiked;
    public int $count;

    public function mount(Article $article)
    {
        $this->article = $article;
        $this->resetProperty();
    }

    private function resetProperty()
    {
        $this->article->refresh();
        $this->isLiked = $this->article->likes->contains(Auth::user());
        $this->count = $this->article->likes->count();
    }

    public function buttonClick()
    {
        if ($this->isLiked) {
            $this->unlike();
        } else {
            $this->like();
        }

        $this->resetProperty();
    }

    private function like()
    {
        $this->authorize('create', Like::class);

        if ($this->article->likes->contains(Auth::user())) {
            return;
        }

        $validatedData = Validator::make([
            'article_id' => $this->article->id,
            'user_id' => Auth::id()
        ],
            $this->likeRules()
        )->validate();

        Like::create($validatedData);
    }

    private function unlike()
    {
        $this->authorize('delete', Like::class);

        if (!$this->article->likes->contains(Auth::user())) {
            return;
        }

        $this->article->likes()->detach(Auth::user());
    }

    public function likeRules(): array
    {
        return [
            'article_id' => ['required', 'numeric', Rule::exists('articles', 'id')],
            'user_id' => ['required', 'numeric', Rule::exists('users', 'id')]
        ];
    }

    public function render()
    {
        return view('livewire.articles.like-button');
    }
}
