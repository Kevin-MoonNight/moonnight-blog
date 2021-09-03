<x-backend-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="h-screen w-full bg-white overflow-hidden shadow-md sm:rounded-lg">

            <form action="{{ route('articles.update',$article) }}" method="POST" class="h-full p-10 ">
                @csrf
                @method('patch')
                <div class="h-4/5 space-y-5">
                    <div class ="">
                        <label for="title" class="block text-lg text-gray-700">標題</label>
                        <input id="title" type="text" name="title" value="{{ $article->title }}" placeholder ="標題" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>

                    <div class ="">
                        <label for="url" class="block text-lg text-gray-700">封面</label>
                        <input id="url" type="url" name="url" value="{{ $article->url }}" placeholder ="圖片url" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>

                    <div class ="">
                        <label for="content" class="block text-lg text-gray-700">內容</label>
                        <textarea id="content" name="content" placeholder ="內容">{{ $article->content }}</textarea>
                    </div>

                    <div class="">
                        <label for="tags" class="block text-lg text-gray-700">標籤</label>
                        <select name="tags[]" id="tags" size="10" class="w-1/5 rounded-md border-2 focus:outline-none" multiple >
                            @foreach ($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="h-1/5 flex justify-between items-end">
                    <select class="p-3 rounded-md border-2 hover:border-black" name="state">
                        <option value="published">Publish</option>
                        <option value="draft">Draft</option>
                    </select>

                    <button role="submit" class=" rounded-md p-3 bg-blue-500 text-white hover:bg-blue-600">更新文章</button>
                </div>

            </form>

        </div>
    </div>
</x-backend-layout>

<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>

