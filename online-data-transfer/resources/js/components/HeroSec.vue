<template>
  <div class="m-auto flex p-5 items-center justify-center">
    <div class="left">
      <UploadView />
    </div>
    <div class="right">
      <Promo />
    </div>
    <div class="flex flex-col items-center position-fixed w-[35vw] top-32 h-[70vh] border-2 border-slate-200 bg-white shadow-2xl shadow-gray-300 rounded-lg opacity-[98%]">
        <p class="text-lg pt-4">Enter Details</p>
        <img class="top-4 left-4 position-absolute" src="/images/close.svg" alt="">
      <input class="border-2 border-slate-300 py-2 w-[25vw] px-2 rounded-md my-2" placeholder="Recipient's Email" type="text">
      <input class="border-2 border-slate-300 py-2 w-[25vw] px-2 rounded-md my-2" placeholder="Your Email" type="text">
      <input class="border-2 border-slate-300 py-2 w-[25vw] px-2 rounded-md my-2" placeholder="Title" type="text">
      <textarea class="border-2 border-slate-300 py-2 w-[25vw] px-2 rounded-md my-2" placeholder="Your message here..." name="" id="" cols="30" rows="10"></textarea>
      <button class="bg-blue-500 py-2 my-2 px-8 rounded-md text-white font-bold">Send ></button>
    </div>
  </div>
</template>

<script>
import UploadView from "./UploadView.vue";
import Promo from "./Promo.vue";
export default {
  name: "HeroSec",
  props: {
    route: {
      type: String,
    },
  },
  components: { UploadView, Promo },
};
</script>

<style scoped>
.container {
  display: flex;
  padding: 25px;
  height: 100%;
  overflow: hidden;
}

.body {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-top: -25px;
  justify-content: center;
  padding: 10px;
}

.left {
  flex: 1;
}

.right {
  flex: 1;
}

.left img {
  height: 3rem;
  color: lightblue;
}

.left h2 {
  font-size: 1.1rem;
  text-align: center;
  padding: 15px;
}
</style>
