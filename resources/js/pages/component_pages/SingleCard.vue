<template>
    <div class="contain">

        <a class="card">
            <img src="https://recipesblob.oetker.com/files/1477b95c4c434225a977caedefd4f5ea/43df75bae33b4c71a9e66072f96b6f0f/1272x764/kebabjpg.jpg" alt="">
            <div class="card-layover"></div>
            <div class="card-info">
                <div class="card-title">[ Nome Ristorante]</div>
                <ul class="card-categories">
                    <li>
                        Categoria
                    </li>

                    <li>
                        Categoria
                    </li>

                </ul>
            </div>
        </a>

    </div>
</template>

<script>
export default {
    name: 'SingleCard',
}

</script>

<style lang="scss" scoped>

.contain{
    width: 80%;
    margin: 0 auto;
}

.card{
    background-color: #ffba00;
    overflow: hidden;
    height: 220px;
    width: 400px;
    display: flex;
    border-radius: 30px;
    position: relative;
    margin-bottom: 20px;
    cursor: pointer;
    img{
        width: 100%;
        justify-self: center;
        align-self: center;
        position: absolute;
    }
}

.card-info{
    padding: 1rem 1.2rem;
    position: absolute;
    align-self: end;
}

.card-categories{
    display: flex;
    list-style: none;
}

.card-categories li{
    padding: 0 0.6rem;
    color: white;
    font-size: 0.8rem;
}

.card-title{
    color: white;
    font-weight: 500;
    font-size: 1.4rem;
    margin-bottom: 0.3rem;
}

.card-layover{
    background-color: black;
    opacity: 25%;
    width: 100%;
    height: 100%;
    position: absolute;
}

.card-layover:hover{
    opacity: 35%;
}

</style>