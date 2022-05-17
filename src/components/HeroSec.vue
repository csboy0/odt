<template>
  <div class="container">
    <div class="body left">
      <div class="upload-area">

      <img src="../assets/plus-icon.svg" alt="">
      <h2>Drag and drop files</h2>
      <button id="browse">Select files to upload</button>
      </div>
    </div>
    <div class="body right">
      <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa rerum quasi
      quibusdam optio, quis voluptatum nemo laudantium aut placeat obcaecati,
      soluta aperiam labore odio! Commodi cum ipsum quis deleniti id!
      </p>
    </div>
  </div>
</template>

<script>
export default {
  name: "NavBar",
};
</script>

<style scoped>
.container {
  display: flex;
  padding: 25px;
  height: 100%;
}
.body{
  display: flex;
  flex-direction: column;
  padding: 10px;
  align-items: center;
}
.left{
  
  flex: 1;
}
.right{
  flex: 1;
}
.left img{
  height:3rem;
  color: lightblue;
}
.left h2{
  font-size: 1.1rem;
  text-align: center;
  padding: 15px;
}
.upload-area{
  display: flex;
  flex-direction: column;
  background-color: white;
  align-items: center;
  padding: 4rem 6rem;
  border: 1px dashed black;
  border-radius: 1.5rem;
}
#browse{
  padding: 0.5rem 1rem;
  background: rgb(50, 112, 255);
  border: none;
  color: white;
  font-size: 1rem;
  border-radius: 0.5rem;
}
</style>