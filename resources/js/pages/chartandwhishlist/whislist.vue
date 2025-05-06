<template>
    <div class="profile-page" :class="currentLang === 'en' ? 'ltr' : 'rtl'">
        <div class="profile-container">
            <!-- Title -->
            <h1 class="profile-title">
                {{ currentLang === 'en' ? 'WishList' : 'قائمة الأمنيات' }}
                <img src="../../../../public/assets/img/star.png" class="title-star" alt="star" />
            </h1>

            <div class="profile-layout">
                <!-- Sidebar -->
                <div class="profile-sidebar">
                   
                </div>

                <!-- Form Content -->
                <div class="profile-content">
                    <div class="products-grid">
                        <!-- Mix Chocolates (Large Box) -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="../../../../public/assets/img/products/large-box-2.png" :alt="currentLang === 'en' ? 'Mix Chocolates (Large Box)' : 'علبة كبيرة | تشكيلة'" />
                                <button class="favorite-btn active">
                                    <img src="../../../../public/assets/img/products/heart-filled.png" alt="Favorite" />
                                </button>
                            </div>
                            <div class="product-info">
                                <h3>{{ currentLang === 'en' ? 'Mix Chocolates (Large Box)' : 'علبة كبيرة | تشكيلة' }}</h3>
                                <div class="info-row">
                                    <p class="pieces">{{ currentLang === 'en' ? '49 pcs' : '49 حبة' }}</p>
                                    <div class="price-container">
                                        <div class="price">{{ currentLang === 'en' ? '19.000 KD' : '19.000 د.ك' }}</div>
                                    </div>
                                </div>
                                <button class="add-to-cart">{{ currentLang === 'en' ? '+ ADD TO CART' : '+ إضافة إلى السلة' }}</button>
                            </div>
                        </div>

                        <!-- Mix Corks Box -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="../../../../public/assets/img/products/corks-box-2.png" :alt="currentLang === 'en' ? 'Mix Corks Box' : 'كوركس بوكس'" />
                                <button class="favorite-btn active">
                                    <img src="../../../../public/assets/img/products/heart-filled.png" alt="Favorite" />
                                </button>
                            </div>
                            <div class="product-info">
                                <h3>{{ currentLang === 'en' ? 'Mix Corks Box' : 'كوركس بوكس' }}</h3>
                                <div class="info-row">
                                    <p class="pieces">{{ currentLang === 'en' ? '50 pcs' : '50 حبة' }}</p>
                                    <div class="price-container">
                                        <div class="price">{{ currentLang === 'en' ? '19.000 KD' : '19.000 د.ك' }}</div>
                                    </div>
                                </div>
                                <button class="add-to-cart">{{ currentLang === 'en' ? '+ ADD TO CART' : '+ إضافة إلى السلة' }}</button>
                            </div>
                        </div>

                        <!-- Luxury Macaron Box -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="../../../../public/assets/img/products/macaron-box-2.png" :alt="currentLang === 'en' ? 'Luxury Macaron Box' : 'الماكارون بوكس'" />
                                <button class="favorite-btn active">
                                    <img src="../../../../public/assets/img/products/heart-filled.png" alt="Favorite" />
                                </button>
                            </div>
                            <div class="product-info">
                                <h3>{{ currentLang === 'en' ? 'Luxury Macaron Box' : 'الماكارون بوكس' }}</h3>
                                <div class="info-row">
                                    <p class="pieces">{{ currentLang === 'en' ? '38 pcs' : '38 حبة' }}</p>
                                    <div class="price-container">
                                        <div class="price">{{ currentLang === 'en' ? '27.000 KD' : '27.000 د.ك' }}</div>
                                    </div>
                                </div>
                                <button class="add-to-cart">{{ currentLang === 'en' ? '+ ADD TO CART' : '+ إضافة إلى السلة' }}</button>
                            </div>
                        </div>

                        <!-- Milagro Diffuser -->
                        <div class="product-card">
                            <div class="product-image">
                                <img src="../../../../public/assets/img/products/diffuser-2.png" :alt="currentLang === 'en' ? 'Milagro Diffuser' : 'دفيوزر ميلاغرو'" />
                                <button class="favorite-btn active">
                                    <img src="../../../../public/assets/img/products/heart-filled.png" alt="Favorite" />
                                </button>
                            </div>
                            <div class="product-info">
                                <h3>{{ currentLang === 'en' ? 'Milagro Diffuser' : 'دفيوزر ميلاغرو' }}</h3>
                                <div class="info-row">
                                    <p class="pieces">{{ currentLang === 'en' ? '30 pcs' : '30 حبة' }}</p>
                                    <div class="price-container">
                                        <div class="price">{{ currentLang === 'en' ? '13.000 KD' : '13.000 د.ك' }}</div>
                                    </div>
                                </div>
                                <button class="add-to-cart">{{ currentLang === 'en' ? '+ ADD TO CART' : '+ إضافة إلى السلة' }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Wishlist',
    data() {
        return {
            currentLang: localStorage.getItem('currentLang') || 'en',
            activeTab: 'info',
            form: {
                firstName: '',
                lastName: '',
                email: '',
                phone: ''
            }
        }
    },
    methods: {
        handleSubmit() {
            console.log('Form submitted:', this.form);
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
.title-star {
    width: 24px;
    height: 24px;
    position: relative;
    top: -14px;
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
    width: 137%;
}

.ltr .sidebar-item.active::after {
    content: "";
    position: absolute;
    bottom: -12px;
    left: -158px;
    right: 0;
    height: 2px;
    background: #AA8B7A;
    width: 158%;
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
    border: 1px solid rgba(170, 139, 122, 0.2);
    transition: transform 0.3s ease;
}

.product-card:hover {
    transform: translateY(-5px);
}

.product-image {
    position: relative;
    width: 100%;
    height: 250px;
    overflow: hidden;
}

.product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.favorite-btn {
    position: absolute;
    top: 12px;
    right: 12px;
    background: none;
    border: none;
    cursor: pointer;
    padding: 0;
    z-index: 2;
}

.favorite-btn img {
    width: 24px;
    height: 24px;
    opacity: 0.8;
}

.favorite-btn.active img {
    filter: none;
    opacity: 1;
}

/* RTL favorite button position */
.rtl .favorite-btn {
    right: auto;
    left: 12px;
}

.product-info {
    padding: 16px;
}

.product-info h3 {
    color: #FFFFFF;
    font-size: 18px;
    margin: 0;
    font-weight: normal;
    margin-bottom: 16px;
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

.price {
    color: #FFFFFF;
    font-size: 16px;
    font-weight: 500;
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

/* RTL specific styles for products */
.rtl .product-info {
    text-align: right;
}

.rtl .product-info h3,
.rtl .pieces,
.rtl .price,
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
.ltr .price,
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
</style>