<script setup>
// import Footer from './components/Footer.vue';
// import Content from './components/HelloWorld.vue'
import NavBar from './components/NavBar.vue';

import { ref } from 'vue';

    const estado =ref(true)
    const cambiarEstado =() =>{
      estado.value = !estado.value
    }
</script>

<template>
   <!--
  <Content msg="Vite + Vue" />
  <Footer></Footer> -->
  <main class="sideBar">
    <header v-if="estado" >
      
        <NavBar @cerrar-navbar="cambiarEstado" />

    </header>
    <div class="container">
      <section>
        <a @click="cambiarEstado(estado)" v-if="!estado" class="flecha">→</a>
      </section>
      <footer>

      </footer>

    </div>
  </main>

</template>

<style scoped>

  .sideBar{
    display: flex;
    flex-direction: row;
    height: 100dvh;
  }
  .container{
    width: 100vw;
    height: 100dvh;
    display:grid;
    grid-template-rows:  1fr auto;
  }

  header{
      background-color: aqua;
      position: relative;
    }

  section{
      position: relative;
      min-height: 650px;
      width: 100%;
      background-color: brown;
  }

  footer{
    width: 100%;
    min-height: 200px;
    background-color: #2aa56c;
  }
  .flecha{
        font-size: 60px;
        border: #000 2px solid;
        position: absolute;
        top: 50%;
    }
</style>
