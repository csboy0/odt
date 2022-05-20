<template>
  <div class="m-auto flex p-5 items-center justify-center">
    <div class="body left">
      <UploadView @upload-file="uploadfile" />
    </div>
    <div class="body right">
      <Promo />
    </div>
    <div
      id="popup"
      class="
        flex flex-col
        d-none
        items-center
        position-fixed
        w-[35vw]
        top-32
        h-[70vh]
        border-2 border-slate-200
        bg-white
        shadow-2xl shadow-gray-300
        rounded-lg
        opacity-[98%]
      "
    >
      <p class="text-lg pt-4">Enter Details</p>
      <img
        class="top-4 left-4 cursor-pointer position-absolute"
        src="/images/close.svg"
        @click="closePopUp"
        alt=""
      />
      <input
        id="r-mail"
        required
        class="border-2 border-slate-300 py-2 w-[25vw] px-2 rounded-md my-2"
        placeholder="Recipient's Email"
        type="text"
      />
      <input
        id="s-mail"
        required
        class="border-2 border-slate-300 py-2 w-[25vw] px-2 rounded-md my-2"
        placeholder="Your Email"
        type="text"
      />
      <input
        id="title"
        class="border-2 border-slate-300 py-2 w-[25vw] px-2 rounded-md my-2"
        placeholder="Title"
        type="text"
      />
      <textarea
        id="msg"
        class="border-2 border-slate-300 py-2 w-[25vw] px-2 rounded-md my-2"
        placeholder="Your message here..."
        name=""
        cols="30"
        rows="10"
      ></textarea>
      <button
        id="submit-btn"
        @click="sendFile"
        class="bg-blue-500 py-2 my-2 px-8 rounded-md text-white font-bold"
      >
        Send >
      </button>
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
  data: () => ({
    file: null,
  }),
  methods: {
    closePopUp() {
      var popup = document.getElementById("popup");
      popup.classList.add("d-none");
    },
    uploadfile(file) {
      document.getElementById("popup").classList.remove("d-none");
      this.file = file;
    },
    sendFile() {
      var rMail = document.getElementById("r-mail").value;
      var sMail = document.getElementById("s-mail").value;
      var titleS = document.getElementById("title").value;
      var msgS = document.getElementById("msg").value;
      const config = {
        headers: { "content-type": "multipart/form-data" },
      };

      // var params = {
      //   rmail: rMail,
      //   smail: sMail,
      //   title: titleS,
      //   msg: msgS,
      //   file: this.file,
      // };
      let formData = new FormData();
      formData.append("file", this.file);
      formData.append("rmail", rMail);
      formData.append("smail", sMail);
      formData.append("title", titleS);
      formData.append("msg", msgS);

      axios
        .post("/upload", formData, config)
        .then(function (res) {
          // console.log("success send");
          console.log(res)
        })
        .catch(function (error) {
          // this.output = error;
          console.log(error);
        });
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
