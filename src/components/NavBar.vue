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
  box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.2);
  display: flex;
}

.navbar img{
  height: 2rem;
  align-content: center;
  align-items: center;
  margin:  auto 0;
  margin-right: 25px;
}
</style>
