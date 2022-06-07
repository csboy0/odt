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
      w-[35vw]
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
    <p class="font-semibold text-slate-500">
      Hurray! your transfer is complete here is the link for downloading the
      file. Note the transfer link will be only valid till 24 hours after
      creation.
    </p>
    <div
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
        href="https://onlinedatatransfer.com/file/CHHddjGxHDvDJ"
        >https://onlinedatatransfer.com/file/CHHddjGxHDvDJ</a
      >
      <i class="fas fa-copy text-2xl text-slate-500 cursor-pointer"></i>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style  scoped>
</style>