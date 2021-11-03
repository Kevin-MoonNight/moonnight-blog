<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'can:admin'])->except('index', 'show');
    }

    public function index(Request $request)
    {
        return Tag::filter($request->all())->get();
    }

    public function store(StoreTagRequest $request)
    {
        $validated = $request->validated();

        return Tag::create($validated);
    }

    public function show(Tag $tag)
    {
        return $tag;
    }

    public function update(UpdateTagRequest $request,Tag $tag)
    {
        $validated = $request->validated();

        return $tag->update($validated);
    }

    public function destroy(Tag $tag)
    {
        return $tag->delete();
    }
}
