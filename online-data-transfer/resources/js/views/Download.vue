<template>
  <div class="flex flex-col items-center mx-32 my-5">
    <img id="file-prev" class="h-36 w-36" src="/images/file.gif" alt="" />
    <label class="text-lg m-2" for="file-prev">Filename.xyz</label>
    <div class="details flex flex-col ">
      <div class="share-info flex flex-row justify-between">
        <p class="text-lg">File Shared by xyz</p>
        <p class="text-base">25 May</p>
      </div>

      <p>
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. In rerum illo
        vitae consectetur voluptate quos enim ipsum temporibus tenetur nemo,
        tempore unde adipisci reprehenderit voluptas quas tempora inventore
        laborum veniam!
      </p>
      <button class=" w-fit tracking-wider self-center mt-3 bg-blue-600 py-2.5 px-5 rounded-lg shadow-md text-white font-bold">Download <i class="bi bi-arrow-down"></i></button>

    </div>
  </div>
</template>

<script>
export default {
  name: "Download",
};
</script>

<style lang="scss" scoped>
</style>