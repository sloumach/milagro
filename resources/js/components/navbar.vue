<template>
  <div>
    <!-- Language Switch Buttons -->
    <div class="language-switcher">
      <button :class="['lang-btn', currentLang === 'ar' ? 'active-lang' : '']" @click="switchLanguage('ar')">
        العربية
      </button>
      <span class="lang-separator">|</span>
      <button :class="['lang-btn', currentLang === 'en' ? 'active-lang' : '']" @click="switchLanguage('en')">
        English
      </button>
    </div>

    <nav :class="['navbar', currentLang === 'en' ? 'ltr' : 'rtl']">
      <div class="navbar__left">
        <router-link to="/account/profile" class="icon-link">
          <img src="../../../public/assets/img/Account.png" alt="User" class="icon" />
        </router-link>
        <router-link to="/cart" class="icon-link">
          <img src="../../../public/assets/img/Cart.png" alt="Bag" class="icon" />
        </router-link>
        <router-link to="/wishlist" class="icon-link">
          <img src="../../../public/assets/img/heart.png" alt="Heart" class="icon" />
        </router-link>
        <img src="../../../public/assets/img/Ellipse.png" alt="Search" class="icon" />
      </div>

      <div class="navbar__center">
        <router-link 
          v-for="link in orderedLinks" 
          :key="link.path"
          :to="link.path"
          :class="{ active: isActive(link.path) }"
        >
          {{ translations[link.key][currentLang] }}
        </router-link>
      </div>

      <div class="navbar__right">
        <img src="../../../public/assets/img/logo.png" alt="Logo" class="logo" />
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  name: "Navbar",
  data() {
    return {
      currentLang: localStorage.getItem('currentLang') || 'ar',
      translations: {
        contact: {
          ar: 'تواصل معنا',
          en: 'Contact us'
        },
        newArrivals: {
          ar: 'وصل حديثاً',
          en: 'New Arrivals'
        },
        shop: {
          ar: 'المتجر',
          en: 'Shop'
        },
        home: {
          ar: 'الرئيسية',
          en: 'Home'
        }
      },
      links: [
        { path: '/contact', key: 'contact' },
        { path: '/shop/new', key: 'newArrivals' },
        { path: '/shop/boxes', key: 'shop' },
        { path: '/', key: 'home' }
      ]
    };
  },
  methods: {
    switchLanguage(lang) {
      this.currentLang = lang;
      localStorage.setItem('currentLang', lang);
      this.$root.$emit('languageChanged', lang);
      window.location.reload();
    },
    isActive(path) {
      return this.$route.path === path;
    }
  },
  computed: {
    orderedLinks() {
      if (this.currentLang === 'en') {
        return [...this.links].reverse();
      }
      return this.links;
    }
  },
  created() {
    const savedLang = localStorage.getItem('currentLang');
    if (savedLang) {
      this.currentLang = savedLang;
      this.$root.$emit('languageChanged', savedLang);
    }
  }
};
</script>


<style scoped>
/* Navbar base style */
.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: #212A1E;
  padding: 24px 150px;
  font-family: 'TheSansArabic', sans-serif;
}

/* Arabic (default) - normal left-to-right */
.navbar.rtl {
  flex-direction: row;
}

/* English - reverse */
.navbar.ltr {
  flex-direction: row-reverse;
}

/* Navbar sections */
.navbar__left,
.navbar__center,
.navbar__right {
  display: flex;
  align-items: center;
}

/* Icons style */
.icon {
  width: 31px;
  height: 32px;
  margin-left: 0;
  filter: brightness(0) saturate(110%) invert(76%) sepia(34%) saturate(409%) hue-rotate(337deg) brightness(109%) contrast(97%);
}

/* Logo style */
.logo {
  width: 70px;
  height: 65px;
}

/* Center nav links */
.navbar__center {
  display: flex;
  align-items: flex-end;
  position: relative;
  height: 27px;
  margin-left: 35%;
}

/* When English: move the navbar__center correctly */
.navbar.ltr .navbar__center {
  margin-left: 0;
  margin-right: 35%;
}

/* Navbar links style */
.navbar__center a {
  color: #fff;
  margin-left: 24px;
  text-decoration: none;
  font-size: 18px;
  transition: color 0.2s;
  position: relative;
  display: flex;
  align-items: flex-end;
  height: 48px;
  cursor: pointer;
}

/* Fix links margin when LTR */
.navbar.ltr .navbar__center a {
  margin-left: 0;
  margin-right: 24px;
  font-family: Philosopher,serif;
}

/* Active link style */
.navbar__center .active,
.navbar__center a.router-link-exact-active {
  color: #AA8B7A !important;
}

/* Active link dot */
.navbar__center .active::after,
.navbar__center a.router-link-exact-active::after {
  content: '';
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  bottom: -10px;
  width: 4px;
  height: 4px;
  border-radius: 50%;
  background: #AA8B7A;
  display: block;
}

.language-switcher {
  text-align: right;
  padding: 12px 150px;
  background: #212A1E;
  border-bottom: 1px solid rgba(170, 139, 122, 0.2);
}

.lang-btn {
  background: none;
  border: none;
  color: #AA8B7A;
  font-family: 'TheSansArabic', sans-serif;
  font-size: 14px;
  padding: 5px 10px;
  cursor: pointer;
  transition: all 0.3s ease;
  opacity: 0.7;
}

.lang-btn:hover {
  opacity: 1;
}

.active-lang {
  color: #AA8B7A;
  opacity: 1;
  font-weight: bold;
}

.lang-separator {
  color: #AA8B7A;
  opacity: 0.5;
  margin: 0 5px;
}

/* Optional: Add this if you want a subtle hover effect */
.lang-btn:hover {
  transform: translateY(-1px);
}

/* Optional: Add this if you want a click effect */
.lang-btn:active {
  transform: translateY(1px);
}

.icon-link {
  display: flex;
  align-items: center;
  cursor: pointer;
  margin-left: 4px;
}

.navbar.ltr .icon-link {
  margin-left: 0;
  margin-right: 4px;
}
</style>
