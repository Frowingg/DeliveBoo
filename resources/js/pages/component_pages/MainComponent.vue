<template>
	<div>	
		<div class="container mt-3">
			<div class="title_my">
				<h2>Ristoranti</h2>
			</div>
		<div class="row">
			<div class="col-lg-4 col-md-6 col-sm-12">
				<SingleCard />
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<SingleCard />
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<SingleCard />
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<SingleCard />
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<SingleCard />
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<SingleCard />
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<SingleCard />
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<SingleCard />
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<SingleCard />
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<SingleCard />
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<SingleCard />
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<SingleCard />
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<SingleCard />
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<SingleCard />
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<SingleCard />
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<SingleCard />
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<SingleCard />
			</div>
			<div class="col-lg-3 col-md-6 col-sm-12">
				<SingleCard />
			</div>
		</div>
	</div>
	</div>
  </template>
  
<script>
	import SingleCard from "./SingleCard.vue";

  export default {
    name: "MainComponent",
    components: {
    SingleCard,
   
}
}
  </script>
  
  <style lang="scss">
 /* eslint-disable */
	@import "../assets/variable.scss";
	.title_my{
		color:$maincolor ;

		margin-bottom: 20px;
	}

  </style>