<template>
  <div class="flex flex-col items-center mx-32 my-5">
    <img id="file-prev" class="h-36 w-36" src="/images/file.gif" alt="" />
    <label class="text-lg m-2" for="file-prev">{{ fileinfo.filename }}</label>
    <div class="details flex flex-col">
      <div class="share-info flex flex-row justify-between">
        <p class="text-lg">File Shared by {{ fileinfo.name }}</p>
        <p class="text-base">{{ fileinfo.created_at }}</p>
      </div>

      <p class="w-2/3 self-center" v-if="fileinfo.message == 'NULL'">
        This is a auto generated message in reference of file named
        {{ fileinfo.filename }} by {{ fileinfo.name }} at
        {{ fileinfo.created_at }} , the sender's email id is
        {{ fileinfo.sender_email }} you can download the file by clicking the
        download button below.
      </p>
      <p class="w-2/3 self-center" v-else>
       {{fileinfo.message}}. File Shared by {{fileinfo.sender_email}}, you can download the file by clicking the
        download button below.
      </p>
      <button
      @click="downloadFile"
        class="
          w-fit
          tracking-wider
          self-center
          mt-3
          bg-blue-600
          py-2.5
          px-5
          rounded-lg
          shadow-md
          text-white
          font-bold
        "
      >
        Download <i class="bi bi-arrow-down"></i>
      </button>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "Download",
  created() {
    console.log("At Created", this.$route.params.slug);
    this.getFile();
  },
  data() {
    return {
      fileinfo: {},
    };
  },
  methods: {
    getFile(e) {
      axios
        .post("/files", {
          fid: this.$route.params.slug,
        })
        .then((res) => {
          console.log(res);
          this.setupInfo(res.data);
        })
        .catch((err) => {
          console.log(err);
        });
    },
    downloadFile(e) {
      axios
        .post("/download", {
          url: this.fileinfo.download_link,
          filename: this.fileinfo.filename,
        })
        .then((res) => {
          console.log(res);
        })
        .catch((err) => {
          console.log(err);
        });
    },
    setupInfo(data) {
      this.fileinfo = data[0];
      console.log(this.fileinfo);
    },
  },
};
</script>

<style lang="scss" scoped>
</style>