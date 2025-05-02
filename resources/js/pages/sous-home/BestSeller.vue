<template>
    <section class="best-seller-section" :class="currentLang === 'en' ? 'ltr' : 'rtl'">
        <div class="section-header">
            <h2 class="section-title">
                <span v-if="currentLang === 'en'">Best Seller</span>
                <span v-else>الأكثر مبيعًا</span>
                <img src="../../../../public/assets/img/star.png" class="star-icon" alt="star" />
            </h2>
        </div>

        <div class="slider-container">
            <!-- Left Arrow -->
            <button class="nav-arrow prev" aria-label="Previous">
                <span>‹</span>
            </button>
            <div class="products-container">
                <div class="product-card" v-for="(product, index) in products" :key="index">
                    <div class="product-image-container">
                        <img :src="product.image" :alt="product.title[currentLang]" class="product-image" />
                        <div class="hover-hand"></div>
                    </div>
                    <div class="product-info">
                        <h3 class="product-title">{{ product.title[currentLang] }}</h3>
                        <div class="product-details">
                            <span class="product-price">{{ product.price }} {{ translations.currency[currentLang] }}</span>
                            <span class="product-pieces" :dir="currentLang === 'ar' ? 'rtl' : 'ltr'">
                                <template v-if="currentLang === 'ar'">
                                    <span class="pieces-number">{{ product.pieces }}</span>
                                    <span class="pieces-text">{{ translations.pieces[currentLang] }}</span>
                                </template>
                                <template v-else>
                                    {{ product.pieces }} {{ translations.pieces[currentLang] }}
                                </template>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Arrow -->
            <button class="nav-arrow next" aria-label="Next">
                <span>›</span>
            </button>
        </div>
    </section>
</template>

<script>
export default {
    name: 'BestSeller',
    props: {
        currentLang: {
            type: String,
            required: true,
            default: 'ar'
        }
    },
    data() {
        return {
            translations: {
                pieces: {
                    ar: 'حبة',
                    en: 'pieces'
                },
                currency: {
                    ar: 'KD',
                    en: 'KD'
                }
            },
            products: [
                {
                    image: '/assets/img/blue.png',
                    title: {
                        ar: 'توزيعات ميلاجرو أزرق',
                        en: 'Blue Giveaway Tray'
                    },
                    pieces: 30,
                    price: '29.000'
                },
                {
                    image: '/assets/img/green.png',
                    title: {
                        ar: 'توزيعات ميلاجرو أخضر',
                        en: 'Green Giveaway Tray'
                    },
                    pieces: 30,
                    price: '29.000'
                },
                {
                    image: '/assets/img/pink.png',
                    title: {
                        ar: 'توزيعات ميلاجرو وردي',
                        en: 'Pink Giveaway Tray'
                    },
                    pieces: 30,
                    price: '29.000'
                },
                {
                    image: '/assets/img/red.png',
                    title: {
                        ar: 'توزيعات ميلاجرو أحمر',
                        en: 'Red Giveaway Tray'
                    },
                    pieces: 30,
                    price: '29.000'
                }
            ]
        }
    }
}
</script>

<style scoped>
.best-seller-section {
    background: #212A1E;
    width: 100%;
    position: relative;
    padding-top: 20px;
}

.section-header {
    text-align: right;
    padding-right: 80px;
    margin-bottom: 40px;
}

.section-title {
    display: inline-flex;
    align-items: center;
    color: #aa8b7a;
    font-size: 42px;
    font-family: TheSansArabic, sans-serif;
    font-weight: 600;
    margin: 0;
    position: relative;
}

.star-icon {
    width: 16px;
    /* Set a small fixed width */
    height: 16px;
    /* Set a small fixed height */
    margin-right: 5px;
    margin-top: -25px;
    order: -1;
    /* Places star before text in RTL */
    object-fit: contain;
    /* Ensures the image maintains its aspect ratio */
}

.slider-container {
    position: relative;
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 60px;
    display: flex;
    justify-content: center;
}

.products-container {
    display: flex;
    gap: 24px;
    overflow: hidden;
    padding: 20px 0;
    margin: 0 auto;
    justify-content: flex-start;
    width: 100%;
    max-width: 1280px;
}

/* RTL (Arabic) specific styles */
.rtl .products-container {
    direction: right;
}

/* LTR (English) specific styles */
.ltr .products-container {
    direction: left;
}

.product-card {
    flex: 0 0 300px;
    background: transparent;
    border-radius: 12px;
    overflow: hidden;
    transition: transform 0.3s ease;
    margin: 0 auto;
}

.product-image-container {
    position: relative;
    width: 98%;
    height: 280px;
    overflow: hidden;
    border-radius: 11px;
    border: 2px solid #aa8b7a;
}

.product-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.hover-hand {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 80px;
    background: linear-gradient(to bottom, rgba(33, 42, 30, 0.5), transparent);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.product-card:hover .hover-hand {
    opacity: 1;
}

.product-info {
    padding: 16px 8px;
    text-align: center;
}

.product-title {
    color: #fff;
    font-size: 20px;
    margin: 0 0 2px;
    font-family: TheSansArabic, sans-serif;
    font-weight: 400;
    text-align: end;
}

/* Add specific alignment for English */
.ltr .product-title {
    text-align: start;
}

.product-details {
    display: flex;
    justify-content: space-between;
    align-items: center;
    direction: ltr;
}

/* Reverse order for English */
.ltr .product-details {
    flex-direction: row-reverse;
}

.product-pieces {
    color: #aa8b7a;
    font-size: 16px;
    text-align: right;
    font-family: 'TheSansArabic';
    display: flex;
    gap: 4px;
}

.pieces-number {
    order: -1;
}

.pieces-text {
    order: 1;
}

.product-price {
    color: #aa8b7a;
    font-size: 18px;
    font-weight: 500;
    text-align: left;
    font-family: 'TheSansArabic';
}

.nav-arrow {
    position: absolute;
    top: 38%;
    transform: translateY(-50%);
    width: 59px;
    height: 45px;
    border: none;
    background: transparent;
    color: #aa8b7a;
    font-size: 72px;
    font-weight: 100;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all .3s ease;
}

.nav-arrow:focus {
    outline: none;
    color: #fff;
}

.nav-arrow:focus-visible {
    outline: none;
}

.prev {
    left: 40px;
}

.next {
    right: 40px;
}

/* RTL (Arabic) specific styles */
.rtl .section-header {
    text-align: right;
    padding-right: 176px;
}

.rtl .section-title {
    font-family: 'TheSansArabic', sans-serif;
}

.rtl .star-icon {
    margin-right: 5px;
    margin-left: 0;
}

/* LTR (English) specific styles */
.ltr .section-header {
    text-align: left;
    padding-left: 177px;
    padding-right: 0;
}

.ltr .section-title {
    font-family: 'Philosopher', serif;
}

.ltr .star-icon {
    margin-left: 5px;
    margin-right: 0;
    order: 1;
    /* Places star after text in LTR */
}

/* Responsive adjustments */
@media (max-width: 1200px) {
    .products-container {
        gap: 16px;
    }

    .product-card {
        flex: 0 0 280px;
    }
}

@media (max-width: 768px) {
    .slider-container {
        padding: 0 40px;
    }

    .product-card {
        flex: 0 0 260px;
    }

    .section-title {
        font-size: 36px;
    }
}

/* Custom scrollbar for the products container */
.products-container::-webkit-scrollbar {
    height: 6px;
}

.products-container::-webkit-scrollbar-track {
    background: rgba(170, 139, 122, 0.1);
    border-radius: 3px;
}

.products-container::-webkit-scrollbar-thumb {
    background: rgba(170, 139, 122, 0.3);
    border-radius: 3px;
}

.products-container::-webkit-scrollbar-thumb:hover {
    background: rgba(170, 139, 122, 0.5);
}
</style>