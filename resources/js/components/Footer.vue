<template>
    <footer class="footer" :class="currentLang === 'en' ? 'ltr' : 'rtl'">
        <div v-if="isMobile" class="footer-mobile-wrapper">
            <!-- Mobile Layout -->
            <div class="footer-mobile-logo">
                <img src="../../../public/assets/img/logo-footer.png" alt="Milagro Logo" class="footer-logo" />
            </div>
            <div class="footer-mobile-social-row">
                <span class="footer-mobile-follow">{{ currentLang === 'en' ? 'FOLLOW US' : 'تابعنا' }}</span>
                <div class="footer-mobile-social-icons">
                    <a href="#" class="social-link"><img src="../../../public/assets/img/facebook.png" alt="Facebook" /></a>
                    <a href="#" class="social-link"><img src="../../../public/assets/img/twitter.png" alt="Twitter" /></a>
                    <a href="#" class="social-link"><img src="../../../public/assets/img/youtube.png" alt="YouTube" /></a>
                </div>
            </div>
            <div class="footer-mobile-columns">
                <div class="footer-mobile-col footer-mobile-contact">
                    <div class="footer-mobile-heading">{{ currentLang === 'en' ? 'CONTACT US' : 'تواصل معنا' }}</div>
                    <div class="footer-mobile-contact-info">
                        <div>123 Simply Quidem</div>
                        <div>Soluta Lorem</div>
                        <div>The Park</div>
                        <div>AB 10000</div>
                    </div>
                    <div class="footer-mobile-heading footer-mobile-sub">{{ currentLang === 'en' ? 'PHONE NO.' : 'رقم الهاتف' }}</div>
                    <div class="footer-mobile-contact-info">(216) 5599 3548</div>
                    <div class="footer-mobile-heading footer-mobile-sub">EMAIL</div>
                    <div class="footer-mobile-contact-info">support@rido.design</div>
                </div>
                <div class="footer-mobile-col footer-mobile-links">
                    <div class="footer-mobile-heading">{{ currentLang === 'en' ? 'QUICK LINKS' : 'روابط سريعة' }}</div>
                    <div class="footer-mobile-links-list">
                        <div>Taxt</div>
                        <div>Ipsum</div>
                        <div>Popular</div>
                        <div>Services</div>
                        <div>Matters</div>
                    </div>
                </div>
            </div>
            <div class="footer-mobile-copyright">
                Copyright© Milagro All Rights Reserved.
            </div>
        </div>
        <div v-else class="footer-content">
            <!-- Logo Section -->
            <div class="logo-section">
                <img src="../../../public/assets/img/logo-footer.png" alt="Milagro Logo" class="footer-logo" />
            </div>

            <!-- Links Section -->
            <div class="links-section">
                <h3 class="footer-heading">
                    {{ currentLang === 'en' ? 'LINKS' : 'روابط سريعة' }}
                </h3>
                <nav class="footer-nav">
                    <a href="/">{{ currentLang === 'en' ? 'Home' : 'الرئيسية' }}</a>
                    <a href="/shop">{{ currentLang === 'en' ? 'Shop' : 'المتجر' }}</a>
                    <a href="/new">{{ currentLang === 'en' ? 'New Arrivals' : 'وصل حديثاً' }}</a>
                    <a href="/contact">{{ currentLang === 'en' ? 'Contact us' : 'تواصل معنا' }}</a>
                </nav>
            </div>

            <!-- Contact Section -->
            <div class="contact-section">
                <h3 class="footer-heading">
                    {{ currentLang === 'en' ? 'CONTACT US' : 'تواصل معنا' }}
                </h3>
                <div class="contact-info">
                    <p>+965 99982794</p>
                    <p>info@milagro.com</p>
                </div>
            </div>

            <!-- Address Section -->
            <div class="address-section">
                <h3 class="footer-heading">
                    {{ currentLang === 'en' ? 'OUR ADDRESS' : 'عنوانا' }}
                </h3>
                <p class="address">
                    {{ currentLang === 'en'
                        ? 'Al-Ghawali Complex | Devon Complex, Capital, Kuwait City, Kuwait'
                        : 'مجمع الغوالي | مجمع ديفون، العاصمة، مدينة الكويت، الكويت'
                    }}
                </p>
            </div>

            <!-- Social Media Section -->
            <div class="social-section">
                <h3 class="footer-heading">
                    {{ currentLang === 'en' ? 'FOLLOW US' : 'تابعنا' }}
                </h3>
                <div class="social-links">
                    <a href="#" class="social-link">
                        <img src="../../../public/assets/img/facebook.png" alt="Facebook" />
                    </a>
                    <a href="#" class="social-link">
                        <img src="../../../public/assets/img/instagram.png" alt="Instagram" />
                    </a>
                    <a href="#" class="social-link">
                        <img src="../../../public/assets/img/twitter.png" alt="Twitter" />
                    </a>
                    <a href="#" class="social-link">
                        <img src="../../../public/assets/img/whatsapp.png" alt="WhatsApp" />
                    </a>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
export default {
    name: 'Footer',
    props: {
        currentLang: {
            type: String,
            required: true,
            default: 'ar'
        }
    },
    data() {
        return {
            isMobile: false
        }
    },
    methods: {
        checkMobile() {
            this.isMobile = window.innerWidth <= 480;
        }
    },
    mounted() {
        this.checkMobile();
        window.addEventListener('resize', this.checkMobile);
    },
    beforeDestroy() {
        window.removeEventListener('resize', this.checkMobile);
    }
}
</script>

<style scoped>
.footer {
    background: #212A1E;
    padding: 60px 150px;
    color: #AA8B7A;
    border-top: 1px solid rgba(170, 139, 122, 0.2);
}

/* --- MOBILE LAYOUT --- */
@media (max-width: 480px) {
    .footer {
        padding: 0;
        background: #212A1E;
    }
    .footer-mobile-wrapper {
        width: 100%;
        min-height: 100px;
        display: flex;
        flex-direction: column;
        align-items: center;
        background: #212A1E;
        color: #AA8B7A;
        font-family: 'Tenor Sans', serif;
    }
    .footer-mobile-logo {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 24px;
        margin-bottom: 10px;
    }
    .footer-logo {
        width: 90px;
        height: auto;
        margin: 0 auto;
        display: block;
        right: 0px !important;
    }
    .footer-mobile-social-row {
        width: 100%;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        gap: 18px;
        margin-bottom: 18px;
    }
    .footer-mobile-follow {
        font-size: 16px;
        font-weight: 600;
        color: #AA8B7A;
        margin-right: 10px;
        letter-spacing: 1px;
    }
    .footer-mobile-social-icons {
        display: flex;
        flex-direction: row;
        gap: 14px;
    }
    .footer-mobile-social-icons .social-link img {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: transparent;
        border: 1px solid #AA8B7A;
        padding: 4px;
    }
    .footer-mobile-columns {
        width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: flex-start;
        gap: 18px;
        margin-bottom: 18px;
    }
    .footer-mobile-col {
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
    .footer-mobile-heading {
        font-size: 15px;
        font-weight: 700;
        color: #AA8B7A;
        margin-bottom: 8px;
        margin-top: 12px;
        letter-spacing: 1px;
    }
    .footer-mobile-sub {
        margin-top: 14px;
        font-size: 14px;
        font-weight: 700;
        color: #AA8B7A;
    }
    .footer-mobile-contact-info {
        margin-bottom: 2px;
        color: #AA8B7A;
        font-size: 15px;
        font-family: 'Tenor Sans', serif;
    }
    .footer-mobile-links-list div {
        margin-bottom: 4px;
        color: #AA8B7A;
        font-size: 15px;
        font-family: 'Tenor Sans', serif;
    }
    .footer-mobile-copyright {
        width: 100%;
        text-align: center;
        color: #AA8B7A;
        font-size: 13px;
        margin: 18px 0 10px 0;
        font-family: 'Tenor Sans', serif;
    }
    .rtl .footer-logo {

        right: 0px !important;
    }
}

/* --- DESKTOP LAYOUT (unchanged) --- */
.footer-content {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 30px;
    max-width: 1440px;
    margin: 0 auto;
}

.footer-logo {
    width: 147px;
    height: 109px;
    position: relative;
    top: -11px;
    right: 16px;
}

.footer-heading {
    color: #FFFFFF;
    font-size: 18px;
    margin-bottom: 20px;
    font-weight: 600;
    text-align: center;
    color: #aa8b7a;
}

.footer-nav {
    display: flex;
    flex-direction: column;
    gap: 10px;
    text-align: center;
}

.footer-nav a {
    color: #AA8B7A;
    text-decoration: none;
    transition: color 0.3s ease;
    text-align: center;
}

.footer-nav a:hover {
    color: #FFFFFF;
}

.contact-info {
    display: flex;
    flex-direction: column;
    gap: 10px;
    text-align: center;
}

.contact-info p {
    margin: 0;
    text-align: center;
}

.social-links {
    display: flex;
    gap: 15px;
    justify-content: center;
}

.social-link img {
    width: 38px;
    height: 38px;
    transition: opacity 0.3s ease;
}

.social-link:hover img {
    opacity: 0.8;
}

/* RTL (Arabic) Styles */
.rtl {
    direction: rtl;
}

.rtl .footer-heading {
    font-family: 'TheSansArabic', sans-serif;
}

.rtl .footer-nav a,
.rtl .contact-info p,
.rtl .address {
    font-family: 'TheSansArabic', sans-serif;
    text-align: center;
}

/* LTR (English) Styles */
.ltr {
    direction: ltr;
}

.ltr .footer-heading {
    font-family: 'Philosopher', serif;
}

.ltr .footer-nav a,
.ltr .contact-info p,
.ltr .address {
    font-family: 'Cairo', sans-serif;
    text-align: center;
}

@media (max-width: 1200px) {
    .footer {
        padding: 40px 20px;
    }

    .footer-content {
        grid-template-columns: repeat(3, 1fr);
        gap: 40px;
    }
}

@media (max-width: 768px) {
    .footer-content {
        grid-template-columns: repeat(2, 1fr);
        gap: 30px;
    }
}

/* Center logo */
.logo-section {
    display: flex;
    justify-content: center;
    align-items: center;
}

/* Center social links */
.social-links {
    display: flex;
    gap: 7px;
    justify-content: center;
}
</style>
