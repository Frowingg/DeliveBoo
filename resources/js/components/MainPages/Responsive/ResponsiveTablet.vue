<template>
    <!--eslint-disable-line no-mixed-spaces-and-tabs-->
    <div>
        <div class="store_my">
            <a href="#">I Migliori</a>
        </div>
        <div class="container_my">
            <div
                class="responsive_layout_my"
                v-for="(item, index) in items"
                :key="index"
            >
                <a href="#">
                    <img :src="item.url" alt="" />
                </a>
            </div>
        </div>
    </div>
</template>
/* eslint-disable */
<script>
export default {
    name: "ResponsiveTablet",
    data() {
        return {
            items: [
                {
                    url: "https://www.buttalapasta.it/wp-content/uploads/2017/11/pizza-margherita.jpg",
                },
                {
                    url: "https://www.buttalapasta.it/wp-content/uploads/2017/11/pizza-margherita.jpg",
                },
                {
                    url: "https://www.buttalapasta.it/wp-content/uploads/2017/11/pizza-margherita.jpg",
                },
                {
                    url: "https://www.buttalapasta.it/wp-content/uploads/2017/11/pizza-margherita.jpg",
                },
                {
                    url: "https://www.buttalapasta.it/wp-content/uploads/2017/11/pizza-margherita.jpg",
                },
                {
                    url: "https://www.buttalapasta.it/wp-content/uploads/2017/11/pizza-margherita.jpg",
                },
                {
                    url: "https://www.buttalapasta.it/wp-content/uploads/2017/11/pizza-margherita.jpg",
                },
                {
                    url: "https://www.buttalapasta.it/wp-content/uploads/2017/11/pizza-margherita.jpg",
                },
                {
                    url: "https://www.buttalapasta.it/wp-content/uploads/2017/11/pizza-margherita.jpg",
                },
            ],
        };
    },
};
</script>
/* eslint-disable */

<style scoped lang="scss">
@import "../../sass/variable.scss";
.container_my {
    display: flex;
    flex-wrap: wrap;
}
.responsive_layout_my {
    width: calc(100% / 3 - 10px);
    margin-top: 20px;
    margin-left: 10px;
    img {
        border: 1px solid;
        border-radius: 20px;
    }
}
.store_my {
    font-size: 30px;
    color: $secondarycolor;
    text-align: center;
}
</style>
