<template>
    <div>
        <CarouselComponent />
        <div class="d-flex">
            <div style="border: 1px solid black; cursor: pointer"  v-for="category in categories"  :key="category.id" @click="getFilteredCategory(category.id)" >
                <h6>{{ category.name }}</h6>
                <img class="w-15" :src="category.category_cover" :alt="category.name" />
            </div>
        </div>

        <div style="border-top: 1px solid blue;" v-for="filteredUser in filtered_category_user" :key="filteredUser.id">
            <h5>{{ filteredUser.user.name }}</h5>
            <p>{{ filteredUser.user.address }}</p>
            <router-link :to="{name: 'single-user', params:{slug: filteredUser.user.slug} }" class="btn btn-primary" >
                Vedi ristorante    
            </router-link>        
        </div>

        <!-- <div v-if="this.filtered_category_user.length === 0" class="mt-5">
            <h3>Tutti i ristoranti:</h3>
            <div style="border-top: 1px solid red;" v-for="user in users" :key="user.id">
                <h5>{{ user.name }}</h5>
                <p>{{ user.address }}</p>
            </div>
        </div> -->   
    </div>
        
</template>

<script>
import CarouselComponent from "../components/MainPages/Section/CarouselComponent.vue";

export default {
    name: "HomePage",
    components: {
        CarouselComponent,
    },
    props: {
        search: String,
    },
    data() {
        return {
            users: [],
            categories: [],
            filtered_category_user: [],
            list_of_categories: [],
        };
        
    },
    methods: {
        getUsers() {
            axios.get("/api/users").then((response) => {
                this.users = response.data.current_user;
                console.log(this.users);
            });
        //     if(word === '') {
        //         axios.get('/api/users')
        //         .then((response) => {
        //             this.users = response.data.results
        //         })
        //     } else {
        //         axios.get('/api/users/word')
        //         .then((response) => {
        //             this.users = response.data.results
        //         })
        //     }
        },
        getCategories() {
            axios.get("/api/categories").then((response) => {
                this.categories = response.data.results;
            });
        },
        getFilteredCategory(id) {
            axios.get("/api/category/" + id).then((response) => {
                let data = response.data.results;

                for (let i = 0; i < data.length; i++) {
                    const currentUser = data[i];
                    const currentUserCategory = currentUser.pivot.category_id;

                    if (!this.list_of_categories.includes(currentUserCategory)){
                        data.forEach((element) => {
                            const userWithCategoryId = {
                                user: element,
                                category_id: currentUserCategory,
                            };
                            this.filtered_category_user.push(
                                userWithCategoryId
                            );
                        });
                        this.list_of_categories.push(currentUserCategory);
                        break;
                    } else {
                        let index = 0;
                        for (let i = 0; i < this.filtered_category_user.length; i++) {
                            let currentElem = this.filtered_category_user[i];
                            if (currentElem.category_id === id) {
                                index = i;
                                break;
                            }
                        }
                        this.filtered_category_user.splice(index, data.length);
                        this.list_of_categories.splice( this.list_of_categories.indexOf(id), 1 );
                        break;     
                    }
                }
            });
        }
        // getUserToSearch(word) {
        //     this.users.forEach(singleUser => {
        //         if(singleUser.name.includes(word)) {

        //             this.filtered_users.push(singleUser)

        //         }
        //     });
        // }
    },
    mounted() {
        this.getUsers();
        this.getCategories();
        // this.getUserToSearch(search);
    },
};
</script>

<style></style>
