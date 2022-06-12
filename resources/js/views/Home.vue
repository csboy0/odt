<template>
<div class="flex flex-col">

  <div class="md:flex justify-center md:overflow-hidden  px-3">
    <div class="body left  flex items-start">
      <UploadView @upload-file="uploadfile" />
    </div>
    <div class="body right flex items-start">
      <Promo />
    </div>
    <ShareModal
      @close-popup="closePopUp"
      @t-success="transferSuccess"
      @t-fail="transferFailed"
      :file="this.file"
      v-show="popup"
    />
    <CompletedModal @done="finish" :data="filedata" v-show="this.istransferComplete" />
  </div>
    <div class=" items-end justify-end mt-5 text-lg font-normal text-slate-500 self-center">&copy;onlinedatatransfer.com</div>
</div>
</template>

<script>
import UploadView from "../components/UploadView.vue";
import Promo from "../components/Promo.vue";
import ShareModal from "../components/ShareModal.vue";
import CompletedModal from "../components/CompletedModal.vue";
export default {
  name: "HomeComponent",
  props: {
    route: {
      type: String,
    },
  },
  components: { UploadView, Promo, ShareModal, CompletedModal },
  data: () => ({
    file: null,
    popup: false,
    istransferComplete: false,
    filedata:{}
  }),
  methods: {
    closePopUp() {
      this.popup = false;
    },
    uploadfile(file) {
      this.popup = true;
      this.file = file;
    },
    transferSuccess(data) {
      this.istransferComplete = true;
      this.filedata=data;
    },
    transferFailed(data) {
      this.istransferComplete = true;
    },
    finish(){
      this.file=null;
      this.popup=false;
      this.istransferComplete=false;
      this.filedata={};
      window.location.reload();
    }
  },
};
</script>

<style scoped>
.container {
  display: flex;
  padding: 25px;
  height: 100%;
  overflow: hidden;
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
