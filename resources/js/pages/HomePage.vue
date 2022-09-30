<template>
    <div>
        <CarouselComponent />
        <div class="d-flex">
            <div style="border: 1px solid black; cursor: pointer" v-for="category in categories"  :key="category.id" @click="getFilteredCategory(category.id)">
                <h6>{{ category.name }}</h6>
                <img class="w-15" :src="category.category_cover" :alt="category.name">
            </div>
        </div>

        <div style="backgroud-color: red" v-for="filteredUser, index in filtered_users" :key="index">
            <h5>{{ filteredUser.name }}</h5>
            <p>{{ filteredUser.address }}</p>
        </div>

        
        <div v-for="filteredUser, index in filtered_category_user" :key="index">
            <h5>{{ filteredUser.name }}</h5>
            <p>{{ filteredUser.address }}</p>
        </div>
        
        <div v-for="user in users" :key="user.id">
            <h5>{{ user.name }}</h5>
            <p>{{ user.address }}</p>
        </div>

    </div>
</template>

<script>
import CarouselComponent from "../components/MainPages/Section/CarouselComponent.vue";

export default {
    name: "HomePage",
    components: { 
        CarouselComponent 
    },
    props: {
        'search': String
    },
    data() {
        return {
            users: [],
            categories: [],
            filtered_category_user: [],
            filtered_users: []
            // myWord: ''
        }
    },
    methods: {
        getUsers(word) {
            axios.get('/api/users')
                .then((response) => {
                    this.users = response.data.results   
                })
            // if(word === '') {
            //     axios.get('/api/users')
            //     .then((response) => {
            //         this.users = response.data.results   
            //     })
            // } else {
            //     axios.get('/api/users/word')
            //     .then((response) => {
            //         this.users = response.data.results 
            //     })
            // }
        },
        getCategories() {
            axios.get('/api/categories')
            .then((response) => {
                this.categories = response.data.results
            })
        },
        getFilteredCategory(id) {
            axios.get('/api/category/' + id)
            .then((response) => {
                this.filtered_category_user = response.data.results
            })
        },
        getUserToSearch(word) {
            this.users.forEach(singleUser => {                
                if(singleUser.name.includes(word)) {
                    
                    this.filtered_users.push(singleUser)
                    
                }
            });
        }        
    },
    mounted() {
        // if(search !== null) {
        //     this.myWord = search
        // };
        this.getUsers();
        this.getCategories();
              
    },
    // computed: {
    //    getUserToSearch(this.search);
    // }
};
</script>

<style></style>
