<template>
    <div>
        <CarouselComponent />
    </div>
</template>

<script>
import CarouselComponent from "../components/MainPages/Section/CarouselComponent.vue";

export default {
    name: "HomePage",
    components: { 
        CarouselComponent 
    },
    data() {
        return {
            users: []
        }
    },
    methods: {
        getUser() {
            Axios.get('/api/users')
            .then((response) => {
                this.users = response.data.results
            })
        }
    },
    mounted() {
        this.getUsers();
    }
};
</script>

<style></style>
