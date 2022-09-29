<template>
    <div class="contain">

        <h2>Collabora con <span class="name-logo">DeliveBoo</span></h2>

        <div class="job-contain">
            <div class="job-card restaurant">
                <div class="job-text">
                    <h3>Ristoratori</h3>
                    <p>Lorem ipsum testo testo testo bububaba babacici</p>
                    <a class="btn-mine" href="">Scopri di più</a>
                </div>
            </div>

            <div class="job-card rider">
                <div class="job-text">
                    <h3>Rider</h3>
                    <p>Lorem ipsum testo testo testo bububaba babacici</p>
                    <a class="btn-mine" href="">Scopri di più</a>
                </div>
            </div>

            <div class="job-card partner">
                <div class="job-text">
                    <h3>Diventa Partner</h3>
                    <p>Lorem ipsum testo testo testo bububaba babacici</p>
                    <a class="btn-mine" href="">Scopri di più</a>
                </div>
            </div>

            <div class="job-card-promo">
                <div class="promo-text">Regala una Gift Card da utilizzare in qualsiasi momento!</div>
                <img src="../img/work/gift-card-white.png" alt="text">
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: 'WorkWithUs',
    
    // props: {
    //     headerLinks: Array,
    // }
}

</script>

<style lang="scss" scoped>
// @import '../assets/style/common.scss';

.contain{
    width: 80%;
    margin: 0 auto;
}

h2{
    color: #fbba00;
    text-align: center;
    margin-top: 3rem;
    font-weight: 400;
    font-size: 3rem
}

.name-logo{
    font-family: 'Pacifico', cursive;
    font-size: 3.5rem;
}

// CARDS
.job-contain{
    width: 75%;
    margin: 0 auto;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.job-card{
    background-color: black;
    width: 500px;
    height: 500px;
    margin: 2rem;
    border-radius: 60px;
    box-sizing: border-box;
    overflow: hidden;
    display: flex;
    background-position: center;
    position: relative;
    padding: 2.3rem;
}

.job-text{
    display: flex;
    flex-direction: column;
    align-self: end;
    h3{
        font-size: 2.5rem;
        line-height: 0.5rem;
        color: white;
    }
    p{
        color: white;
        font-size: 1.5rem;
    }
}

.btn-mine{
    align-self: end;
    text-decoration: none;
    color: white;
    padding: 0.5rem 1.3rem;
    font-weight: 700;
    background-color: #fbba00;
    border-radius: 25px;
    width: 25%;
    text-align: center;
}

// .job-card:before {
//   content: "";
//   position: absolute;
//   left: 0; right: 0;
//   top: 0; bottom: 0;
//   background: rgba(0,0,0,.5);
// }

.restaurant{
     background-image: url("../img/work/ristorante.jpeg");
}

.rider{
     background-image: url("../img/work/rider.jpeg");
}

.partner{
     background-image: url("../img/work/partner.jpg");
}

.job-card img{
    height: 100%;
    object-fit: cover;
    margin: 0 auto;
    opacity: 70%;
}

.layover{
    width: 100%;
    height: 100%;
    background-color: black;

}

.job-card-promo{
    background-color: #fbba00;
    width: 500px;
    height: 500px;
    margin: 2rem;
    border-radius: 60px;
    box-sizing: border-box;
    display: flex;
    background-color: #fbba00;
    padding: 2.3rem;
    display: flex;
    img{
        height: 70%
    }
}

.promo-text{
    color: white;
    font-weight: 700;
    font-size: 3rem;
}

</style>