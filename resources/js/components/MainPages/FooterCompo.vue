<template>
    <div class="footer">
        <div class="container top">

            <div class="foot-logo">
                DeliveBoo
            </div>
            
            <div class="foot-links">

                <ul class="discovery">

                    <h4>
                        Scopri DeliveBoo
                    </h4>

                    <li>
                        <a href="#">
                            Chi Siamo?
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            Lavora Con Noi
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            Contattaci
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            Collabora con noi
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            Investitori
                        </a>
                    </li>


                </ul>

                <ul class="discovery">

                    <h4>
                        Recapiti
                    </h4>

                    <li>
                        P.Iva: 23100948372
                    </li>

                    <li>
                        
                        tel: 39+ 43452414
                        
                    </li>

                    <li>
                        email: Deliveboo@mail.com
                    </li>

                </ul>

                <ul class="discovery">

                    <h4>
                        Scarica l'App
                    </h4>

                    <li>
                        <a href="#">
                            link
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            link
                        </a>
                    </li>


                </ul>

            </div>

        </div>

        <hr>
            <div class="container_my">
                <div class="copyright_my">
                    Legal for Digital  © Copyright 2022 by Deliveboo
                </div>
                <div class="contain">
                    
                    <div class="foot-credit">               
                        <img src="../img/work/instagram.png" alt="social">
                    </div>
                      <div class="foot-credit">               
                        <img src="../img/work/facebook.png" alt="social">
                    </div>
                    <div class="foot-credit">               
                        <img src="../img/work/tumblr.png" alt="social">
                    </div>
                    <div class="foot-credit">               
                        <img src="../img/work/twitter.png" alt="social">
                    </div>
                </div>
            </div>
    </div>
</template>

<script>
export default {
    name: 'FooterCompo',
    
    // props: {
    //     headerLinks: Array,
    // }
}

</script>

<style lang="scss" scoped>
// @import '../assets/style/common.scss';
img{
    width: 100%;
}
.footer{
    background-color: #d0d0d0;
    padding: 1rem 0;
    margin-top: 20px;
}
.discovery{
    margin-top: 15px;
    h4{
        color: white;
        margin-bottom: 20px;
    }
    li{
        margin-bottom: 10px;
        color: white;
    }
}
.contain{
    display: flex;
    margin-right: 40px;
}

.top{
    margin-bottom: 2rem;
}

.foot-links{
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

.foot-logo{
    font-family: 'Pacifico', cursive;
    font-size: 2.5rem;
    color: white;
}

ul{
    list-style:none;
    background-color: #9d9d9c;
    padding: 2.3rem 3.6rem;
    margin-left: 20px;
}

li a{
    text-decoration: none;
    color: inherit;
}
.foot-credit{
    width: 30px;
    margin-left: 20px;
}
.container_my{
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-evenly;
}
.copyright_my{
    margin-left: 40px;
}
@media screen and (max-width: 720px) {
    .foot-credit{
        width: 20px;
        margin-left: 20px;
    }
}
</style>