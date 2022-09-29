<template>
    <div class="footer">
        <div class="contain top">

            <div class="foot-logo">
                DeliveBoo
            </div>
            
            <div class="foot-links">

                <ul class="discovery">

                    <h4>
                        Scopri DeliveBoo
                    </h4>

                    <li>
                        <a href="">
                            link
                        </a>
                    </li>

                    <li>
                        <a href="">
                            link
                        </a>
                    </li>

                    <li>
                        <a href="">
                            link
                        </a>
                    </li>

                    <li>
                        <a href="">
                            link
                        </a>
                    </li>

                    <li>
                        <a href="">
                            link
                        </a>
                    </li>

                    <li>
                        <a href="">
                            link
                        </a>
                    </li>

                </ul>

                <ul class="discovery">

                    <h4>
                        Scopri DeliveBoo
                    </h4>

                    <li>
                        <a href="">
                            link
                        </a>
                    </li>

                    <li>
                        <a href="">
                            link
                        </a>
                    </li>

                    <li>
                        <a href="">
                            link
                        </a>
                    </li>

                    <li>
                        <a href="">
                            link
                        </a>
                    </li>

                    <li>
                        <a href="">
                            link
                        </a>
                    </li>

                    <li>
                        <a href="">
                            link
                        </a>
                    </li>

                </ul>

                <ul class="discovery">

                    <h4>
                        Scopri DeliveBoo
                    </h4>

                    <li>
                        <a href="">
                            link
                        </a>
                    </li>

                    <li>
                        <a href="">
                            link
                        </a>
                    </li>

                    <li>
                        <a href="">
                            link
                        </a>
                    </li>

                    <li>
                        <a href="">
                            link
                        </a>
                    </li>

                    <li>
                        <a href="">
                            link
                        </a>
                    </li>

                    <li>
                        <a href="">
                            link
                        </a>
                    </li>

                </ul>

            </div>

        </div>

        <hr>

        <div class="contain">
            
            <div class="foot-credit">               

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

.footer{
    background-color: #9d9d9c;
    padding: 3rem 0;
    margin-top: 6rem;
}

.contain{
    width: 70%;
    margin: 0 auto;
}

.top{
    margin-bottom: 2rem;
}

.foot-links{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.foot-logo{
    font-family: 'Pacifico', cursive;
    font-size: 2.5rem;
    color: white;
}

ul{
    list-style:none;
    background-color: #d0d0d0;
    padding: 2.3rem 3.6rem;
}

li a{
    text-decoration: none;
    color: inherit;
}

</style>