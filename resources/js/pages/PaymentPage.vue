<template>
  <div class="container">
   <div  v-for="cart,index in carts" :key="index">
        {{cart.name}}
        {{cart.qty}}
        bbibibiib
   </div>
   <button v-if="!disableBuyButton" style="background-color: green" class="w-full text-center px-4 py-3 rounded-md shadow-md text-white font-semibold" @click.prevent="beforeBuy">
      Procedi con l'acquisto 
    </button>
    <button v-else style="background-color: green" class="w-full text-center px-4 py-3  rounded-md shadow-md text-white font-semibold cursor-not-allowed">
      {{loadingPayment ? 'Loading...' : `Procedi con l'acquisto ` }}
    </button>
  </div>
</template>

<script>
export default {
    name: "PaymentPage",
    props:['carts'],

    data() {
        return{
            disableBuyButton:true,
            loadingPayment: true,
        }
    }
}
</script>

<style>

</style>