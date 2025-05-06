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
          <div class="slides-container" :class="currentLang === 'en' ? 'ltr' : 'rtl'"
            @mousedown="startDrag"
            @mousemove="onDrag"
            @mouseup="endDrag"
            @mouseleave="endDrag">
            <div class="slides-wrapper"
              :style="{ transform: currentLang === 'ar' ? 
                `translateX(${currentSlide === 0 ? 0 : currentSlide === 1 ? 46 : currentSlide === 2 ? 89 : 131}%)` : 
                `translateX(-${currentSlide * 25}%)` }">

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
        <button class="shop-btn">{{ translations.shopButton[currentLang] }}</button>
      </div>
    </div>

    <!-- Features Section -->
    <section class="features-section" :class="currentLang === 'en' ? 'ltr' : 'rtl'">
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
    <chocolate-diffuser :current-lang="currentLang" />
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
  methods: {
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
    }
  },
  created() {
    this.$root.$on('languageChanged', (lang) => {
      this.currentLang = lang;
    });
  },
  beforeDestroy() {
    this.$root.$off('languageChanged');
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
  width: 32%;
}

/* Adjust content alignment for English */
.ltr .milagro-content {
  align-items: flex-start;
  padding-right: 0px;
  padding-left: 8%;
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
  right: 42vh;
}

/* Adjust bottom star position for English */
.ltr .star.star-bottom {
  left: auto;
  right: 5vh;
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
  max-width: 1200px;
  margin: 0 auto;
  display: flex;
  justify-content: space-between;
  padding: 0 40px;
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
  font-size: 24px;
  font-weight: 500;
  margin: 0;
  font-family: 'TheSansArabic', sans-serif;
}

.feature-description {
  color: #fff;
  font-size: 16px;
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
  font-size: 23px;
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
</style>