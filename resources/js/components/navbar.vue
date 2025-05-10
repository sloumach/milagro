<template>
  <div>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Language Switch Buttons - Only show on desktop -->
    <div class="language-switcher" v-if="!isMobile">
      <button :class="['lang-btn', currentLang === 'ar' ? 'active-lang' : '']" @click="switchLanguage('ar')">
        العربية
      </button>
      <span class="lang-separator">|</span>
      <button :class="['lang-btn', currentLang === 'en' ? 'active-lang' : '']" @click="switchLanguage('en')">
        English
      </button>
    </div>

    <!-- Mobile Menu Overlay -->
    <div class="mobile-menu-overlay" v-if="isMenuOpen" @click="closeMenu"></div>

    <!-- Mobile Menu Drawer -->
    <div :class="['mobile-menu-drawer', currentLang === 'en' ? 'ltr' : 'rtl', { 'open': isMenuOpen }]">
      <div class="drawer-header">
        <router-link to="/" class="drawer-logo">
          <img src="../../../public/assets/img/logo.png" alt="Logo" class="logo" />
        </router-link>
        <i class="fas fa-times close-menu" @click="closeMenu"></i>
      </div>
      <!-- Language Switch Buttons - Only show in mobile menu -->
      <div class="language-switcher" v-if="isMobile">
        <button :class="['lang-btn', currentLang === 'ar' ? 'active-lang' : '']" @click="switchLanguage('ar')">
          العربية
        </button>
        <span class="lang-separator">|</span>
        <button :class="['lang-btn', currentLang === 'en' ? 'active-lang' : '']" @click="switchLanguage('en')">
          English
        </button>
      </div>
      <div class="drawer-content">
        <div class="drawer-nav-links">
          <router-link 
            v-for="link in orderedLinks" 
            :key="link.path"
            :to="link.path"
            :class="{ active: isActive(link.path) }"
            @click="closeMenu"
          >
            {{ translations[link.key][currentLang] }}
          </router-link>
        </div>
        <div class="drawer-bottom-icons">
          <router-link to="/wishlist" class="drawer-icon-link" @click="closeMenu">
            <img src="../../../public/assets/img/heart.png" alt="Heart" class="icon" />
            <span>{{ currentLang === 'ar' ? 'المفضلة' : 'Wishlist' }}</span>
          </router-link>
          <router-link to="/account/profile" class="drawer-icon-link" @click="closeMenu">
            <img src="../../../public/assets/img/Account.png" alt="User" class="icon" />
            <span>{{ currentLang === 'ar' ? 'حسابي' : 'My Account' }}</span>
          </router-link>
        </div>
      </div>
    </div>

    <nav :class="['navbar', currentLang === 'en' ? 'ltr' : 'rtl']">
      <div class="navbar__left mobile-menu">
        <i class="fas fa-bars menu-icon" @click="openMenu"></i>
      </div>

      <div class="navbar__left desktop-icons">
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
        <router-link to="/">
          <img src="../../../public/assets/img/logo.png" alt="Logo" class="logo" />
        </router-link>
      </div>

      <div class="mobile-icons">
        <img src="../../../public/assets/img/Ellipse.png" alt="Search" class="icon" />
        <router-link to="/cart" class="icon-link">
          <img src="../../../public/assets/img/Cart.png" alt="Bag" class="icon" />
        </router-link>
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  name: "Navbar",
  data() {
    return {
      isMenuOpen: false,
      currentLang: localStorage.getItem('currentLang') || 'ar',
      isMobile: false,
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
      localStorage.setItem('currentLang', lang);
      this.$root.$emit('languageChanged', lang);
      // Close menu if it's open before reload
      if (this.isMenuOpen) {
        this.isMenuOpen = false;
        document.body.style.overflow = '';
      }
      // Set a small timeout to ensure localStorage is updated before reload
      setTimeout(() => {
        window.location.reload();
      }, 50);
    },
    isActive(path) {
      return this.$route.path === path;
    },
    openMenu() {
      this.isMenuOpen = true;
      document.body.style.overflow = 'hidden';
    },
    closeMenu() {
      this.isMenuOpen = false;
      document.body.style.overflow = '';
    },
    checkMobile() {
      this.isMobile = window.innerWidth <= 767;
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
  },
  mounted() {
    this.checkMobile();
    window.addEventListener('resize', this.checkMobile);
  },
  beforeDestroy() {
    window.removeEventListener('resize', this.checkMobile);
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
  width: 34px;
  height: 34px;
  margin-left: 0;
  filter: brightness(0) saturate(110%) invert(76%) sepia(34%) saturate(409%) hue-rotate(337deg) brightness(109%) contrast(97%);
}

/* Logo style */
.logo {
  width: 81px;
  height: 78px;
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
  font-size: 24px;
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
  font-size: 24px;
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

.mobile-menu, .mobile-icons {
  display: none;
}

.menu-icon {
  color: #AA8B7A;
  font-size: 24px;
  cursor: pointer;
}

/* Media Queries for Responsive Design */
@media only screen and (max-width: 435px) {
  .navbar {
    padding: 15px 20px !important;
    position: relative !important;
  }

  .language-switcher {
    padding: 8px 20px !important;
    text-align: center !important;
  }

  .navbar__center {
    display: none !important;
  }

  .desktop-icons {
    display: none !important;
  }

  .mobile-menu {
    display: block !important;
    order: 1 !important;
  }

  .navbar__right {
    order: 2 !important;
    position: absolute !important;
    left: 50% !important;
    transform: translateX(-50%) !important;
  }

  .mobile-icons {
    display: flex !important;
    gap: 15px !important;
    order: 3 !important;
    align-items: center !important;
  }

  .logo {
    width: 50px !important;
    height: 45px !important;
  }

  .icon {
    width: 24px !important;
    height: 24px !important;
  }
}

@media only screen and (max-width: 393px) {
  .navbar {
    padding: 12px 15px !important;
  }

  .language-switcher {
    padding: 6px 15px !important;
  }

  .logo {
    width: 45px !important;
    height: 40px !important;
  }

  .icon {
    width: 22px !important;
    height: 22px !important;
  }

  .mobile-icons {
    gap: 12px !important;
  }
}

@media only screen and (max-width: 375px) {
  .navbar {
    padding: 10px 12px !important;
  }

  .language-switcher {
    padding: 5px 12px !important;
  }

  .logo {
    width: 40px !important;
    height: 35px !important;
  }

  .icon {
    width: 20px !important;
    height: 20px !important;
  }

  .mobile-icons {
    gap: 10px !important;
  }

  .lang-btn {
    font-size: 12px !important;
    padding: 3px 6px !important;
  }
}

/* Mobile Menu Styles */
.mobile-menu-overlay {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 998;
}

.mobile-menu-drawer {
  position: fixed;
  top: 0;
  bottom: 0;
  width: 80%;
  max-width: 300px;
  background-color: #212A1E;
  z-index: 999;
  transform: translateX(-100%);
  transition: transform 0.3s ease-in-out;
  display: flex;
  flex-direction: column;
}

.mobile-menu-drawer.rtl {
  left: 0;
  transform: translateX(-100%);
}

.mobile-menu-drawer.ltr {
  right: 0;
  transform: translateX(100%);
}

.mobile-menu-drawer.open {
  transform: translateX(0);
}

.drawer-header {
  padding: 20px;
  border-bottom: 1px solid rgba(170, 139, 122, 0.2);
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.drawer-logo {
  display: flex;
  align-items: center;
}

.drawer-logo .logo {
  width: 50px;
  height: 45px;
}

.close-menu {
  color: #AA8B7A;
  font-size: 24px;
  cursor: pointer;
}

.drawer-content {
  padding: 20px;
  display: flex;
  flex-direction: column;
  height: 100%;
}

.drawer-nav-links {
  display: flex;
  flex-direction: column;
  gap: 20px;
}
.ltr .drawer-nav-links a {
  font-family: Philosopher,serif;
}
.rtl .drawer-nav-links a {
  font-family: 'TheSansArabic', sans-serif;
}
.drawer-nav-links a {
  color: #fff;
  text-decoration: none;
  font-size: 18px;
  padding: 10px 0;
  border-bottom: 1px solid rgba(170, 139, 122, 0.2);
}

.drawer-nav-links a.active {
  color: #AA8B7A;
}

.drawer-bottom-icons {
  margin-top: auto;
  display: flex;
  flex-direction: column;
  gap: 15px;
  padding-top: 20px;
  border-top: 1px solid rgba(170, 139, 122, 0.2);
}

.drawer-icon-link {
  display: flex;
  align-items: center;
  gap: 10px;
  color: #fff;
  text-decoration: none;
  padding: 10px 0;
}
.ltr .drawer-icon-link span {
  font-family: Philosopher,serif;
}
.rtl .drawer-icon-link span {
  font-family: 'TheSansArabic', sans-serif;
}
.drawer-icon-link span {
  color: #fff;
  font-size: 16px;
}

.drawer-icon-link .icon {
  width: 24px;
  height: 24px;
}

/* Update existing mobile menu styles */
.mobile-menu {
  cursor: pointer;
}

.menu-icon:hover {
  opacity: 0.8;
}

/* Tablet Specific Styles (Surface Pro 7 and similar devices) */
@media screen and (min-width: 768px) and (max-width: 1024px) {
  .navbar {
    padding: 20px 40px;
  }

  .language-switcher {
    padding: 10px 40px;
  }

  /* Adjust logo size for tablets */
  .logo {
    width: 60px;
    height: 55px;
  }

  /* Adjust icon sizes */
  .icon {
    width: 26px;
    height: 26px;
  }

  /* Adjust center navigation */
  .navbar__center {
    margin-left: 20%;
  }

  .navbar.ltr .navbar__center {
    margin-right: 20%;
    margin-left: 0;
  }

  /* Adjust navigation text size */
  .navbar__center a {
    font-size: 16px;
    margin-left: 16px;
  }

  .navbar.ltr .navbar__center a {
    margin-left: 0;
    margin-right: 16px;
    font-size: 18px;
  }

  /* Adjust icon spacing */
  .icon-link {
    margin-left: 8px;
  }

  .navbar.ltr .icon-link {
    margin-left: 0;
    margin-right: 8px;
  }

  /* Adjust language switcher for tablets */
  .lang-btn {
    font-size: 13px;
    padding: 4px 8px;
  }
}

/* Landscape tablet adjustments */
@media screen and (min-width: 1024px) and (max-width: 1200px) {
  .navbar {
    padding: 24px 80px;
  }

  .language-switcher {
    padding: 12px 80px;
  }

  .navbar__center {
    margin-left: 25%;
  }

  .navbar.ltr .navbar__center {
    margin-right: 25%;
    margin-left: 0;
  }
}

/* Adjust the existing mobile breakpoint to not conflict with tablet */
@media only screen and (max-width: 767px) {
  /* Move existing mobile styles here */
  .navbar {
    padding: 31px 20px !important;
    position: relative !important;
  }

  .language-switcher {
    padding: 8px 20px !important;
    text-align: center !important;
  }

  .navbar__center {
    display: none !important;
  }

  .desktop-icons {
    display: none !important;
  }

  .mobile-menu {
    display: block !important;
    order: 1 !important;
  }

  .navbar__right {
    order: 2 !important;
    position: absolute !important;
    left: 50% !important;
    transform: translateX(-50%) !important;
  }

  .mobile-icons {
    display: flex !important;
    gap: 15px !important;
    order: 3 !important;
    align-items: center !important;
  }

  .logo {
    width: 50px !important;
    height: 45px !important;
  }

  .icon {
    width: 24px !important;
    height: 24px !important;
  }
}

/* Mobile menu language switcher styles */
.mobile-menu-drawer .language-switcher {
  padding: 15px 20px;
  text-align: center;
  border-bottom: 1px solid rgba(170, 139, 122, 0.2);
  background: #212A1E;
  display: flex;
  justify-content: center;
  align-items: center;
}

/* Media queries */
@media only screen and (max-width: 767px) {
  .language-switcher {
    display: none;
  }
  
  .mobile-menu-drawer .language-switcher {
    display: flex;
  }
}
</style>
