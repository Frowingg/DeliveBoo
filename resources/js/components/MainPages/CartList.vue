<template>
	<div>
		<h1>Cart</h1>
		<div class="products">
		<div v-for="(product, index) in cart" :key="index">
        <h3>{{product.name}}</h3>
        <div class="image_my">

          <img :src="product.image" />
        </div>
        <div>{{product.cost}}</div>
        <button v-on:click="removeItemFromCart(product)">Remove from cart</button>
      </div>
    </div>
	</div>
  </template>
  
  <script>
  
  
  export default {
	name: 'CartList',
	props: ["cart"],
	methods: {
		removeItemFromCart(product) {
      this.$emit("removeItemFromCart", product);
    },
  }
  }
  </script>
  
  <style lang="scss">
   img{
	width: 100%;
   }
  .image_my{
	width: 200px;
  }
  </style>