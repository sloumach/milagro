<template>
  <div class="home-container">
    <div :class="['hero-figma-small-row', currentLang === 'en' ? 'ltr' : 'rtl']">
      <!-- Left/Right: Ovals and stars -->
      <div class="hero-figma-small">
        <!-- Top star -->
        <img src="../../../public/assets/img/star.png" class="star star-top" alt="star" />
        <img src="../../../public/assets/img/star.png" class="star star-bottom" alt="star" />
        <img v-if="currentLang === 'ar'" src="../../../public/assets/img/nextstep.png" class="next-arrow" alt="التالي"
          @click="swapOvals" />
        <img v-if="currentLang === 'en'" src="../../../public/assets/img/nextanglais.png"
          class="next-arrow next-arrow-en" alt="next" @click="swapOvals" />
        <div class="ovals-row">
          <!-- Images section -->
          <div class="slides-container" :class="currentLang === 'en' ? 'ltr' : 'rtl'" @mousedown="startDrag"
            @mousemove="onDrag" @mouseup="endDrag" @mouseleave="endDrag" @touchstart="startTouch" @touchmove="onTouch"
            @touchend="endTouch">
            <div class="slides-wrapper" :style="{ transform: slideTransform }">

              <div class="oval-container" :class="{ 'primary': currentSlide === 0, 'secondary': currentSlide === 3 }">
                <img src="../../../public/assets/img/homeslider/Group76.png" class="img-oval" alt="Pastries" />
              </div>
              <div class="oval-container" :class="{ 'primary': currentSlide === 1, 'secondary': currentSlide === 0 }">
                <img src="../../../public/assets/img/homeslider/Group77.png" class="img-oval" alt="Chocolate Box" />
              </div>
              <div class="oval-container" :class="{ 'primary': currentSlide === 2, 'secondary': currentSlide === 1 }">
                <img src="../../../public/assets/img/homeslider/Group78.png" class="img-oval"
                  alt="Flowers & Chocolate" />
              </div>
              <div class="oval-container" :class="{ 'primary': currentSlide === 3, 'secondary': currentSlide === 2 }">
                <img src="../../../public/assets/img/homeslider/Group79.png" class="img-oval" alt="Chocolate Display" />
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Right/Left: MILAGRO content -->
      <div class="milagro-content">
        <h1 class="milagro-title">MILAGRO</h1>
        <div class="milagro-desc-row">
          <span class="milagro-desc-line"></span>
          <span class="milagro-desc">
            {{ translations.description[currentLang] }}
          </span>
        </div>
        <button class="shop-btn" @click="goToShopBoxes">{{ translations.shopButton[currentLang] }}</button>
      </div>
    </div>

    <!-- Mobile Only: Luxurious Chocolate Moments Section -->
    <div class="mobile-luxury-moments" v-if="isMobile">
      <span v-if="currentLang === 'ar'">
        جلب لحظات الشوكولاتة الفاخرة للجميع مع ذوق للأناقة والدلال.
      </span>
      <span v-else>
        Bringing luxurious chocolate moments to everyone with a taste for elegance and indulgence.
      </span>
    </div>

    <!-- Mobile Only: Features Section -->
    <div class="mobile-features-section" v-if="isMobile">
      <div class="mobile-features-row">
        <div class="mobile-feature-item">
          <img src="../../../public/assets/img/delivery.png" class="feature-icon" alt="delivery" />
          <div class="feature-title">{{ translations.features.delivery.title[currentLang] }}</div>
        </div>
        <div class="mobile-feature-item">
          <img src="../../../public/assets/img/selection.png" class="feature-icon" alt="selection" />
          <div class="feature-title">{{ translations.features.selection.title[currentLang] }}</div>
        </div>
        <div class="mobile-feature-item">
          <img src="../../../public/assets/img/quality.png" class="feature-icon" alt="quality" />
          <div class="feature-title">{{ translations.features.quality.title[currentLang] }}</div>
        </div>
      </div>
      <div class="mobile-features-decor">
        <img src="../../../public/assets/img/line.png" alt="decor" />
      </div>
    </div>

    <!-- Features Section -->
    <section class="features-section" v-if="!isMobile" :class="currentLang === 'en' ? 'ltr' : 'rtl'">
      <div class="features-container">
        <!-- Best Quality -->
        <div class="feature-item">
          <div class="title-row">
            <img src="../../../public/assets/img/quality.png" class="feature-icon" alt="quality" />
            <h3 class="feature-title">{{ translations.features.quality.title[currentLang] }}</h3>
          </div>
          <p class="feature-description">{{ translations.features.quality.description[currentLang] }}</p>
        </div>

        <!-- Fast Delivery -->
        <div class="feature-item">
          <div class="title-row">
            <img src="../../../public/assets/img/delivery.png" class="feature-icon" alt="delivery" />
            <h3 class="feature-title">{{ translations.features.delivery.title[currentLang] }}</h3>
          </div>
          <p class="feature-description">{{ translations.features.delivery.description[currentLang] }}</p>
        </div>

        <!-- Big Selection -->
        <div class="feature-item">
          <div class="title-row">
            <img src="../../../public/assets/img/selection.png" class="feature-icon" alt="selection" />
            <h3 class="feature-title">{{ translations.features.selection.title[currentLang] }}</h3>
          </div>
          <p class="feature-description">{{ translations.features.selection.description[currentLang] }}</p>
        </div>
      </div>
    </section>

    <best-seller :current-lang="currentLang" />
    <chocolate-diffuser :current-lang="currentLang" v-if="!isMobile" />
    <luxury-moments :current-lang="currentLang" />
    <product-grid :current-lang="currentLang" />
  </div>
</template>


<script>
import BestSeller from './sous-home/BestSeller.vue';
import ChocolateDiffuser from './sous-home/ChocolateDiffuser.vue';
import LuxuryMoments from './sous-home/LuxuryMoments.vue';
import ProductGrid from './sous-home/ProductGrid.vue';

export default {
  name: "Home",
  data() {
    return {
      currentLang: localStorage.getItem('currentLang') || 'en',
      currentSlide: 0,
      swapped: false,
      isDragging: false,
      startX: 0,
      isMobile: false,
      touchStartX: 0,
      isTouching: false,
      translations: {
        description: {
          ar: 'شوكولاتة راقية تُضفي لمسة سحرية على لحظاتك الخاصة',
          en: 'Premium Chocolate for Every Special Occasion'
        },
        shopButton: {
          ar: 'تسوق الآن',
          en: 'Shop Now'
        },
        features: {
          quality: {
            title: {
              ar: 'مجموعة كبيرة',
              en: 'Best Quality'
            },
            description: {
              ar: 'الهدف من هذا النص هو عرض الشكل النهائي للتصميم دون استخدام محتوى حقيقي.',
              en: 'Lorem ipsum dolor sit amet, tempor incididunt ut labore'
            }
          },
          delivery: {
            title: {
              ar: 'توصيل سريع',
              en: 'Fast Delivery'
            },
            description: {
              ar: 'الهدف من هذا النص هو عرض الشكل النهائي للتصميم دون استخدام محتوى حقيقي.',
              en: 'Lorem ipsum dolor sit amet, tempor incididunt ut labore'
            }
          },
          selection: {
            title: {
              ar: 'أفضل جودة',
              en: 'Big Selection'
            },
            description: {
              ar: 'الهدف من هذا النص هو عرض الشكل النهائي للتصميم دون استخدام محتوى حقيقي.',
              en: 'Lorem ipsum dolor sit amet, tempor incididunt ut labore'
            }
          }
        }
      }
    };
  },
  computed: {
    slideTransform() {
      if (this.isMobile) {
        // Mobile-specific transforms
        if (this.currentLang === 'ar') {
          // Arabic mobile transforms
          switch (this.currentSlide) {
            case 1:
              return 'translateX(105%)';
            case 2:
              return 'translateX(203%)';
            case 3:
              return 'translateX(251%)';
            default:
              return 'translateX(22px)';
          }
        } else {
          // English mobile transforms
          switch (this.currentSlide) {
            case 1:
              return 'translateX(-22%)';
            case 2:
              return 'translateX(-48%)';
            case 3:
              return 'translateX(-73%)';
            default:
              return 'translateX(19px)';
          }
        }
      } else if (window.innerWidth >= 768 && window.innerWidth <= 1024) {
        // Tablet-specific transforms
        if (this.currentLang === 'ar') {
          // Arabic tablet transforms
          switch (this.currentSlide) {
            case 1:
              return 'translateX(110%)';
            case 2:
              return 'translateX(221%)';
            case 3:
              return 'translateX(265%)';
            default:
              return 'translateX(0%)';
          }
        } else {
          // English tablet transforms
          switch (this.currentSlide) {
            case 1:
              return 'translateX(-26%)';
            case 2:
              return 'translateX(-54%)';
            case 3:
              return 'translateX(-79%)';
            default:
              return 'translateX(0%)';
          }
        }
      } else {
        // Desktop transforms
        return this.currentLang === 'ar'
          ? `translateX(${this.currentSlide === 0 ? 0 : this.currentSlide === 1 ? 46 : this.currentSlide === 2 ? 89 : 131}%)`
          : `translateX(-${this.currentSlide * 25}%)`;
      }
    }
  },
  methods: {
    checkMobile() {
      this.isMobile = window.innerWidth <= 445;
    },
    goToShopBoxes() {
      window.location.href = '/shop/boxes';
    },
    startDrag(event) {
      this.isDragging = true;
      this.startX = event.clientX;
    },
    onDrag(event) {
      if (!this.isDragging) return;

      const currentX = event.clientX;
      const diffX = currentX - this.startX;
      const isRTL = this.currentLang === 'ar';

      // If dragged more than 100px, trigger slide
      if (Math.abs(diffX) > 100) {
        if (isRTL) {
          // RTL (Arabic) mode - reverse the direction
          if (diffX < 0 && this.currentSlide > 0) {
            // Dragged left - go to previous slide
            this.currentSlide--;
          } else if (diffX > 0 && this.currentSlide < 3) {
            // Dragged right - go to next slide
            this.currentSlide++;
          }
        } else {
          // LTR (English) mode
          if (diffX > 0 && this.currentSlide > 0) {
            // Dragged right - go to previous slide
            this.currentSlide--;
          } else if (diffX < 0 && this.currentSlide < 3) {
            // Dragged left - go to next slide
            this.currentSlide++;
          }
        }
        this.isDragging = false;
      }
    },
    endDrag() {
      this.isDragging = false;
    },
    swapOvals() {
      this.currentSlide = (this.currentSlide + 1) % 4;
    },
    startTouch(event) {
      this.isTouching = true;
      this.touchStartX = event.touches[0].clientX;
    },
    onTouch(event) {
      if (!this.isTouching) return;
      event.preventDefault();

      const currentX = event.touches[0].clientX;
      const diffX = currentX - this.touchStartX;
      const isRTL = this.currentLang === 'ar';

      // If swiped more than 50px (more sensitive for touch)
      if (Math.abs(diffX) > 50) {
        if (isRTL) {
          // RTL (Arabic) mode - reversed logic
          if (diffX > 0 && this.currentSlide > 0) {
            // Swiped right - go to previous slide
            this.currentSlide--;
          } else if (diffX < 0 && this.currentSlide < 3) {
            // Swiped left - go to next slide
            this.currentSlide++;
          }
        } else {
          // LTR (English) mode
          if (diffX > 0 && this.currentSlide > 0) {
            // Swiped right - go to previous slide
            this.currentSlide--;
          } else if (diffX < 0 && this.currentSlide < 3) {
            // Swiped left - go to next slide
            this.currentSlide++;
          }
        }
        this.isTouching = false;
      }
    },
    endTouch() {
      this.isTouching = false;
    }
  },
  created() {
    this.$root.$on('languageChanged', (lang) => {
      this.currentLang = lang;
    });
    this.checkMobile();
    window.addEventListener('resize', this.checkMobile);
  },
  beforeDestroy() {
    this.$root.$off('languageChanged');
    window.removeEventListener('resize', this.checkMobile);
  },
  components: {
    BestSeller,
    ChocolateDiffuser,
    LuxuryMoments,
    ProductGrid,
  }
};
</script>

<style scoped>
.home-container {
  width: 100%;
  min-height: 100vh;
  background: #212A1E;
  display: flex;
  flex-direction: column;
}

.home {
  background: #212A1E;
  color: #aa8b7a;
  min-height: 100vh;
  font-family: 'TheSansArabic', sans-serif;
  text-align: center;
  padding: 40px 0;
}

.home__content h1 {
  font-size: 48px;
  margin: 24px 0 12px;
}

.home__features {
  display: flex;
  justify-content: center;
  margin-top: 48px;
}

.home__features>div {
  margin: 0 32px;
  text-align: center;
}

.hero-grid {
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background: #212A1E;
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

.img-oval+.img-oval {
  margin-top: 24px;
}

.img-oval {
  transition: transform 0.6s ease, opacity 0.6s ease;
}

.oval-container {
  transition: all 0.6s ease-in-out;
  will-change: transform, opacity;
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

.hero-text-col {
  display: flex;
  flex-direction: column;
  align-items: flex-end;
  justify-content: center;
  flex: 1;
  text-align: right;
  padding-right: 40px;
}

.image-grid {
  position: relative;
  width: fit-content;
  margin: 60px auto 0 auto;
  min-width: 600px;
}

.oval-container {
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.bottom-decor {
  position: absolute;
  left: -50px;
  bottom: -60px;
  display: flex;
  align-items: center;
  z-index: 4;
}

.next-arrow {
  position: absolute;
  width: 88px;
  height: 34px;
  left: 48vh;
  top: 62vh;
  z-index: 4;
  transition: transform .3s ease;
  cursor: pointer;
}

.next-arrow:hover {
  transform: scale(1.1);
}

/* Position for English arrow */
.next-arrow-en {
  right: 170px;
  left: auto;
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
  background: #212A1E;
  overflow: hidden;
}

/* Right oval */
.oval-sale {
  width: 231px;
  height: 376px;
  border-radius: 50% / 30%;
  border: 3px solid #aa8b7a;
  object-fit: cover;
  background: #212A1E;
  z-index: 2;
  position: relative;
  top: 33px;
  padding: 5px;
  transition: all 0.6s ease-in-out;
  will-change: transform, opacity;
}

/* Bottom star */
.star.star-bottom {
  position: absolute;
  width: 33px;
  height: 33px;
  left: 22vh;
  top: 60vh;
  z-index: 2;
}

/* Top star */
.star.star-top {
  position: absolute;
  width: 46px;
  height: 46px;
  left: 450px;
  top: 14px;
  z-index: 2;
}

/* Ovals row */
.ovals-row {
  position: relative;
  display: flex;
  flex-direction: row;
  align-items: center;
  width: 91%;
  height: 100%;
  margin: 0 auto;
  overflow: hidden;
}

/* Just reverse the direction for Arabic */
.rtl .ovals-row {
  flex-direction: row-reverse;
  padding-right: 68px;
}

/* Left oval */
.oval-choco {
  width: 184px;
  height: 303px;
  border-radius: 50% / 30%;
  border: 3px solid #aa8b7a;
  object-fit: cover;
  background: #212A1E;
  z-index: 2;
  padding: 5px;
  transition: all 0.6s ease-in-out;
  will-change: transform, opacity;
}

.hero-figma-small-row {
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 70vh;
  background: #212A1E;
  overflow: hidden;
}

/* RTL (Arabic) layout */
.hero-figma-small-row.rtl {
  flex-direction: row;
}

/* LTR (English) layout */
.hero-figma-small-row.ltr {
  flex-direction: row-reverse;
}

.hero-figma-small {
  position: relative;
  width: 50%;
  height: 100%;
  background: #212A1E;
  overflow: hidden;
  z-index: 1;
  display: flex;
  justify-content: center;
  align-items: center;
}

/* RTL adjustment for hero section */
.rtl .hero-figma-small {
  width: 52%;
}

.milagro-content {
  width: 50%;
  display: flex;
  flex-direction: column;
  align-items: flex-end;
  justify-content: center;
  padding-left: 0px;
  padding-right: 8%;
  text-align: right;
}

/* RTL adjustment for content section */
.rtl .milagro-content {
  width: 35%;
  padding-right: 106px;
}

.ltr .hero-figma-small {
  margin: 0px 81px;
  width: 69%;
}

/* Adjust content alignment for English */
.ltr .milagro-content {
  align-items: flex-start;
  padding-right: 0px;
  padding-left: 10%;
  text-align: left;
}

.milagro-title {
  font-family: Philosopher, serif;
  font-size: 54px;
  color: #aa8b7a;
  margin-bottom: 24px;
  letter-spacing: 3px;
  font-weight: normal;
}

.milagro-desc-row {
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: flex-end;
  margin-bottom: 32px;
  gap: 3px;
  direction: rtl;
}

/* Adjust description row for English */
.ltr .milagro-desc-row {
  flex-direction: row;
  justify-content: flex-start;
  direction: ltr;
}

.milagro-desc-line {
  display: inline-block;
  width: 60px;
  height: 2px;
  background: #aa8b7a;
  border-radius: 2px;
  margin-left: 7px;
  margin-right: 0;
  margin-top: -29px;
}


.ltr .milagro-desc-line {
  margin-left: 0;
  margin-right: 7px;
  order: -1;
  margin-top: 0px;
}

.milagro-desc {
  color: #fff;
  font-size: 26px;
  font-family: 'TheSansArabic', sans-serif;
}

.shop-btn {
  background: #aa8b7a;
  color: #fff;
  border: none;
  padding: 13px 169px;
  font-size: 24px;
  border-radius: 8px;
  cursor: pointer;
  font-weight: 700;
  align-self: flex-end;
  font-family: 'TheSansArabic', sans-serif;
}

/* Adjust shop button alignment for English */
.ltr .shop-btn {
  align-self: flex-start;
  font-family: 'Philosopher', serif;
}

/* Reverse arrow for English */
.ltr .next-arrow {
  left: auto;
  right: 36vh;


}

/* Adjust top star position for English */
.ltr .star.star-top {
  left: auto;
  right: 48vh;
  top: 2px;
}

.ltr .features-container {
  max-width: 1343px;
  padding: 0px 130px;
  gap: 58px;
}

/* Adjust bottom star position for English */
.ltr .star.star-bottom {
  left: auto;
  right: 9vh;
  top: 58vh;
}

/* Add transform animations for swapped state */
.swapped .oval-container {
  transform: translateX(0);
}

/* Features Section Styles */
.features-section {
  background: #212A1E;
  padding: 60px 0;
  color: #fff;
  width: 100%;
  min-height: 255px;
  display: block;
  position: relative;
  margin-top: 30px;
}

.features-container {
  max-width: 1246px;
  margin: 0 auto;
  display: flex;
  justify-content: space-between;
  padding: 0 33px;
  position: relative;
  gap: 40px;
}

.feature-item {
  flex: 1;
  position: relative;
  padding: 20px;
}

.title-row {
  display: flex;
  align-items: center;
  gap: 15px;
  margin-bottom: 15px;
}

.feature-icon {
  width: 25px;
  height: 25px;
  opacity: 0.8;
}

.feature-title {
  color: #aa8b7a;
  font-size: 27px;
  font-weight: 500;
  margin: 0;
  font-family: 'TheSansArabic', sans-serif;
}

.feature-description {
  color: #fff;
  font-size: 18px;
  line-height: 1.6;
  margin: 0;
  opacity: 0.9;
  font-family: 'TheSansArabic', sans-serif;
}

/* Vertical lines between items */
.feature-item:not(:last-child)::after {
  content: '';
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  width: 2px;
  height: 80%;
  background-color: rgba(170, 139, 122, 0.3);
}

/* RTL (Arabic) specific styles */
.rtl .title-row {
  flex-direction: row-reverse;
  justify-content: flex-start;
}

.rtl .feature-title,
.rtl .feature-description {
  text-align: right;
  font-family: 'TheSansArabic', sans-serif;
}

.rtl .feature-title {
  color: #FFFFFF;
}

.rtl .feature-description {
  line-height: 1.8;
}

.rtl .feature-item:not(:last-child)::after {
  right: -20px;

}

/* LTR (English) specific styles */
.ltr .title-row {
  flex-direction: row;
  justify-content: flex-start;
}

.ltr .feature-title {
  text-align: left;
  font-family: 'Cairo', sans-serif;
  font-size: 27px;
  letter-spacing: 0;
  font-weight: 400;
  color: #FFFFFF;
}

.ltr .feature-description {
  text-align: left;
  font-family: 'Cairo', sans-serif;
  margin-left: 33px;
  line-height: auto;
  letter-spacing: 0;
  font-weight: 400;
  font-size: 19px;
}

.ltr .feature-item:not(:last-child)::after {
  right: 0;

}

.slides-container {
  position: relative;
  width: 100%;
  overflow: hidden;
  cursor: grab;
}

.slides-container:active {
  cursor: grabbing;
}

.slides-wrapper {
  display: flex;
  width: 175%;
  transition: transform 0.8s ease;
  will-change: transform;
}

.oval-container {
  position: relative;
  flex: 0 0 23%;
  padding: 34px 10px;
  display: flex;
  justify-content: center;
  align-items: center;
  transition: all 0.6s ease;
}

/* Primary image (first visible - large) */
.primary .img-oval {
  width: 40vh;
  height: 65vh;
  transform: scale(1);
  z-index: 3;
}

/* Secondary image (second visible - smaller) */
.secondary .img-oval {
  width: 38vh;
  height: 61vh;
  transform: scale(0.9);
  opacity: 0.9;
  z-index: 2;
}

/* Hidden images */
.oval-container:not(.primary):not(.secondary) .img-oval {
  transform: scale(0.8);
  opacity: 0.5;
}

/* Remove the different size classes */
.oval-choco,
.oval-sale {
  width: 231px;
  height: 376px;
}

/* New specific styles for Arabic version */
.rtl .slides-container {
  position: relative;
  width: 100%;
  overflow: hidden;
}

.rtl .slides-wrapper {
  display: flex;
  width: 98%;
  transition: transform .8s ease;
  flex-direction: row-reverse;
  /* Ensure normal direction */
}

.rtl .star.star-top {
  left: 435px;
  top: 1px;
}

.rtl .oval-container {
  flex: 0 0 23%;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 34px 10px;
}

.rtl .img-oval {
  width: 40vh;
  height: 65vh;
  border-radius: 50% / 30%;
  object-fit: cover;
  background: #212A1E;
  transition: all 0.6s ease;
}

/* Show first two images in Arabic */
.rtl .primary .img-oval {
  width: 40vh;
  height: 65vh;
  transform: scale(1);
  opacity: 1;
  z-index: 3;
}

.rtl .next-arrow {
  height: 38px;
  left: 45vh;
  top: 60vh;
}

.rtl .star.star-bottom {
  left: 17vh;
  top: 57vh;
}

.rtl .secondary .img-oval {
  width: 38vh;
  height: 61vh;
  transform: scale(0.9);
  opacity: 0.9;
  z-index: 2;
}

/* Hide other images */
.rtl .oval-container:not(.primary):not(.secondary) {
  opacity: 0;
}

/* Media Queries for Mobile Responsiveness */
@media only screen and (max-width: 445px) {
  .hero-figma-small-row {
    flex-direction: column !important;
    height: auto !important;
    padding: 20px 0 40px 0 !important;
  }

  .hero-figma-small {
    width: 100% !important;
    height: 400px !important;

  }

  .rtl .milagro-content {
    width: 32%;
    padding-right: 0 !important;
  }

  .milagro-content {
    width: 100% !important;
    padding: 0px -1px !important;
    align-items: flex-start !important;
    text-align: center !important;
  }

  .milagro-title {
    font-size: 42px !important;
    margin-bottom: 16px !important;
  }

  .milagro-desc-row {
    justify-content: center !important;
    margin-bottom: 24px !important;
    width: 100% !important;
  }

  .rtl .milagro-title {
    font-size: 42px !important;
    margin-bottom: 16px !important;
    margin-left: -18px !important;
    /* Remove left margin */
    text-align: right !important;
    /* Align text to the right */
    width: 100%;
    /* Optional: make it take full width */
  }

  .rtl .milagro-desc-row {
    justify-content: center !important;
    margin-bottom: 24px !important;
    width: 100% !important;
    margin-left: 7px !important;
  }

  .rtl .milagro-desc {
    font-size: 16px !important;
    text-align: justify !important;
    width: 69% !important;
    font-family: Cairo, sans-serif;
  }

  .rtl .shop-btn {
    padding: 12px 100px !important;
    font-size: 20px !important;
    margin-right: 23px !important;
  }

  .milagro-desc {
    font-size: 16px !important;
    text-align: justify !important;
    width: 80% !important;
    font-family: 'Cairo', sans-serif;
  }

  .shop-btn {
    padding: 12px 100px !important;
    font-size: 20px !important;
  }

  .next-arrow {
    top: auto !important;
    bottom: 20px !important;
    left: 50% !important;
    transform: translateX(-50%) !important;
    width: 70px !important;
  }

  .next-arrow-en {
    right: auto !important;
    left: 70% !important;
    bottom: 59px !important;
    height: 30px !important;
  }

  .rtl .next-arrow {
    top: auto !important;
    bottom: 53px !important;
    left: 25% !important;
    transform: translate(-50%) !important;
    width: 63px !important;
    height: 28px;
  }

  .star.star-top {
    left: auto !important;
    right: 162px !important;
    top: 8px !important;
    width: 32px !important;
    height: 31px !important;
  }

  .star.star-bottom {
    top: auto !important;
    bottom: 72px !important;
    width: 23px !important;
    right: 23vh !important;
    left: 89% !important;
    height: 23px !important;
  }

  .rtl .ovals-row {
    flex-direction: row-reverse;
    width: 100%;
    padding-right: 0px;
  }

  .ltr .ovals-row {
    flex-direction: row;
    width: 100%;
  }

  .slides-container {
    width: 100% !important;
    overflow: hidden !important;
    touch-action: pan-y pinch-zoom !important;
    /* Enable vertical scrolling but allow pinch zoom */
  }

  .slides-wrapper {
    width: 216% !important;
    transition: transform 0.6s ease !important;
    -webkit-user-select: none !important;
    /* Prevent text selection during swipe */
    user-select: none !important;
  }

  .rtl .slides-wrapper {
    width: 89% !important;
    flex-direction: row-reverse !important;
  }

  .rtl .star.star-top {
    right: 218px !important;
    top: 0px !important;
  }

  .rtl .star.star-bottom {
    bottom: 10px !important;
  }

  .oval-container {
    padding: 1px !important;
    justify-content: center !important;
    flex: 0 0 25% !important;
  }

  .primary .img-oval {
    width: 240px !important;
    height: 392px !important;
    margin-right: 0 !important;
  }

  .rtl .primary .img-oval {
    width: 240px !important;
    height: 392px !important;
  }

  .secondary .img-oval {
    width: 187px !important;
    height: 295px !important;
    margin-top: -78px !important;
  }

  .rtl .secondary .img-oval {
    width: 186px !important;
    height: 304px !important;
  }

  .mobile-luxury-moments {
    display: block;
    color: #fff;
    font-size: 18px;
    text-align: center;
    margin: 95px 0 40px 0;
    padding: 0 47px;
    font-family: Tenor Sans, Cairo, sans-serif;
    line-height: 1.7;
    letter-spacing: 0.6px;
  }

  /* Hide features-section in RTL (Arabic) on mobile */
  .rtl .features-section {
    display: none !important;
  }

  .mobile-features-section {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 24px 0 0 0;
    width: 100%;
  }

  .mobile-features-row {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    width: 100%;
    padding: 0 0;
    margin-bottom: 18px;
  }

  .mobile-feature-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    flex: 1 1 0;
    margin: 0 4px;
  }

  .mobile-feature-item .feature-icon {
    width: 48px;
    height: 48px;
    margin-bottom: 6px;
    filter: brightness(0) saturate(110%) invert(76%) sepia(34%) saturate(409%) hue-rotate(337deg) brightness(109%) contrast(97%);
  }

  .mobile-feature-item .feature-title {
    color: #fff;
    font-size: 15px;
    text-align: center;
    font-family: 'Cairo', 'TheSansArabic', sans-serif;
    margin-top: 2px;
    letter-spacing: 0.2px;
  }

  .mobile-features-decor {
    display: flex;
    justify-content: center;
    width: 100%;
    margin-top: 8px;
  }

  .mobile-features-decor img {
    width: 178px;
  }
}

@media only screen and (max-width: 393px) {
  .hero-figma-small {
    height: 380px !important;
  }

  .milagro-title {
    font-size: 38px !important;
  }

  .milagro-desc {
    font-size: 18px !important;
  }

  .shop-btn {
    padding: 10px 80px !important;
    font-size: 18px !important;
  }

  .primary .img-oval {
    width: 200px !important;
    height: 330px !important;
  }

  .secondary .img-oval {
    width: 184px !important;
        height: 301px !important;
        margin-top: -57px !important;
  }
  .rtl .primary .img-oval{
        width: 200px !important;
        height: 330px !important;
    }
    .rtl .secondary .img-oval {
    width: 184px !important;
        height: 301px !important;
        margin-top: -57px !important;
  }
  .star.star-bottom {
        top: auto !important;
        bottom: 61px !important;
        width: 23px !important;
        right: 31vh !important;
        left: 92% !important;
        height: 23px !important;
    }
    .rtl .oval-container {
        padding: 6px !important;
    }
    .rtl .star.star-top{
        right: 36px !important;
        top: 0 !important;
    }
    .rtl .star.star-bottom {
        bottom: 61px !important;
        left: 5% !important;
    }
    .milagro-desc-row {

        width: 80% !important;
    }
   
}

@media only screen and (max-width: 375px) {
  .hero-figma-small {
    height: 360px !important;
  }

  .milagro-title {
    font-size: 36px !important;
  }

  .milagro-desc {
    font-size: 17px !important;
    width: 90% !important;
  }

  .shop-btn {
    padding: 10px 70px !important;
    font-size: 17px !important;
  }

  .primary .img-oval {
    width: 240px !important;
    height: 310px !important;
  }

  .secondary .img-oval {
    width: 220px !important;
    height: 290px !important;
  }
}

/* Tablet Specific Styles (Surface Pro 7 and similar devices) */
@media screen and (min-width: 768px) and (max-width: 1024px) {

  /* Hero Section Adjustments */
  .hero-figma-small-row {
    height: 40vh;
  }

   
  /* Milagro Content Adjustments */
  .milagro-content {
    padding-right: 4%;
  }

  .rtl .milagro-content {
    width: 38%;
    padding-right: 0px;
  }

  .rtl .hero-figma-small {
    width: 58%;
  }

  .rtl .oval-container {
    padding: 34px 2px;
  }

  .ltr .milagro-content {
    padding-left: 4%;
  }

  .hero-figma-small-row.rtl  {
    width: 96%;
  }

  .milagro-title {
    font-size: 42px;
  }

  .ovals-row {
    width: 100%;
  }

  .milagro-desc {
    font-size: 22px;
  }

  .shop-btn {
    padding: 12px 100px;
    font-size: 20px;
  }

  /* Image Slider Adjustments */
  .hero-figma-small {
    width: 55%;
  }

  .ltr .hero-figma-small {
    margin: 0px 0px;
    width: 72%;
  }

  /* Adjust image sizes */
  .primary .img-oval {
    width: 18vh;
    height: 31vh;
  }

  .secondary .img-oval {
    width: 14vh;
    height: 23vh;
  }

  .rtl .ovals-row {
    padding-right: 0px;
  }

  .rtl .secondary .img-oval {
    width: 16vh;
    height: 26vh;
  }

  .rtl .primary .img-oval {
    width: 19vh;
    height: 31vh;
  }

  /* Star positions */
  .star.star-top {
    width: 35px;
    height: 35px;
  }

  .rtl .star.star-top {
    left: 265px;
        top: 56px;
  }

  .ltr .star.star-top {
    right: 19vh;
    top: 45px;
  }

  .star.star-bottom {
    width: 25px;
    height: 25px;
  }

  .rtl .star.star-bottom {
    left: 2vh;
    top: 28vh;
  }

  .ltr .star.star-bottom {
    right: 2vh;
    top: 28vh;
  }
 
  /* Next arrow adjustments */
  .next-arrow {
    width: 70px;
    height: 30px;
  }

  .rtl .next-arrow {
    left: 13vh;
    top: 30vh;
  }

  .ltr .next-arrow {
    right: 14vh;
        top: 29vh;
  }

  /* Features Section Adjustments */
  .features-section {
    padding: 40px 0;
    min-height: 220px;
  }

  .features-container {
    padding: 0 30px;
    gap: 30px;
  }

  .ltr .features-container {
    max-width: 100%;
    padding: 0 40px;
    gap: 30px;
  }

  .feature-title {
    font-size: 22px;
  }

  .feature-description {
    font-size: 16px;
  }

  .feature-icon {
    width: 22px;
    height: 22px;
  }

  .feature-item {
    padding: 15px;
  }

  .title-row {
    gap: 10px;
    margin-bottom: 12px;
  }

  /* RTL specific adjustments */
  .rtl .feature-item:not(:last-child)::after {
    right: -15px;
  }

  .ltr .feature-item:not(:last-child)::after {
    right: -5px;
  }

  .rtl .slides-wrapper {
    width: 100%;
  }

  .ltr .feature-description {
    margin-left: 25px;
    font-size: 17px;
  }
}

/* Landscape tablet adjustments */
@media screen and (min-width: 1024px) and (max-width: 1200px) {
  .hero-figma-small-row {
    height: 65vh;
  }

  .milagro-content {
    padding-right: 6%;
  }

  .rtl .milagro-content {
    width: 40%;
    padding-right: 60px;
  }

  .ltr .milagro-content {
    padding-left: 6%;
  }

  .features-container {
    max-width: 1100px;
    padding: 0 40px;
  }

  .ltr .features-container {
    max-width: 1200px;
    padding: 0 60px;
  }
}
</style>