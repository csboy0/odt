<template>
    <div class="navbar">
        <h1>Data<span>Transfer</span></h1>
        <div class="menu">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Blog</a></li>
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

.navbar {
    width: 100vw;
    height: 3.5rem;
    background-color: white;
    /*box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.2);*/
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.navbar img {
    height: 2rem;
    /* margin:  auto 0; */
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
}
</style>
