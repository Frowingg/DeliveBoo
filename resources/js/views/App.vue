<template>
    <div>
        <HeaderComponents />
        <router-view></router-view>
        <WorkWithUs />
        <FooterCompo />
    </div>
</template>

<script>
import HeaderComponents from "../components/MainPages/HeaderComponents.vue";
import FooterCompo from "../components/MainPages/FooterCompo.vue";
import WorkWithUs from "../components/MainPages/WorkWithUs.vue";

export default {
    name: "App",
    components: {
        HeaderComponents,
        FooterCompo,
        WorkWithUs,
    },
    methods: {
        saveSearchWord(wordToSearch) {
            this.searchWord = wordToSearch;
        },
    },
    data() {
        return {
            searchWord: "",
        };
    },
    computed: {
        userLogged() {
            return window.userLogged;
        },
    },
};
</script>

<style lang="scss">
@import url("https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;700&family=Pacifico&display=swap");

#app {
    font-family: "IBM Plex Sans", sans-serif;
}

@import url("https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;700&family=Pacifico&display=swap");
body {
    font-family: "IBM Plex Sans", sans-serif;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    img {
        width: 100%;
    }
    a {
        text-decoration: none;
        color: inherit;
    }
}

.carrousel_my {
    margin-top: 150px;
    display: flex;
    justify-content: center;
    overflow: hidden;
}
.responsive_my_sp {
    display: none;
}
.responsive_my_tb {
    display: none;
}
@media screen and (max-width: 920px) {
    .carrousel_my {
        display: none;
    }
    .responsive_my_tb {
        display: block;
    }
}
@media screen and (max-width: 620px) {
    .responsive_my_tb {
        display: none;
    }
    .carrousel_my {
        display: none;
    }
    .responsive_my_sp {
        display: block;
    }
}
</style>
