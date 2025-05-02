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
    }
    // You can add more routes here later
];

const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes
});

export default router;