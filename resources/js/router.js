import Vue from 'vue';
import VueRouter from 'vue-router';
import HomePage from './pages/HomePage.vue';
import SingleUser from './pages/SingleUser.vue';
import ProductCart from './pages/ProductCart.vue';
import NotFound from './pages/NotFound.vue';


Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomePage
        },
        {
            path: '/:slug',
            name: 'single-user',
            component: SingleUser
        },
        {
            path: '/:slug/product-cart',
            name: 'product-cart',
            component: ProductCart
        },
        {
            path: '/*',
            name: 'not-found',
            component: NotFound
        }
    ]
});

export default router;
