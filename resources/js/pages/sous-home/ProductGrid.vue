<template>
    <section class="product-grid-section" :class="currentLang === 'en' ? 'ltr' : 'rtl'">
        <div class="products-container">
            <!-- Top Row -->
            <div class="products-row">
                <template v-if="currentLang === 'en'">
                    <!-- English Order (LTR) -->
                    <div class="product-card">
                        <img src="../../../../public/assets/img/diffuser.png" alt="Diffuser" class="product-image" />
                        <div class="product-info">
                            <h3 class="product-title">
                                <span v-if="currentLang === 'en'">Milagro Diffuser</span>
                                <span v-else>دفيوزر ميلاقرو</span>
                            </h3>
                            <div class="product-details">
                                <span class="quantity-info">
                                    <span class="quantity-number">30</span>
                                    <span class="quantity-text">{{ currentLang === 'en' ? 'PCS' : 'حبة' }}</span>
                                </span>
                                <span class="price-info">
                                    <span class="current-price">{{ currentLang === 'en' ? '13.000' : '13' }}</span>
                                    <span class="currency">{{ currentLang === 'en' ? 'KD' : 'د.ك' }}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="product-card">
                        <img src="../../../../public/assets/img/macarons.png" alt="Macarons" class="product-image" />
                        <div class="product-info">
                            <h3 class="product-title">
                                <span v-if="currentLang === 'en'">Luxury Macaron Box</span>
                                <span v-else>
                                    الماكرون 
                                    <span class="separator">|</span> 
                                    <span class="sub-title">مكس</span>
                                </span>
                            </h3>
                            <div class="product-details">
                                <span class="quantity-info">
                                    <span class="quantity-number">38</span>
                                    <span class="quantity-text">{{ currentLang === 'en' ? 'PCS' : 'حبة' }}</span>
                                </span>
                                <span class="price-info">
                                    <span class="current-price">{{ currentLang === 'en' ? '27.000' : '27' }}</span>
                                    <span class="currency">{{ currentLang === 'en' ? 'KD' : 'د.ك' }}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="product-card">
                        <img src="../../../../public/assets/img/mini-box.png" alt="Mini Box" class="product-image" />
                        <div class="product-info">
                            <h3 class="product-title">
                                <span v-if="currentLang === 'en'">Mix Chocolates (Mini Box)</span>
                                <span v-else>
                                    ميني بوكس 
                                    <span class="separator">|</span> 
                                    <span class="sub-title">تشكيلة</span>
                                </span>
                            </h3>
                            <div class="product-details">
                                <span class="quantity-info">
                                    <span class="quantity-number">9</span>
                                    <span class="quantity-text">{{ currentLang === 'en' ? 'PCS' : 'حبة' }}</span>
                                </span>
                                <span class="price-info">
                                    <span class="current-price">{{ currentLang === 'en' ? '5.000' : '5' }}</span>
                                    <span class="currency">{{ currentLang === 'en' ? 'KD' : 'د.ك' }}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </template>
                <template v-else>
                    <!-- Arabic Order (RTL) -->
                    <div class="product-card">
                        <img src="../../../../public/assets/img/mini-box.png" alt="Mini Box" class="product-image" />
                        <div class="product-info">
                            <h3 class="product-title">
                                <span v-if="currentLang === 'en'">Mix Chocolates (Mini Box)</span>
                                <span v-else>
                                    ميني بوكس 
                                    <span class="separator">|</span> 
                                    <span class="sub-title">تشكيلة</span>
                                </span>
                            </h3>
                            <div class="product-details">
                                <span class="quantity-info">
                                    <span class="quantity-number">9</span>
                                    <span class="quantity-text">{{ currentLang === 'en' ? 'PCS' : 'حبة' }}</span>
                                </span>
                                <span class="price-info">
                                    <span class="current-price">{{ currentLang === 'en' ? '5.000' : '5' }}</span>
                                    <span class="currency">{{ currentLang === 'en' ? 'د.ك' : 'د.ك' }}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="product-card">
                        <img src="../../../../public/assets/img/macarons.png" alt="Macarons" class="product-image" />
                        <div class="product-info">
                            <h3 class="product-title">
                                <span v-if="currentLang === 'en'">Luxury Macaron Box</span>
                                <span v-else>
                                    الماكرون 
                                    <span class="separator">|</span> 
                                    <span class="sub-title">مكس</span>
                                </span>
                            </h3>
                            <div class="product-details">
                                <span class="quantity-info">
                                    <span class="quantity-number">38</span>
                                    <span class="quantity-text">{{ currentLang === 'en' ? 'PCS' : 'حبة' }}</span>
                                </span>
                                <span class="price-info">
                                    <span class="current-price">{{ currentLang === 'en' ? '27.000' : '27' }}</span>
                                    <span class="currency">{{ currentLang === 'en' ? 'د.ك' : 'د.ك' }}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="product-card">
                        <img src="../../../../public/assets/img/diffuser.png" alt="Diffuser" class="product-image" />
                        <div class="product-info">
                            <h3 class="product-title">
                                <span v-if="currentLang === 'en'">Milagro Diffuser</span>
                                <span v-else>دفيوزر ميلاقرو</span>
                            </h3>
                            <div class="product-details">
                                <span class="quantity-info">
                                    <span class="quantity-number">30</span>
                                    <span class="quantity-text">{{ currentLang === 'en' ? 'PCS' : 'حبة' }}</span>
                                </span>
                                <span class="price-info">
                                    <span class="current-price">{{ currentLang === 'en' ? '13.000' : '13' }}</span>
                                    <span class="currency">{{ currentLang === 'en' ? 'د.ك' : 'د.ك' }}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Bottom Row -->
            <div class="products-row">
                <template v-if="currentLang === 'en'">
                    <!-- English Order (LTR) -->
                    <div class="product-card">
                        <img src="../../../../public/assets/img/super-box.png" alt="Super Box" class="product-image" />
                        <div class="product-info">
                            <h3 class="product-title">
                                <span v-if="currentLang === 'en'">Mix Coins Box</span>
                                <span v-else>
                                    كوينز بوكس
                                    
                                </span>
                            </h3>
                            <div class="product-details">
                                <span class="quantity-info">
                                    <span class="quantity-number">50</span>
                                    <span class="quantity-text">{{ currentLang === 'en' ? 'PCS' : 'حبة' }}</span>
                                </span>
                                <span class="price-info">
                                    <span class="current-price">{{ currentLang === 'en' ? '29.000' : '29' }}</span>
                                    <span class="currency">{{ currentLang === 'en' ? 'د.ك' : 'د.ك' }}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="product-card">
                        <img src="../../../../public/assets/img/medium-box.png" alt="Medium Box" class="product-image" />
                        <div class="product-info">
                            <h3 class="product-title">
                                <span v-if="currentLang === 'en'">Mix Chocolates (Medium Box)</span>
                                <span v-else>
                                    علبة وسط 
                                    <span class="separator">|</span> 
                                    <span class="sub-title">تشكيلة</span>
                                </span>
                            </h3>
                            <div class="product-details">
                                <span class="quantity-info">
                                    <span class="quantity-number">25</span>
                                    <span class="quantity-text">{{ currentLang === 'en' ? 'PCS' : 'حبة' }}</span>
                                </span>
                                <span class="price-info">
                                    <span class="current-price">{{ currentLang === 'en' ? '12.000' : '12' }}</span>
                                    <span class="currency">{{ currentLang === 'en' ? 'د.ك' : 'د.ك' }}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="product-card">
                        <img src="../../../../public/assets/img/large-box.png" alt="Large Box" class="product-image" />
                        <div class="product-info">
                            <h3 class="product-title">
                                <span v-if="currentLang === 'en'">Mix Chocolates (Large Box)</span>
                                <span v-else>
                                    علبة كبيرة 
                                    <span class="separator">|</span> 
                                    <span class="sub-title">تشكيلة</span>
                                </span>
                            </h3>
                            <div class="product-details">
                                <span class="quantity-info">
                                    <span class="quantity-number">49</span>
                                    <span class="quantity-text">{{ currentLang === 'en' ? 'PCS' : 'حبة' }}</span>
                                </span>
                                <span class="price-info">
                                    <span class="current-price">{{ currentLang === 'en' ? '19.000' : '19' }}</span>
                                    <span class="currency">{{ currentLang === 'en' ? 'د.ك' : 'د.ك' }}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </template>
                <template v-else>
                    <!-- Arabic Order (RTL) -->
                    <div class="product-card">
                        <img src="../../../../public/assets/img/large-box.png" alt="Large Box" class="product-image" />
                        <div class="product-info">
                            <h3 class="product-title">
                                <span v-if="currentLang === 'en'">Mix Chocolates (Large Box)</span>
                                <span v-else>
                                    علبة كبيرة 
                                    <span class="separator">|</span> 
                                    <span class="sub-title">تشكيلة</span>
                                </span>
                            </h3>
                            <div class="product-details">
                                <span class="quantity-info">
                                    <span class="quantity-number">49</span>
                                    <span class="quantity-text">{{ currentLang === 'en' ? 'PCS' : 'حبة' }}</span>
                                </span>
                                <span class="price-info">
                                    <span class="current-price">{{ currentLang === 'en' ? '19.000' : '19' }}</span>
                                    <span class="currency">{{ currentLang === 'en' ? 'د.ك' : 'د.ك' }}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="product-card">
                        <img src="../../../../public/assets/img/medium-box.png" alt="Medium Box" class="product-image" />
                        <div class="product-info">
                            <h3 class="product-title">
                                <span v-if="currentLang === 'en'">Mix Chocolates (Medium Box)</span>
                                <span v-else>
                                    علبة وسط 
                                    <span class="separator">|</span> 
                                    <span class="sub-title">تشكيلة</span>
                                </span>
                            </h3>
                            <div class="product-details">
                                <span class="quantity-info">
                                    <span class="quantity-number">25</span>
                                    <span class="quantity-text">{{ currentLang === 'en' ? 'PCS' : 'حبة' }}</span>
                                </span>
                                <span class="price-info">
                                    <span class="current-price">{{ currentLang === 'en' ? '12.000' : '12' }}</span>
                                    <span class="currency">{{ currentLang === 'en' ? 'د.ك' : 'د.ك' }}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="product-card">
                        <img src="../../../../public/assets/img/super-box.png" alt="Super Box" class="product-image" />
                        <div class="product-info">
                            <h3 class="product-title">
                                <span v-if="currentLang === 'en'">Mix Coins Box</span>
                                <span v-else>
                                    كوينز بوكس
                                    
                                </span>
                            </h3>
                            <div class="product-details">
                                <span class="quantity-info">
                                    <span class="quantity-number">50</span>
                                    <span class="quantity-text">{{ currentLang === 'en' ? 'PCS' : 'حبة' }}</span>
                                </span>
                                <span class="price-info">
                                    <span class="current-price">{{ currentLang === 'en' ? '29.000' : '29' }}</span>
                                    <span class="currency">{{ currentLang === 'en' ? 'د.ك' : 'د.ك' }}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'ProductGrid',
    props: {
        currentLang: {
            type: String,
            required: true,
            default: 'ar'
        }
    }
}
</script>

<style scoped>
.product-grid-section {
    background: #212A1E;
    padding: 170px 20px;
    color: #aa8b7a;
}

.products-container {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    gap: 30px;
}

.products-row {
    display: flex;
    justify-content: center;
    gap: 83px;
}

.product-card {
    flex: 1;
    max-width: 350px;
    position: relative;
    cursor: pointer;
    transition: transform 0.3s ease;
}

.product-card:hover {
    transform: translateY(-5px);
}

.product-image {
    width: 100%;
    height: 325px;
    object-fit: cover;
    border-radius: 12px;
}

.product-info {
    padding: 16px 8px;
}

.product-title {
    color: #fff;
    font-size: 20px;
    margin: 0 0 8px;
    font-weight: 400;
}

.product-details {
    display: flex;
    justify-content: center;
    align-items: center;
}

.price-info {
    display: flex;
    gap: 10px;
    align-items: center;
    justify-content: center;
}

.current-price {
    color: #aa8b7a;
    font-size: 18px;
    font-weight: 500;
}

.original-price {
    color: #666;
    text-decoration: line-through;
    font-size: 16px;
}

/* RTL (Arabic) specific styles */
.rtl .product-title {
    text-align: right;
    font-family: 'TheSansArabic', sans-serif;
}

.rtl .separator {
    color: #aa8b7a;
    margin: 0 5px;
}

.rtl .sub-title {
    color: #FFFFFF;
}

.rtl .product-details {
    display: flex;
    justify-content: space-between;
    direction: rtl;
}

.rtl .quantity-info {
    color: #aa8b7a;
    font-family: 'TheSansArabic', sans-serif;
    display: flex;
    gap: 4px;
}

.rtl .price-info {
    color: #aa8b7a;
    font-family: 'TheSansArabic', sans-serif;
}

/* LTR (English) specific styles */
.ltr .product-title {
    text-align: left;
    font-family: 'Philosopher', serif;
}

.ltr .product-details {
    display: flex;
    justify-content: space-between;
    direction: ltr;
   
}

.ltr .quantity-info {
    color: #aa8b7a;
    font-family: 'Cairo', sans-serif;
    order: 1;
    text-align: left;
}

.ltr .price-info {
    color: #aa8b7a;
    font-family: 'Cairo', sans-serif;
    order: 2;
    text-align: right;
}

.quantity-info {
    font-size: 16px;
    display: flex;
    align-items: center;
    gap: 4px;
}

.price-info {
    font-size: 18px;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 4px;
}

.quantity-number {
    font-weight: 500;
}

.current-price {
    font-weight: 500;
}

@media (max-width: 768px) {
    .products-row {
        flex-direction: column;
        align-items: center;
    }

    .product-card {
        max-width: 100%;
    }

    .product-image {
        height: 200px;
    }
}
</style>
