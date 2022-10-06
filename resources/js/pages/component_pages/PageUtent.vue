<template>
	<div>	

	<div class="background_my"></div>
	<div class="container">
		<div class="font_title_my">
			Ristorantone
		</div>
		<div class="tag_my">
			Cucina:
			<ul>
				<li>[tag]-</li>
				<li>[tag]</li>
			</ul>
		</div>
		<!--primi-->
		<div class="card-title_my">
			I Nostri Piatti
		</div>
		<div class="row large_fix_my">
			<div class="col-lg-3 col-md-4 col-sm-12" v-for="(component, index) in components" :key="index">
				<div class="card_my">
				
					<a href="#">
						<img :src="component.card_a" alt="image">
						<div class="name_my">
							{{component.name}}
						</div>
					</a>
				</div>
				<div class="add_my">
					<span>+</span>
				</div>
			</div>
		
		</div>
	
	</div>
	
	</div>
  </template>
  
<script>



  
  export default {
    name: "PageUtent",
    comments: {
    
    },
    data() {
        return {
            components: [
                {
                    name: "pizza",
                    card_a: "https://www.buttalapasta.it/wp-content/uploads/2017/11/pizza-margherita.jpg",
                },
                {
                    name: "sushi",
                    card_a: "https://www.buttalapasta.it/wp-content/uploads/2017/11/pizza-margherita.jpg",
                },
                {
                    name: "fritto",
                    card_a: "https://www.buttalapasta.it/wp-content/uploads/2017/11/pizza-margherita.jpg",
                },
                {
                    name: "kebab",
                    card_a: "https://www.buttalapasta.it/wp-content/uploads/2017/11/pizza-margherita.jpg",
                },
                {
                    name: "kebab",
                    card_a: "https://www.buttalapasta.it/wp-content/uploads/2017/11/pizza-margherita.jpg",
                },
                {
                    name: "kebab",
                    card_a: "https://www.buttalapasta.it/wp-content/uploads/2017/11/pizza-margherita.jpg",
                },
                {
                    name: "kebab",
                    card_a: "https://www.buttalapasta.it/wp-content/uploads/2017/11/pizza-margherita.jpg",
                },
                {
                    name: "kebab",
                    card_a: "https://www.buttalapasta.it/wp-content/uploads/2017/11/pizza-margherita.jpg",
                },
            ],
        };
    },

}
  </script>
  
  <style lang="scss">
 /* eslint-disable */
	@import "../../../sass/variables.scss";
	.container_my{
		display: flex;
	}
	.background_my{
		background-image: url('https://media-cdn.tripadvisor.com/media/photo-s/1c/1b/3a/8d/il-sushi-party-che-abbiamo.jpg');
		background-repeat: no-repeat;
		background-size: cover;
		background-position: center;
		height: 100px;
		width: 100%;
	}
	.font_title_my{
		font-size: 50px;
		font-weight: 600;
		color: $maincolor;
		margin-top: 1rem;
	}
	ul{
		list-style: none;
		padding: 0%;
		display: flex;
	}
	.tag_my{
		color: $secondarycolor;
		font-size: 20px;
	}
	.card-title_my{
		font-size: 30px;
		font-weight: 600;
		color: $maincolor;
		margin-top: 30px;
		margin-bottom: 15px;
	}
	.col{
		position: relative;
		
	}
	.card_my{
		margin-top: 20px;
		img{

			border: 1px solid;
			border-radius: 10px;
			width: 100%;
		}
	.name_my{
		color: white;
		position: absolute;
		font-weight: 600;
		bottom: 5px;
		
	}
	}
	.col:hover{
		.name_my{
			top: 5px;
		}
		.add_my{
			display: block;
		}
	}
	.add_my{
		display: none;
		position: absolute;
		bottom: 5px;
		background-color: white;
		color: $maincolor;
		font-weight: 670;
		font-size: 20px;
		text-align: center;
		border: 1px solid;
		border-radius: 50px;
		padding: 10px;
		
	}

	.large_fix_my{
		width: 80%;
	}

	@media screen and (max-width: 576px) {
		.large_fix_my{
			width: 100%;
	}
}
  </style>