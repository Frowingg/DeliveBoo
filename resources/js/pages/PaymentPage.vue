<template>
    <div class="container">

        <form @submit.prevent="makePay()" action="">
            <div class="form-group">
                <label for="name">Nome </label>
                <input type="text"  class="form-control" id="name" v-model="order.name"  name="name" placeholder="Nome">
            </div>

            <div class="form-group">
                <label for="lastname">Cognome</label>
                <input type="text" class="form-control" id="lastname" v-model="order.lastname" name="lastname" placeholder="Cognome">
            </div>

            <div class="form-group">
                <label for="address">Indirizzo</label>
                <input type="text" class="form-control" id="address" v-model="order.address" name="address" placeholder="Indirizzo">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" v-model="order.email" name="email" placeholder="name@example.com">
            </div>

            <div class="container">
                <div id="dropin-container"></div>
                <!-- <button id="submit-button" @click="makePay()" class="button button--small button--green"> -->
                <button id="submit-button" class="button button--small button--green">
                    Purchase
                </button>
            </div>

        </form>
    </div>
</template>

<script>
export default {
    name: "PaymentPage",
    props: ["carts", "cartsTotal"],
    data() {
        return {
            token: "",
            order: {
                name:'Giacomino',
                lastname:'Pane&Vino',
                address:'Via Roma',
                email:'acaso@gmail.com',
                total_price: Number(this.cartsTotal),
                user_id : this.carts[0].risto_id
            }               
        };
    },
    mounted() {
        

        braintree.dropin.create({
            authorization: "sandbox_g42y39zw_348pk9cgf3bgyw2b",
            selector: "#dropin-container",
        });

        $.ajaxSetup({
            headers: {
                "X-XSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        axios
            .get("http://127.0.0.1:8000/api/orders/generate")
            .then((response) => {
                this.token = response;
            });
    },

    methods: {
        makePay() {
            // pagamento
            axios.post("http://127.0.0.1:8000/api/orders/makePayment", {
                    token: this.token,
                    price: this.cartsTotal,
                    dish: this.carts.name,
                    quantity: this.carts.qty,
                    resturant_id: this.carts.risto_id
                })
                .then((response) => {
                   console.log(response)
                });
            // salvataggio ordine
            axios.post("/orders/create", this.order).then(
                response => {
                    console.log(response);
                }
            ).catch(error => {
                console.log('error');
            })
        },
    },
};
</script>

<style>
.button {
    cursor: pointer;
    font-weight: 500;
    left: 3px;
    line-height: inherit;
    position: relative;
    text-decoration: none;
    text-align: center;
    border-style: solid;
    border-width: 1px;
    border-radius: 3px;
    -webkit-appearance: none;
    -moz-appearance: none;
    display: inline-block;
}

.button--small {
    padding: 10px 20px;
    font-size: 0.875rem;
}

.button--green {
    outline: none;
    background-color: #64d18a;
    border-color: #64d18a;
    color: white;
    transition: all 200ms ease;
}

.button--green:hover {
    background-color: #8bdda8;
    color: white;
}
</style>
