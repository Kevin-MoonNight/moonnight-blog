@extends('dashboard.index')

@section('content')
    <div class="flex justify-center bg-gray-200 min-h-screen py-10 overflow-auto">
        <div class="w-full bg-white rounded-xl max-w-screen-xl shadow-xl p-5 h-auto">
            <table class="table-fixed w-full h-auto">
                <thead class="w-full">
                <tr class="bg-gray-300 w-full">
                    <th class="w-1/12 py-2">稱謂</th>
                    <th class="w-2/12 py-2">電子信箱</th>
                    <th class="w-2/12 py-2">委託類型</th>
                    <th class="w-4/12 py-2">備註</th>
                    <th class="w-2/12 py-2">時間</th>
                    <th class="w-1/12 py-2">動作</th>
                </tr>
                </thead>
                <tbody class="break-words">
                @foreach ($messages as $message)
                    <tr class="h-24 hover:bg-gray-100 border">
                        <td class="p-4  border-r">
                           {{$message->name}}
                        </td>

                        <td class="p-4 border-r">
                            {{$message->email}}
                        </td>
                        <td class="p-4 text-center border-r ">
                            casetype
                        </td>
                        <td class="p-4 border-r">
                            {{$message->remark}}
                        </td>

                        <td class="p-4 text-center border-r">
                           {{date_format($message->created_at,'Y-m-d')}}
                        </td>

                        <td class="flex justify-between">
                            {{--複製email--}}
                            <button class="hover:text-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"  d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
                                </svg>
                            </button>

                            <form action="{{route('message.destroy',$message)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="p-2 hover:text-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

        </div>
    </div>

    @include('layouts.paginator',['items'=> $messages])

@endsection

