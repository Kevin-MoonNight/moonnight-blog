@extends('dashboard.index')

@section('content')

    {{-- 沒通過驗證的資料 --}}
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="errors bg-red-300 text-center text-xl">
                {{$error}}
            </div>
        @endforeach
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('articles.update',$article) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="space-y-5">
                            <div class = "pb-2">
                                <label for="titile" class="block text-lg text-gray-700">標題</label>
                                <input type="text" name="title" value="{{ $article->title }}" placeholder ="標題" class="mt-1 text-md focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class = "pb-2">
                                <label for="content" class="block text-lg text-gray-700">內容</label>
                                <textarea name="content" placeholder ="內容" rows="10">{{ $article->content }}</textarea>
                            </div>

                            <div class="flex p-1 justify-between">
                                <div>
                                    <select class="pr-10 border-2 border-gray-300 border-r p-2 rounded-md" name="state">
                                        <option value="published">Publish</option>
                                        <option value="draft">Draft</option>
                                    </select>

                                    <select class="pr-10 border-2 border-gray-300 border-r p-2 rounded-md" name="tag">
                                        @foreach ($tags as $tag)
                                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button role="submit" class=" rounded-md p-3 bg-blue-500 text-white hover:bg-blue-400" required>更新文章</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace( 'content' );
    </script>

@endsection
