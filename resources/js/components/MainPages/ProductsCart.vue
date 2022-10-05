<template>
	<div>
		<h1>Prodotti</h1>
		<div class="products_my">
			<div v-for="(product, index) in products" :key="index">
				<h3>{{product.name}}</h3>
				<div class="cost">{{product.cost}}</div>
				<div class="image_my">
					<img :src="product.image" />

				</div>
				<button v-on:click="addItemToCart(product)">Add to cart</button>
        
			</div>
		</div>
	</div>
  </template>
  
  <script>
  
  
  export default {
	name: 'ProductsCart',
	data: () => {
    return {
      products: [
        {
          id: 1,
          name: "Cake",
          cost: 0.99,
          image:"https://www.oetker.ch/Recipe/Recipes/oetker.ch/ch-it/baking/image-thumb__14899__RecipeDetailsLightBox/torta-brownie-a-strati.jpg"
        },
            
        {
          id: 2,
          name: "Pollo arrosto",
          cost: 5.99,
          image:"https://www.salepepe.it/files/2017/03/POLLO-ARROSTO.jpg"
          
        },
	
      ]
    };
  },
    methods: {
      addItemToCart(product) {
      this.$emit("addItemToCart", product);
    }
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