import Vue from "vue";
import VueRouter from "vue-router";
import Event from "../views/Event.vue"


const routes = [{
        path: '/Event',
        name: "Event",
        component: Event,
        meta: {
            title: 'Event',

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