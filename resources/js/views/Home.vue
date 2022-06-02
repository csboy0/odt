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
        <!--
        opacity-[98%]
        -->
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
        :value="this.rMail"
        type="text"
      />
      <input
        id="s-mail"
        required
        class="border-2 border-slate-300 py-2 w-[25vw] px-2 rounded-md my-2"
        placeholder="Your Email"
        :value="this.sMail"
        type="text"
      />
      <input
        id="name"
        required
        class="border-2 border-slate-300 py-2 w-[25vw] px-2 rounded-md my-2"
        placeholder="Your Name (Optional)"
        :value="this.name"
        type="text"
      />
      <input
        id="title"
        class="border-2 border-slate-300 py-2 w-[25vw] px-2 rounded-md my-2"
        placeholder="Subject"
        :value="this.titleS"
        type="text"
      />
      <textarea
        id="msg"
        class="border-2 border-slate-300 py-2 w-[25vw] px-2 rounded-md my-2"
        placeholder="Your message here..."
        name=""
        :value="this.msgS"
        cols="30"
        rows="10"
      ></textarea>
      <div class="form-check form-switch">
        <input
          class="
            form-check-input
            appearance-none
            w-9
            -ml-10
            rounded-full
            float-left
            h-5
            align-top
            bg-no-repeat bg-contain bg-gray-300
            focus:outline-none
            cursor-pointer
            shadow-sm
          "
          type="checkbox"
          role="switch"
          id="flexSwitchCheckDefault"
        />
        <label
          class="form-check-label inline-block text-gray-800"
          for="flexSwitchCheckDefault"
          >Protect With Passcode</label
        >
      </div>
      <button
        id="submit-btn my-2"
        @click="sendFile"
        class="bg-blue-500 py-2 my-2 px-8 rounded-md text-white font-bold"
      >
        Send >
      </button>
    </div>
  </div>
</template>

<script>
import UploadView from "../components/UploadView.vue";
import Promo from "../components/Promo.vue";
export default {
  name: "HomeComponent",
  props: {
    route: {
      type: String,
    },
  },
  components: { UploadView, Promo },
  data: () => ({
    file: null,
    sMail: "",
    msgS: "",
    titleS: "",
    rMail: "",
    name: "",
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
      this.rMail = document.getElementById("r-mail").value;
      this.sMail = document.getElementById("s-mail").value;
      this.titleS = document.getElementById("title").value;
      this.msgS = document.getElementById("msg").value;
      this.name = document.getElementById("name").value;
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
      formData.append("rmail", this.rMail);
      formData.append("smail", this.sMail);
      formData.append("title", this.titleS);
      formData.append("name", this.name);
      formData.append("msg", this.msgS);

      axios
        .post("/upload", formData, config)
        .then((res) => {
          if (res.status == 200) {
            this.msgS = "";
            this.rMail = "";
            this.sMail = "";
            this.titleS = "";
            var popup = document.getElementById("popup");
            popup.classList.add("d-none");
            console.log("Upload Success!");
            alert("Upload Sucess!");
          }
        })
        .catch((error) => {
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
