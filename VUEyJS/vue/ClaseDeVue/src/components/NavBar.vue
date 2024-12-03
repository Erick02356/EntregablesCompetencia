<template>
    
    <nav class="navbar"  >
        <div>
            <img src="./../assets/vue.svg" alt="VUE" srcset="" >
        </div>
        <div class="flex">
            <a href="">Pestañas</a>
            <a href="">1</a>
            <a href="">2</a>
            <a href="">3</a>
        </div>
        <div class="flex">
            <button type="button">LOGIN</button>
            <button type="button">SALIR</button>
        </div>
        
        <a class="flecha" @click="$emit('cerrar-navbar')">←</a>
    </nav>    

</template>

<script setup>

</script>

<style scoped>

    .flecha{
        z-index: 1;
        border: #000 2px solid;
        font-size: 60px;
        position: absolute;
        right: -30px;

    }

    .navbar{
        display: flex;
        flex-direction: column;
        min-width: 400px;
        height: 100%;
        justify-content: space-evenly;
        align-items: center;
        width: 100%;
    }

    .navbar a{
        text-decoration: none;
        color: #000;
    }

    .flex{
        display: flex;
        flex-direction: column;
        gap: 1rem;
        align-items: center;
    }
</style>