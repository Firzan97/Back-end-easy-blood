<template
    ><div class="second-content">
        <b-container class="bv-example-row">
            <b-row>
                <b-col>
                    <div class="first-content-description">
                        <h3>Easy Blood</h3>
                        <p>
                            A Mobile Application that can help you to find blood
                            request and blood donor
                        </p>
                    </div></b-col
                >
                <b-col>
                    <div><img :src="'storage/images/logo.png'" /></div
                ></b-col>
            </b-row>
        </b-container>
    </div>
</template>

<script>
export default {};
</script>

<style scoped>
img {
    margin: 30px;
    height: 300px;
    transition: 1.5s all;
}

img:hover {
    transform: scale(1.1);
}
/* .first-content {
    display: grid;
    grid-template-columns: 50% 40%;
    grid-template-rows: 800px;
} */
.first-content-description {
    height: 300px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.second-content {
    height: 500px;

    background: rgb(254, 1, 1);
    background: linear-gradient(
        90deg,
        rgba(254, 1, 1, 1) 0%,
        rgba(226, 150, 150, 0.40940126050420167) 0%,
        rgba(255, 0, 0, 0.036852240896358524) 100%,
        rgba(231, 231, 231, 0) 100%
    );
    margin-bottom: 50px;
}
</style>
