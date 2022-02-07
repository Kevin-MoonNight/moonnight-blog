<div class="w-full break-words rounded-lg shadow-lg bg-blueGray-200">
    <form method="post" action="{{route('messages.store')}}"
          class="flex-auto p-5 lg:p-10"
    >
        @csrf
        <x-form.input
            name="name"
            value="{{old('name')}}"
        >
            全名
        </x-form.input>

        <x-form.input
            name="email"
            value="{{old('email')}}"
        >
            電子信箱
        </x-form.input>

        <x-form.textarea
            name="message"
            rows="4"
            cols="80"
            value="{{old('message')}}"
        >
            訊息
        </x-form.textarea>

        <x-form.select
            name="type"
            value="{{old('type')}}"
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

        <div class="mt-4 text-center">
            <x-form.button>傳送</x-form.button>
        </div>
    </form>
</div>


