<template>
  <nav class="navbar">
    <div class="navbar__left">
      <!-- Icons: user, bag, heart, search -->
      <img src="../../../public/assets/img/Account.png" alt="User" class="icon" />
      <img src="../../../public/assets/img/Cart.png" alt="Bag" class="icon" />
      <img src="../../../public/assets/img/heart.png" alt="Heart" class="icon" />
      <img src="../../../public/assets/img/Ellipse.png" alt="Search" class="icon" />
    </div>
    <div class="navbar__center">
      <router-link to="/contact" exact-active-class="active">تواصل معنا</router-link>
      <router-link to="/new" exact-active-class="active">وصل حديثاً</router-link>
      <router-link to="/shop" exact-active-class="active">المتجر</router-link>
      <router-link to="/home" exact-active-class="active">الرئيسية</router-link>
    </div>
    <div class="navbar__right">
      <img src="../../../public/assets/img/logo.png" alt="Logo" class="logo" />
    </div>
  </nav>
</template>

<script>
export default {
  name: "Navbar",
};
</script>

<style scoped>
.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: #212A1E; /* Backend color */
  padding: 24px 59px; /* Reduced horizontal padding */
  font-family: 'TheSansArabic', sans-serif;
}
.navbar__left, .navbar__center, .navbar__right {
  display: flex;
  align-items: center;
}
.icon {
  width: 31px;
  height: 32px;
  margin-left: 4px;
  /* Tint icons to #AA8B7A if they're black by default */
  filter: brightness(0) saturate(100%) invert(69%) sepia(13%) saturate(386%) hue-rotate(337deg) brightness(92%) contrast(88%);
}
.logo {
  width: 70px;
  height: 65px;
}
.navbar__center {
  display: flex;
  align-items: flex-end; /* Ensures all links align at the bottom */
  position: relative;
  height: 27px;
  margin-left: 35%;
}
.navbar__center a {
  color: #fff;
  margin-left: 24px;
  text-decoration: none;
  font-size: 18px;
  transition: color 0.2s;
  position: relative;
  /* No padding-bottom here! */
  display: flex;
  align-items: flex-end;
  height: 48px; /* Same as parent for vertical alignment */
}
.navbar__center .active,
.navbar__center a.router-link-exact-active {
  color: #AA8B7A !important;
}

.navbar__center .active::after,
.navbar__center a.router-link-exact-active::after {
  content: '';
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  bottom: -10px; /* Place dot just below the text, adjust as needed */
  width: 4px;
  height: 4px;
  border-radius: 50%;
  background: #AA8B7A;
  display: block;
}
</style>
  