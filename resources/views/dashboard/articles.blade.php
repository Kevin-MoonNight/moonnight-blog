@extends('dashboard.index')

@section('content')
    <div class="flex justify-center bg-gray-200 min-h-screen py-10 overflow-auto">
        <div class="w-full bg-white rounded-xl max-w-screen-xl shadow-xl p-5 h-auto">
            <table class="table-fixed w-full h-auto">
                <thead class="w-full">
                    <tr class="bg-gray-300 w-full">
                        <th class="w-2/6 py-2">標題</th>
                        <th class="w-1/6 py-2">時間</th>
                        <th class="w-1/6 py-2">標籤</th>
                        <th class="w-1/6 py-2">狀態</th>
                        <th class="w-1/6 py-2">動作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $article)
                        <tr class="h-24 hover:bg-gray-100 border">
                            <td class="text-center overflow-auto border-r">
                                {{$article->title}}
                            </td>
                            <td class="text-center overflow-auto border-r">
                                {{date_format($article->created_at,'Y-m-d')}}
                            </td>

                            <td class="text-center overflow-auto border-r">
                                <div class="flex justify-center">
                                    @foreach ($article->tags as $tag)
                                        <span class="bg-gray-300 rounded-full px-3 py-1 text-sm m-2">#{{$tag->name}}</span>
                                    @endforeach
                                </div>

                            </td>

                            <td class="text-center overflow-auto border-r">
                                {{$article->state}}
                            </td>

                            <td class="flex justify-center">
                                <div class="space-x-5 flex">

                                    <a href="{{route('articles.edit',$article)}}" class="p-2 hover:text-blue-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                    </a>

                                    <form action="{{route('articles.destroy',$article)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="p-2 hover:text-blue-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
    </div>

    @include('layouts.paginator',['items'=> $articles])


@endsection

