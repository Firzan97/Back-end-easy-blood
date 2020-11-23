<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-dark bg-danger shadow-sm">
            <div class="container">
                <router-link class="navbar-brand" to="/">
                    Easy Blood
                </router-link>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div
                    class="collapse navbar-collapse"
                    id="navbarSupportedContent"
                >
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <router-link class="nav-link" to="/Event"
                                >Event</router-link
                            >
                        </li>

                        <li class="nav-item">
                            <router-link class="nav-link" to="/Request"
                                >Find Request
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" to="/About"
                                >About
                            </router-link>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link" href="#">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>
                        <!-- @else -->
                        <!-- <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest -->
                    </ul>
                </div>
            </div>
        </nav>

        <v-main>
            <router-view></router-view>
        </v-main>
    </div>
</template>

<script>
import axios from "axios";
import EventTable from "./EventTable";
import RequestTable from "./RequestTable";
import UserTable from "./UserTable";
import Navbar from "./Navbar";
export default {
    components: {
        EventTable,
        RequestTable,
        UserTable,
        Navbar
    },
    mounted() {
        console.log("Component mounted.");
    }
};
</script>

<style scoped>
.navbar {
    box-shadow: 2px 3px 5px black !important;
}
</style>
