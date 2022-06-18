<template>
  <div
    class="
      position-absolute
      top-1/3
      border-2 border-slate-200
      bg-white
      shadow-2xl shadow-gray-300
      rounded-xl
      py-5
      z-50
      px-3
      w-[40vw]
      flex flex-col
      items-center
    "
  >
    <img
      class="
        position-absolute
        w-20
        -top-8
        border-2 border-slate-200
        p-2
        rounded-full
        shadow-sm
        bg-white
      "
      src="/images/insignia.png"
      alt=""
    />
    <h1 class="text-lg m-2">Its done!</h1>
    <p v-if="this.data.type == 'link'" class="font-semibold text-slate-500">
      Hurray! your transfer is complete here is the link for downloading the
      file. Note the transfer link will be only valid till 24 hours after
      creation.
    </p>
    <p v-else class="font-semibold text-slate-500">
      Hurray! your transfer is complete the recipient will recieve an email with
      transfer link soon, Note the transfer link will be only valid till 24
      hours after creation.
    </p>
    <div
      v-if="this.data.type == 'link'"
      class="
        w-full
        m-3
        py-2
        px-3
        border-2 border-slate-500
        flex flex-row
        justify-between
      "
    >
      <a
        class="text-decoration-none font-semibold text-blue-500"
        :href="this.data.link"
        >{{ this.data.link }}</a
      >
      <i
        @click="copyUrl()"
        class="fas fa-copy text-2xl text-slate-500 cursor-pointer"
      ></i>
    </div>
    <button
      @click="this.done"
      class="
        bg-slate-700
        border-2
        text-white
        font-semibold
        border-white
        py-2
        px-4
      "
    >
      Ok
    </button>
  </div>
</template>

<script>
export default {
  props: {
    data: {
      default: {
        link: "",
        type: "",
      },
    },
    link: "",
  },
  methods: {
    done() {
      this.$emit("done");
    },
    copyUrl() {
      navigator.clipboard.writeText(this.data.link);
      alert("Link Copied!")
    },
  },
};
</script>

<style  scoped>
</style>