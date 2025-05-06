// resources/js/router/index.js
import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from '../pages/Home.vue';
import CreateAccount from '../pages/auth/CreateAccount.vue';
import OtpVerification from '../pages/auth/OtpVerification.vue';
import Welcome from '../pages/auth/Welcome.vue';
import Profile from '../pages/account/Profile.vue';
import Addresses from '../pages/account/Addresses.vue';
import Orders from '../pages/account/Orders.vue';
import OrderDetails from '../pages/account/OrderDetails.vue';
import Boxes from '../pages/shop/Boxes.vue';
import Occasion from '../pages/shop/Occasion.vue';
import Canope from '../pages/shop/canope.vue';
import New from '../pages/shop/new.vue';
import Wishlist from '../pages/chartandwhishlist/whislist.vue';
import BoxesDetails from '../pages/shop/BoxesDetails.vue';
import Chart from '../pages/chartandwhishlist/chart.vue';
import Payment from '../pages/chartandwhishlist/Paiment.vue';
import Contact from '../pages/Contact.vue';

Vue.use(VueRouter);

const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home
    },
    {
        path: '/register',
        name: 'CreateAccount',
        component: CreateAccount
    },
    {
        path: '/otp-verification',
        name: 'OtpVerification',
        component: OtpVerification
    },
    {
        path: '/welcome',
        name: 'Welcome',
        component: Welcome
    },
    {
        path: '/account/profile',
        name: 'Profile',
        component: Profile
    },
    {
        path: '/account/addresses',
        name: 'Addresses',
        component: Addresses
    },
    {
        path: '/account/orders',
        name: 'Orders',
        component: Orders
    },
    {
        path: '/account/orders/:id',
        name: 'OrderDetails',
        component: OrderDetails
    },
    {
        path: '/shop/boxes',
        name: 'Boxes',
        component: Boxes
    },
    {
        path: '/shop/occasions',
        name: 'Occasion',
        component: Occasion
    },
    {
        path: '/shop/canope',
        name: 'Canope',
        component: Canope
    },
    {
        path: '/shop/new',
        name: 'New',
        component: New
    },
    {
        path: '/wishlist',
        name: 'Wishlist',
        component: Wishlist
    },
    {
        path: '/shop/boxes/:id',
        name: 'BoxesDetails',
        component: BoxesDetails
    },
    {
        path: '/cart',
        name: 'Chart',
        component: Chart
    },
    {
        path: '/payment',
        name: 'Payment',
        component: Payment
    },
    {
        path: '/contact',
        name: 'Contact',
        component: Contact
    }
];

const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes
});

export default router;