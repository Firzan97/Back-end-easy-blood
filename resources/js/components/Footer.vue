<template
    ><div>
        <div class="footer">
            <div class="footer-box">
                <h3>EASY BLOOD</h3>
                <h3>Download App and Start to Save Life</h3>
                <p>
                    We need you to save other people life. One donation
                    equivalent to saving 3 lives
                </p>
                <div class="download">
                    <div>
                        <b-img
                            src="storage/images/playstore.png"
                            fluid
                            alt="Responsive image"
                        ></b-img>
                    </div>
                    <p class="download-now">Download Now</p>
                </div>
            </div>
        </div>
        <v-footer dark padless>
            <v-card flat tile class="red lighten-1 white--text text-center">
                <v-card-text>
                    <v-btn
                        v-for="icon in icons"
                        :key="icon"
                        class="mx-4 white--text"
                        icon
                    >
                        <v-icon size="24px">
                            {{ icon }}
                        </v-icon>
                    </v-btn>
                </v-card-text>

                <v-card-text class="white--text pt-0">
                    Phasellus feugiat arcu sapien, et iaculis ipsum elementum
                    sit amet. Mauris cursus commodo interdum. Praesent ut risus
                    eget metus luctus accumsan id ultrices nunc. Sed at orci sed
                    massa consectetur dignissim a sit amet dui. Duis commodo
                    vitae velit et faucibus. Morbi vehicula lacinia malesuada.
                    Nulla placerat augue vel ipsum ultrices, cursus iaculis dui
                    sollicitudin. Vestibulum eu ipsum vel diam elementum tempor
                    vel ut orci. Orci varius natoque penatibus et magnis dis
                    parturient montes, nascetur ridiculus mus.
                </v-card-text>

                <v-divider></v-divider>

                <v-card-text class="white--text">
                    {{ new Date().getFullYear() }} —
                    <strong>EASY BLOOD</strong>
                </v-card-text>
            </v-card>
        </v-footer>
    </div>
</template>

<script>
export default {
    data: () => ({
        icons: ["mdi-facebook", "mdi-twitter", "mdi-linkedin", "mdi-instagram"]
    })
};
</script>

<style scoped>
.footer {
    height: 50vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.footer-box {
    box-shadow: 2px 8px 8px black;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 50%;
    border-radius: 10px;
    height: 60%;
    background: rgb(255, 0, 0);
    background: linear-gradient(
        90deg,
        rgba(255, 0, 0, 0.7483368347338936) 4%,
        rgba(207, 44, 44, 0.5998774509803921) 100%,
        rgba(255, 0, 0, 0.23012955182072825) 100%
    );
}
.download {
    border-radius: 5px;
    height: 30%;
    width: 30%;
    color: white;
    background-color: black;
    display: grid;
    grid-template-columns: 100px 150px;
    justify-content: center;
}
.download img {
    margin: 4px;
    padding-left: 10px;

    align-self: center;
}

.download-now {
    padding-top: 10px;
    padding-left: 20px;

    align-self: center;
}

.google-playstore {
    padding-top: 10px;
    padding-left: 10px;

    align-self: center;
}

@media screen and (max-width: 480px) {
    .download img {
        height: 80px;
    }
}
</style>
