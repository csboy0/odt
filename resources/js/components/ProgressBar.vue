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

      <p class="text-sm font-bold">
        {{ dsize }} {{ fileExt }} of {{ filesize }} {{ fileExt }}
      </p>
    </radial-progress-bar>
  </div>
</template>

<script>
import RadialProgressBar from "vue-radial-progress";
export default {
  props: {
    progress: {
      type: Number,
      default: 0,
    },
    filesize: {
      type: Number,
      default: 0,
    },
    fileExt: {
      type: String,
      default: "b",
    },
  },
  data() {
    return {
      isloading: false,
      dsize: 0,
    };
  },
  created() {
    console.log(this.filesize, this.fileExt);
  },
  components: {
    RadialProgressBar,
  },
  watch: {
    progress: function (val) {
      this.dsize = (val / 100) * this.filesize;
      this.dsize = Number(this.dsize.toString().slice(0, 4));
    },
  },
};
</script>

<style lang="scss" scoped>
</style>