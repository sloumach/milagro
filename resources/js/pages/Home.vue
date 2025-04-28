<template>
  <div class="hero-figma-small">
    <!-- Top star -->
    <img src="../../../public/assets/img/star.png" class="star star-top" alt="star" />
    <div class="ovals-row">
      <!-- Left oval and bottom star -->
      <div class="oval-container">
        <img src="../../../public/assets/img/chocolate.png" class="img-oval oval-choco" alt="Chocolate" />
        <img src="../../../public/assets/img/star.png" class="star star-bottom" alt="star" />
      </div>
      
      <!-- Arrow between ovals -->
      <img src="../../../public/assets/img/nextstep.png" class="next-arrow" alt="التالي" />
      <!-- Right oval -->
      <div class="oval-container">
        <img src="../../../public/assets/img/sale.png" class="img-oval oval-sale" alt="Sale" />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Home",
};
</script>

<style scoped>
.home {
  background: #23291c;
  color: #aa8b7a;
  min-height: 100vh;
  font-family: 'TheSansArabic', sans-serif;
  text-align: center;
  padding: 40px 0;
}
.img-oval {
  border-radius: 50% / 40%;
  width: 180px;
  height: 240px;
  margin: 0 16px;
  border: 3px solid #aa8b7a;
}
.home__content h1 {
  font-size: 48px;
  margin: 24px 0 12px;
}
.shop-btn {
  background: #aa8b7a;
  color: #fff;
  border: none;
  padding: 16px 48px;
  font-size: 20px;
  border-radius: 6px;
  margin-top: 16px;
  cursor: pointer;
}
.home__features {
  display: flex;
  justify-content: center;
  margin-top: 48px;
}
.home__features > div {
  margin: 0 32px;
  text-align: center;
}

.hero-grid {
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background: #23291c;
  padding: 0 5vw;
}

.hero-images-col {
  display: flex;
  flex-direction: column;
  align-items: center;
  flex: 1;
}

.hero-images {
  display: flex;
  flex-direction: column;
  align-items: center;
  position: relative;
}

.img-oval {
  border-radius: 50% / 40%;
  width: 220px;
  height: 320px;
  margin: 0 16px 0 0;
  border: 3px solid #aa8b7a;
  background: #23291c;
  object-fit: cover;
}

.img-oval + .img-oval {
  margin-top: 24px;
}

.star {
  position: absolute;
  top: -40px;
  left: 50%;
  transform: translateX(-50%);
  width: 48px;
  z-index: 2;
}

.next-row {
  display: flex;
  align-items: center;
  margin-top: 24px;
}

.next-arrow {
  width: 40px;
  align-self: flex-end;
  margin-bottom: 20px;
  margin-left: 8px;
  margin-right: 8px;
}

.next-text {
  color: #aa8b7a;
  font-size: 18px;
  font-family: 'TheSansArabic', sans-serif;
}

.hero-text-col {
  display: flex;
  flex-direction: column;
  align-items: flex-end;
  justify-content: center;
  flex: 1;
  text-align: right;
  padding-right: 40px;
}

.milagro-title {
  font-family: 'Philosopher', serif;
  font-size: 70px;
  color: #AA8B7A;
  margin-bottom: 24px;
  letter-spacing: 0;
}

.milagro-desc {
  color: #fff;
  font-size: 26px;
  margin-bottom: 32px;
  font-family: 'TheSansArabic', sans-serif;
}

.shop-btn {
  background: #aa8b7a;
  color: #fff;
  border: none;
  padding: 16px 48px;
  font-size: 28px;
  border-radius: 8px;
  cursor: pointer;
  font-weight: bold;
  align-self: flex-end;
}

.image-grid {
  position: relative;
  width: fit-content;
  margin: 60px auto 0 auto;
  min-width: 600px;
}

.ovals-row {
  display: flex;
  flex-direction: row;
  align-items: flex-end;
  gap: 32px;
  position: relative;
}

.oval-container {
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.img-oval {
  border-radius: 50% / 40%;
  width: 220px;
  height: 320px;
  border: 4px solid #aa8b7a;
  background: #23291c;
  object-fit: cover;
  z-index: 2;
}

.star.star-top {
  position: absolute;
  top: -60px;
  left: 50%;
  transform: translateX(-50%);
  width: 56px;
  z-index: 3;
}

.bottom-decor {
  position: absolute;
  left: -50px;
  bottom: -60px;
  display: flex;
  align-items: center;
  z-index: 4;
}

.star.star-bottom {
  position: absolute;
  left: -30px;
  bottom: 20px;
  width: 36px;
  z-index: 3;
}

.next-row {
  display: flex;
  align-items: center;
}

.next-arrow {
  width: 40px;
  margin-left: 8px;
}

.next-text {
  color: #aa8b7a;
  font-size: 18px;
  font-family: 'TheSansArabic', sans-serif;
}

.hero-figma {
  position: relative;
  width: 100vw;
  height: 100vh;
  background: #23291c;
  overflow: hidden;
}

/* Top star */
.star.star-top {
  position: absolute;
  width: 66px;
  height: 66px;
  left: 483px;
  top: 245px;
  z-index: 3;
}

/* Ovals row */
.ovals-row {
  position: absolute;
  left: 367px; /* aligns left oval */
  top: 330px;
  display: flex;
  flex-direction: row;
  align-items: flex-end;
  gap: 40px;
}

/* Left oval */
.oval-choco {
  width: 215.91px;
  height: 349.35px;
  border-radius: 50% / 40%;
  border: 4px solid #aa8b7a;
  object-fit: cover;
  background: #23291c;
  z-index: 2;
}

/* Right oval */
.oval-sale {
  width: 292px;
  height: 449px;
  border-radius: 50% / 40%;
  border: 4px solid #aa8b7a;
  object-fit: cover;
  background: #23291c;
  z-index: 2;
}

/* Bottom star */
.star.star-bottom {
  position: absolute;
  width: 35px;
  height: 35px;
  left: -178px; /* 189px (star) - 367px (oval left) = -178px */
  top: 335px;   /* 665px (star) - 330px (oval row top) = 335px */
  z-index: 3;
}

/* Arrow */
.next-arrow {
  position: absolute;
  width: 92px;
  height: 40.9px;
  left: 54px;   /* 421px (arrow) - 367px (oval left) = 54px */
  top: 347px;   /* 677px (arrow) - 330px (oval row top) = 347px */
  z-index: 3;
}

.hero-figma-small {
  position: relative;
  width: 100vw;
  height: 70vh;
  background: #23291c;
  overflow: hidden;
}

/* Top star */
.star.star-top {
  position: absolute;
  width: 40px;
  height: 40px;
  left: 300px;
  top: 80px;
  z-index: 3;
}

/* Ovals row */
.ovals-row {
  position: absolute;
  left: 220px; /* aligns left oval */
  top: 150px;
  display: flex;
  flex-direction: row;
  align-items: flex-end;
  gap: 24px;
}

/* Left oval */
.oval-choco {
  width: 130px;
  height: 210px;
  border-radius: 50% / 40%;
  border: 3px solid #aa8b7a;
  object-fit: cover;
  background: #23291c;
  z-index: 2;
}

/* Right oval */
.oval-sale {
  width: 175px;
  height: 270px;
  border-radius: 50% / 40%;
  border: 3px solid #aa8b7a;
  object-fit: cover;
  background: #23291c;
  z-index: 2;
}

/* Bottom star */
.star.star-bottom {
  position: absolute;
  width: 22px;
  height: 22px;
  left: -100px;
  top: 200px;
  z-index: 3;
}

/* Arrow */
.next-arrow {
  position: absolute;
    width: 66px;
    height: 27px;
    left: 117px;
    top: 250px;
    z-index: 3;
}
</style>
  