<template>
    <div class="container">
        <div id="myproduct">
            <div class="row mt-2 mb-2">
                <div class="col-md-10">&nbsp;</div>
                <div class="col-md-2 text-right">
                    <buttun class="btn btn-primary" data-toggle="modal" data-target="#cart">
                        <span class="badge badge-light">{{badge}}</span>
                    </buttun>
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
                                            <tr v-for="(cart, n) in carts" v-bind:key="cart.id">
                                                <td>{{cart.name}}</td>
                                                <td>{{cart.price}}</td>
                                                <td width="100"><input type="text" readonly class="form-controll" v-model="quantity"></td>
                                                <td width="60">
                                                    <button @click="removeCart(n)" class="btn btn-danger btn-small"></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="modal-footer">
                                    Prezzo totale: {{totalprice}} &nbsp;
                                    <button data-dismiss="modal" class="btn btn-primary">Checkout</button>
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
            user: null,
            dishes: [],
            carts: [],
            cartadd: {
                id: '',
                name:  '',
                price: '',
                amount: ''
            },
            badge: '0',
            quantity: '1',
            totalprice: '0'
        };
    },
    created() {
        this.viewcart();
    },
    methods: {
        viewCart() {
            if(localStorage.getItem('carts')) {
                this.carts = JSON.parse(localStorage.getItem('carts'));
                this.badge = this.carts.length;
                this.totalprice = this.carts.reduce((total, item) => {
                    return total + this.quantity * item.price;
                }, 0);
            }
        },
        addCart(dish) {
            this.cartadd.id = dish.id;
            this.cartadd.name = dish.name;
            this.cartadd.price = dish.price;
            this.cartadd.amount = dish.amount;
            this.carts.push(this.cartadd);
            this.cartadd = {};
            this.storeCart();
        },
        removeCart(dish) {
            this.carts.splice(dish, 1);
            this.storeCart();
        },
        storeCart() {
            let parsed = JSON.stringify(this.carts);
            localStorage.setItem('carts', parsed);
            this.viewCart();
        }
    },
    mounted() {
        axios.get('/api/users/' + this.$route.params.slug)
        .then((response) => {
            
            if(response.data.success) {
                this.user = response.data.results;
                console.log(this.user)
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
        fetch('api/products/order',{
        
        body: JSON.stringify(this.carts),
        headers: {
        'content-type':'application/json'
        }
        }).then(res = res.json()).then(res => {});
            },
        };
</script>

<style>

</style>
