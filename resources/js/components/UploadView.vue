<template>
  <div
    class="upload-area mt-[3rem] flex items-start"
    @dragenter="OnDragEnter"
    @dragleave="OnDragLeave"
    @dragover.prevent
    @drop="OnDrop"
    :class="{ dragging: isDragging }"
  >
    <!--          {{ csrf_field() }}-->
    <img
      src="/images/plus-icon.svg"
      alt=""
      class="hover:cursor-pointer"
      onclick="document.getElementById('browse').click()"
    />
    <h2 id="file-name">Drag and drop files</h2>
    <p id="u-tip">or click the plus icon to select files</p>
    <input
      id="browse"
      type="file"
      class="d-none"
      name="file"
      @change="handleFileChange"
    />
    <input
      id="b-btn"
      type="submit"
      class="justify-content-center"
      @click="startUpload"
      value="Upload"
    />
  
  </div>
</template>

<script>
export default {
  data: () => ({
    isDragging: false,
    isSelected: false,
    file: null,
    dragCount: 0,
  }),
  methods: {
    handleFileChange(e) {
      var filename = document
        .getElementById("browse")
        .value.replace(/.*(\/|\\)/, "");
      document.getElementById("file-name").innerText = filename;
      document.getElementById("u-tip").innerText = "Click Upload to Proceed...";
      this.file = document.getElementById("browse").files[0];
    },
    OnDragEnter(e) {
      e.preventDefault();
      this.dragCount++;
      this.isDragging = true;
      return false;
    },
    OnDragLeave(e) {
      e.preventDefault();
      this.dragCount--;
      if (this.dragCount <= 0) this.isDragging = false;
    },
    OnDrop(e) {
      e.preventDefault();
      e.stopPropagation();
      this.isDragging = false;
      const files = e.dataTransfer.files;
      console.log(files);
      document.getElementById("file-name").innerText = files[0].name;
      document.getElementById("u-tip").innerText = "Click Upload to Proceed...";
      this.isDragging = false;
      this.isSelected = true;
      this.file = files[0];
      console.log(this.file);
    },
    startUpload() {
      // this.uploadFile(this.file,this);
      if (this.file == null) {
        alert("Please Select a file first!");
        return;
      }
      this.$emit("upload-file", this.file);
    },
  },
};
</script>

<style lang="scss" scoped>
.upload-area {
  height: 500px;
  width: 100%;
  display: flex;
  border: 3px dashed #888888;
  border-radius: 0.2rem;
  justify-content: center;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.dragging {
  height: 500px;
  width: 100%;
  display: flex;
  background: #ececec;
  border: 3px dashed rgb(50, 112, 255);
  border-radius: 0.2rem;
}

#b-btn {
  padding: 0.5rem 1rem;
  background: rgb(50, 112, 255);
  border: none;
  margin: 1rem;
  color: white;
  font-size: 1rem;
  border-radius: 0.5rem;
}

.right h2 {
  padding: 10px;
  color: #5e5e5e;
  text-decoration: none;
}

.right p {
  padding: 10px;
  color: #5e5e5e;
  text-align: center;
  line-height: 1.3;
  text-decoration: none;
}

.right img {
  height: 15rem;
}

#u-tip {
  margin: -5px 5px 5px 10px;
  font-size: 0.8rem;
  color: #5d5d5d;
}

#browse {
  display: none;
}
</style>