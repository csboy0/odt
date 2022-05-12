<template>
    <div class="container">
        <div class="body left">
            <div class="upload-area"
                 @dragenter="OnDragEnter"
                 @dragleave="OnDragLeave"
                 @dragover.prevent
                 @drop="OnDrop"
                 :class="{dragging : isDragging}"
            >

                <form :action="route" enctype="multipart/form-data" method="post">
                    <!--          {{ csrf_field() }}-->
                    <img src="/images/plus-icon.svg" alt=""
                         onclick="document.getElementById('browse').click()"/>
                    <h2>Drag and drop files</h2>
                    <p id="u-tip">or click the plus icon to select files</p>
                    <input id="browse" type='file' class="d-none" name="file" @change="handleFileChange">
                    <input id="b-btn" type="submit" class="justify-content-center"
                           value="Upload"/>
                </form>
            </div>
        </div>
        <div class="body right">
            <h2>Simple private file sharing</h2>
            <img src="/images/monitoring.png" alt=""/>
            <p class="my-1">
                Welcome to online data transfer, the world's leading private file sharing website.
                Just select file enter recipient's email id and boom! a private link will be share with the recipient
                and then the file can be downloaded with a single click, don't worry its 100% safe and secure your files
                will be encrypted.
            </p>


        </div>
    </div>
</template>

<script>
export default {
    name: "NavBar",
    data: () => ({
        isDragging: false,
        dragCount: 0
    }),
    methods: {
        handleFileChange(e) {

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
            if (this.dragCount <= 0)
                this.isDragging = false;

        },
        OnDrop(e) {
            e.preventDefault();
            e.stopPropagation();
            this.isDragging = false;
            const files = e.dataTransfer.files;
            console.log(files);
            this.isDragging = false;
            this.uploadFile(files[0])

        },
        uploadFile(file) {

        }
    },
    props: {
        route: {
            type: String
        }
    }
};
</script>

<style scoped>
.container {
    display: flex;
    padding: 25px;
    height: 100%;
    overflow: hidden;
}

.body {

    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: -25px;
    justify-content: center;;
    padding: 10px;
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


.upload-area {
    height: 500px;
    width: 100%;
    display: flex;
    border: 3px dashed #888888;
    border-radius: 0.2rem;
}

.dragging {
    height: 100%;
    width: 100%;
    display: flex;
    background: #ececec;
    border: 3px dashed rgb(50, 112, 255);;
    border-radius: 0.2rem;
}

.upload-area form {

    display: flex;
    margin: auto;
    flex-direction: column;
    align-items: center;
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
