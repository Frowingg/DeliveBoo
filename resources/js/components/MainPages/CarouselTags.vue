
<template>
  <div class="carrousel_my">
      <CarouselComponent />
      <CarouselComponent />
      <CarouselComponent />
      <CarouselComponent />
      <CarouselComponent />
    </div>
</template>
  
  <script>

  import CarouselComponent from './Section/CarouselComponent.vue';

  export default {
	name: 'CarouselTags',
  components: {
    CarouselComponent,
 
    
}
  }
</script>
  

<style scoped lang="scss">
  .carrousel_my{
      margin-top: 150px;
      display: flex;
      justify-content: center;
     overflow: hidden;
    }
    .responsive_my_sp{
      display: none;
    }
    .responsive_my_tb{
      display: none;
    }
</style>