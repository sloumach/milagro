<template>
    <section class="chocolate-diffuser-section" :class="currentLang === 'en' ? 'ltr' : 'rtl'">
        <div class="content-container">
            <h1 class="section-title">
                <span v-if="currentLang === 'en'">Milagro Diffuser Sticks Chocolate</span>
                <span v-else>دفيوزر ميلاقرو - أعواد الشوكولاتة الفاخرة</span>
            </h1>
            <div class="description-container">
                <span class="milagro-desc-line"></span>
                <p class="section-description">
                    <span v-if="currentLang === 'en'">
                        Luxury chocolate for the luxurious occasions. The perfect scent for chocoholics rich and sweet and full of that intense cocoa smell.
                    </span>
                    <span v-else>
                       . شوكولاتة فاخرة للمناسبات الراقية. رائحة مثالية لعشاق الشوكولاتة، غنية وحلوة، تنبض برائحة الكاكاو القوية التي تأسر الحواس 
                    </span>
                </p>
            </div>
            <div class="image-container">
                <img src="../../../../public/assets/img/chocolate-diffuser.png" alt="Milagro Chocolate Diffuser" class="product-image" />
                <button class="learn-more-btn">
                    <span v-if="currentLang === 'en'">Learn More</span>
                    <span v-else>اكتشف المزيد</span>
                </button>
                <div class="decorative-star"></div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'ChocolateDiffuser',
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
.chocolate-diffuser-section {
    background: #212A1E;
    padding: 60px 20px;
    color: #aa8b7a;
    position: relative;
}

.content-container {
    max-width: 1200px;
    margin: 0 auto;
    text-align: center;
    padding-top: 97px;
}

.section-title {
    font-size: 42px;
    margin-bottom: 20px;
    font-weight: 600;
    color: #aa8b7a;
}

.description-container {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    max-width: 100%;
    margin: 0 auto 40px;
    padding: 0 40px;
}

.milagro-desc-line {
    display: inline-block;
    width: 60px;
    height: 2px;
    background: #aa8b7a;
    border-radius: 2px;
    margin-top: 18px;
    flex-shrink: 0;
}

.section-description {
    flex: 1;
    font-size: 25px;
    line-height: 1.6;
    margin: 0;
    color: #FFFFFF;
}

.image-container {
    position: relative;
    width: 100%;
    max-width: 800px;
    margin: 0 auto;
    background: transparent;
    border-radius: 251px;
    padding: 40px;
    overflow: visible;
    cursor: pointer;
}

.image-container::before,
.image-container::after {
    content: '';
    position: absolute;
    width: 251px;
    height: 251px;
    border: 2px solid #AA8B7A;
    z-index: 1;
    pointer-events: none;
}

.image-container::before {
    left: -7px;
    top: 49px;
    border-radius: 251px 0 0 0;
    border-right: none;
    border-bottom: none;
    transform: none;
    transform: rotate(-10deg);
}

.image-container::after {
    right: -13px;
    bottom: 77px;
    border-radius: 0 0 251px;
    border-left: none;
    border-top: none;
    transform: none;
    transform: rotate(-22deg);
}

.product-image {
    width: 100%;
    height: auto;
    display: block;
    position: relative;
    z-index: 2;
    border-radius: 251px;
}

.decorative-star {
    position: absolute;
    width: 35px;
    height: 35px;
    background-image: url('/assets/img/star.png');
    background-size: contain;
    background-repeat: no-repeat;
    left: -35px;
    top: 64%;
    z-index: 2;
}

.learn-more-btn {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: #AA8B7A;
    color: #FFFFFF;
    border: none;
    padding: 12px 30px;
    border-radius: 25px;
    font-size: 18px;
    cursor: pointer;
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: 3;
}

.image-container:hover .product-image {
    filter: brightness(0.6);
    transition: filter 0.3s ease;
}

.image-container:hover .learn-more-btn {
    opacity: 1;
}

.learn-more-btn span {
    transition: all 0.3s ease;
}

.learn-more-btn span[v-if="currentLang === 'en'"] {
    font-family: 'Cairo', sans-serif;
}

.learn-more-btn span:not([v-if="currentLang === 'en'"]) {
    font-family: 'TheSansArabic', sans-serif;
}

/* RTL (Arabic) Specific Styles */
.rtl .description-container {
    flex-direction: row-reverse;
    justify-content: flex-start;
    text-align: right;
}

.rtl .section-description {
    text-align: right;
}

.rtl .section-title {
    text-align: right;
    padding-right: 40px;
}

/* LTR (English) Specific Styles */
.ltr .description-container {
    flex-direction: row;
    justify-content: flex-start;
    text-align: left;
}

.ltr .section-description {
    text-align: left;
}

.ltr .section-title {
    text-align: left;
    padding-left: 40px;
}

/* English (LTR) fonts */
.ltr .section-title {
    font-family: 'Philosopher', serif;
}

.ltr .section-description {
    font-family: 'Philosopher', serif;
}

.ltr .learn-more-btn {
    font-family: 'Cairo', sans-serif;
}

/* Arabic (RTL) fonts */
.rtl .section-title {
    font-family: 'TheSansArabic', sans-serif;
}

.rtl .section-description {
    font-family: 'TheSansArabic', sans-serif;
}

.rtl .learn-more-btn {
    font-family: 'TheSansArabic', sans-serif;
}

@media (max-width: 768px) {
    .section-title {
        font-size: 32px;
    }

    .section-description {
        font-size: 16px;
        padding: 0 20px;
    }

    .image-container {
        padding: 9px;
        border-radius: 75px;
    }

    .image-container::before,
    .image-container::after {
        width: 125px;
        height: 125px;
    }

    .image-container::before {
        left: -35px;
        top: -62px;
        border-radius: 125px 0 0 0;
    }

    .image-container::after {
        right: 33px;
        bottom: -62px;
        border-radius: 0 0 0 125px;
    }

    .product-image {
        border-radius: 75px;
    }

    .decorative-star {
        left: -50px;
        top: -40px;
        width: 15px;
        height: 15px;
    }

    .learn-more-btn {
        padding: 8px 20px;
        font-size: 16px;
    }
}
</style> 