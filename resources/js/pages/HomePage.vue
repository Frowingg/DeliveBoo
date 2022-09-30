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
            users: [],
            categories: []
        }
    },
    methods: {
        getUsers() {
            axios.get('/api/users')
            .then((response) => {
                this.users = response.data.results
            })
        },
        getCategories() {
            axios.get('/api/categories')
            .then((response) => {
                this.categories = response.data.results
            })
        }
    },
    mounted() {
        this.getUsers();
        this.getCategories();
    }
};
</script>

<style></style>
