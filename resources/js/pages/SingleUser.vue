<template>
    <div class="container">
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
                <div class="col-md-2 text-right">
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
                                                <td>{{cart.price}}</td>
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
                                    Prezzo totale: {{getTotal()}} &nbsp;
                                    <router-link :to="{ name: 'payment' , params: { carts, cartsTotal }, }">
                                        <button v-if="carts.length > 0" data-dismiss="modal" class="btn btn_my" >
                                            Checkout
                                        </button>
                                    </router-link>
                                    <button data-dismiss="modal" v-on:click="removeAllItemFromCart()" class="btn btn_my">
                                        Elimina tutti i prodtti
                                    </button>   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container_my">
            <div class="card_my_cart"  v-for="dish in dishes" :key="dish.id">
                    <div class="title_my">
                        <strong>{{ dish.name }}</strong>
                    </div>
                    <div class="img_my" >
                        <img :src="'/storage/' + dish.dish_cover" :alt=" dish.name ">
                    </div>
                    <!-- <div class="img_my" v-else>
                        <img src="../img/work/sushi-pizza-scaled.jpg" alt="img">
                    </div> -->
                    <div class="description_my">
                        {{ dish.description }}
                    </div>
            
                    <div class="price_my">
                        {{  dish.price}} 
                    </div>
            
                <button class="btn btn_my" @click="addCart(dish)">
                    Aggiungi al carrello
                </button>
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
    },

    mounted() {
        if (localStorage.carts) {
            this.carts = JSON.parse(localStorage.getItem("carts"));
        }
        axios.get("/api/users/" + this.$route.params.slug).then((response) => {
            if (response.data.success) {
                this.dishes = response.data.results;
            } else {
                this.$router.push({ name: "not-found" });
            }
        });
    },
};
</script>

<style scoped>
    .modal-title{
        color: #fbba00;
    }
    .title_my{
        font-size:  20px;
        color: chocolate;
        margin-bottom: 30px;
        margin-top: 30px;
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
        color: #9d9d9c;
    }
    img{
        width: 100%;
        border: 1px solid;
        border-radius: 20px;
        margin-bottom: 25px;
        
    }
    .img_my{
        width: 200px;
        
    }
    .btn_my{
        background-color: #fbba00;
        border: 1px solid #fbba00;
        color:white ;
        border-radius: 20px;
    }
    .btn_my:hover{
        background-color: white;
        color:#fbba00 ;
    }
    .description_my{
     color: #9d9d9c;
     font-size: 18px;
     width: 400px;
    }

    .container_my{
    display: flex;
    flex-wrap: wrap;
    /* align-items: center; */
    justify-content: center;
 }
 .card_my-cart{
    width: calc(100% / 2 - 20px);
    margin-right: 20px;

 }
   
 .cart_my{
    background-color: #fbba00;
    color: white;
 }
</style>
