<div class="break-words bg-white rounded-sm">
    <form method="post" action="{{route('messages.store')}}"
          class="px-6 py-6"
    >
        @csrf
        <div class="text-center">
            <h6 class="text-lg font-bold text-gray-500">
                聯絡我們
            </h6>
        </div>

        <div class="mb-3">
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
                    <option value="演算法程式開發">演算法程式開發</option>
                    <option value="電腦應用軟體開發">電腦應用軟體開發</option>
                    <option value="網站開發">網站開發</option>
                    <option value="主機託管">主機託管</option>
                    <option value="網站維護">網站維護</option>
                    <option value="其他客製化需求">其他客製化需求</option>
                </x-slot>
            </x-form.select>

            <div class="text-right">
                <x-form.button>傳送</x-form.button>
            </div>
        </div>


    </form>
</div>


