<template>
    <v-carousel cycle height="auto">
        <v-carousel-item
            v-for="(item, i) in items"
            :key="i"
            :src="item.src"
            reverse-transition="fade-transition"
            transition="fade-transition"
        ></v-carousel-item>
    </v-carousel>
</template>

<script>
export default {
    data() {
        return {
            items: [
                {
                    src:
                        "https://img.republicworld.com/republic-prod/stories/promolarge/xxhdpi/m6ptdteowygve8pi_1590942101.jpeg?tr=w-812,h-464"
                },
                {
                    src:
                        "https://vistapointe.net/images/blood-donation-wallpaper-13.jpg"
                },
                {
                    src: "https://wallpapercave.com/wp/wp4323461.png"
                },
                {
                    src:
                        "https://www.griswoldhomecare.com/sub/49822/images/blood-donation.jpg"
                }
            ]
        };
    }
};
</script>

<style scoped></style>
