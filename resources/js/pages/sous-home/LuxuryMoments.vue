<template>
    <section class="luxury-moments-section" :class="currentLang === 'en' ? 'ltr' : 'rtl'">
        <div class="content-container">
            <h1 class="section-title">
                <span v-if="currentLang === 'en'">Add a Touch of Luxury to Your Celebrations</span>
                <span v-else>أضف لمسة من الفخامة إلى احتفالاتك</span>
            </h1>
            <div class="description-container">
              
                <p class="section-description">
                    <span v-if="currentLang === 'en'">
                        Make your special occasions unforgettable with our elegant silver trays. Now available in-store. Perfect for serving your guests in style and making every moment memorable.
                    </span>
                    <span v-else>
                        . اجعل مناسباتك الخاصة لا تُنسى مع موادنا الفضية الأنيقة متوفرة الآن في المتجر. مثالية لتقديم الضيافة لزوارك بأناقة وجعل كل لحظة مميزة
                    </span>
                </p>
            </div>
        </div>
        <div class="full-width-image-container">
            <img src="../../../../public/assets/img/chocolate-collection.png" alt="Milagro Chocolate Collection" class="full-width-image" />
           
        </div>
    </section>
</template>

<script>
export default {
    name: 'LuxuryMoments',
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
.luxury-moments-section {
    background: #212A1E;
    padding: 60px 0 0 0; /* Remove bottom padding to allow full-width image */
    color: #aa8b7a;
    position: relative;
}

.content-container {
    max-width: 1200px;
    margin: 0 auto;
    text-align: center;
    padding: 0 20px;
}

.section-title {
    font-size: 42px;
    margin-bottom: 20px;
    font-weight: 600;
    color: #aa8b7a;
    font-family: 'TheSansArabic', sans-serif;
}

.ltr .section-title {
    font-family: 'Philosopher', serif;
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
    font-family: 'TheSansArabic', sans-serif;
}

.ltr .section-description {
    font-family: 'Philosopher', serif;
}

.full-width-image-container {
    position: relative;
    width: 100%;
    height: 612px;
    margin-top: 40px;
    overflow: hidden;
}

.full-width-image {
    width: 100%;
    height: 100%;
    display: block;
    object-fit: cover;
    object-position: center;
}

.play-button {
    position: absolute;
    left: 20px;
    bottom: 20px;
    width: 50px;
    height: 50px;
    cursor: pointer;
    z-index: 3;
}

.play-icon {
    width: 100%;
    height: 100%;
    object-fit: contain;
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
    text-align: center;
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
    text-align: center;
    padding-left: 40px;
}

@media (max-width: 768px) {
    .luxury-moments-section {
        padding-top: 40px;
    }

    .play-button {
        width: 40px;
        height: 40px;
        left: 15px;
        bottom: 15px;
    }
}
</style>
