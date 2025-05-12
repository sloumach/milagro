<template>
  <div id="app">
    <Navbar />
    <router-view />
    <Footer :current-lang="currentLang" />
  </div>
</template>

<script>
import Navbar from './components/navbar.vue';
import Footer from './components/Footer.vue';

export default {
  name: 'App',
  components: {
    Navbar,
    Footer,
  },
  data() {
    return {
      currentLang: 'ar'
    }
  },
  created() {
    this.$root.$on('languageChanged', (lang) => {
      this.currentLang = lang;
    });
  },
  beforeDestroy() {
    this.$root.$off('languageChanged');
  }
};
</script>

<style>
#app {
  min-height: 100vh;
  display: flex;
  flex-direction: column;
}
</style>