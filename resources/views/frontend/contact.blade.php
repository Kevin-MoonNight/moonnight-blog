@extends('layouts.index')

@section('content')

    <div class="section">
        <div class="mt-10 sm:mt-0 w-full max-w-screen-xl">
            <div class="md:grid md:grid-cols-3">

                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-xl font-medium leading-6 text-gray-900">聯絡我們</h3>
                        <p class="mt-1 text-sm text-gray-600">
                            請輸入聯絡資訊
                        </p>
                    </div>
                </div>

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="{{route('contact.store')}}" method="post">
                        @csrf
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-1 gap-6 text-md">

                                    <div class="col-span-3 sm:col-span-3">
                                        <label for="name" class="block text-gray-700">稱謂</label>
                                        <input type="text" name="name" id="name" autocomplete="given-name" placeholder="請輸入稱謂" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>

                                    <div class="col-span-3 sm:col-span-3">
                                        <label for="email" class="block text-gray-700">Email</label>
                                        <input type="email" name="email" id="email" placeholder="請輸入電子信箱" autocomplete="email" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>

                                    <div class="col-span-3 sm:col-span-3">
                                        <label for="remark" class="block text-gray-700">備註</label>
                                        <input type="text" name="remark" id="remark" placeholder="這裡可以留下你想要說的話" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>

                                    <div class="col-span-3 sm:col-span-3">
                                        <label for="caseType" class="block text-gray-700">委託類型</label>
                                        <select id="caseType" name="caseType" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <option>演算法</option>
                                            <option>桌面應用程式</option>
                                            <option>網頁</option>
                                            <option>其他</option>
                                        </select>
                                    </div>


                                </div>
                            </div>

                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">傳送</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
