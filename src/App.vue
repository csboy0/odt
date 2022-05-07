<template>
  <NavBar />
  <HeroSec/>
</template>

<script>
import NavBar from './components/NavBar.vue'
import HeroSec from './components/HeroSec.vue'

export default {
  name: 'App',
  components: {
    NavBar,
    HeroSec
}
}
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap');
*{
  margin: 0;
  padding: 0;
}
body{
  background-color: #efefef;
  font-family: 'Ubuntu', sans-serif;
  color: rgb(32, 32, 32);
}
</style>
