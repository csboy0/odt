<template>
  <div>
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
          @click="sendFile"
          class="bg-blue-500 py-2 my-2 px-8 rounded-md text-white font-bold"
        >
          Send >
        </button>
      </div>
      <!-- Share Files View -->

      <!-- Create Link View -->
      <div
        v-show="!this.selectOne"
        id="cl-view"
        class="text-center flex flex-col items-center"
      >
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

        <button
          id="submit-btn my-2"
          @click="sendFile"
          class="bg-blue-500 py-2 my-2 px-8 rounded-md text-white font-bold"
        >
          Create Link +
        </button>
      </div>
      <!-- Create Link View -->
    </div>
  </div>
</template>

<script>
export default {
  methods: {
    closePopUp() {
      this.$emit("close-popup");
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
            this.closePopUp();
            console.log("Upload Success!");
            alert("Upload Sucess!");
          }
        })
        .catch((error) => {
          // this.output = error;
          console.log(error);
        });
    },

    sharefiles() {
      this.selectOne = true;
    },
    createlink() {
      this.selectOne = false;
    },
  },
  data() {
    return {
      file: null,
      sMail: "",
      msgS: "",
      titleS: "",
      rMail: "",
      name: "",
      selectOne: true,
    };
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