<template>
    <div class="feature-products" id="feature-products">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="title mx-auto">Featured Product</h1>
                </div>
                <div class="col-12">
                    <div id="tab">
                        <ul class="tab-control">
                            <li><a class="active" href="#allcat">All</a></li>
                            <li v-for="category in categories"><a :href="'#category_' + category.id">{{ category.name
                            }}</a></li>
                        </ul>
                        <div id="allcat">
                            <div class="row no-gutters-sm">
                                <div v-for="product in products" class="col-6 col-md-4 col-lg-3">
                                    <div class="product">
                                        <a class="product-img" href=""><img
                                                :src="'images/product/'+(product ? (JSON.parse(product.image)[0] ? JSON.parse(product.image)[0] : '' ) : '' )" :alt="product.name" /></a>
                                        <h5 class="product-type">{{ product.category }}</h5>
                                        <h3 class="product-name">
                                            {{ product.name }}
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-for="(productBycat, index) in productBycats" :id="'category_' + index">
                            <div class="row no-gutters-sm">
                                <div v-for="product in productBycat" class="col-6 col-md-4 col-lg-3">
                                    <div class="product" :id="product.name">
                                        <a class="product-img" href=""><img
                                            :src="'images/product/'+(product ? (JSON.parse(product.image)[0] ? JSON.parse(product.image)[0] : '' ) : '' )" :alt="product.name" /></a>
                                        <h5 class="product-type">{{ product.category }}</h5>
                                        <h3 class="product-name">
                                            {{ product.name }}
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['products', 'categories', 'productBycats'],
};
</script>
