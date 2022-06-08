<template>
  <div class="flex justify-center h-full px-5">
    <div class="body left h-full flex items-start">
      <UploadView @upload-file="uploadfile" />
    </div>
    <div class="body right h-full flex items-start">
      <Promo />
    </div>
    <ShareModal
      @close-popup="closePopUp"
      @t-success="transferSuccess"
      @t-fail="transferFailed"
      :file="this.file"
      v-show="popup"
    />
    <CompletedModal :data="filedata" v-show="this.istransferComplete" />
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
    sMail: "",
    msgS: "",
    titleS: "",
    rMail: "",
    name: "",
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
