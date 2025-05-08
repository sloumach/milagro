<template>
    <div class="contact-page" :class="currentLang === 'en' ? 'ltr' : 'rtl'">
        <div class="contact-container">
            <div class="orders-navigation">
                <router-link to="/cart" class="nav-link">
                    <span v-if="currentLang === 'en'">
                        <span class="white-text">Contact Us</span> 
                    </span>
                    <span v-else>
                        <span class="white-text">تواصل معنا</span>
                    </span>
                    <img src="../../../public/assets/img/arrow-right.png" alt="Arrow" class="arrow-icon" />
                </router-link>
            </div>
            <div class="contact-content">
                <div class="image-section">
                    <div class="oval-frame">
                        <img src="../../../public/assets/img/mini-box.png" alt="Chocolate Box" class="contact-image" />
                        <button class="discover-btn">
                            {{ currentLang === 'en' ? 'Discover our chocolate' : 'اكتشف شوكولاتنا' }}
                        </button>
                    </div>
                </div>
                
                <div class="form-section">
                    <h1 class="contact-title">
                        {{ currentLang === 'en' ? 'Get in Touch with Excellence' : 'تواصل معنا للتميز' }}
                    </h1>
                    <p class="contact-description">
                        {{ currentLang === 'en' ? 'Reach out to experience our world of luxurious chocolate craftsmanship.' : 'تواصل معنا لتجربة عالمنا من حرفية الشوكولاتة الفاخرة.' }}
                    </p>
                    
                    <form @submit.prevent="handleSubmit" class="contact-form">
                        <div class="form-row">
                            <div class="form-group">
                                <label>{{ currentLang === 'en' ? 'First Name*' : 'الاسم الأول*' }}</label>
                                <input 
                                    type="text" 
                                    v-model="form.firstName" 
                                    :placeholder="currentLang === 'en' ? 'Enter your first name' : 'أدخل اسمك الأول'"
                                    required
                                />
                            </div>
                            <div class="form-group">
                                <label>{{ currentLang === 'en' ? 'Last Name*' : 'الاسم الأخير*' }}</label>
                                <input 
                                    type="text" 
                                    v-model="form.firstName2" 
                                    :placeholder="currentLang === 'en' ? 'Enter your last name' : 'أدخل اسمك الأخير'"
                                    required
                                />
                            </div>
                        </div>

                        <div class="form-group">
                            <label>{{ currentLang === 'en' ? 'Phone Number*' : 'رقم الهاتف*' }}</label>
                            <div class="phone-input">
                                <span class="phone-prefix">+965</span>
                                <input 
                                    type="tel" 
                                    v-model="form.phone" 
                                    :placeholder="currentLang === 'en' ? 'Type your Phone number here...' : 'اكتب رقم هاتفك هنا...'"
                                    required
                                />
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input 
                                type="email" 
                                v-model="form.email" 
                                :placeholder="currentLang === 'en' ? 'Type your email here...' : 'اكتب بريدك الإلكتروني هنا...'"
                                required
                            />
                        </div>

                        <div class="form-group">
                            <label>{{ currentLang === 'en' ? 'Message*' : 'الرسالة*' }}</label>
                            <textarea 
                                v-model="form.message" 
                                :placeholder="currentLang === 'en' ? 'Type ...' : 'اكتب ...' "
                                required
                            ></textarea>
                        </div>

                        <button type="submit" class="submit-btn">
                            {{ currentLang === 'en' ? 'submit' : 'إرسال' }}
                        </button>
                    </form>
                </div>
            </div>
            
            <!-- New Map Section -->
            <div class="map-section">
                <div class="map-container">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d13911.050245864556!2d47.97812695!3d29.37563745!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2skw!4v1680825137404!5m2!1sen!2skw" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                    <div class="map-overlay">
                        <div class="opening-hours">
                            <div class="hours-header">
                                <img src="../../../public/assets/img/clock.ico" alt="Clock" class="clock-icon" />
                                <span class="title">Opening Hours</span>
                            </div>
                            <div class="hours-text">
                                <span>Monday - Friday</span>
                                <span>9H00 - 17H00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contact-info">
                    <div class="info-item">
                        <img src="../../../public/assets/img/location1.png" alt="Location" class="info-icon" />
                        <span>Address line one</span>
                    </div>
                    <div class="info-item">
                        <img src="../../../public/assets/img/phone1.png" alt="Phone" class="info-icon" />
                        <span>+965 999 82 794</span>
                    </div>
                    <div class="info-item">
                        <img src="../../../public/assets/img/mail1.png" alt="Email" class="info-icon" />
                        <span>info@milagro.com</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Contact',
    data() {
        return {
            currentLang: localStorage.getItem('currentLang') || 'en',
            form: {
                firstName: '',
                firstName2: '',
                email: '',
                phone: '',
                message: ''
            }
        }
    },
    methods: {
        handleSubmit() {
            console.log('Form submitted:', this.form);
            // Add your form submission logic here
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
.contact-page {
    min-height: 100vh;
    background: #212A1E;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
}

.contact-container {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 40px 20px;
}

.contact-content {
    display: flex;
    gap: 40px;
    align-items: center;
}

.image-section {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
}

.oval-frame {
    position: relative;
    width: 349px;
    height: 622px;
    border-radius: 327px / 350px;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px solid #AA8B7A;
    cursor: pointer;
}

.oval-frame::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(33, 42, 30, 0);
    transition: background 0.3s ease;
    z-index: 1;
}

.oval-frame:hover::before {
    background: rgba(33, 42, 30, 0.5);
}

.contact-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.oval-frame:hover .contact-image {
    transform: scale(1.05);
}

.discover-btn {
    position: absolute;
    background: rgba(170, 139, 122, 0.9);
    border: none;
    color: white;
    padding: 12px 24px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    transition: all 0.3s ease;
    opacity: 0;
    transform: translateY(20px);
    z-index: 2;
}

.oval-frame:hover .discover-btn {
    opacity: 1;
    transform: translateY(0);
}

.discover-btn:hover {
    background: rgba(170, 139, 122, 1);
    transform: translateY(-3px);
}

.form-section {
    flex: 1;
    padding: 40px;
}

.contact-title {
    color: #AA8B7A;
    font-size: 42px;
    margin-bottom: 16px;
    font-family: 'Philosopher', serif;
}

.rtl .contact-title {
    font-family: 'TheSansArabic', sans-serif;
}

.contact-description {
    color: #FFFFFF;
    margin-bottom: 32px;
    font-size: 16px;
    line-height: 1.5;
    font-family: 'Cairo', sans-serif;
}

.contact-form {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.form-row {
    display: flex;
    gap: 20px;
}

.form-group {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.form-group label {
    color: #FFFFFF;
    font-size: 16px;
    font-family: 'Cairo', sans-serif;
}

.form-group input,
.form-group textarea {
    background: transparent;
    border: 1px solid #AA8B7A;
    border-radius: 4px;
    padding: 12px 16px;
    color: #FFFFFF;
    font-size: 16px;
}

.phone-input {
    display: flex;
    align-items: center;
    border: 1px solid #AA8B7A;
    border-radius: 4px;
    overflow: hidden;
}

.phone-prefix {
    background: rgba(170, 139, 122, 0.1);
    color: #AA8B7A;
    padding: 12px 16px;
    border-right: 1px solid #AA8B7A;
    font-family: 'Cairo', sans-serif;
}

.phone-input input {
    border: none;
    flex: 1;
}

.form-group textarea {
    height: 120px;
    resize: vertical;
}

.submit-btn {
    background: #AA8B7A;
    color: #FFFFFF;
    border: none;
    padding: 12px;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
    text-transform: lowercase;
}

.submit-btn:hover {
    background: #957865;
}

/* RTL Specific Styles */
.rtl {
    direction: rtl;
}

.rtl .phone-prefix {
    border-right: none;
    border-left: 1px solid #AA8B7A;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .contact-content {
        flex-direction: column;
    }

    .oval-frame {
        width: 100%;
        max-width: 400px;
        height: 480px;
    }
}

@media (max-width: 768px) {
    .form-row {
        flex-direction: column;
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

.white-text {
    color: #FFFFFF;
}

.slash-text {
    color: #AA8B7A;
    margin: 0 4px;
}

.highlight-text {
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

.map-section {
    margin-top: 60px;
}

.map-container {
    position: relative;
    width: 100%;
    height: 400px;
    border: 1px solid #AA8B7A;
    border-radius: 4px;
    overflow: hidden;
    padding: 12px;
}

.map-container iframe {
    width: 100%;
    height: 100%;
    border-radius: 4px;
    filter: grayscale(1);
}

.map-overlay {
    position: absolute;
    bottom: 20px;
    right: 20px;
    background: rgba(255, 255, 255, 0.9);
    padding: 15px 25px;
    border-radius: 4px;
    min-width: 124px;
}

.rtl .map-overlay {
    left: 20px;
    right: auto;
}

.opening-hours {
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.hours-header {
    position: relative;
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 5px;
}

.clock-icon {
    width: 20px;
    height: 20px;
    opacity: 0.7;
}

.title {
    color: #212A1E;
    font-weight: 600;
    font-size: 16px;
    font-family: 'Cairo', sans-serif;
}

.hours-text {
    display: flex;
    flex-direction: column;
    color: #212A1E;
    font-family: 'Cairo', sans-serif;
}

.hours-text span {
    font-size: 14px;
    line-height: 1.4;
    color: #212A1E;
}

.contact-info {
    display: flex;
    justify-content: flex-start;
    gap: 40px;
    padding: 3px 9px;
    background: #212A1E;
    margin-top: 20px;
}

.info-item {
    display: flex;
    align-items: center;
    gap: 12px;
    color: #AA8B7A;
    font-family: 'Cairo', sans-serif;
    font-size: 16px;
}

.info-icon {
    width: 20px;
    height: 20px;
    opacity: 0.8;
    filter: brightness(0) saturate(100%) invert(65%) sepia(12%) saturate(806%) hue-rotate(338deg) brightness(89%) contrast(83%);
}

.rtl .contact-info {
    justify-content: flex-end;
}

@media (max-width: 768px) {
    .contact-info {
        flex-direction: column;
        gap: 20px;
        align-items: flex-start;
        padding: 20px;
    }

    .rtl .contact-info {
        align-items: flex-end;
    }
}

@media (max-width: 480px) {
    .contact-page {
        padding: 20px 12px;
    }

    .contact-container {
        padding: 20px 12px;
    }

    .contact-content {
        flex-direction: column;
        gap: 30px;
    }

    .image-section {
        width: 100%;
    }

    .oval-frame {
        width: 48%;
        height: 313px;
        max-width: none;
    }

    .form-section {
        padding: 0;
        width: 100%;
    }

    .contact-title {
        font-size: 30px;
        margin-bottom: 12px;
    }

    .contact-description {
        font-size: 14px;
        margin-bottom: 24px;
    }

    .form-row {
        flex-direction: column;
        gap: 16px;
    }

    .form-group input,
    .form-group textarea {
        padding: 10px 14px;
        font-size: 14px;
    }

    .phone-input {
        width: 100%;
    }

    .phone-prefix {
        padding: 10px 14px;
        font-size: 14px;
    }

    .submit-btn {
        padding: 10px;
        font-size: 14px;
    }

    .orders-navigation {
        top: -20px;
        margin-bottom: 5px;
        padding: 10px 0;
    }

    .nav-link {
        font-size: 16px;
        gap: 15px;
    }

    .arrow-icon {
        width: 80px;
        height: 12px;
    }

    .map-section {
        margin-top: 40px;
    }

    .map-container {
        height: 300px;
        padding: 8px;
    }

    .map-overlay {
        bottom: 10px;
        right: 10px;
        padding: 10px 15px;
    }

    .rtl .map-overlay {
        left: 10px;
        right: auto;
    }

    .title {
        font-size: 14px;
    }

    .hours-text span {
        font-size: 12px;
    }

    .contact-info {
        flex-direction: column;
        gap: 15px;
        padding: 15px 0;
    }

    .info-item {
        font-size: 14px;
        gap: 8px;
    }

    .info-icon {
        width: 16px;
        height: 16px;
    }
}

/* Add tablet breakpoint for better scaling */
@media (min-width: 481px) and (max-width: 768px) {
    .contact-container {
        padding: 30px 20px;
    }

    .contact-content {
        flex-direction: column;
        gap: 40px;
    }

    .oval-frame {
        width: 100%;
        max-width: 500px;
        height: 500px;
    }

    .form-section {
        padding: 20px;
    }

    .contact-title {
        font-size: 36px;
    }

    .form-row {
        flex-direction: column;
        gap: 20px;
    }

    .map-container {
        height: 350px;
    }

    .contact-info {
        flex-wrap: wrap;
        gap: 20px 40px;
    }
}
</style>