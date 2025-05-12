<template>
    <section
        class="luxury-moments-section"
        :class="currentLang === 'en' ? 'ltr' : 'rtl'"
    >
        <div class="content-container">
            <h1 class="section-title">
                <span v-if="currentLang === 'en'"
                    >Add a Touch of Luxury to Your Celebrations</span
                >
                <span v-else>أضف لمسة من الفخامة إلى احتفالاتك</span>
            </h1>
            <div class="description-container" v-if="!isMobile">
                <p class="section-description">
                    <span v-if="currentLang === 'en'">
                        Make your special occasions unforgettable with our
                        elegant silver trays. Now available in-store. Perfect
                        for serving your guests in style and making every moment
                        memorable.
                    </span>
                    <span v-else>
                        . اجعل مناسباتك الخاصة لا تُنسى مع موادنا الفضية الأنيقة
                        متوفرة الآن في المتجر. مثالية لتقديم الضيافة لزوارك
                        بأناقة وجعل كل لحظة مميزة
                    </span>
                </p>
            </div>
        </div>
        <div class="full-width-image-container">
            <template v-if="videoUrl">
                <template v-if="isYouTube(videoUrl)">
                    <iframe
                        class="full-width-image"
                        :src="youtubeEmbedUrl(videoUrl)"
                        frameborder="0"
                        allow="autoplay; encrypted-media"
                        allowfullscreen
                    ></iframe>
                </template>
                <template v-else>
                    <video
                        class="full-width-image"
                        :src="videoUrl"
                        controls
                        autoplay
                        muted
                        loop
                        playsinline
                    ></video>
                </template>
            </template>
            <template v-else>
                <img
                    src="../../../../public/assets/img/chocolate-collection.png"
                    alt="Milagro Chocolate Collection"
                    class="full-width-image"
                />
            </template>
        </div>
        <div class="description-container" v-if="isMobile">
            <p class="section-description">
                <span v-if="currentLang === 'en'">
                    Make your special occasions unforgettable with our elegant
                    silver trays. Now available in-store. Perfect for serving
                    your guests in style and making every moment memorable.
                </span>
                <span v-else>
                    . اجعل مناسباتك الخاصة لا تُنسى مع موادنا الفضية الأنيقة
                    متوفرة الآن في المتجر. مثالية لتقديم الضيافة لزوارك بأناقة
                    وجعل كل لحظة مميزة
                </span>
            </p>
        </div>
    </section>
</template>

<script>
export default {
    name: "LuxuryMoments",
    props: {
        currentLang: {
            type: String,
            required: true,
            default: "ar",
        },
        videoUrl: {
            type: String,
            default: "https://www.youtube.com/watch?v=LFZ-ntPA5co",
        },
    },
    data() {
        return {
            isMobile: false,
        };
    },
    methods: {
        checkMobile() {
            this.isMobile = window.innerWidth <= 445;
        },
        isYouTube(url) {
            return url.includes("youtube.com") || url.includes("youtu.be");
        },
        youtubeEmbedUrl(url) {
            // Convert normal YouTube URL to embed URL
            let videoId = "";
            if (url.includes("youtu.be/")) {
                videoId = url.split("youtu.be/")[1];
            } else {
                const match = url.match(/[?&]v=([^&]+)/);
                videoId = match ? match[1] : "";
            }
            return `https://www.youtube.com/embed/${videoId}?autoplay=1&mute=1&loop=1&playlist=${videoId}`;
        },
    },
    mounted() {
        this.checkMobile();
        window.addEventListener("resize", this.checkMobile);
    },
    beforeDestroy() {
        window.removeEventListener("resize", this.checkMobile);
    },
};
</script>

<style scoped>
.luxury-moments-section {
    background: #212a1e;
    color: #aa8b7a;
    position: relative;
    width: 100% !important;
    overflow: hidden;
    margin: 0;
    padding: 0;
}

.content-container {
    width: 100%;
    margin: 0 auto;
    text-align: center;
    padding: 40px 0 0 0;
}

.section-title {
    font-size: 42px;
    margin-bottom: 20px;
    font-weight: 600;
    color: #aa8b7a;
    font-family: "TheSansArabic", sans-serif;
}

.ltr .section-title {
    font-family: "Philosopher", serif;
}

.description-container {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    width: 100%;
    max-width: 1200px;
    margin: 0 auto 40px;
    padding: 0 40px;
    box-sizing: border-box;
}

.section-description {
    flex: 1;
    font-size: 25px;
    line-height: 1.6;
    margin: 0;
    color: #ffffff;
    font-family: "TheSansArabic", sans-serif;
}

.ltr .section-description {
    font-family: "Philosopher", serif;
}

.full-width-image-container {
    position: relative;
    width: 100vw;
    height: 612px;
    margin: 0;
    padding: 0;
    left: 50%;
    right: 50%;
    margin-left: -50vw;
    margin-right: -50vw;
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
}

@media (max-width: 768px) {
    .luxury-moments-section {
        padding-top: 0;
    }

    .content-container {
        padding-top: 40px;
    }

    .play-button {
        width: 40px;
        height: 40px;
        left: 15px;
        bottom: 15px;
    }
}

@media only screen and (max-width: 445px) {
    .content-container {
        padding-top: 49px;
    }

    .section-title {
        font-size: 22px !important;
        margin-bottom: 10px !important;
        text-align: center !important;
        padding: 0 !important;
    }

    .section-description {
        font-size: 15px !important;
        padding: 20px 5px !important;
        color: #aa8b7a;
        font-family: "Tenor Sans", serif !important;
    }

    .ltr .section-title {
        text-align: center;
        color: #ffffff;
        font-size: 25px;
        font-weight: 400;
    }

    .rtl .section-title {
        text-align: center;
        color: #ffffff;
    }

    .full-width-image-container {
        height: 180px !important;
        width: 100vw !important;
        margin-top: 0 !important;
    }
}

@media only screen and (max-width: 393px) {
    .section-title {
        font-size: 18px !important;
    }

    .section-description {
        font-size: 13px !important;
    }

    .full-width-image-container {
        height: 140px !important;
    }
}

@media only screen and (max-width: 375px) {
    .section-title {
        font-size: 16px !important;
    }

    .section-description {
        font-size: 12px !important;
    }

    .full-width-image-container {
        height: 120px !important;
    }
}

/* Tablet Specific Styles */
@media screen and (min-width: 768px) and (max-width: 1024px) {
    .content-container {
        padding-top: 0;
    }

    .section-title {
        font-size: 32px;
        margin-bottom: 15px;
        padding: 0 20px;
    }

    .rtl .section-title,
    .ltr .section-title {
        text-align: center;
    }

    .description-container {
        padding: 0 30px;
        margin-bottom: 30px;
    }

    .section-description {
        font-size: 20px;
        line-height: 1.5;
        text-align: center;
    }

    .rtl .section-description,
    .ltr .section-description {
        text-align: center;
    }

    .full-width-image-container {
        height: 400px;
        margin-top: 0;
    }

    .play-button {
        width: 45px;
        height: 45px;
        left: 18px;
        bottom: 18px;
    }
}
</style>
