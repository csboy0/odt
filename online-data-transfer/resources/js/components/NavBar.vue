<template>
    <div class="flex justify-between items-center py-2">
        <h2 class="text-2xl mt-2 ml-4 text-blue-500">Data<span class="text-slate-400">Transfer</span></h2>
        <div class="justify-center position-fixed items-center  top-2 right-3 text-[1.2rem] shadow-sm py-1 rounded-md bg-white  border-[1px] border-slate-200">
            <ul class="flex m-auto pl-1   list-none justify-center items-center ">
                <li class=" py-2 px-3"><a class="text-decoration-none text-slate-800" href="#">Home</a></li>
                <li class=" py-2 px-3"><a class="text-decoration-none text-slate-800" href="#">About</a></li>
                <li class=" py-2 px-3"><a class="text-decoration-none text-slate-800" href="#">Contact</a></li>
                <li class=" py-2 px-3"><a class="text-decoration-none text-slate-800" href="#">Blog</a></li>
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
/* 
.navbar {
    width: 100vw;
    height: 3.5rem;
    background-color: white;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.navbar img {
    height: 2rem;
    margin: 25px;
}

 .menu {
    margin-top: 15px;
    margin-right: 50px;
    border: 1px solid rgba(0,0,0,0.2);
    border-radius: 0.5rem;
    box-shadow: 0px 1px 1px 0px rgba(0,0,0,0.2);
}
a{
    text-decoration: none;
    color: #2c3034;
}

.menu ul {
    display: flex;
    list-style: none;
}.menu li {
    padding: 10px 15px;
}

.navbar h1 {
    font-size: 1.2rem;
    margin-left: 25px;
    margin-top: 15px;
    color: black;
}

.navbar span {
    color: blue;
}  */
</style>
