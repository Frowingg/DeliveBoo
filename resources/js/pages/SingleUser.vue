<template>
<div class="wrap-bgc">
    <div class="container-my">
         <div class="title_my mt-3">
                <h3>{{user.name}}</h3>
         </div>
        
        <div v-if="error.length > 0">
            <div class="alert alert-danger mt-5" >
                <ul>
                    <li>{{ error }}</li>
                </ul>
                <button class="btn btn-danger" @click="removeAllItemFromCart()">Svuota carrello</button>
            </div>
        </div>

    
        <div id="myproduct">
          
            <div class="row mt-2 mb-2">
                <div class="col-md-10">&nbsp;</div>
                <div class="col-md-2 text-right mt-3">
                    <button class="btn cart_my" data-toggle="modal" data-target="#cart">
                        <span class="">{{  allCartSum() }}</span>
                    </button>
                    <div class="modal fade" id="cart">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title">Il tuo carrello</h5>
                                    <button class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <div class="modal-body">
                                    <table class="table table striped text-left">
                                        <tbody>
                                            <tr v-for="cart in carts" v-bind:key="cart.id">
                                                <td>{{cart.name}}</td>
                                                <td>{{cart.price}}€</td>
                                                <td width="100">{{cart.qty}}</td>
                                                <td width="60">
                                                    <button @click="increase(cart)" class="btn addcart_my">+</button>
                                                </td>
                                                <td width="60">
                                                    <button @click="reduce(cart)" class="btn removecar_my">-</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="modal-footer">
                                    Prezzo totale: {{getTotal()}}€ &nbsp;
                                    <router-link :to="{ name: 'payment' , params: { carts, cartsTotal }, }">
                                        <button v-if="carts.length > 0" data-dismiss="modal" class="btn btn_my" >
                                            Checkout
                                        </button>
                                    </router-link>
                                    <button data-dismiss="modal" v-on:click="removeAllItemFromCart();cleanToast()" class="btn btn_my">
                                        Elimina tutti i prodtti
                                    </button>   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container_prod">
            
            <div class="card_my_cart"  v-for="dish in dishes" :key="dish.id">
                    <img :src="'/storage/' + dish.dish_cover" :alt=" dish.name ">
                     <!-- <img src="https://picsum.photos/200/300" alt=""> -->
                    <div class="title_my">
                        <strong>{{ dish.name }}</strong>
                    </div>
                    <!-- <div class="img_my" v-else>
                        <img src="../img/work/sushi-pizza-scaled.jpg" alt="img">
                    </div> -->
                    <div class="my-info">
                            <div class="description_my">
                                {{ dish.description }}
                            </div>
                    
                            <div class="price_my">
                                {{dish.price}}€
                            </div>
                        </div>
                
                        <button class="btn btn_my_cart" @click="addCart(dish);addToast()">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </button>
            </div>  
        </div>
    </div>
</div>
</template>


<script>
export default {
    name: "SingleUser",
    data() {
        return {
            carts: [],
            dishes: [],
            user:[],
            error: "",
            cartsTotal: 0,
            
        };
    },
    methods: {
        addCart(product) {
            let newItem = {
                risto_id: product.user_id,
                id: product.id,
                name: product.name,
                price: product.price,
                qty: 1,
            };
            if (this.carts.length == 0) {
                this.carts.push(newItem);
            } else {
                let rist_id = [
                    // metto tutti gli id risto dei piatti in un arr e rimuovo i duplicati... 
                    // ne avrò quindi sempre uno, quello del primo piatto che finisce nel carrello
                    ...new Set(this.carts.map((product) => product.risto_id)), 
                ];
                rist_id = rist_id[0];

                let ids = this.carts.map((product) => product.id);
                if (ids.includes(newItem.id)) {
                    this.carts.forEach((element) => {
                        if (element.id == newItem.id) {
                            element.qty++;
                        }
                    });
                } else {
                    newItem.risto_id == rist_id
                        ? this.carts.push(newItem)
                        : (this.error =
                              "Non puoi aggiungere piatti da un altro ristorante");
                }
            }
            localStorage.setItem("carts", JSON.stringify(this.carts));
        },
        increase(product) {
            product.qty++;
            localStorage.setItem("carts", JSON.stringify(this.carts));
        },
        reduce(product) {
            if (product.qty > 1) {
                product.qty--;
                localStorage.setItem("carts", JSON.stringify(this.carts));
            } else {
                this.carts.splice(this.carts.indexOf(product), 1);
                localStorage.setItem("carts", JSON.stringify(this.carts));
            }
        },
        getTotal() {
            let total = 0;
            this.carts.forEach((item) => {
                total += item.qty * item.price;
            });
            this.cartsTotal = total.toFixed(2);
            return total.toFixed(2);
        },
        removeAllItemFromCart() {
            this.carts = [];
            this.error = "";
            localStorage.setItem("carts", JSON.stringify(this.carts));
        },

        allCartSum() {
            let totalItem = 0;
            this.carts.forEach((item) => {
                totalItem += item.qty;
            });
            return totalItem;
        },
        addToast(){
            this.$toasted.show("Prodotto aggiunto al carrello.")
        },
        cleanToast(){
            this.$toasted.show("Carrello svuotato correttamente.")
        },
    },

    mounted() {
        if (localStorage.carts) {
            this.carts = JSON.parse(localStorage.getItem("carts"));
        }
        axios.get("/api/users/" + this.$route.params.slug).then((response) => {
            if (response.data.success) {
                console.log(response)
                this.dishes = response.data.results;
                this.user = response.data.user
            } else {
                this.$router.push({ name: "not-found" });
            }
        });
    },
};
</script>

<style scoped>
.wrap-bgc{
    background-color: lightgray;
}
    .container-my{
        width: 80%;
        margin: 0 auto;
        
    }
    .modal-title{
        color: #fbba00;
    }
    .title_my{
        font-size:  30px;
        color: chocolate;
        margin-left: 1rem;
        margin-top: 30px;
        position: absolute;
    }

    .addcart_my{
        border: 2px solid #fbba00;
        border-radius: 30px;
        color: #9d9d9c;
        font-size: 18px;
    }
    .addcart_my:hover{
        border: 2px solid white;
        background-color: #fbba00;
        color: white;

    }
    .removecar_my{
        border: 2px solid #fbba00;
        border-radius: 30px;
        color: #9d9d9c;
        font-size: 18px; 
    }
    .removecar_my:hover{
        border: 2px solid white;
        background-color: #fbba00;
        color: white;
    }
    .price_my{
        font-size: 20px;
        color: white;
    }
    img{
        width: 100%;
        border-radius: 20px;
        
    }
    .img_my{
        width: 200px;
        
    }
    .btn_my{
        background-color: #fbba00;
        font-size: 1rem;
        color:white ;
        border-radius: 20px;
    }
    .btn_my_cart{
        background-color: #fbba00;
        margin-right: 0.5rem;
        margin-bottom: 0.5rem;
        font-size: 1.4rem;
        color:white ;
        align-self: end;
        border-radius: 20px;
        position: absolute;
        bottom: 15px;
    }
    .btn_my:hover{
        background-color: white;
        color:#fbba00 ;
    }
    .btn_my_cart:hover{
        background-color: white;
        color:#fbba00 ;
    }
    .description_my{
     color: white;
     font-size: 1.1rem;
    }

    .my-info{
        position: absolute;
        bottom: 15px;
        margin-left: 1rem;
    }

    .container_prod{
    display: flex;
    flex-wrap: wrap;
    /* align-items: center; */
    
 }
 .card_my_cart{
    width: calc(100% / 3 - 35px);
    margin: 15px;
    border-radius: 20px;
    display: flex;
    flex-direction: column;
    border: 1px solid #fbba00;
    position: relative;

 }
   
 .cart_my{
    background-color: #fbba00;
    color: white;
    text-align: right;
 }
 @media screen and (max-width: 920px) {
    .card_my_cart{
        width: calc(100% / 2 - 35px);
        margin-right: 20px;

    }
}
 @media screen and (max-width: 620px) {
    .card_my_cart{
        width: calc(100%);
        margin-right: 20px;
        display: flex;
        align-items: center;
        justify-content: center;

    }
    .btn_my{
        color:white ;
        border-radius: 50px;
        width: 50px;
        height: 50px;
    }
    .btn_my:hover{
        background-color: white;
        color:#fbba00 ;
    }
    
.img_my{
    display: none;
}
.description_my{
    color: #9d9d9c;
    font-size: 12px; 
    display: flex;
    justify-content: center;
}
.title_my{
    font-size: 16px;
    color: chocolate;
    margin-bottom: 30px;
    margin-top: 30px;
}
.price_my{
    font-size: 15px;
    color: #9d9d9c;
    margin-right: 10px;
}
}
</style>