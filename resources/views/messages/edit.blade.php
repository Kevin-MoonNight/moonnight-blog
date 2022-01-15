<x-layouts.backend-layout
    title="更新訊息"
>
    <form
        method="post"
        action="{{route('dashboard.messages.update',['message'=>$message])}}"
        class="w-full h-auto bg-white rounded-sm shadow-md"
    >
        @csrf
        @method('PATCH')
        <div class="p-5">
            <x-form.input
                name="name"
                value="{{old('name',$message->name)}}"
            >
                名稱
            </x-form.input>

            <x-form.input
                name="email"
                value="{{old('email',$message->email)}}"
            >
                電子信箱
            </x-form.input>

            <x-form.textarea
                name="remark"
                rows="4"
                cols="80"
                value="{{old('remark',$message->remark)}}"
            >
                訊息
            </x-form.textarea>

            <x-form.select
                name="caseType"
                value="{{old('caseType',$message->caseType)}}"
            >
                委託類型
                <x-slot name="options">
                    <option selected disabled value="">請選擇委託類型</option>
                    <option value="演算法程式">演算法程式開發</option>
                    <option value="軟體程式">軟體程式開發</option>
                    <option value="品牌形象網站">品牌形象網站設計</option>
                    <option value="客製化網站">客製化網站</option>
                    <option value="其他">其他</option>
                </x-slot>
            </x-form.select>

            <div class="flex justify-end items-end mt-4 w-full">
                <x-form.button>更新訊息</x-form.button>
            </div>
        </div>
    </form>
</x-layouts.backend-layout>
