<template>
    <div class="container">
        <div v-if="error.length > 0">
            <div class="alert alert-danger mt-5" >
                <ul>
                    <li>{{ error }}</li>
                </ul>
            </div>
        </div>

        <div id="myproduct">
            <div class="row mt-2 mb-2">
                <div class="col-md-10">&nbsp;</div>
                <div class="col-md-2 text-right">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#cart">
                        <span class="badge badge-light">{{  allCartSum() }}</span>
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
                                                    <button @click="increase(cart)" class="btn btn-success btn-small">+</button>
                                                </td>
                                                <td width="60">
                                                    <button @click="reduce(cart)" class="btn btn-danger btn-small">-</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="modal-footer">
                                    Prezzo totale: {{getTotal()}} &nbsp;
                                    <button data-dismiss="modal" class="btn btn-primary">Checkout</button>
                                    <button data-dismiss="modal" v-on:click="removeAllItemFromCart()" class="btn btn-primary">Elimina tutti i prodtti</button>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-for="dish, index in dishes" :key="index" class="mt-5">
            <div v-if="dish.user_id === user.id">
                {{dish}}
                <button class="btn btn-primary" @click="addCart(dish)">
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
            error: ''
        }        
    },
    methods: {
        addCart(product) {
            let newItem = {
                risto_id: product.user_id,
                id: product.id,
                name: product.name,
                price: product.price,
                qty: 1
            };
            if(this.carts.length == 0) {
                this.carts.push(newItem)
            } else {
                let rist_id = [
                    ...new Set(this.carts.map(product => product.risto_id)) // metto tutti gli id risto dei piatti in un arr e rimuovo i duplicati... ne avrò quindi sempre uno, quello del primo piatto che finisce nel carrello
                ];
                rist_id = rist_id[0];

                let ids = this.carts.map(product => product.id);
                if (ids.includes(newItem.id)) {
                    this.carts.forEach(element => {
                        if (element.id == newItem.id) {
                            element.qty++;
                        }
                    });
                } else {
                    newItem.risto_id == rist_id
                        ? this.carts.push(newItem)
                        : this.error = 
                              "Non puoi aggiungere piatti da un altro ristorante"
                          ;
                }
            } 
            localStorage.setItem('carts', JSON.stringify(this.carts));


        },
        increase(product) {
            product.qty++;
            localStorage.setItem("carts", JSON.stringify(this.carts));

        },
        reduce(product) {
            if(product.qty > 1) {
                product.qty--;
                localStorage.setItem("carts", JSON.stringify(this.carts));

        
            } else {
                this.carts.splice(this.carts.indexOf(product), 1) 
                localStorage.setItem("carts", JSON.stringify(this.carts));

   
            }
        },
        getTotal() {
            let total = 0;
            this.carts.forEach(item => {
                total += item.qty * item.price
            });
            return total
        },
        removeAllItemFromCart() {
            this.carts = []
            this.error = '';
            localStorage.setItem("carts", JSON.stringify(this.carts));
        },

        allCartSum(){
            let totalItem = 0;
            this.carts.forEach(item => {
                totalItem += item.qty
            });
            return totalItem
        }
    },

    mounted() {
        if(localStorage.carts) {
            this.carts = JSON.parse(localStorage.getItem("carts"))
        }
        axios.get('/api/users/' + this.$route.params.slug)
        .then((response) => {
            
            if(response.data.success) {
                this.user = response.data.results;
            } else {
                this.$router.push({name: 'not-found'});
            }
        });
        axios.get('/api/dishes/')
        .then((response) => {

            if(response.data.success) {
                this.dishes = response.data.results;
            }
        });

    },
}
</script>

<style>

</style>
