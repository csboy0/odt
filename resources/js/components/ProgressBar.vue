<template>
  <div
    class="
      position-absolute
      bg-blue-300
      h-full
      w-full
      flex
      items-center
      justify-center
    "
  >
    <radial-progress-bar
      class=""
      :diameter="200"
      :completed-steps="progress"
      :total-steps="100"
      startColor="#3270FF"
      stopColor="#3270FF"
      :strokeWidth="15"
    >
      <p class="mt-2 text-2xl">{{ progress }}%</p>
    </radial-progress-bar>
  </div>
</template>

<script>
import RadialProgressBar from "vue-radial-progress";
export default {
    props:{
        progress:{
            type:Number,
            default:0
        }
    },
  data() {
    return {
      isloading: false,
    };
  },
  components: {
    RadialProgressBar,
  },
};
</script>

<style lang="scss" scoped>
</style>