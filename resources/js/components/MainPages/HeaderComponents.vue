<template>
    <div>
        <div class="container_my">
            <div class="header_top_my">
                <div class="logo_my">
                    <a href="#">DeliveBoo</a>
                </div>

                <div class="interface_my">
                    <div class="login_my">
                        <a href="/login">Login</a>
                    </div>
                    <div class="registration_my">
                        <a href="/admin">Registrati</a>
                    </div>
                </div>
            </div>
            <!--jumbotrone-->
            <div class="jumbotrone_my">
                <div class="search_bar_my">
                    <h3>A fame come siamo messi?</h3>
                    <div class="message_my">
                        Ordina i piatti che ami con DeliveBoo
                    </div>
                    <div class="input-group_my">
                        <input
                            type="search"
                            class="search"
                            placeholder="Cerca il ristorante che preferisci"
                            aria-label="Search"
                            aria-describedby="search-addon"
                        />
                        <a href="#" class="button_search_my">CERCA</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
// import { defineComponent } from '@vue/composition-api'

export default {
    name: "HeaderComponents",

    // props: {
    //     headerLinks: Array,
    // }
};
</script>

<style scoped lang="scss">
@import "../sass/variable.scss";
@import url("https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;700&family=Pacifico&display=swap");

.container_my {
    background-image: url("../img/jumbotron/jumbotron-deliveboo-wide.jpg");
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

.header_top_my {
    display: flex;
    justify-content: space-between;
    align-items: center;

    padding-top: 20px;
    padding-left: 40px;
    padding-right: 40px;
    background-color: white;
}
.interface_my {
    display: flex;
    align-items: center;
    .login_my {
        margin-right: 20px;
        color: $secondarycolor;
    }
    .registration_my {
        color: $maincolor;
    }
}
.logo_my {
    color: $maincolor;
    font-family: "Pacifico", cursive;
    font-size: 20px;
}

/*jumbotrone********/
.jumbotrone_my {
    padding-top: 80px;
    width: 100%;
    height: 400px;
    display: flex;
    justify-content: center;
    position: relative;

    .search_bar_my {
        background-color: white;
        width: 25%;
        padding: 28px;
        border: 1px solid white;
        border-radius: 15px;
        box-shadow: 10px 10px 10px $primarycolor;
        position: absolute;
        bottom: -40px;
        h3 {
            text-align: center;
            color: #fe7f08;
            margin-bottom: 5px;
        }
        .message_my {
            color: $secondarycolor;
            text-align: center;
            font-size: 10px;
            margin-bottom: 5px;
        }
        .input-group_my {
            border: 1px solid $secondarycolor;
            border-radius: 20px;
            display: flex;
            align-items: center;
            padding: 5px 8px;
        }
        input {
            border: none;
            width: 80%;
            outline: none;
        }

        .button_search_my {
            color: white;
            background-color: #fe7f08;
            border: 1px solid #fe7f08;
            border-radius: 15px;
            font-size: 10px;
            padding: 6px 15px;
        }
    }
}
@media screen and (max-width: 920px) {
    .search_bar_my {
        width: 10%;
    }
    .jumbotrone_my {
        display: none;
    }
    .container_my {
        background-image: url("../img/jumbotron/jumbotron-deliveboo-wide.jpg");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        height: 500px;
    }
}
</style>
