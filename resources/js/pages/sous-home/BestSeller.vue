<template>
    <section class="best-seller-section" :class="currentLang === 'en' ? 'ltr' : 'rtl'">
        <div class="section-header">
            <h2 class="section-title" v-if="!isMobile">
                <span v-if="currentLang === 'en'">Best Sellers</span>
                <span v-else>الأكثر مبيعًا</span>
                <img src="../../../../public/assets/img/star.png" class="star-icon" alt="star" />
            </h2>
            <h2 class="section-title" v-if="isMobile">
                <span v-if="currentLang === 'en'">Best Sellers</span>
                <span v-else>الأكثر مبيعًا</span>
            </h2>
            <div v-if="isMobile" class="mobile-best-seller-line">

                <span class="line"></span>
                <span class="diamond-icon"></span>
                <span class="line"></span>
            </div>
        </div>

        <div class="slider-container">
            <!-- Left Arrow -->
            <button 
                :class="['nav-arrow', 'prev', {'visible': canScrollLeft}]"
                aria-label="Previous" 
                @click="slidePrev"
            >
                <span>‹</span>
            </button>
            <div 
                ref="productsContainer"
                class="products-container"
                @mousedown="startDragging"
                @mousemove="moveSlider"
                @mouseup="stopDragging"
                @mouseleave="stopDragging"
                @touchstart="startDragging"
                @touchmove="moveSlider"
                @touchend="stopDragging"
            >
                <div class="product-card" v-for="(product, index) in products" :key="index">
                    <div class="product-image-container">
                        <img :src="product.image" :alt="product.title[currentLang]" class="product-image" />
                        <div class="hover-hand"></div>
                    </div>
                    <div class="product-info">
                        <h3 class="product-title">{{ product.title[currentLang] }}</h3>
                        <div class="product-details">
                            <span class="product-price">{{ product.price }} {{ translations.currency[currentLang]
                                }}</span>
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
            <button 
                :class="['nav-arrow', 'next', {'visible': canScrollRight}]"
                aria-label="Next" 
                @click="slideNext"
            >
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
            isMobile: false,
            isDragging: false,
            startX: 0,
            scrollLeft: 0,
            canScrollLeft: false,
            canScrollRight: true,
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
                },
                {
                    image: '/assets/img/red.png',
                    title: {
                        ar: 'توزيعات ميلاجرو أحمر',
                        en: 'Red Giveaway Tray'
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
    },
    methods: {
        checkMobile() {
            this.isMobile = window.innerWidth <= 445;
        },
        updateScrollButtons() {
            const slider = this.$refs.productsContainer;
            if (!slider) return;

            const maxScroll = slider.scrollWidth - slider.clientWidth;
            const threshold = 10;
            const currentScroll = Math.abs(slider.scrollLeft);

            if (this.currentLang === 'ar') {
                // For RTL (Arabic)
                this.canScrollLeft = currentScroll < maxScroll - threshold;
                this.canScrollRight = currentScroll > threshold;
            } else {
                // For LTR (English)
                this.canScrollLeft = currentScroll > threshold;
                this.canScrollRight = currentScroll < maxScroll - threshold;
            }

            // Force a re-render of the arrows
            this.$forceUpdate();
        },
        startDragging(e) {
            this.isDragging = true;
            const slider = this.$refs.productsContainer;
            this.startX = e.type === 'mousedown' ? e.pageX : e.touches[0].pageX;
            this.scrollLeft = slider.scrollLeft;
            slider.style.cursor = 'grabbing';
            slider.style.userSelect = 'none';
            slider.style.scrollBehavior = 'auto';
        },
        stopDragging(e) {
            this.isDragging = false;
            const slider = this.$refs.productsContainer;
            slider.style.cursor = 'grab';
            slider.style.removeProperty('user-select');
            slider.style.scrollBehavior = 'smooth';
            this.updateScrollButtons();
        },
        moveSlider(e) {
            if (!this.isDragging) return;
            
            e.preventDefault();
            const slider = this.$refs.productsContainer;
            const x = e.type === 'mousemove' ? e.pageX : e.touches[0].pageX;
            const difference = x - this.startX;
            
            // Use positive difference for both RTL and LTR
            const scrollDifference = -difference;
            slider.scrollLeft = this.scrollLeft + scrollDifference;
            
            // Immediate update of button visibility
            requestAnimationFrame(() => this.updateScrollButtons());
        },
        slideNext() {
            const slider = this.$refs.productsContainer;
            const cardWidth = 300 + 24;
            const scrollAmount = cardWidth;
            
            slider.scrollBy({ 
                left: this.currentLang === 'ar' ? -scrollAmount : scrollAmount, 
                behavior: 'smooth' 
            });
            
            // Update buttons after animation
            const checkScroll = () => {
                if (slider.scrollLeft === this.scrollLeft) {
                    this.updateScrollButtons();
                } else {
                    this.scrollLeft = slider.scrollLeft;
                    requestAnimationFrame(checkScroll);
                }
            };
            requestAnimationFrame(checkScroll);
        },
        slidePrev() {
            const slider = this.$refs.productsContainer;
            const cardWidth = 300 + 24;
            const scrollAmount = cardWidth;
            
            slider.scrollBy({ 
                left: this.currentLang === 'ar' ? scrollAmount : -scrollAmount, 
                behavior: 'smooth' 
            });
            
            // Update buttons after animation
            const checkScroll = () => {
                if (slider.scrollLeft === this.scrollLeft) {
                    this.updateScrollButtons();
                } else {
                    this.scrollLeft = slider.scrollLeft;
                    requestAnimationFrame(checkScroll);
                }
            };
            requestAnimationFrame(checkScroll);
        }
    },
    mounted() {
        this.checkMobile();
        window.addEventListener('resize', this.checkMobile);
        
        this.$nextTick(() => {
            const slider = this.$refs.productsContainer;
            
            // Initialize slider position for RTL
            if (this.currentLang === 'ar') {
                // For RTL, start at the beginning (left side)
                slider.scrollLeft = 0;
            }
            
            // Add scroll event listener with debounce
            let scrollTimeout;
            slider.addEventListener('scroll', () => {
                if (scrollTimeout) {
                    window.cancelAnimationFrame(scrollTimeout);
                }
                scrollTimeout = requestAnimationFrame(() => {
                    this.updateScrollButtons();
                });
            });
            
            // Initial button check
            this.updateScrollButtons();
        });

        // Prevent default drag behaviors
        const slider = this.$refs.productsContainer;
        slider.addEventListener('dragstart', e => e.preventDefault());
    },
    beforeDestroy() {
        window.removeEventListener('resize', this.checkMobile);
        const slider = this.$refs.productsContainer;
        if (slider) {
            slider.removeEventListener('scroll', () => this.updateScrollButtons());
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
    overflow-x: scroll;
    padding: 20px 0;
    margin: 0 auto;
    justify-content: flex-start;
    width: 100%;
    max-width: 1280px;
    scrollbar-width: none;
    -ms-overflow-style: none;
    scroll-behavior: smooth;
    cursor: grab;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    -webkit-overflow-scrolling: touch;
    touch-action: pan-x;
}

.products-container:active {
    cursor: grabbing !important;
}

/* RTL (Arabic) specific styles */
.rtl .products-container {
    direction: rtl;
    /* Remove any transform or other directional overrides */
}

/* LTR (English) specific styles */
.ltr .products-container {
    direction: ltr;
    /* Remove any transform or other directional overrides */
}

.product-card {
    flex: 0 0 300px;
    background: transparent;
    border-radius: 12px;
    overflow: hidden;
    transition: transform 0.3s ease;
    margin: 0 auto;
    user-select: none;
    -webkit-user-drag: none;
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
    pointer-events: none;
    user-select: none;
    -webkit-user-drag: none;
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
    transition: all 0.3s ease;
    opacity: 0;
    visibility: hidden;
    z-index: 3;
}

.nav-arrow.visible {
    opacity: 1;
    visibility: visible;
}

.nav-arrow:focus {
    outline: none;
    color: #fff;
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
    padding-right: 152px;
}

.rtl .section-title {
    font-family: 'TheSansArabic', sans-serif !important;

}

.rtl .star-icon {
    margin-right: 5px;
    margin-left: 0;
}

/* LTR (English) specific styles */
.ltr .section-header {
    text-align: left;
    padding-left: 152px;
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

/* RTL (Arabic) specific styles */
.rtl .prev {
    left: 40px;
    right: auto;
}

.rtl .next {
    right: 40px;
    left: auto;
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
        padding: 0px 0px 0px 31px;
    }

    .product-card {
        flex: 0 0 260px;
    }

    .section-title {
        font-size: 36px;
    }

    .products-container {
        overflow-x: auto !important;
        overflow-y: hidden;
        -webkit-overflow-scrolling: touch;
        scroll-behavior: smooth;
        gap: 16px;
    }
}

/* Custom scrollbar for the products container */
.products-container::-webkit-scrollbar {
    display: none;
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

/* Mobile only: Decorative line with diamond under Best Seller title */
.mobile-best-seller-line {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 0 0 0;
}

.mobile-best-seller-line .line {
    display: inline-block;
    height: 0.5px;
    width: 14vw;
    background: #aa8b7a;
    border-radius: 2px;
    opacity: 0.7;
}

.mobile-best-seller-line .diamond-icon {
    width: 11px;
    height: 11px;
    display: inline-block;
    transform: rotate(45deg);
    margin: 0 0px;
    border-radius: 2px;
    /* Optional: add a border for a more elegant look */
    border: 1px solid #aa8b7a;
    box-sizing: border-box;
}

@media (min-width: 446px) {
    .mobile-best-seller-line {
        display: none !important;
    }
}

@media (max-width: 445px) {
    .section-header {
        text-align: center !important;
        padding: 0 !important;
        margin-bottom: 18px !important;
    }

    .section-title {
        font-family: 'Tenor Sans', serif !important;
        text-transform: uppercase !important;
        letter-spacing: 4px !important;
        line-height: 40px !important;
        font-size: 18px !important;
        color: #FFFFFF !important;
        font-weight: 400 !important;
    }

    .best-seller-section {
        padding-top: 85px;
    }

    .rtl .section-title {
        letter-spacing: 1px !important;
    }

    .product-title {
        font-size: 15px;
    }

    .product-price {
        font-size: 15px;
    }

    .product-pieces {
        font-size: 14px;
    }

    .slider-container {
        padding: 0 40px;
        position: relative;
        overflow: visible;
    }

    .nav-arrow {
        width: 40px;
        height: 40px;
        font-size: 48px;
        opacity: 0;
        visibility: hidden;
    }

    .nav-arrow.visible {
        opacity: 1;
        visibility: visible;
    }

    .prev {
        left: 5px;
    }

    .next {
        right: 5px;
    }

    .rtl .prev {
        left: 5px;
        right: auto;
    }

    .rtl .next {
        right: 5px;
        left: auto;
    }
}

/* Tablet Specific Styles */
@media screen and (min-width: 768px) and (max-width: 1024px) {
    .section-header {
        text-align: right;
        padding-right: 40px;
        margin-bottom: 30px;
    }

    .ltr .section-header {
        text-align: left;
        padding-left: 40px;
        padding-right: 0;
    }

    .section-title {
        font-size: 32px;
    }

    .star-icon {
        width: 14px;
        height: 14px;
        margin-top: -20px;
    }

    .slider-container {
        padding: 0 40px;
        max-width: 100%;
    }

    .products-container {
        gap: 16px;
        padding: 15px 0;
    }

    .product-card {
        flex: 0 0 240px;
    }

    .product-image-container {
        height: 220px;
    }

    .product-title {
        font-size: 18px;
    }

    .product-price {
        font-size: 16px;
    }

    .product-pieces {
        font-size: 15px;
    }

    .nav-arrow {
        width: 45px;
        height: 40px;
        font-size: 60px;
    }

    .prev {
        left: 20px;
    }

    .next {
        right: 20px;
    }

    .rtl .section-header {
        padding-right: 40px;
    }

    .rtl .prev {
        left: 20px;
    }

    .rtl .next {
        right: 20px;
    }
}
</style>