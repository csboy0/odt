<template>
    <div id="root">

        <NavBar/>
        <HeroSec :route="route"/>
    </div>
</template>

<script>
import NavBar from './NavBar.vue';
import HeroSec from './HeroSec.vue';

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
        HeroSec,

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
    overflow: hidden
}
</style>
