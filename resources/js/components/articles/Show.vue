<template>
    <div class="flex justify-center">
        <div class="w-full max-w-screen-xl h-auto min-h-screen py-10 px-5 lg:px-10">

            <div class="flex w-full h-auto gap-5">
                <div class="md:w-4/5">
                    <article-component />
                </div>

                <div class="hidden md:block w-1/4 select-none">
                    <div class="sticky top-24 w-full h-auto space-y-5 ">
                        <popular-side-box />
                        <tags-side-box />
                    </div>
                </div>

            </div>

        </div>
    </div>

</template>

<script>
    import SideBox from "../shared/SideBox";
    import ArticleComponent from "./Article";
    import PopularSideBox from "../articles/PopularSideBox";
    import TagsSideBox from "../articles/TagsSideBox";

    export default {
        components: {
            ArticleComponent,
            SideBox,
            PopularSideBox,
            TagsSideBox
        },
    }
</script>
