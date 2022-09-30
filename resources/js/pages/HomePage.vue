<template>
    <div>
        <CarouselComponent />
        <div class="d-flex">
            <div style="border: 1px solid black; cursor: pointer" v-for="category in categories"  :key="category.id" @click="getFilteredCategory(category.id)">
            <!-- <div style="border: 1px solid black; cursor: pointer" v-for="category in categories"  :key="category.id"> -->

                <h6>{{ category.name }}</h6>
                <img class="w-15" :src="category.category_cover" :alt="category.name">
            </div>
        </div>

        <!-- <div v-if="filtered_category_user.lenght > 0">
            <div v-for="filtered_user in filtered_category_user" :key="filtered_user.id">
                <h6>{{ filtered_user.name }}</h6>
                
            </div>
        </div> -->
        
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
            categories: [],
            filtered_category_user: []
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
                this.filtered_category_user = response.data.results
            })
        },
        getFilteredCategory(id) {
            axios.get('/api/category/' + id)
            .then((response) => {
                this.filtered_category_user = response.data.results
                console.log(response.data)
                console.log(response.data.results)
            })

        }
        // categoryToSearch(id) {
        //     axios.get('/api/category/' + id)
        //     .then((response) => {
        //         this.
        //     })
        // },
        // showThisCategoryUser(name_category) {
            
        //     this.users.forEach(user => {

        //         user.categories.forEach(element => {

        //             if(element.name.includes(name_category) ) {
        //                 this.filtered_category_user.push(user)
        //             }

        //         });
        //     });      
        //     console.log(this.filtered_category_user)
        // }

    },
    mounted() {
        this.getUsers();
        this.getCategories();
    }
};
</script>

<style></style>
