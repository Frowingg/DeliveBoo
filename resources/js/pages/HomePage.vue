<template>
    <div>
        <div class="carrousel_my">
            <div class="slider_my">
                <div class="slide-track_my">
                    <!-- v-on:click="isActive = !isActive" v-bind:class="{ active }" -->
                    <div
                        class="slide_my"
                        v-for="category in categories"
                        :key="category.id"
                        @click="getFilteredCategory(category.id)"
                    >
                        <a>
                            <img
                                :src="category.category_cover"
                                :alt="category.name"
                            />
                            <div class="layover"></div>
                            <div class="name-category">
                                <div>
                                    {{ category.name }}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <h2>DEBUG: Categorie selezionate: {{ list_of_categories }}</h2>
        <div class="contain">
            <div
                class="card"
                v-for="filteredUser in filtered_category_user"
                :key="filteredUser.id"
            >
                <router-link
                    :to="{
                        name: 'single-user',
                        params: { slug: filteredUser.user.slug },
                    }"
                >
                    <div class="card-layover"></div>
                    <div class="card-info">
                        <div class="card-title">
                            {{ filteredUser.user.name }}
                        </div>
                        <div class="card-address">
                            {{ filteredUser.user.address }}
                        </div>
                        <span
                            v-for="(categoryInfo, index) in filteredUser"
                            :key="index"
                        >
                            <ul class="card-categories">
                                <li
                                    v-for="(
                                        categoryName, index
                                    ) in categoryInfo.categories"
                                    :key="index"
                                >
                                    {{ categoryName["name"] }}
                                </li>
                            </ul>
                        </span>
                    </div>
                </router-link>
            </div>
        </div>
    </div>    
</template>

<script>
export default {
name: "HomePage",
data() {
    return {
        categories: [],
        filtered_category_user: [],
        list_of_categories: [],
    };

},

methods: {

    // prendo tutte le categorie

    getCategories() {
        axios.get("/api/categories").then((response) => {
            this.categories = response.data.results;
        });
    },

    // filtaggio categorie

    getFilteredCategory(id) {
        //Aggiungo subito la categoria cliccata...
        if (!this.list_of_categories.includes(id)) {
            this.list_of_categories.push(id);
        } else {
            //... se già presente la rimuovo
            this.list_of_categories.splice(
                this.list_of_categories.indexOf(id),
                1
            );
        }
        let help_list_of_user = [];
        axios.get("/api/category/" + id).then((response) => {
            let data = response.data.results;
            //variabili d'aiuto
            let devoFiltrarelLUtente = true;
            //Per ogni utente...
            for (let i = 0; i < data.length; i++) {
                devoFiltrarelLUtente = true;
                const currentUser = data[i];
                //const currentUserCategory = currentUser.pivot.category_id;
                const currentUserCategories = [];
                //Recupero l'elenco delle categorie dell'utente attuale
                currentUser.categories.forEach((category) => {
                    currentUserCategories.push(category.id);
                });
                //controllo che le categorie per cui è applicato un filtro siano tutte presenti delle categorie dell'utente
                for (let i = 0; i < this.list_of_categories.length; i++) {
                    if (!currentUserCategories.includes(this.list_of_categories[i])){
                        //Se non trovo una categoria tra quelle filtrate, mi segno che questo utente non lo devo aggiungere tra quelli filtrati
                        devoFiltrarelLUtente = false;
                        break;
                    }
                }
                if (devoFiltrarelLUtente) {
                    //DA MIGLIORARE
                    //uso un array di appoggio per evitare dei flash in pagina quando aggiorno l'array
                    help_list_of_user.push({ user: currentUser });
                }
                this.filtered_category_user = help_list_of_user;
                //this.list_of_categories.push(currentUserCategories);
                // if (
                //     //!this.list_of_categories.includes(currentUserCategory)
                //     //Se nella attuale lista delle categorie filtrate non sono presenti le categorie dell'utente...
                //     !this.list_of_categories.includes(currentUserCategories)
                // ) {
                //     //...aggiungo all'oggetto dell'utente l'id della categoria per recuperarlo più facilmente dopo...
                //     data.forEach((element) => {
                //         const userWithCategoryId = {
                //             user: element,
                //             category_id: currentUserCategory,
                //         };
                //         //... e lo pusho nell'array degli utenti filtrati
                //         this.filtered_category_user.push(
                //             userWithCategoryId
                //         );
                //     });
                //     //pusho nel'array delle categorie filtrate quella dell'utente
                //     this.list_of_categories.push(currentUserCategory);
                //     break;
                // } else {
                //     //RIMOZIONE UTENTE DA QUELLI FILTRATI
                //     //mi creo un indice che mi serve dopo per lo splice
                //     let index = 0;
                //     //ciclo la lista degli utenti filtrati per tutta la sua lunghezza
                //     for (
                //         let i = 0;
                //         i < this.filtered_category_user.length;
                //         i++
                //     ) {
                //         let currentElem = this.filtered_category_user[i];
                //         // se trovo un utente con l'id della categoria selezionata al click della categoria...
                //         if (currentElem.category_id === id) {
                //             //... mi salvo l'indice che corrisponde alla sua posizione nell'array, e fermo il ciclo con un break
                //             index = i;
                //             break;
                //         }
                //     }
                //     //utilizzo l'indice per rimuoverer gli n utenti appartenenti alla categoria selezionata
                //     this.filtered_category_user.splice(index, data.length);
                //     //rimuovo l'id della categoria dall'array delle categorie, partendo dall'indice dell'id della categoria
                //     this.list_of_categories.splice(
                //         this.list_of_categories.indexOf(id),
                //         1
                //     );
                //     break;
                // }
            }
        });
    },
},

mounted() {

    this.getCategories();

},

};

</script>

<style scoped lang="scss">
@import "../components/sass/variable.scss";



// BUTTON CATEGORY

.carrousel_my {

    padding: 4rem 0;

    margin: 1.1rem 0;

    overflow-x: auto;

    width: 100%;

}

.responsive_my_sp {

    display: none;

}

.responsive_my_tb {

    display: none;

}



// Styling

.slide-track_my {

    margin-top: 0.5rem;

    padding: 2rem 0;

    overflow-x: auto;

    margin: 0 auto;

    width: 90%;

}



.slider_my {

    position: relative;

    display: flex;

    justify-content: center;

    box-sizing: border-box;

    width: 100%;



    .slide-track_my {

        display: flex;

        position: relative;

        margin: 0 1.2rem;

    }



    .slide_my {

        margin: 0 1rem;

        display: flex;

        align-items: center;

    }

    a {

        display: flex;

        position: relative;

        width: 220px;

        height: 110px;

        cursor: pointer;

    }

    img {

        width: 100%;

        border-radius: 20px;

        transition: all 0.5s;

    }

    .layover {

        background-color: black;

        border-radius: 20px;

        opacity: 30%;

        position: absolute;

        width: 100%;

        height: 100%;

        transition: all 0.5s;

    }

    .name-category {

        width: 100%;

        position: absolute;

        display: flex;

        align-self: center;

        color: white;

        font-weight: 500;

        font-size: 1.2rem;

        padding: 0 1.5rem;

        justify-content: center;

        transition: all 0.5s;

    }



    .slide_my:focus-visible {

        img {

            border-radius: 40px;

            // box-shadow: 10px 14px 10px rgba($color: #000000, $alpha: 0.2);

        }

        .layover {

            background-color: black;

            border-radius: 40px;

            opacity: 55%;

        }



        .name-category {

            font-weight: 700;

            letter-spacing: 2px;

        }

    }

}



// CARD RESTAURANT

.contain {
    width: 80%;
    margin: 0 auto;
    display: flex;
    flex-wrap: wrap;
}
.card {
    background-color: #ffba00;
    overflow: hidden;
    height: 220px;
    width: 400px;
    margin: 5px;
    display: flex;
    border-radius: 30px;
    transition: all 0.5s;
    position: relative;
    cursor: pointer;
    img {
        width: 100%;
        justify-self: center;
        align-self: center;
        position: absolute;
        transition: all 0.5s;
    }
}

.card-info {
    padding: 1rem 1.2rem;
    position: absolute;
    align-self: end;
    transition: all 0.5s;
    bottom: 10px;
    left: 15px;
}

.card-address {         
    color: white;
    margin: 0.5rem 0;
}
.card-categories {

    display: flex;

    list-style: none;

}

.card-categories li {
    padding: 0 0.6rem;
    color: white;
    font-size: 0.8rem;
    transition: all 0.5s;
}

.card-title {
    color: white;
    font-weight: 500;
    font-size: 1.4rem;
    margin-bottom: 0.3rem;
    transition: all 0.5s;
}

.card-layover {
    background-color: black;

    opacity: 25%;

    width: 100%;

    height: 100%;

    position: absolute;

    transition: all 0.5s;

}



.card-layover:hover {

    opacity: 40%;

}



.card:hover {

    border-radius: 40px;

    box-shadow: 10px 14px 10px rgba($color: #000000, $alpha: 0.2);

    .card-title {

        font-size: 2rem;

        font-weight: 700;

        margin-bottom: 0.5rem;

        letter-spacing: 1px;

        color: white;

    }

    .card-categories {

        li {

            background-color: #ffba00;

            font-size: 1rem;

            font-weight: 500;

            margin: 0.3rem;

            border-radius: 15px;

            padding: 0.3rem 0.7rem;

            color: white;

        }

    }

    img {

        width: 120%;

    }

}

</style>