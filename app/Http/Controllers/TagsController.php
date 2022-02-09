<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;
use App\Repositories\TagRepository;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    private TagRepository $tagRepository;

    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
        $this->authorizeResource(Tag::class);
    }

    public function index(Request $request)
    {
        $tags = $this->tagRepository->getTags($request->all());

        return $tags;
    }

    public function dashboard(Request $request)
    {
        $this->authorize('dashboard', Tag::class);

        $tags = $this->tagRepository->getTags($request->all());

        return view('backend.tags', ['tags' => $tags]);
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(StoreTagRequest $request)
    {
        $validated = $request->validated();

        Tag::create($validated);

        return redirect()->route('dashboard.tags.index');
    }

    public function show(Tag $tag)
    {
        return $tag;
    }

    public function edit(Tag $tag)
    {
        return view('tags.edit', ['tag' => $tag]);
    }

    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $validated = $request->validated();

        $tag->update($validated);

        return redirect()->route('dashboard.tags.index');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('dashboard.tags.index');
    }
}
