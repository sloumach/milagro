<template>
    <div>
      <div v-if="isMobile">
        <div class="mobile-shop-boxes-wrapper">
          <div class="mobile-shop-title">
            {{ currentLang === 'en' ? 'Categories' : 'الفئات' }}
          </div>
          <div class="mobile-categories-tabs">
            <router-link
              to="/shop/new"
              class="mobile-category-tab"
              :class="{ active: $route.path === '/shop/new' }"
            >{{ currentLang === 'en' ? 'New' : 'جديد' }}</router-link>
            <router-link
              to="/shop/boxes"
              class="mobile-category-tab"
              :class="{ active: $route.path === '/shop/boxes' }"
            >{{ currentLang === 'en' ? 'Boxes' : 'تشكيلة البوكسات' }}</router-link>
            <router-link
              to="/shop/occasions"
              class="mobile-category-tab"
              :class="{ active: $route.path === '/shop/occasions' }"
            >{{ currentLang === 'en' ? 'Occasions' : 'مناسباتكم' }}</router-link>
            <router-link
              to="/shop/canope"
              class="mobile-category-tab"
              :class="{ active: $route.path === '/shop/canope' }"
            >{{ currentLang === 'en' ? 'Savory & Canapes' : 'سبشل سولتيز' }}</router-link>
            <span class="mobile-category-tab disabled">
              {{ currentLang === 'en' ? 'Milagro Giveaway' : 'توزيعات ميلاقرو' }}
            </span>
          </div>
          <div class="profile-content">
                <div class="products-grid">
                  <!-- Mix Chocolates (Large Box) -->
                  <div class="product-card">
                    <div class="product-image" @click="$router.push(`/shop/boxes/1`)">
                      <img src="../../../../public/assets/img/products/large-box-2.png" :alt="currentLang === 'en' ? 'Mix Chocolates (Large Box)' : 'علبة كبيرة | تشكيلة'" />
                      <div class="promotion-badge">20%</div>
                      <button class="favorite-btn">
                        <img src="../../../../public/assets/img/products/heart-2.png" alt="Favorite" />
                      </button>
                    </div>
                    <div class="product-info">
                      <h3>{{ currentLang === 'en' ? 'Mix Chocolates (Large Box)' : 'علبة كبيرة | تشكيلة' }}</h3>
                      <div class="info-row">
                        <p class="pieces">{{ currentLang === 'en' ? '49 pcs' : '49 حبة' }}</p>
                        <div class="price-container">
                          <div class="original-price">{{ currentLang === 'en' ? '19.000 KD' : '19.000 د.ك' }}</div>
                          <div class="discounted-price">{{ currentLang === 'en' ? '15.000 KD' : '15.000 د.ك' }}</div>
                        </div>
                      </div>
                      <button class="add-to-cart">{{ currentLang === 'en' ? '+ ADD TO CART' : '+ إضافة إلى السلة' }}</button>
                    </div>
                  </div>
  
                  <!-- Mix Chocolates (Medium Box) -->
                  <div class="product-card">
                    <div class="product-image" @click="$router.push(`/shop/boxes/2`)">
                      <img src="../../../../public/assets/img/products/medium-box-2.png" :alt="currentLang === 'en' ? 'Mix Chocolates (Medium Box)' : 'علبة وسط | تشكيلة'" />
                      <div class="sold-out-overlay">
                        <div class="sold-out-text">{{ currentLang === 'en' ? 'Sold Out' : 'نفد من المخزون' }}</div>
                      </div>
                      <button class="favorite-btn">
                        <img src="../../../../public/assets/img/products/heart-2.png" alt="Favorite" />
                      </button>
                    </div>
                    <div class="product-info">
                      <h3>{{ currentLang === 'en' ? 'Mix Chocolates (Medium Box)' : 'علبة وسط | تشكيلة' }}</h3>
                      <div class="info-row">
                        <p class="pieces">{{ currentLang === 'en' ? '25 pcs' : '25 حبة' }}</p>
                        <div class="price-container">
                          <div class="original-price">{{ currentLang === 'en' ? '12.000 KD' : '12.000 د.ك' }}</div>
                          <div class="discounted-price">{{ currentLang === 'en' ? '12.000 KD' : '12.000 د.ك' }}</div>
                        </div>
                      </div>
                      <button class="add-to-cart sold-out" @click="openNotifyModal('medium')">
                        {{ currentLang === 'en' ? 'Notify Me' : 'أعلمني' }}
                      </button>
                    </div>
                  </div>
  
                  <!-- Mix Chocolates (Mini Box) -->
                  <div class="product-card">
                    <div class="product-image" @click="$router.push(`/shop/boxes/3`)">
                      <img src="../../../../public/assets/img/products/mini-box-2.png" :alt="currentLang === 'en' ? 'Mix Chocolates (Mini Box)' : 'ميني بوكس | تشكيلة'" />
                      <button class="favorite-btn">
                        <img src="../../../../public/assets/img/products/heart-2.png" alt="Favorite" />
                      </button>
                    </div>
                    <div class="product-info">
                      <h3>{{ currentLang === 'en' ? 'Mix Chocolates (Mini Box)' : 'ميني بوكس | تشكيلة' }}</h3>
                      <div class="info-row">
                        <p class="pieces">{{ currentLang === 'en' ? '9 pcs' : '9 حبة' }}</p>
                        <div class="price-container">
                          <div class="original-price">{{ currentLang === 'en' ? '5.000 KD' : '5.000 د.ك' }}</div>
                          <div class="discounted-price">{{ currentLang === 'en' ? '5.000 KD' : '5.000 د.ك' }}</div>
                        </div>
                      </div>
                      <button class="add-to-cart">{{ currentLang === 'en' ? '+ ADD TO CART' : '+ إضافة إلى السلة' }}</button>
                    </div>
                  </div>
  
                  <!-- Milagro Diffuser -->
                  <div class="product-card">
                    <div class="product-image" @click="$router.push(`/shop/boxes/4`)">
                      <img src="../../../../public/assets/img/products/diffuser-2.png" :alt="currentLang === 'en' ? 'Milagro Diffuser' : 'دفيوزر ميلاغرو'" />
                      <button class="favorite-btn">
                        <img src="../../../../public/assets/img/products/heart-2.png" alt="Favorite" />
                      </button>
                    </div>
                    <div class="product-info">
                      <h3>{{ currentLang === 'en' ? 'Milagro Diffuser' : 'دفيوزر ميلاغرو' }}</h3>
                      <div class="info-row">
                        <p class="pieces">{{ currentLang === 'en' ? '30 pcs' : '30 حبة' }}</p>
                        <div class="price-container">
                          <div class="original-price">{{ currentLang === 'en' ? '13.000 KD' : '13.000 د.ك' }}</div>
                          <div class="discounted-price">{{ currentLang === 'en' ? '13.000 KD' : '13.000 د.ك' }}</div>
                        </div>
                      </div>
                      <button class="add-to-cart">{{ currentLang === 'en' ? '+ ADD TO CART' : '+ إضافة إلى السلة' }}</button>
                    </div>
                  </div>
  
                  <!-- Mix Corks Box -->
                  <div class="product-card">
                    <div class="product-image" @click="$router.push(`/shop/boxes/5`)">
                      <img src="../../../../public/assets/img/products/corks-box-2.png" :alt="currentLang === 'en' ? 'Mix Corks Box' : 'كوركس بوكس'" />
                      <button class="favorite-btn">
                        <img src="../../../../public/assets/img/products/heart-2.png" alt="Favorite" />
                      </button>
                    </div>
                    <div class="product-info">
                      <h3>{{ currentLang === 'en' ? 'Mix Corks Box' : 'كوركس بوكس' }}</h3>
                      <div class="info-row">
                        <p class="pieces">{{ currentLang === 'en' ? '50 pcs' : '50 حبة' }}</p>
                        <div class="price-container">
                          <div class="original-price">{{ currentLang === 'en' ? '19.000 KD' : '19.000 د.ك' }}</div>
                          <div class="discounted-price">{{ currentLang === 'en' ? '19.000 KD' : '19.000 د.ك' }}</div>
                        </div>
                      </div>
                      <button class="add-to-cart">{{ currentLang === 'en' ? '+ ADD TO CART' : '+ إضافة إلى السلة' }}</button>
                    </div>
                  </div>
  
                  <!-- Luxury Macaron Box -->
                  <div class="product-card">
                    <div class="product-image" @click="$router.push(`/shop/boxes/6`)">
                      <img src="../../../../public/assets/img/products/macaron-box-2.png" :alt="currentLang === 'en' ? 'Luxury Macaron Box' : 'الماكارون بوكس'" />
                      <button class="favorite-btn">
                        <img src="../../../../public/assets/img/products/heart-2.png" alt="Favorite" />
                      </button>
                    </div>
                    <div class="product-info">
                      <h3>{{ currentLang === 'en' ? 'Luxury Macaron Box' : 'الماكارون بوكس' }}</h3>
                      <div class="info-row">
                        <p class="pieces">{{ currentLang === 'en' ? '38 pcs' : '38 حبة' }}</p>
                        <div class="price-container">
                          <div class="original-price">{{ currentLang === 'en' ? '27.000 KD' : '27.000 د.ك' }}</div>
                          <div class="discounted-price">{{ currentLang === 'en' ? '27.000 KD' : '27.000 د.ك' }}</div>
                        </div>
                      </div>
                      <button class="add-to-cart">{{ currentLang === 'en' ? '+ ADD TO CART' : '+ إضافة إلى السلة' }}</button>
                    </div>
                  </div>
                </div>
                <!-- Add Notify Modal for mobile here -->
                <notify-modal
                  :show="showNotifyModal"
                  :current-lang="currentLang"
                  :product-info="selectedProduct"
                  @close="closeNotifyModal"
                />
              </div>
        </div>
      </div>
      <div v-else>
        <div class="profile-page" :class="currentLang === 'en' ? 'ltr' : 'rtl'">
          <div class="profile-container">
            <!-- Title -->
            <h1 class="profile-title">
              {{ currentLang === 'en' ? 'Categories' : 'الفئات' }}
              <img src="../../../../public/assets/img/star.png" class="title-star" alt="star" />
            </h1>
  
            <div class="profile-layout">
              <!-- Sidebar -->
              <div class="profile-sidebar">
                <div class="sidebar-item">
                  <router-link to="/shop/new" class="sidebar-link">
                    {{ currentLang === 'en' ? 'New' : 'جديد' }}
                  </router-link>
                </div>
                <div class="sidebar-item" :class="{ active: activeTab === 'info' }">
                  <router-link to="/shop/boxes" class="sidebar-link">
                    {{ currentLang === 'en' ? 'Boxes' : 'تشكيلة البوكسات' }}
                  </router-link>
                </div>
                <div class="sidebar-item">
                  <router-link to="/shop/occasions" class="sidebar-link">
                    {{ currentLang === 'en' ? 'Occasions' : 'مناسباتكم' }}
                  </router-link>
                </div>
                <div class="sidebar-item">
                  <router-link to="/shop/canope" class="sidebar-link">
                    {{ currentLang === 'en' ? 'Savory & Canapes' : 'سبشل سولتيز' }}
                  </router-link>
                </div>
                <div class="sidebar-item">
                  {{ currentLang === 'en' ? 'Milagro Giveaway' : 'توزيعات ميلاقرو' }}
                </div>
              </div>
  
              <!-- Form Content -->
              <div class="profile-content">
                <div class="products-grid">
                  <!-- Mix Chocolates (Large Box) -->
                  <div class="product-card">
                    <div class="product-image" @click="$router.push(`/shop/boxes/1`)">
                      <img src="../../../../public/assets/img/products/large-box-2.png" :alt="currentLang === 'en' ? 'Mix Chocolates (Large Box)' : 'علبة كبيرة | تشكيلة'" />
                      <div class="promotion-badge">20%</div>
                      <button class="favorite-btn">
                        <img src="../../../../public/assets/img/products/heart-2.png" alt="Favorite" />
                      </button>
                    </div>
                    <div class="product-info">
                      <h3>{{ currentLang === 'en' ? 'Mix Chocolates (Large Box)' : 'علبة كبيرة | تشكيلة' }}</h3>
                      <div class="info-row">
                        <p class="pieces">{{ currentLang === 'en' ? '49 pcs' : '49 حبة' }}</p>
                        <div class="price-container">
                          <div class="original-price">{{ currentLang === 'en' ? '19.000 KD' : '19.000 د.ك' }}</div>
                          <div class="discounted-price">{{ currentLang === 'en' ? '15.000 KD' : '15.000 د.ك' }}</div>
                        </div>
                      </div>
                      <button class="add-to-cart">{{ currentLang === 'en' ? '+ ADD TO CART' : '+ إضافة إلى السلة' }}</button>
                    </div>
                  </div>
  
                  <!-- Mix Chocolates (Medium Box) -->
                  <div class="product-card">
                    <div class="product-image" @click="$router.push(`/shop/boxes/2`)">
                      <img src="../../../../public/assets/img/products/medium-box-2.png" :alt="currentLang === 'en' ? 'Mix Chocolates (Medium Box)' : 'علبة وسط | تشكيلة'" />
                      <div class="sold-out-overlay">
                        <div class="sold-out-text">{{ currentLang === 'en' ? 'Sold Out' : 'نفد من المخزون' }}</div>
                      </div>
                      <button class="favorite-btn">
                        <img src="../../../../public/assets/img/products/heart-2.png" alt="Favorite" />
                      </button>
                    </div>
                    <div class="product-info">
                      <h3>{{ currentLang === 'en' ? 'Mix Chocolates (Medium Box)' : 'علبة وسط | تشكيلة' }}</h3>
                      <div class="info-row">
                        <p class="pieces">{{ currentLang === 'en' ? '25 pcs' : '25 حبة' }}</p>
                        <div class="price-container">
                          <div class="original-price">{{ currentLang === 'en' ? '12.000 KD' : '12.000 د.ك' }}</div>
                          <div class="discounted-price">{{ currentLang === 'en' ? '12.000 KD' : '12.000 د.ك' }}</div>
                        </div>
                      </div>
                      <button class="add-to-cart sold-out" @click="openNotifyModal('medium')">
                        {{ currentLang === 'en' ? 'Notify Me' : 'أعلمني' }}
                      </button>
                    </div>
                  </div>
  
                  <!-- Mix Chocolates (Mini Box) -->
                  <div class="product-card">
                    <div class="product-image" @click="$router.push(`/shop/boxes/3`)">
                      <img src="../../../../public/assets/img/products/mini-box-2.png" :alt="currentLang === 'en' ? 'Mix Chocolates (Mini Box)' : 'ميني بوكس | تشكيلة'" />
                      <button class="favorite-btn">
                        <img src="../../../../public/assets/img/products/heart-2.png" alt="Favorite" />
                      </button>
                    </div>
                    <div class="product-info">
                      <h3>{{ currentLang === 'en' ? 'Mix Chocolates (Mini Box)' : 'ميني بوكس | تشكيلة' }}</h3>
                      <div class="info-row">
                        <p class="pieces">{{ currentLang === 'en' ? '9 pcs' : '9 حبة' }}</p>
                        <div class="price-container">
                          <div class="original-price">{{ currentLang === 'en' ? '5.000 KD' : '5.000 د.ك' }}</div>
                          <div class="discounted-price">{{ currentLang === 'en' ? '5.000 KD' : '5.000 د.ك' }}</div>
                        </div>
                      </div>
                      <button class="add-to-cart">{{ currentLang === 'en' ? '+ ADD TO CART' : '+ إضافة إلى السلة' }}</button>
                    </div>
                  </div>
  
                  <!-- Milagro Diffuser -->
                  <div class="product-card">
                    <div class="product-image" @click="$router.push(`/shop/boxes/4`)">
                      <img src="../../../../public/assets/img/products/diffuser-2.png" :alt="currentLang === 'en' ? 'Milagro Diffuser' : 'دفيوزر ميلاغرو'" />
                      <button class="favorite-btn">
                        <img src="../../../../public/assets/img/products/heart-2.png" alt="Favorite" />
                      </button>
                    </div>
                    <div class="product-info">
                      <h3>{{ currentLang === 'en' ? 'Milagro Diffuser' : 'دفيوزر ميلاغرو' }}</h3>
                      <div class="info-row">
                        <p class="pieces">{{ currentLang === 'en' ? '30 pcs' : '30 حبة' }}</p>
                        <div class="price-container">
                          <div class="original-price">{{ currentLang === 'en' ? '13.000 KD' : '13.000 د.ك' }}</div>
                          <div class="discounted-price">{{ currentLang === 'en' ? '13.000 KD' : '13.000 د.ك' }}</div>
                        </div>
                      </div>
                      <button class="add-to-cart">{{ currentLang === 'en' ? '+ ADD TO CART' : '+ إضافة إلى السلة' }}</button>
                    </div>
                  </div>
  
                  <!-- Mix Corks Box -->
                  <div class="product-card">
                    <div class="product-image" @click="$router.push(`/shop/boxes/5`)">
                      <img src="../../../../public/assets/img/products/corks-box-2.png" :alt="currentLang === 'en' ? 'Mix Corks Box' : 'كوركس بوكس'" />
                      <button class="favorite-btn">
                        <img src="../../../../public/assets/img/products/heart-2.png" alt="Favorite" />
                      </button>
                    </div>
                    <div class="product-info">
                      <h3>{{ currentLang === 'en' ? 'Mix Corks Box' : 'كوركس بوكس' }}</h3>
                      <div class="info-row">
                        <p class="pieces">{{ currentLang === 'en' ? '50 pcs' : '50 حبة' }}</p>
                        <div class="price-container">
                          <div class="original-price">{{ currentLang === 'en' ? '19.000 KD' : '19.000 د.ك' }}</div>
                          <div class="discounted-price">{{ currentLang === 'en' ? '19.000 KD' : '19.000 د.ك' }}</div>
                        </div>
                      </div>
                      <button class="add-to-cart">{{ currentLang === 'en' ? '+ ADD TO CART' : '+ إضافة إلى السلة' }}</button>
                    </div>
                  </div>
  
                  <!-- Luxury Macaron Box -->
                  <div class="product-card">
                    <div class="product-image" @click="$router.push(`/shop/boxes/6`)">
                      <img src="../../../../public/assets/img/products/macaron-box-2.png" :alt="currentLang === 'en' ? 'Luxury Macaron Box' : 'الماكارون بوكس'" />
                      <button class="favorite-btn">
                        <img src="../../../../public/assets/img/products/heart-2.png" alt="Favorite" />
                      </button>
                    </div>
                    <div class="product-info">
                      <h3>{{ currentLang === 'en' ? 'Luxury Macaron Box' : 'الماكارون بوكس' }}</h3>
                      <div class="info-row">
                        <p class="pieces">{{ currentLang === 'en' ? '38 pcs' : '38 حبة' }}</p>
                        <div class="price-container">
                          <div class="original-price">{{ currentLang === 'en' ? '27.000 KD' : '27.000 د.ك' }}</div>
                          <div class="discounted-price">{{ currentLang === 'en' ? '27.000 KD' : '27.000 د.ك' }}</div>
                        </div>
                      </div>
                      <button class="add-to-cart">{{ currentLang === 'en' ? '+ ADD TO CART' : '+ إضافة إلى السلة' }}</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
  
          <!-- Notify Modal -->
          <notify-modal
            :show="showNotifyModal"
            :current-lang="currentLang"
            :product-info="selectedProduct"
            @close="closeNotifyModal"
          />
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import NotifyModal from '../../components/NotifyModal.vue';
  
  export default {
    name: 'Boxes',
    components: {
      NotifyModal
    },
    data() {
      return {
        currentLang: localStorage.getItem('currentLang') || 'en',
        activeTab: 'info',
        form: {
          firstName: '',
          lastName: '',
          email: '',
          phone: ''
        },
        showNotifyModal: false,
        selectedProduct: null,
        isMobile: false
      }
    },
    methods: {
      handleSubmit() {
        console.log('Form submitted:', this.form);
      },
      openNotifyModal(productType) {
        this.selectedProduct = {
          type: productType,
          name: this.currentLang === 'en' ? 
            'Mix Chocolates (Medium Box)' : 
            'علبة وسط | تشكيلة',
          pieces: '25',
          price: '12.000'
        };
        this.showNotifyModal = true;
      },
      closeNotifyModal() {
        this.showNotifyModal = false;
        this.selectedProduct = null;
      },
      checkMobile() {
        this.isMobile = window.innerWidth <= 480;
      }
    },
    created() {
      this.$root.$on('languageChanged', (lang) => {
        this.currentLang = lang;
      });
    },
    mounted() {
      this.checkMobile();
      window.addEventListener('resize', this.checkMobile);
    },
    beforeDestroy() {
      this.$root.$off('languageChanged');
      window.removeEventListener('resize', this.checkMobile);
    }
  }
  </script>
  
  <style scoped>
  .profile-page {
    min-height: calc(100vh - 200px);
    background: #212A1E;
    padding: 47px 150px;
  }
  
  .profile-container {
    max-width: 1200px;
    margin: 0 auto;
  }
  
  .profile-title {
    color: #AA8B7A;
    font-size: 42px;
  
    position: relative;
    top: -45px;
  }
  
  .profile-layout {
    display: flex;
    gap: 60px;
    position: relative;
    top: -32px;
  }
  
  .profile-sidebar {
    width: 200px;
    flex-shrink: 0;
  }
  
  .sidebar-item {
    color: #FFFFFF;
    padding: 12px 0;
    cursor: pointer;
    transition: color 0.3s ease;
    position: relative;
  }
  
  .rtl .sidebar-item.active::after {
    content: "";
    position: absolute;
    bottom: -12px;
    left: 0;
    right: -159px;
    height: 2px;
    background: #AA8B7A;
    width: 149%;
  }
  
  .ltr .sidebar-item.active::after {
    content: "";
    position: absolute;
    bottom: -12px;
    left: -158px;
    right: 0;
    height: 2px;
    background: #AA8B7A;
    width: 105%;
  }
  
  .ltr .sidebar-item {
    font-family: 'Philosopher', serif !important;
    font-size: 20px;
    padding-bottom: 0px;
    margin-bottom: 16px;
  }
  
  .rtl .sidebar-item {
    font-size: 20px;
    padding-bottom: 0px;
    margin-bottom: 16px;
  }
  .title-star {
    width: 24px;
    height: 24px;
    position: relative;
    top: -14px;
  }
  .sidebar-item:last-child {
    margin-bottom: 0;
  }
  
  .sidebar-item:hover {
    color: #AA8B7A;
  }
  
  .sidebar-item.active {
    color: #AA8B7A;
  }
  
  .sidebar-item.logout {
    color: #AA8B7A;
    margin-top: 20px;
  }
  
  .profile-content {
    flex: 1;
  }
  
  .profile-form {
    display: flex;
    flex-direction: column;
    gap: 8px;
    max-width: 460px;
  }
  
  .form-group {
    display: flex;
    flex-direction: column;
    gap: 3px;
  }
  
  .form-group label {
    color: #FFFFFF;
    font-size: 16px;
  }
  
  .form-group input {
    height: 48px;
    background: transparent;
    border: 1px solid #AA8B7A;
    border-radius: 4px;
    padding: 0 16px;
    color: #FFFFFF;
    font-size: 16px;
  }
  
  .form-group input:focus {
    outline: none;
    border-color: #FFFFFF;
  }
  
  .form-group input::placeholder {
    color: rgba(170, 139, 122, 0.5);
  }
  
  .submit-btn {
    height: 48px;
    background: #AA8B7A;
    border: none;
    border-radius: 4px;
    color: #FFFFFF;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    margin-top: 16px;
  }
  
  .submit-btn:hover {
    background: #957865;
  }
  
  /* RTL (Arabic) Styles */
  .rtl {
    direction: rtl;
  }
  
  .rtl .profile-title {
    font-family: 'TheSansArabic', sans-serif;
  }
  
  .rtl .sidebar-item,
  .rtl .form-group label,
  .rtl .form-group input,
  .rtl .submit-btn {
    font-family: 'TheSansArabic', sans-serif;
    text-align: right;
  }
  
  .rtl .submit-btn {
    text-align: center !important;
  }
  
  /* LTR (English) Styles */
  .ltr {
    direction: ltr;
  }
  
  .ltr .profile-title {
    font-family: 'Philosopher', serif;
  }
  
  .ltr .sidebar-item,
  .ltr .form-group label,
  .ltr .form-group input,
  .ltr .submit-btn {
    font-family: 'Cairo', sans-serif;
    text-align: left;
  }
  
  .ltr .submit-btn {
    text-align: center !important;
  }
  
  @media (max-width: 992px) {
    .profile-page {
      padding: 40px 20px;
    }
  
    .profile-layout {
      flex-direction: column;
    }
  
    .profile-sidebar {
      width: 100%;
    }
  
    .profile-form {
      max-width: 100%;
    }
  }
  
  .sidebar-link {
    color: inherit;
    text-decoration: none;
    display: block;
    width: 100%;
  }
  
  .router-link-active {
    color: #AA8B7A;
  }
  
  /* Products Grid Styles */
  .products-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
    padding: 20px 0;
  }
  
  .product-card {
    background: rgba(33, 42, 30, 0.95);
    border-radius: 8px;
    overflow: hidden;
    transition: transform 0.3s ease;
    height: 461px;
    display: flex;
    flex-direction: column;
  }
  
  .product-card:hover {
    transform: translateY(-5px);
  }
  
  .product-image {
    position: relative;
    width: 100%;
    height: 250px;
    overflow: hidden;
    border-radius: 8px;
    flex-shrink: 0;
  }
  
  .product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  
  .sold-out-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(33, 42, 30, 0.7);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1;
  }
  
  .sold-out-text {
    color: #FFFFFF;
    font-size: 24px;
    font-weight: 500;
  }
  
  .rtl .sold-out-text {
    font-family: 'TheSansArabic', sans-serif;
  }
  
  .ltr .sold-out-text {
    font-family: 'Philosopher', serif;
  }
  
  .promotion-badge {
    position: absolute;
    top: 12px;
    left: 12px;
    background: #FFFFFF;
    color: #AA8B7A;
    padding: 4px 8px;
    border-radius: 4px;
    font-size: 14px;
  }
  
  /* Move promotion badge to right side in RTL */
  .rtl .promotion-badge {
    left: auto;
    right: 12px;
  }
  
  .favorite-btn {
    position: absolute;
    top: 12px;
    right: 12px;
    background: none;
    border: none;
    cursor: pointer;
    padding: 0;
  }
  
  .favorite-btn img {
    width: 24px;
    height: 24px;
    opacity: 0.8;
  }
  
  /* Add RTL favorite button position */
  .rtl .favorite-btn {
    right: auto;
    left: 12px;
  }
  
  .product-info {
    padding: 16px;
    height: 190px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }
  
  .product-info h3 {
    color: #FFFFFF;
    font-size: 18px;
   
    line-height: 1.2;
    height: 44px;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    text-overflow: ellipsis;
  }
  
  .info-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 16px;
  }
  
  .pieces {
    color: #CCB3A5;
    font-size: 14px;
    margin: 0;
  }
  
  .price-container {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
  }
  
  .original-price {
    color: #CCB3A5;
    font-size: 14px;
    text-decoration: line-through;
    margin-bottom: 4px;
  }
  
  .discounted-price {
    color: #FFFFFF;
    font-size: 16px;
    font-weight: 500;
  }
  
  /* RTL price container alignment */
  .rtl .price-container {
    align-items: flex-start;
  }
  
  .add-to-cart {
    width: 100%;
    background: #AA8B7A;
    color: #FFFFFF;
    border: none;
    border-radius: 4px;
    padding: 12px;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }
  
  .add-to-cart:hover {
    background: #957865;
  }
  
  .add-to-cart.sold-out {
    background: #CCB3A5;
  }
  
  .add-to-cart.sold-out:hover {
    background: #BBA396;
  }
  
  /* RTL specific styles for products */
  .rtl .product-info {
    text-align: right;
  }
  
  .rtl .product-info h3,
  .rtl .pieces,
  .rtl .price-container,
  .rtl .add-to-cart {
    font-family: 'TheSansArabic', sans-serif;
  }
  
  /* LTR specific styles for products */
  .ltr .product-info {
    text-align: left;
  }
  
  .ltr .product-info h3 {
    font-family: 'Philosopher', serif;
  }
  
  .ltr .pieces,
  .ltr .price-container,
  .ltr .add-to-cart {
    font-family: 'Cairo', sans-serif;
  }
  
  @media (max-width: 1200px) {
    .products-grid {
      grid-template-columns: repeat(2, 1fr);
    }
  }
  
  @media (max-width: 768px) {
    .products-grid {
      grid-template-columns: 1fr;
    }
  }
  
  @media (max-width: 480px) {
    .profile-content .products-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 14px;
      padding: 13px 8px 35px;
    }
    .profile-content .product-card {
      margin: 0;
      border-radius: 8px;
      overflow: hidden;
      background: rgba(33, 42, 30, 0.95);
      transition: transform 0.3s ease;
      height: 312px;
      display: flex;
      flex-direction: column;
    }
    .profile-content .product-image {
        height: 187px;
      flex-shrink: 0;
    }
    .profile-content .product-info {
      padding: 10px 6px;
      height: 105px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
    .profile-content .product-info h3 {
      font-size: 13px;
      margin: 0 0 8px 0;
      line-height: 1.2;
      height: 32px;
      overflow: hidden;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      text-overflow: ellipsis;
    }
    
    .profile-content .info-row {
      margin: 0 0 8px 0;
      flex-shrink: 0;
    }
    
    .profile-content {
      width: 100%;
    }
    .profile-content .pieces {
      font-size: 12px;
    }
    .profile-content .original-price {
      font-size: 12px;
      margin-bottom: 2px;
    }
    .profile-content .discounted-price {
      font-size: 13px;
    }
    .profile-content .add-to-cart {
      padding: 7px;
      font-size: 12px;
      height: 28px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }
    .mobile-shop-boxes-wrapper {
      width: 100vw;
      min-height: 100px;
      display: flex;
      flex-direction: column;
      align-items: center;
      background: #212A1E;
      color: #AA8B7A;
      font-family: 'Tenor Sans', serif;
      padding: 0 0 16px 0;
    }
    .mobile-shop-title {
      width: 95%;
      text-align: left;
      font-size: 22px;
        font-weight: 600;
        color: #aa8b7a;
        padding: 15px 0 15px 0px;
      letter-spacing: 1px;
    }
    .mobile-shop-title .title-star {
      width: 22px;
      height: 22px;
      position: relative;
      top: 4px;
      margin-left: 6px;
    }
    .mobile-shop-columns {
      width: 100%;
      display: flex;
      flex-direction: row;
      justify-content: center;
      align-items: flex-start;
      gap: 18px;
      margin-bottom: 18px;
    }
    .mobile-shop-col {
      flex: 1;
      min-width: 0;
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      color: #AA8B7A;
      font-size: 15px;
      font-family: 'Tenor Sans', serif;
      padding: 0 8px;
    }
    .mobile-shop-heading {
      font-size: 15px;
      font-weight: 700;
      color: #AA8B7A;
      margin-bottom: 8px;
      margin-top: 12px;
      letter-spacing: 1px;
    }
    .mobile-shop-sub {
      margin-top: 14px;
      font-size: 14px;
      font-weight: 700;
      color: #AA8B7A;
    }
    .mobile-shop-contact-info {
      margin-bottom: 2px;
      color: #AA8B7A;
      font-size: 15px;
      font-family: 'Tenor Sans', serif;
    }
    .mobile-shop-links-list div {
      margin-bottom: 4px;
      color: #AA8B7A;
      font-size: 15px;
      font-family: 'Tenor Sans', serif;
    }
    .mobile-shop-social-row {
      width: 100%;
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: center;
      gap: 18px;
      margin-bottom: 18px;
    }
    .mobile-shop-follow {
      font-size: 16px;
      font-weight: 600;
      color: #AA8B7A;
      margin-right: 10px;
      letter-spacing: 1px;
    }
    .mobile-shop-social-icons {
      display: flex;
      flex-direction: row;
      gap: 14px;
    }
    .mobile-shop-social-icons .social-link img {
      width: 32px;
      height: 32px;
      border-radius: 50%;
      background: transparent;
      border: 1px solid #AA8B7A;
      padding: 4px;
    }
    .mobile-shop-copyright {
      width: 100%;
      text-align: center;
      color: #AA8B7A;
      font-size: 13px;
      margin: 18px 0 10px 0;
      font-family: 'Tenor Sans', serif;
    }
    .mobile-categories-tabs {
      display: flex;
      flex-direction: row;
      gap: 10px;
      overflow-x: auto;
      padding: 0 10px 18px 10px;
      margin: 0 0 10px 0;
      width: 100vw;
      box-sizing: border-box;
    }
    .mobile-category-tab {
      flex: 0 0 auto;
      padding: 7px 22px;
      border: 1px solid #AA8B7A;
      border-radius: 7px;
      background: transparent;
      color: #AA8B7A;
      font-size: 18px;
      font-family: 'Tenor Sans', serif;
      text-decoration: none;
      text-align: center;
      transition: background 0.2s, color 0.2s;
      outline: none;
      margin-bottom: 0;
      margin-top: 0;
      cursor: pointer;
    }
    .mobile-category-tab.active {
      background: #AA8B7A;
      color: #ffffff;
      font-weight: 600;
      border: 1px solid #AA8B7A;
    }
  
    .mobile-category-tab {
      color: #ffffff !important;
      font-weight: 400 !important;
      border: 1px solid #AA8B7A !important;
    }
    .mobile-category-tab.disabled {
      opacity: 0.6;
      pointer-events: none;
      background: transparent;
      color: #AA8B7A;
      border: 1px solid #AA8B7A;
    }
    .mobile-categories-tabs::-webkit-scrollbar {
      display: none;
    }
    .profile-title {
      color: #aa8b7a;
      font-size: 33px;
      position: relative;
      top: -45px;
    }
    .title-star {
      width: 16px;
      height: 16px;
      position: relative;
      top: -14px;
    }
    .rtl .profile-content .products-grid {
      direction: rtl;
    }
    .rtl .mobile-shop-title {
      text-align: right;
    }
    .ltr .mobile-shop-title {
      text-align: left;
    }
  }
  </style>