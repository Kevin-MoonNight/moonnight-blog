<template>
    <section>
        <div class="w-full max-w-screen-xl">
            <div class="md:grid md:grid-cols-3">

                <div class="md:col-span-1">
                    <div class="px-4 md:px-0">
                        <h3 class="text-xl font-medium leading-6 text-gray-900">聯絡我們</h3>
                        <p class="mt-1 text-sm text-gray-600">
                            請輸入聯絡資訊
                        </p>
                    </div>
                </div>

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <contact-form />
                </div>

            </div>
        </div>
    </section>
</template>

<script>
    import ContactForm from './ContactForm';

    export default {
        components:{
            ContactForm
        }
    }
</script>
