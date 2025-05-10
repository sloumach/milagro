<template>
    <div class="auth-page" :class="currentLang === 'en' ? 'ltr' : 'rtl'">
        <!-- Title section -->
        <div class="title-section">
            <h1 class="auth-title">
                <span v-if="currentLang === 'en'">Welcome</span>
                <span v-else>مرحباً</span>
                <img src="../../../../public/assets/img/star.png" class="title-star" alt="star" />
            </h1>
            
            <div class="description-text">
                <p class="primary-text">
                    {{ currentLang === 'en' 
                        ? 'Enter your mobile number' 
                        : 'أدخل رقم هاتفك المحمول' 
                    }}
                </p>
                <p class="secondary-text">
                    {{ currentLang === 'en' 
                        ? 'We will send you a confirmation code' 
                        : 'سنرسل لك رمز التأكيد' 
                    }}
                </p>
            </div>
        </div>

        <!-- Form container -->
        <div class="auth-container">
            <form class="auth-form" @submit.prevent="handleSubmit">
                <div class="form-group">
                    <label>
                        {{ currentLang === 'en' ? 'Phone Number' : 'رقم الهاتف' }}
                    </label>
                    <div class="phone-input">
                        <span class="country-code">+965</span>
                        <input 
                            type="tel" 
                            v-model="phoneNumber"
                            :placeholder="currentLang === 'en' ? 'Enter your number' : 'أدخل رقمك'"
                        />
                    </div>
                </div>

                <button type="submit" class="submit-btn">
                    {{ currentLang === 'en' ? 'Continue' : 'متابعة' }}
                </button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Welcome',
    data() {
        return {
            currentLang: localStorage.getItem('currentLang') || 'en',
            phoneNumber: ''
        }
    },
    methods: {
        handleSubmit() {
            console.log('Phone submitted:', this.phoneNumber);
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
.auth-page {
    min-height: calc(100vh - 200px);
    background: #212A1E;
    padding: 60px 150px;
    display: flex;
    flex-direction: column;
}

.title-section {
    width: 100%;
    margin-bottom: 40px;
}

.auth-title {
    color: #AA8B7A;
    font-size: 55px;
    display: inline-flex;
    align-items: center;
    gap: 2px;
    margin-block-end: 7px;
}

.title-star {
    width: 24px;
    height: 24px;
    margin-top: -20px;
}

.description-text {
    margin-top: 20px;
}

.primary-text {
    color: #FFFFFF;
    font-size: 30px;
    margin-bottom: 5px;
    margin-block-start: 14px;
}

.secondary-text {
    color: white;
    font-size: 22px;

    margin: 0;
}

.auth-container {
    width: 100%;
    max-width: 460px;
    margin: 0 auto;
}

.auth-form {
    display: flex;
    flex-direction: column;
    gap: 24px;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.form-group label {
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

.country-code {
    background: transparent;
    color: #AA8B7A;
    padding: 0 16px;
    font-size: 16px;
    height: 48px;
    display: flex;
    align-items: center;
    border-right: 1px solid #AA8B7A;
}

.rtl .country-code {
    border-right: none;
    border-left: 1px solid #AA8B7A;
}

.phone-input input {
    flex: 1;
    height: 48px;
    background: transparent;
    border: none;
    padding: 0 16px;
    color: #FFFFFF;
    font-size: 16px;
}

.phone-input input:focus {
    outline: none;
}

.phone-input input::placeholder {
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
}

.submit-btn:hover {
    background: #957865;
}

/* RTL (Arabic) Styles */
.rtl {
    direction: rtl;
}

.rtl .title-section {
    text-align: right;
}

.rtl .auth-title {
    font-family: 'TheSansArabic', sans-serif;
}

.rtl .description-text,
.rtl .primary-text,
.rtl .secondary-text,
.rtl .form-group label,
.rtl .phone-input input,
.rtl .country-code,
.rtl .submit-btn {
    font-family: 'TheSansArabic', sans-serif;
}

/* LTR (English) Styles */
.ltr {
    direction: ltr;
}

.ltr .title-section {
    text-align: left;
}

.ltr .auth-title {
    font-family: 'Philosopher', serif;
}

.ltr .description-text,
.ltr .primary-text,
.ltr .secondary-text,
.ltr .form-group label,
.ltr .phone-input input,
.ltr .country-code,
.ltr .submit-btn {
    font-family: 'Cairo', sans-serif;
}

/* Tablet Specific Styles */
@media screen and (min-width: 768px) and (max-width: 1024px) {
    .auth-page {
        padding: 40px 60px;
        min-height: calc(100vh - 180px);
    }

    .title-section {
        margin-bottom: 30px;
    }

    .auth-title {
        font-size: 36px;
    }

    .title-star {
        width: 20px;
        height: 20px;
        margin-top: -15px;
    }

    .description-text {
        margin-top: 15px;
    }

    .primary-text {
        font-size: 17px;
        margin-bottom: 6px;
    }

    .secondary-text {
        font-size: 15px;
    }

    .auth-container {
        max-width: 420px;
    }

    .auth-form {
        gap: 20px;
    }

    .form-group {
        gap: 6px;
    }

    .form-group label {
        font-size: 15px;
    }

    .phone-input {
        height: 44px;
    }

    .country-code {
        height: 44px;
        font-size: 15px;
        padding: 0 14px;
    }

    .phone-input input {
        height: 44px;
        font-size: 15px;
        padding: 0 14px;
    }

    .submit-btn {
        height: 44px;
        font-size: 15px;
    }
}

/* Update existing mobile styles to not conflict with tablet */
@media (max-width: 767px) {
    .auth-page {
        padding: 40px 20px;
    }

    .auth-title {
        font-size: 32px;
    }
}
</style> 