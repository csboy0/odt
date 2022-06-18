<template>
    <div class="flex justify-between items-center py-2">
        <h2 class="text-2xl mt-2 ml-4 text-blue-500">Data<span class="text-slate-400">Transfer</span></h2>
        <div class="justify-center position-fixed items-center  top-2 right-3 text-[1.2rem] shadow-sm py-1 rounded-md bg-white  border-[1px] border-slate-200">
            <ul class="flex m-auto pl-1   list-none justify-center items-center ">
                <li class=" py-2 px-3"><router-link class="text-decoration-none text-slate-800" to="/">Home</router-link></li>
                <li class=" py-2 px-3"><router-link class="text-decoration-none text-slate-800" to="/about">About</router-link></li>
                <li class=" py-2 px-3"><router-link class="text-decoration-none text-slate-800" to="/contact">Contact</router-link></li>
                <li class=" py-2 px-3"><router-link class="text-decoration-none text-slate-800" to="/blog">Blog</router-link></li>
            </ul>
        </div>

    </div>
</template>

<script>
export default {
    name: 'NavBar',
    props: {
        msg: String
    }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
