<template>
    <div class="container">
        <div v-for="dish, index in dishes" :key="index" class="mt-5">
            <div v-if="dish.user_id === user.id">
                {{dish}}
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
            dishes: []
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
    },
};
</script>

<style>

</style>
