import Vue from "vue";
import VueRouter from "vue-router";
import Event from "../views/Event.vue";
import FindRequest from "../components/RequestTable.vue";
import About from "../components/UserTable.vue";
import Home from "../views/Home.vue";




const routes = [{
        path: '/Event',
        name: "Event",
        component: Event,
        meta: {
            title: 'Event',

        }
        //  { path: '*', component: NotFoundComponent }
    },
    {
        path: '/Request',
        name: "Request",
        component: FindRequest,
        meta: {
            title: 'Request',

        }
        //  { path: '*', component: NotFoundComponent }
    }, {
        path: '/About',
        name: "About",
        component: About,
        meta: {
            title: 'About',

        }
        //  { path: '*', component: NotFoundComponent }
    },
    {
        path: '/',
        name: "Home",
        component: Home,
        meta: {
            title: 'Home',

        }
        //  { path: '*', component: NotFoundComponent }
    }
]
const router = new VueRouter({
    // short for `routes: routes`,
    mode: 'history',
    base: "/",
    routes,
})
router.beforeEach((to, from, next) => {
    document.title = to.meta.title
    next()
})
router.replace("/")

export default router;