<template>
  <div class="container">
   <div  v-for="cart,index in carts" :key="index">
    {{cart.name}}
    {{cart.qty}}
    bbibibiib
   </div>
  </div>
</template>

<script>
export default {
    name: "PaymentPage",
    props:['carts'],
}
</script>

<style>

</style>