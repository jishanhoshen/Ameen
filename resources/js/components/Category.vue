<template>
  <div class="items-category">
    <div class="container">
      <div class="row  justify-content-center">

        <div v-for="category in categories" class="col-12 col-sm-6 col-md-3 mb-2">
          <a class="product-item d-flex flex-column align-items-center justify-content-center"
            href="javascript:void(0)"
            :style="{ 'background-image': 'url( assets/images/category/bg/category_' + category.id + '.png)' }">
            <div class="categories-img"><img
                :src="'images/category/' + (category ? (JSON.parse(category.image)[0] ? JSON.parse(category.image)[0] : '') : '')"
                :alt="category.name"></div>
            <h2>{{ category.name }}</h2>
            <p>{{ category.desc }}</p>
          </a>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ['categories'],
}
</script>