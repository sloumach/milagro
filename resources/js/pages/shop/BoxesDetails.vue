<template>
    <div class="profile-page" :class="currentLang === 'en' ? 'ltr' : 'rtl'">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
        <div class="profile-container">
           
            <!-- Navigation link with arrow -->
            <div class="orders-navigation">
                <router-link to="/shop/boxes" class="nav-link">
                    <span v-if="currentLang === 'en'">
                        <span class="white-text">Shop</span> <span class="slash-text">/</span> <span class="highlight-text">Boxes</span> <span class="slash-text">/</span> <span class="highlight-text">Milagro Diffuser</span>
                    </span>
                    <span v-else>
                        <span class="white-text">المتجر</span> <span class="slash-text">/</span> <span class="highlight-text">تشكيلة البوكسات</span><span class="slash-text">/</span> <span class="highlight-text">دفيوزر ميلاقرو</span>
                    </span>
                    <img 
                        src="../../../../public/assets/img/arrow-right.png" 
                        alt="Arrow" 
                        class="arrow-icon"
                    />
                </router-link>
            </div>

            <div class="profile-layout">
                    

                <!-- Order Details Content -->
                <div class="profile-content">
                    <div class="product-details">
                        <!-- Left side - Image Gallery -->
                        <div class="product-gallery">
                            <div class="gallery-container">
                                <div class="main-image">
                                    <img :src="selectedImage || '/assets/img/products/details/diffuser-1.png'" alt="Product" />
                                </div>
                                <div class="thumbnail-gallery">
                                    <div class="thumbnail" 
                                         @click="selectedImage = '../../../../public/assets/img/products/details/diffuser-1.png'"
                                         :class="{ active: selectedImage === '../../../../public/assets/img/products/details/diffuser-1.png' || !selectedImage }">
                                        <img src="../../../../public/assets/img/products/details/diffuser-1.png" alt="Thumbnail 1" />
                                    </div>
                                    <div class="thumbnail" 
                                         @click="selectedImage = '../../../../public/assets/img/products/details/diffuser-2.png'"
                                         :class="{ active: selectedImage === '../../../../public/assets/img/products/details/diffuser-2.png' }">
                                        <img src="../../../../public/assets/img/products/details/diffuser-2.png" alt="Thumbnail 2" />
                                    </div>
                                    <div class="thumbnail" 
                                         @click="selectedImage = '../../../../public/assets/img/products/details/diffuser-3.png'"
                                         :class="{ active: selectedImage === '../../../../public/assets/img/products/details/diffuser-3.png' }">
                                        <img src="../../../../public/assets/img/products/details/diffuser-3.png" alt="Thumbnail 3" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right side - Product Info -->
                        <div class="product-info">
                            <div class="product-header">
                                <h1>{{ currentLang === 'en' ? 'Milagro Diffuser' : 'دفيوزر ميلاقرو' }}</h1>
                                <div class="price">
                                    <template v-if="currentLang === 'en'">
                                        <span>15.000</span>
                                        <span class="currency">KD</span>
                                    </template>
                                    <template v-else>
                                        <span>15.000</span>
                                        <span class="currency">د.ك</span>
                                    </template>
                </div>
            </div>

                            <div class="rating">
                                <div class="stars">
                                    <span>4.8</span>
                                    <img src="../../../../public/assets/img/products/starshop.png" alt="Star" />
        </div>
                                <span class="separator">|</span>
                                <span class="reviews" @click="showReviews = !showReviews">{{ currentLang === 'en' ? '23 reviews' : '23 تقييم' }}</span>
                            </div>

                            

                            <p class="description">
                                {{ currentLang === 'en' ? 
                                    'The purpose of this text is to display the visual form of the design without the need to use meaningful content. It can be used in designing websites and applications.' : 
                                    'الهدف من هذا النص هو عرض الشكل المثالي للتصميم دون الحاجة إلى استخدام محتوى ذي معنى. يتم استخدامه كثيرا في تصميم المواقع والتطبيقات.'
                                }}
                            </p>

                            <!-- Additions Section -->
                            <div class="additions">
                                <h3>{{ currentLang === 'en' ? 'Additions:' : 'الإضافات:' }}</h3>
                                <div class="addition-option">
                                    <input type="radio" id="logo" name="addition" value="logo" v-model="selectedAddition">
                                    <label for="logo">
                                        <span>{{ currentLang === 'en' ? 'Logo Addition' : 'إضافة الشعار' }}</span>
                                        <span class="addition-price">{{ currentLang === 'en' ? '3.000 KD' : '3.000 د.ك' }}</span>
                                    </label>
                                </div>
                                <div class="addition-option">
                                    <input type="radio" id="gift" name="addition" value="gift" v-model="selectedAddition">
                                    <label for="gift">
                                        <span>{{ currentLang === 'en' ? 'Gift Card' : 'بطاقة هدايا' }}</span>
                                        <span class="addition-price">{{ currentLang === 'en' ? '1.000 KD' : '1.000 د.ك' }}</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Quantity Section -->
                            <div class="quantity-section">
                                <span class="quantity-label">{{ currentLang === 'en' ? 'Quantity:' : 'الكمية:' }}</span>
                                <div class="quantity-controls">
                                    <button @click="decrementQuantity" :disabled="quantity <= 1" class="quantity-btn">-</button>
                                    <input type="text" v-model="quantity" min="1" readonly />
                                    <button @click="incrementQuantity" class="quantity-btn">+</button>
                                </div>
                            </div>

                            <!-- Add to Cart Button -->
                            <button class="add-to-cart">
                                {{ currentLang === 'en' ? '+ ADD TO BAG' : '+ إضافة إلى السلة' }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Reviews Section -->
            <transition name="fade">
                <div class="reviews-section" v-if="showReviews">
                    <div class="reviews-header">
                        <h2><img src="../../../../public/assets/img/products/starshop.png" alt="Star" /> {{ currentLang === 'en' ? 'Customer Reviews' : 'تقييمات العملاء' }} </h2>
                    </div>

                    <div class="reviews-list">
                        <!-- Review Item -->
                        <div class="review-item">
                            <div class="review-header">
                                <div class="review-user">
                                    <span class="user-name">User Name</span>
                                    <div class="rating-stars">
                                        <img src="../../../../public/assets/img/products/starshop.png" alt="Star" />
                                        <img src="../../../../public/assets/img/products/starshop.png" alt="Star" />
                                        <img src="../../../../public/assets/img/products/starshop.png" alt="Star" />
                                        <img src="../../../../public/assets/img/products/starshop.png" alt="Star" />
                                        <img src="../../../../public/assets/img/products/starshop.png" alt="Star" opacity="0.5" />
                                    </div>
                                </div>
                                <span class="review-date">{{ currentLang === 'en' ? 'Today' : 'اليوم' }}</span>
                            </div>
                            <p class="review-text">{{ currentLang === 'en' ? 'Great product! I loved it a lot. It\'s easy to use and multifunctional.' : 'منتج رائع! أحببته كثيراً. سهل الاستخدام ومتعدد الوظائف.' }}</p>
                        </div>

                        <!-- Review Item -->
                        <div class="review-item">
                            <div class="review-header">
                                <div class="review-user">
                                    <span class="user-name">User Name</span>
                                    <div class="rating-stars">
                                        <img src="../../../../public/assets/img/products/starshop.png" alt="Star" />
                                        <img src="../../../../public/assets/img/products/starshop.png" alt="Star" />
                                        <img src="../../../../public/assets/img/products/starshop.png" alt="Star" />
                                        <img src="../../../../public/assets/img/products/starshop.png" alt="Star" />
                                        <img src="../../../../public/assets/img/products/starshop.png" alt="Star" opacity="0.5" />
                                    </div>
                                </div>
                                <span class="review-date">{{ currentLang === 'en' ? 'Yesterday' : 'أمس' }}</span>
                            </div>
                            <p class="review-text">{{ currentLang === 'en' ? 'The purpose of this text is to display the visual form of the design without the need to use meaningful content.' : 'الهدف من هذا النص هو عرض الشكل المثالي للتصميم دون الحاجة إلى استخدام محتوى ذي معنى.' }}</p>
                        </div>
                    </div>

                    <div class="reviews-footer">
                        <button class="load-more">{{ currentLang === 'en' ? 'Load More' : 'تحميل المزيد' }}</button>
                        <button class="write-review" @click="showReviewModal = true">{{ currentLang === 'en' ? 'Write review' : 'اكتب تقييماً' }}</button>
                    </div>
                </div>
            </transition>
        </div>

        <!-- Review Modal -->
        <transition name="modal">
            <div v-if="showReviewModal" class="modal-overlay">
                <div class="modal-container">
                    <div class="modal-header">
                        <h3>{{ currentLang === 'en' ? 'Add Your Review' : 'أضف تقييمك' }}</h3>
                        <button class="close-button" @click="showReviewModal = false">×</button>
                    </div>
                    <div class="modal-content">
                        <div class="review-form">
                            <div class="rating-section">
                                <label>{{ currentLang === 'en' ? 'Choose Rating:' : 'اختر التقييم:' }}</label>
                                <div class="stars-container" @mouseleave="hoverRating = 0">
                                    <i v-for="index in 5" 
                                       :key="index"
                                       :class="[
                                           'fa-star',
                                           (index <= (hoverRating || selectedRating)) ? 'fa-solid' : 'fa-regular',
                                           'star-icon'
                                       ]"
                                       @click="selectedRating = index"
                                       @mouseover="hoverRating = index"
                                    ></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>{{ currentLang === 'en' ? 'Display Name' : 'الاسم المستعار' }}</label>
                                <input type="text" v-model="reviewName" class="form-input" />
                            </div>
                            <div class="form-group">
                                <label>{{ currentLang === 'en' ? 'Product Review' : 'مراجعة المنتج' }}</label>
                                <textarea v-model="reviewText" class="form-input" rows="4"></textarea>
                            </div>
                            <button class="submit-review" @click="submitReview">
                                {{ currentLang === 'en' ? 'Submit' : 'إرسال' }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
export default {
    name: 'BoxesDetails',
    data() {
        return {
            currentLang: localStorage.getItem('currentLang') || 'ar',
            selectedImage: null,
            quantity: 1,
            selectedAddition: null,
            showReviews: false,
            showReviewModal: false,
            selectedRating: 0,
            hoverRating: 0,
            reviewName: '',
            reviewText: ''
        }
    },
    methods: {
        incrementQuantity() {
            this.quantity++;
        },
        decrementQuantity() {
            if (this.quantity > 1) {
                this.quantity--;
            }
        },
        submitReview() {
            // Handle review submission here
            this.showReviewModal = false;
            this.selectedRating = 0;
            this.reviewName = '';
            this.reviewText = '';
        }
    },
    watch: {
        currentLang: {
            immediate: true,
            handler(newLang) {
                document.documentElement.dir = newLang === 'en' ? 'ltr' : 'rtl';
                document.documentElement.lang = newLang;
            }
        }
    },
    created() {
        this.$root.$on('languageChanged', (lang) => {
            this.currentLang = lang;
            localStorage.setItem('currentLang', lang);
        });
    },
    beforeDestroy() {
        this.$root.$off('languageChanged');
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
    width: 123%;
}

.ltr .sidebar-item.active::after {
    content: "";
    position: absolute;
    bottom: -12px;
    left: -158px;
    right: 0;
    height: 2px;
    background: #AA8B7A;
    width: 145%;
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

.order-details {
    color: #FFFFFF;
}

.status-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 8px;
}

.status {
    color: #CCB3A5;
    font-size: 16px;
}

.order-id {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 18px;
}

.cart-icon {
    width: 20px;
    height: 20px;
    opacity: 0.8;
}

.order-date {
    color: #CCB3A5;
    font-size: 14px;
    margin-bottom: 32px;
}

.section-header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 24px;
    margin-top: 32px;
}

.section-icon {
    width: 24px;
    height: 24px;
    opacity: 0.8;
}

.section-header h2 {
    font-size: 18px;
    margin: 0;
    font-weight: normal;
}

.order-items {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.order-item {
    display: flex;
    align-items: flex-start;
    gap: 16px;
}

.item-image {
    width: 64px;
    height: 64px;
    border-radius: 8px;
    background: #FFFFFF;
    order: -1;
}

.item-details {
    flex: 1;
}

.rtl .item-details {
    text-align: right;
}

.ltr .item-details {
    text-align: left;
}

.item-name {
    font-size: 16px;
    margin-bottom: 8px;
}

.item-specs, .item-quantity {
    color: #CCB3A5;
    font-size: 14px;
    margin-bottom: 4px;
}

.item-price {
    font-size: 16px;
    font-weight: 500;
    margin-left: 16px;
    margin-right: 16px;
}

.address-details {
    color: #CCB3A5;
    font-size: 16px;
    line-height: 1.5;
}

.summary-details {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.summary-row {
    display: flex;
    justify-content: space-between;
    color: #CCB3A5;
    font-size: 16px;
}

.summary-row.total {
    color: #FFFFFF;
    font-weight: 500;
    font-size: 18px;
    margin-top: 8px;
    padding-top: 16px;
    border-top: 1px solid rgba(170, 139, 122, 0.2);
}

/* RTL specific styles */
.rtl {
    direction: rtl;
    font-family: 'TheSansArabic', sans-serif;
}

.rtl .order-id,
.rtl .status,
.rtl .order-date,
.rtl .section-header h2,
.rtl .item-name,
.rtl .item-specs,
.rtl .item-quantity,
.rtl .item-price,
.rtl .address-details,
.rtl .summary-row {
    font-family: 'TheSansArabic', sans-serif;
}

/* LTR specific styles */
.ltr {
    direction: ltr;
    font-family: 'Cairo', sans-serif;
}

.ltr .order-id,
.ltr .status,
.ltr .order-date,
.ltr .section-header h2,
.ltr .item-name,
.ltr .item-specs,
.ltr .item-quantity,
.ltr .item-price,
.ltr .address-details,
.ltr .summary-row {
    font-family: 'Cairo', sans-serif;
}

.sidebar-link {
    color: inherit;
    text-decoration: none;
    display: block;
    width: 100%;
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
}

/* Orders Navigation Link Styles */
.orders-navigation {
    position: relative;
    top: -40px;
    margin-bottom: 10px;
    background-color: #212A1E;
    padding: 15px 0px;
    
}

.nav-link {
    display: flex;
    align-items: center;
    color: #AA8B7A;
    text-decoration: none;
    font-size: 20px;
    transition: color 0.3s;
    width: 100%;
    gap: 29px;
    
}

.white-text {
    color: #FFFFFF;
}

.highlight-text {
    color: #CCB3A5;
}

.slash-text {
    color: #AA8B7A;
    margin: 0 4px;
}

.rtl .nav-link {
    font-family: 'TheSansArabic', sans-serif;
    justify-content: start;
    flex-direction: row-reverse;
}

.ltr .nav-link {
    font-family: Philosopher, serif !important;
    justify-content: start;
    flex-direction: row-reverse;
}

.nav-link:hover {
    color: #CCB3A5;
}

.arrow-icon {
    width: 112px;
    height: 15px;
    opacity: 0.8;
}

.rtl .arrow-icon {
    margin-right: 10px;
}

.ltr .arrow-icon {
    margin-left: 0px;
    transform: scaleX(-1);
}

.product-details {
    display: flex;
    gap: 40px;
    margin-top: 20px;
}

.product-gallery {
    flex: 1;
    max-width: 483px;
}

.gallery-container {
    display: flex;
    gap: 20px;
    flex-direction: row-reverse;
}

.main-image {
    flex: 1;
    height: 463px;
    border-radius: 8px;
    overflow: hidden;
    background: #2A3524;
}

.main-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.thumbnail-gallery {
    display: flex;
    flex-direction: column;
    gap: 15px;
    width: 100px;
}

.thumbnail {
    width: 111px;
    height: 141px;
    border-radius: 8px;
    overflow: hidden;
    cursor: pointer;
    border: 2px solid transparent;
    transition: all 0.3s ease;
    background: #2A3524;
}

.thumbnail.active {
    border-color: #AA8B7A;
}

.thumbnail:hover {
    border-color: #AA8B7A;
    opacity: 0.8;
}

.thumbnail img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.product-info {
    flex: 1;
    max-width: 500px;
}

.product-header {
    margin-bottom: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.product-header h1 {
    color: #FFFFFF;
    font-size: 32px;
    margin: 0;
    flex: 1;
}

.price {
    color: #ffffff;
    font-size: 24px;
    white-space: nowrap;
    margin-left: 20px;
}

.rating {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 20px;
    color: #CCB3A5;
}

.stars {
    display: flex;
    align-items: center;
    gap: 5px;
    color: #AA8B7A;
}

.stars img {
    width: 16px;
    height: 16px;
}

.separator {
    color: #AA8B7A;
    opacity: 0.5;
    margin: 0 5px;
}

.reviews {
    cursor: pointer;
    transition: color 0.3s;
    text-decoration: underline;
    text-underline-offset: 4px;
    text-decoration-color: currentColor;
    color: #CCB3A5;
    font-size: 14px;
}

.rtl .reviews {
    font-family: 'TheSansArabic', sans-serif;
}

.ltr .reviews {
    font-family: 'Cairo', sans-serif;
}

.reviews:hover {
    color: #AA8B7A;
}

.description {
    color: #FFFFFF;
    line-height: 1.6;
    margin-bottom: 30px;
}

.additions {
    margin-bottom: 30px;
}

.additions h3 {
    color: #aa8b7a;
    font-size: 18px;
    margin-bottom: 15px;
}

.addition-option {
    margin-bottom: 15px;
    position: relative;
}

.addition-option input[type="radio"] {
    display: none;
}

.addition-option label {
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: #FFFFFF;
    cursor: pointer;
    padding: 10px 0;
    position: relative;
    padding-left: 35px;
}

.rtl .addition-option label {
    padding-left: 0;
    padding-right: 35px;
}

.addition-option label::before {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 20px;
    height: 20px;
    border: 2px solid #AA8B7A;
    border-radius: 50%;
    background: transparent;
}

.rtl .addition-option label::before {
    left: auto;
    right: 0;
}

.addition-option input[type="radio"]:checked + label::before {
    background: transparent;
    border-color: #AA8B7A;
}

.addition-option input[type="radio"]:checked + label::after {
    content: '';
    position: absolute;
    left: 6px;
    top: 50%;
    transform: translateY(-50%);
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: #AA8B7A;
}

.rtl .addition-option input[type="radio"]:checked + label::after {
    left: auto;
    right: 6px;
}

.addition-price {
    color: #FFFFFF;
    margin-left: 10px;
}

.rtl .addition-price {
    margin-left: 0;
    margin-right: 10px;
}

.quantity-section {
    display: flex;
    align-items: center;
    gap: 20px;
    margin-bottom: 30px;
}

.quantity-label {
    color: #FFFFFF;
    font-size: 18px;
}

.quantity-controls {
    display: flex;
    align-items: center;
    height: 40px;
    border: 1px solid #AA8B7A;
    border-radius: 4px;
    overflow: hidden;
    background: transparent;
}

.quantity-btn {
    width: 40px;
    height: 100%;
    background: transparent;
    border: none;
    color: #AA8B7A;
    font-size: 20px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.quantity-btn:hover {
    background: rgba(170, 139, 122, 0.1);
}

.quantity-btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

.quantity-controls input {
    width: 40px;
    height: 100%;
    border: none;
    background: transparent;
    color: #FFFFFF;
    text-align: center;
    font-size: 16px;
    padding: 0;
    margin: 0;
    border-left: 1px solid #AA8B7A;
    border-right: 1px solid #AA8B7A;
}

.quantity-controls input:focus {
    outline: none;
}

/* RTL specific styles for quantity selector */
.rtl .quantity-label {
    font-family: 'TheSansArabic', sans-serif;
}

.rtl .quantity-controls input {
    font-family: 'TheSansArabic', sans-serif;
}

/* LTR specific styles for quantity selector */
.ltr .quantity-label {
    font-family: 'Cairo', sans-serif;
}

.ltr .quantity-controls input {
    font-family: 'Cairo', sans-serif;
}

.add-to-cart {
    width: 100%;
    height: 48px;
    background: #AA8B7A;
    border: none;
    color: #FFFFFF;
    font-size: 16px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 500;
}

.add-to-cart:hover {
    background: #957865;
}

/* RTL specific styles for add to cart button */
.rtl .add-to-cart {
    font-family: 'TheSansArabic', sans-serif;
}

/* LTR specific styles for add to cart button */
.ltr .add-to-cart {
    font-family: 'Cairo', sans-serif;
}

@media (max-width: 992px) {
    .product-details {
        flex-direction: column;
    }

    .gallery-container {
        flex-direction: column;
    }

    .main-image {
        height: 400px;
    }

    .thumbnail-gallery {
        flex-direction: row;
        width: 100%;
        justify-content: center;
    }

    .thumbnail {
        width: 80px;
        height: 80px;
    }

    .add-to-cart {
        height: 44px;
        font-size: 14px;
    }
}

/* Reviews Section Styles */
.reviews-section {
    margin-top: 60px;
    padding: 40px;
    background: #212A1E;
    border-radius: 8px;
}

.reviews-header {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 30px;
}

.reviews-header h2 {
    color: #AA8B7A;
    font-size: 24px;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 10px;
}

.reviews-header img {
    width: 20px;
    height: 20px;
}

.reviews-list {
    display: flex;
    flex-direction: column;
    gap: 30px;
}

.review-item {
    border-bottom: 1px solid rgba(170, 139, 122, 0.2);
    
    padding: 30px 59px;
}

.review-item:last-child {
    border-bottom: none;
    padding-bottom: 0;
}

.review-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 15px;
}

.review-user {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.user-name {
    color: #FFFFFF;
    font-size: 18px;
    font-weight: 500;
}

.rating-stars {
    display: flex;
    gap: 4px;
}

.rating-stars img {
    width: 16px;
    height: 16px;
}

.review-date {
    color: #AA8B7A;
    font-size: 14px;
    opacity: 0.8;
}

.review-text {
    color: #FFFFFF;
    font-size: 16px;
    line-height: 1.6;
    margin: 0;
    opacity: 0.9;
}

.reviews-footer {
    margin-top: 40px;
    display: flex;
    flex-direction: column;
    gap: 15px;
    align-items: flex-end;
}

.load-more {
    color: #AA8B7A;
    background: none;
    border: none;
    cursor: pointer;
    padding: 10px 20px;
    font-size: 16px;
    transition: color 0.3s;
    text-decoration: underline;
    text-underline-offset: 4px;
    text-decoration-color: currentColor;
}

.load-more:hover {
    color: #CCB3A5;
}

.write-review {
    background: #AA8B7A;
    color: #FFFFFF;
    border: none;
    border-radius: 4px;
    padding: 14px 30px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
    width: 100%;
    max-width: 220px;
}

.write-review:hover {
    background: #957865;
}

/* RTL specific styles for reviews */
.rtl .reviews-header h2,
.rtl .user-name,
.rtl .review-text {
    font-family: 'TheSansArabic', sans-serif;
}

.rtl .load-more,
.rtl .write-review,
.rtl .review-date {
    font-family: 'TheSansArabic', sans-serif;
}

/* LTR specific styles for reviews */
.ltr .reviews-header h2 {
    font-family: 'Philosopher', serif;
}

.ltr .user-name,
.ltr .review-text,
.ltr .load-more,
.ltr .write-review,
.ltr .review-date {
    font-family: 'Cairo', sans-serif;
}

/* Transition animations */
.fade-enter-active,
.fade-leave-active {
    transition: all 0.3s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
    transform: translateY(-10px);
}

.fade-enter-to,
.fade-leave-from {
    opacity: 1;
    transform: translateY(0);
}

/* Modal Styles */
.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.7);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
}

.modal-container {
    background: #212A1E;
    border-radius: 8px;
       width: 102%;
    max-width: 674px;
    position: relative;
    border: 1px solid rgba(170, 139, 122, 0.2);
}

.modal-header {
        padding: 15px 49px;
    border-bottom: 1px solid rgba(170, 139, 122, 0.2);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.modal-header h3 {
    color: #AA8B7A;
    margin: 0;
    font-size: 24px;
    font-weight: normal;
}

.close-button {
    background: none;
    border: none;
    color: #AA8B7A;
    font-size: 28px;
    cursor: pointer;
    padding: 0;
    line-height: 1;
}

.modal-content {
        padding: 41px 88px;
}

.review-form {
    display: flex;
    flex-direction: column;
    gap: 25px;
}

.rating-section {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.rating-section label {
    color: #FFFFFF;
    font-size: 18px;
    opacity: 0.9;
}

.stars-container {
    display: flex;
    gap: 15px;
    margin-top: 5px;
}

.star-icon {
    font-size: 28px;
    color: #AA8B7A;
    cursor: pointer;
    transition: all 0.2s ease;
}

.fa-regular.star-icon {
    opacity: 0.5;
}

.fa-solid.star-icon {
    opacity: 1;
}

.star-icon:hover {
    transform: scale(1.1);
    color: #CCB3A5;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.form-group label {
    color: #FFFFFF;
    font-size: 16px;
}

.form-input {
    background: transparent;
    border: 1px solid #AA8B7A;
    border-radius: 4px;
    padding: 12px;
    color: #FFFFFF;
    font-size: 16px;
    width: 100%;
}

.form-input:focus {
    outline: none;
    border-color: #CCB3A5;
}

textarea.form-input {
    resize: vertical;
    min-height: 100px;
}

.submit-review {
    background: #AA8B7A;
    color: #FFFFFF;
    border: none;
    border-radius: 4px;
    padding: 14px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
    width: 100%;
}

.submit-review:hover {
    background: #957865;
}

/* RTL Modal Styles */
.rtl .modal-header h3,
.rtl .form-group label,
.rtl .rating-section label {
    font-family: 'TheSansArabic', sans-serif;
}

.rtl .form-input,
.rtl .submit-review {
    font-family: 'TheSansArabic', sans-serif;
}

/* LTR Modal Styles */
.ltr .modal-header h3 {
    font-family: 'Philosopher', serif;
}

.ltr .form-group label,
.ltr .rating-section label,
.ltr .form-input,
.ltr .submit-review {
    font-family: 'Cairo', sans-serif;
}

/* Modal Transition */
.modal-enter-active,
.modal-leave-active {
    transition: opacity 0.3s ease;
}

.modal-enter-from,
.modal-leave-to {
    opacity: 0;
}

@media (max-width: 480px) {
    .arrow-icon {
        width: 63px;
        height: 12px;
    }
    .nav-link {
        font-size: 16px
    }
    .product-header h1 {
        font-size: 24px;
    }
    .ltr .product-header h1 {
        font-family: 'Philosopher', serif;
    }
    .product-header .price {
        font-size: 20px;
    }
    
}

/* Tablet Specific Styles */
@media screen and (min-width: 768px) and (max-width: 1024px) {
    .profile-page {
        padding: 40px 60px;
    }

    .profile-container {
        max-width: 1000px;
    }

    .orders-navigation {
        top: -35px;
        padding: 15px 0;
    }

    .nav-link {
        font-size: 19px;
        gap: 25px;
    }

    .arrow-icon {
        width: 100px;
        height: 14px;
    }
    .profile-page {
    min-height: calc(71vh - 286px);
}
    .product-details {
        display: flex;
        flex-direction: row;
        gap: 35px;
        margin-top: 20px;
    }

    .product-gallery {
        flex: 1;
        max-width: 450px;
    }

    .gallery-container {
        display: flex;
        gap: 18px;
        flex-direction: row-reverse;
    }

    .main-image {
        flex: 1;
        height: 420px;
    }

    .thumbnail-gallery {
        display: flex;
        flex-direction: column;
        gap: 15px;
        width: 100px;
    }

    .thumbnail {
        width: 100px;
        height: 130px;
    }

    .product-info {
        flex: 1;
        max-width: 450px;
    }

    .product-header h1 {
        font-size: 30px;
    }

    .price {
        font-size: 23px;
    }

    .rating {
        margin-bottom: 18px;
    }

    .stars img {
        width: 15px;
        height: 15px;
    }

    .description {
        font-size: 16px;
        margin-bottom: 28px;
        line-height: 1.5;
    }

    .additions h3 {
        font-size: 17px;
        margin-bottom: 14px;
    }

    .addition-option {
        margin-bottom: 12px;
    }

    .addition-option label {
        padding: 10px 0;
        padding-left: 32px;
        font-size: 16px;
    }

    .rtl .addition-option label {
        padding-left: 0;
        padding-right: 32px;
    }

    .addition-option label::before {
        width: 19px;
        height: 19px;
    }

    .addition-option input[type="radio"]:checked + label::after {
        width: 11px;
        height: 11px;
        left: 6px;
    }

    .rtl .addition-option input[type="radio"]:checked + label::after {
        left: auto;
        right: 6px;
    }

    .quantity-section {
        gap: 18px;
        margin-bottom: 28px;
    }

    .quantity-label {
        font-size: 17px;
    }

    .quantity-controls {
        height: 38px;
    }

    .quantity-btn {
        width: 38px;
        font-size: 19px;
    }

    .quantity-controls input {
        width: 38px;
        font-size: 16px;
    }

    .add-to-cart {
        height: 46px;
        font-size: 16px;
    }

    /* Reviews Section Tablet Styles */
    .reviews-section {
        margin-top: 50px;
        padding: 35px;
    }

    .reviews-header h2 {
        font-size: 23px;
    }

    .reviews-header img {
        width: 19px;
        height: 19px;
    }

    .review-item {
        padding: 28px 50px;
    }

    .user-name {
        font-size: 17px;
    }

    .review-text {
        font-size: 16px;
        line-height: 1.5;
    }

    .reviews-footer {
        margin-top: 35px;
        gap: 14px;
    }

    .write-review {
        padding: 13px 28px;
        font-size: 16px;
        max-width: 210px;
    }

    /* Modal Tablet Styles */
    .modal-container {
        max-width: 650px;
        width: 90%;
    }

    .modal-header {
        padding: 14px 45px;
    }

    .modal-header h3 {
        font-size: 23px;
    }

    .modal-content {
        padding: 38px 80px;
    }

    .rating-section label {
        font-size: 17px;
    }

    .star-icon {
        font-size: 26px;
    }

    .form-group label {
        font-size: 16px;
    }

    .form-input {
        padding: 11px;
        font-size: 16px;
    }

    .submit-review {
        padding: 13px;
        font-size: 16px;
    }
}
</style>