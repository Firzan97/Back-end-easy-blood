<template>
    <div>
        <div class="menu">
            <div class="menu-text">
                <h1>EASY BLOOD</h1>
                <p>Connecting Blood Donor With Requestors</p>
                <div class="buttonMenu">
                    <b-button variant="light">Download App</b-button>
                    <b-button variant="light">See Event</b-button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {};
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
    transition: all 0.5s;
}
.buttonMenu button:hover {
    box-shadow: 6px 11px 10px black;
    transform: scale(1.1);
}
</style>
