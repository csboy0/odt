<template>
  <div class="position-absolute w-[35vw] top-18 h-[70vh]">
    <div
      id="popup"
      class="
        flex flex-col
        items-center
        border-2 border-slate-200
        bg-white
        shadow-2xl shadow-gray-300
        rounded-lg
        <!--
        opacity-[98%]
        -->
      "
    >
      <img
        class="top-4 left-4 cursor-pointer position-absolute"
        src="/images/close.svg"
        @click="closePopUp"
        alt=""
      />
      <div class="w-full text-center mt-5 border-y-2 border-slate-300 flex">
        <h1
          :class="{ 'select-choice': this.selectOne }"
          @click="this.sharefiles"
          class="mb-0 cursor-pointer flex-1 py-2 text-lg"
        >
          Share File
        </h1>
        <h1
          :class="{ 'select-choice': !this.selectOne }"
          @click="this.createlink"
          class="mb-0 cursor-pointer flex-1 py-2 text-lg"
        >
          Create Link
        </h1>
      </div>
      <!-- Share Files View -->

      <div
        v-show="this.selectOne"
        id="sf-view"
        class="text-center flex flex-col items-center"
      >
        <form
          class="text-center flex flex-col items-center"
          method="post"
          @submit.prevent="shareFile()"
        >
          <input
            id="sf-r-mail"
            required
            class="border-2 border-slate-300 py-2 w-[25vw] px-2 rounded-md my-2"
            placeholder="Recipient's Email"
            :value="this.rMail"
            type="email"
          />
          <input
            id="sf-s-mail"
            required
            class="border-2 border-slate-300 py-2 w-[25vw] px-2 rounded-md my-2"
            placeholder="Your Email"
            :value="this.sMail"
            type="email"
          />
          <input
            id="sf-in-name"
            required
            class="border-2 border-slate-300 py-2 w-[25vw] px-2 rounded-md my-2"
            placeholder="Your Name"
            :value="this.name"
            type="text"
          />
          <input
            id="sf-subject"
            class="border-2 border-slate-300 py-2 w-[25vw] px-2 rounded-md my-2"
            placeholder="Subject"
            :value="this.subject"
            type="text"
          />
          <textarea
            id="sf-msg"
            class="border-2 border-slate-300 py-2 w-[25vw] px-2 rounded-md my-2"
            placeholder="Your message here..."
            name=""
            :value="this.msgS"
            cols="20"
            rows="5"
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
            class="bg-blue-500 py-2 my-2 px-8 rounded-md text-white font-bold"
            type="submit"
          >
            Send >
          </button>
        </form>
      </div>
      <!-- Share Files View -->
      <!-- Create Link View -->
      <div
        v-show="!this.selectOne"
        id="cl-view"
        class="text-center flex flex-col items-center"
      >
        <form
          class="text-center flex flex-col items-center"
          method="post"
          @submit.prevent="createLink()"
        >
          <input
            id="s-mail"
            required
            class="border-2 border-slate-300 py-2 w-[25vw] px-2 rounded-md my-2"
            placeholder="Your Email"
            :value="this.sMail"
            type="email"
          />
          <input
            id="in-name"
            required
            class="border-2 border-slate-300 py-2 w-[25vw] px-2 rounded-md my-2"
            placeholder="Your Name"
            :value="this.name"
            type="text"
          />
          <input
            id="subject"
            required
            class="border-2 border-slate-300 py-2 w-[25vw] px-2 rounded-md my-2"
            placeholder="Subject"
            :value="this.subject"
            type="text"
          />

          <button
            id="submit-btn my-2"
            class="bg-blue-500 py-2 my-2 px-8 rounded-md text-white font-bold"
          >
            Create Link +
          </button>
        </form>
      </div>
      <!-- Create Link View -->
    </div>
    <ProgressBar
      :progress="uploadProgress"
      :filesize="filesize"
      :fileExt="fileExt"
      v-show="isloading"
      class="position-fixed z-20 top-0 left-0"
    />
  </div>
</template>

<script>
import ProgressBar from "./ProgressBar.vue";
import { uploadService } from "./../services";
export default {
  components: { ProgressBar },
  methods: {
    closePopUp() {
      this.$emit("close-popup");
    },
    createLink() {
      this.sMail = document.getElementById("s-mail").value;
      this.name = document.getElementById("in-name").value;
      console.log(this.sMail, this.name);
      this.subject = document.getElementById("subject").value;
      // let formData = new FormData();
      // formData.append("file", this.file);
      // formData.append("smail", this.sMail);
      // formData.append("name", this.name);
      // formData.append("subject", this.subject);
      // formData.append("sendMail", false);
      this.params = {
        rmail: this.rMail,
        smail: this.sMail,
        subject: this.subject,
        name: this.name,
        msg: this.msgS,
        sendMail: false,
      };
      this.uploadToServer();
    },
    shareFile() {
      this.rMail = document.getElementById("sf-r-mail").value;
      this.sMail = document.getElementById("sf-s-mail").value;
      this.subject = document.getElementById("sf-subject").value;
      this.msgS = document.getElementById("sf-msg").value;
      this.name = document.getElementById("sf-in-name").value;
      // let formData = new FormData();
      // formData.append("file", this.file);
      // formData.append("rmail", this.rMail);
      // formData.append("smail", this.sMail);
      // formData.append("subject", this.subject);
      // formData.append("name", this.name);
      // formData.append("msg", this.msgS);
      // formData.append("sendMail", true);
      this.params = {
        rmail: this.rMail,
        smail: this.sMail,
        subject: this.subject,
        name: this.name,
        msg: this.msgS,
        sendMail: true,
      };
      this.uploadToServer();
    },
    uploadToServer() {
      this.isloading = true;

      // Size Calculation
      var _size = this.file.size;
      var fSExt = new Array("Bytes", "KB", "MB", "GB"),
        i = 0;
      while (_size > 900) {
        _size /= 1024;
        i++;
      }
      this.filesize = Math.round(_size * 100) / 100;
      this.fileExt = fSExt[i];
      console.log(this.filesize+''+this.fileExt);

      const config = {
        headers: { "content-type": "multipart/form-data" },
      };

      uploadService.chunk(
        "/upload",
        this.file,
        this.params,
        // onProgress
        (percent) => {
          this.uploadProgress = percent;
        },
        // onError
        (err) => {
          console.log(err);
          this.uploadfinish(1, err);
        },
        // onSuccess
        (res) => {
          if (res.status == 200) {
            console.log(res);
            this.uploadfinish(1, res.data);
          }
        }
      );

      // axios
      //   .post(
      //     "/upload",
      //     formData,
      //     {
      //       onUploadProgress: (e) => {
      //         if (e.lengthComputable) {
      //           this.uploadProgress = Math.round((e.loaded / e.total) * 100);
      //           console.log(this.uploadProgress);
      //         }
      //       },
      //     },
      //     config
      //   )
      //   .then((res) => {
      //     if (res.status == 200) {
      //       console.log(res);
      //       this.uploadfinish(1, res.data);
      //     }
      //   })
      //   .catch((error) => {
      //     // this.output = error;
      //     console.log(error);
      //     this.uploadfinish(1, error);
      //   });
    },

    sharefiles() {
      this.selectOne = true;
    },
    createlink() {
      this.selectOne = false;
    },
    uploadfinish(s, data) {
      this.isloading = false;
      this.uploadProgress = 0;
      this.msgS = "";
      this.rMail = "";
      this.sMail = "";
      this.subject = "";
      this.name = "";
      this.closePopUp();
      if (s == 1) {
        setTimeout(() => {
          this.$emit("t-success", data);
        }, 500);
        // alert("Upload Sucess!");
      } else {
        setTimeout(() => {
          this.$emit("t-fail", data);
        }, 500);
        // alert("Upload Failed!");
      }
    },
  },
  data() {
    return {
      sMail: "",
      msgS: "",
      subject: "",
      rMail: "",
      name: "",
      selectOne: true,
      isloading: false,
      uploadProgress: 0,
      params: {},
      filesize: 0,
      fileExt: "",
    };
  },
  props: {
    file: null,
  },
};
</script>

<style scoped>
.select-choice {
  font-weight: 400;
  color: #333;
  background-color: rgb(180, 208, 255);
}
</style>