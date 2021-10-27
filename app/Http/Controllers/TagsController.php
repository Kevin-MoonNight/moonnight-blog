<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagsController extends Controller
{
    public function __construct(){
        $this->middleware(['auth:sanctum','can:admin'])->except('index','show');
    }

    public function index(Request $request)
    {
        return Tag::filter($request->all())->get();
    }

    public function store(TagRequest $request)
    {
        $validated = $request->validated();

        if(!isset($validated['slug'])) {
            $validated['slug'] = $validated['name'];
        }

        $validated['slug'] = Str::lower($validated['slug']);

        return Tag::create($validated);
    }

    public function show($id)
    {
        return Tag::findOrFail($id);
    }

    public function update(TagRequest $request, $id)
    {
        $tag = Tag::findOrFail($id);

        $validated = $request->validated();

        if(!isset($validated['slug'])) {
            $validated['slug'] = $validated['name'];
        }

        $validated['slug'] = Str::lower($validated['slug']);

        return $tag->update($validated);
    }

    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);

        return $tag->delete();
    }
}
