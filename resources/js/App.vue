<template>
    <div>
        <div>
            <Header :company="company"></Header>
        </div>
        <div>
            <Slider></Slider>
        </div>
        <div>
            <Category :categories="categories"></Category>
        </div>
        <div>
            <FeatureProducts :products="products" :categories="categories" :productBycats="productBycats">
            </FeatureProducts>
        </div>
        <div>
            <Banner></Banner>
        </div>
        <div>
            <Footer :company="company"></Footer>
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
import axios from 'axios';
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
    data() {
        return {
            company: [],
            categories: [],
            products: [],
            productBycats: [],
        }
    },
    mounted() {
        this.getSettings();
        this.getCategories();
        this.getProducts();
    },
    methods: {
        async getSettings() {
            try {
                const url = `api/settings`
                const resp = await axios.get(url);
                this.company = resp.data;
            } catch {
                if (err.response) {
                    // client received an error response (5xx, 4xx)
                    console.log("Server Error:", err)
                } else if (err.request) {
                    // client never received a response, or request never left
                    console.log("Network Error:", err)
                } else {
                    console.log("Client Error:", err)
                }
            }
        },
        async getCategories() {
            try {
                const url = `api/category`
                const resp = await axios.get(url);
                this.categories = resp.data;
            } catch {
                if (err.response) {
                    // client received an error response (5xx, 4xx)
                    console.log("Server Error:", err)
                } else if (err.request) {
                    // client never received a response, or request never left
                    console.log("Network Error:", err)
                } else {
                    console.log("Client Error:", err)
                }
            }
        },
        async getProducts() {
            try {
                const url = `api/products`
                const resp = await axios.get(url);
                this.products = resp.data.product;
                this.productBycats = resp.data.productByCat;
            } catch {
                if (err.response) {
                    // client received an error response (5xx, 4xx)
                    console.log("Server Error:", err)
                } else if (err.request) {
                    // client never received a response, or request never left
                    console.log("Network Error:", err)
                } else {
                    console.log("Client Error:", err)
                }
            }
        },
    }
};
</script>
