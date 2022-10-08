<template>
    <div class="container">
        <form action="">
            <div class="form-group">
                <label for="name">Nome </label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nome">
            </div>

            <div class="form-group">
                <label for="lastname">Cognome</label>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Cognome">
            </div>

            <div class="form-group">
                <label for="address">Indirizzo</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Indirizzo">
            </div>

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
            </div>

            <div class="container">
                <div id="dropin-container"></div>
                <button id="submit-button" @click="makePay()" class="button button--small button--green">
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
            axios.post("http://127.0.0.1:8000/api/orders/makePayment", {
                    token: this.token,
                    price: this.cartsTotal,
                })
                .then((response) => {
                    console.log(response);
                });
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
