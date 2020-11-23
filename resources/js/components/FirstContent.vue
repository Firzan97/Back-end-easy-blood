<template
    ><div>
        <b-container class="bv-example-row">
            <b-row>
                <b-col>
                    <div><img :src="'storage/images/mobile.svg'" /></div
                ></b-col>
                <b-col>
                    <div class="first-content-description">
                        <h3>Find Blood Donors in Your Area</h3>
                        <p>
                            sbhasiahsahsiuahsuhausiahisuhauishasiuhasuaishaiusiashaiu
                        </p>
                    </div></b-col
                >
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
</style>
