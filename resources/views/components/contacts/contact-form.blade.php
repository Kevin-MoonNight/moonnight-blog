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
                    @foreach(explode(',', env('APP_SERVICES')) as $service)
                        <option value="{{$service}}">{{$service}}</option>
                    @endforeach
                </x-slot>
            </x-form.select>

            <x-form.captcha
                name="captcha"
            >
                驗證碼
            </x-form.captcha>

            <div class="text-right">
                <x-form.button>傳送</x-form.button>
            </div>
        </div>


    </form>
</div>


