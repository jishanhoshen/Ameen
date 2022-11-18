<template>
    <div>
        <div>
            <Header></Header>
        </div>
        <div>
            <Slider></Slider>
        </div>
        <div>
            <Category></Category>
        </div>
        <div>
            <FeatureProducts></FeatureProducts>
        </div>
        <div>
            <Banner></Banner>
        </div>
        <div>
            <Footer></Footer>
        </div>
    </div>
</template>

<script>
import Header from "./components/Header.vue";
import Slider from "./components/Slider.vue";
import Category from "./components/Category.vue";
import FeatureProducts from "./components/Feature-Products.vue";
import Banner from "./components/Banner.vue";
import Empty from "./components/Empty.vue";
import Footer from "./components/Footer.vue";
export default {
    components: {
        Header,
        Slider,
        Category,
        FeatureProducts,
        Banner,
        Empty,
        Footer,
    },
};
</script>
