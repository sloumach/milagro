<template>
    <footer class="footer" :class="currentLang === 'en' ? 'ltr' : 'rtl'">
        <div class="footer-content">
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

@media (max-width: 480px) {
    .footer-content {
        grid-template-columns: 1fr;
        text-align: center;
    }

    .logo-section {
        display: flex;
        justify-content: center;
    }

    .social-links {
        justify-content: center;
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
