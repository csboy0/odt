impor
<template>
    <div class="main h-screen">

        <NavBar/>
        <router-view></router-view>
        <!-- <HeroSec :route="route"/> -->
    </div>
</template>

<script>
import NavBar from '../components/NavBar.vue';

export default {
    mounted() {
        console.log('Component mounted.')
    },
    props: {
        route: {
            type: String
        }

    },
    components: {
        NavBar,

    }
}
</script>
<style>
@import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap');

* {
    margin: 0;
    padding: 0;
}
#app{
    height: 100%;
}
#root{
    height: 100%;
}
html, body {
    background-color: #ffffff;
    font-family: 'Ubuntu', sans-serif;
    color: rgb(32, 32, 32);
    height: 100%;
    overflow: auto
}
</style>
