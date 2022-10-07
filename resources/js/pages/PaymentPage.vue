<template>
  <div class="container mt-5">

    <div id="dropin-container"></div>
    <button id="submit-button" class="button button--small button--green">Purchase</button>
    {{this.token}}

  </div>
</template>

<script>
export default {
    name: 'PaymentPage',
    data() {
        return {
            token: ''
        }
    },
    // dio
    mounted() {
        axios.get('http://127.0.0.1:8000/api/orders/generate')
        .then((response) => {
            this.token = response
            console.log(response)
        });
    },
}
braintree.dropin.create({
  authorization: 'sandbox_g42y39zw_348pk9cgf3bgyw2b',
  selector: '#dropin-container'
});

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