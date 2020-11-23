<template>
    <div>
        <v-app>
            <Menu />
            <FirstContent />
            <SecondContent />

            <Footer />
        </v-app>
    </div>
</template>

<script>
import Menu from "../components/Menu";
import FirstContent from "../components/FirstContent";
import SecondContent from "../components/SecondContent";
import Footer from "../components/Footer";
export default {
    components: {
        Menu,
        FirstContent,
        Footer,
        SecondContent
    }
};
</script>

<style scoped>
.menu {
    height: 400px;
    background: rgb(255, 0, 0);
    background: linear-gradient(
        90deg,
        rgba(255, 0, 0, 0.7483368347338936) 4%,
        rgba(207, 44, 44, 0.5998774509803921) 100%,
        rgba(255, 0, 0, 0.23012955182072825) 100%
    );
}
.menu-text {
    height: 300px;
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.menu-text h1 {
    font-weight: 900;
}
.buttonMenu button {
    margin: 10px;
    box-shadow: 5px 10px 8px black;
}
</style>
