<template>
    <div>
      <header>
        <button v-on:click="navigateTo('products')">View products</button>
        {{cart.length}} in cart
        <button v-on:click="navigateTo('cart')">View Cart</button>
  
      </header>
      <h1>{{  total }}$</h1>
      <div v-if="page === 'cart'">
        <CartList v-on:removeItemFromCart="removeItemFromCart" :cart="cart" />
      </div>
      
      <div v-if="page === 'products'">
        <ProductsCart v-on:addItemToCart="addItemToCart" />
      </div>
    </div>
  </template>
  
  <script>
  import ProductsCart from '../components/MainPages/ProductsCart.vue';
  import CartList from '../components/MainPages/CartList.vue';

  export default {
    name: 'App',
    components: {
      ProductsCart,
      CartList,
  },
  data: () => {
      return {
        page: "products",
          cart: [],
          cartCount: 0,
          total: 0,
      };
    },
    methods: {
      addItemToCart(product) {
        this.cart.push(product);
        this.cartCount++;
        this.total += product.cost;
      },
      
      removeItemFromCart(product) {
        this.cart.splice(this.cart.indexOf(product), 1);
        this.total -= product.cost;
        if(this.cart.length === 0 ){
          this.total = 0;
        }
      },
      navigateTo(page) {
        this.page = page;
      },
      saveCart() {
        sessionStorage.setItem('ProductsCart', JSON.stringify(cart));
  }
   
    },
  }
  </script>
  
  <style lang="scss">
  body {
    margin: 0;
    margin-top: 100px;
  }
  .products {
    display: grid;
    grid-template-columns: 1fr 1fr;
  }
  .products button {
    padding: 10px;
    background-color: black;
    color: white;
    outline: none;
    border: none;
    cursor: pointer;
  }
  header {
    height: 60px;
    box-shadow: 2px 2px 5px blue;
    background-color: lightgray;
    text-align: right;
    font-size: 30px;
    padding-top: 20px;
  }
  header button {
    padding: 10px;
    border: none;
    cursor: pointer;
    color: white;
    background-color: green;
  }
  </style>