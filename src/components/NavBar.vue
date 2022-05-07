<template>
  <div class="navbar">
    <img src="../assets/logo.png" alt="">

  </div>
</template>

<script>
export default {
  name: 'NavBar',
  props: {
    msg: String
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

.navbar{
  width: 100vw;
  height: 3.5rem;
  background-color: white;
  box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.2);
  display: flex;
  align-items: center;
}

.navbar img{
  height: 2rem;
  /* margin:  auto 0; */
  margin: 25px;
}
</style>
