<template>
    <article-component/>
</template>

<script>
import SideBox from "../components/SideBox";
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
