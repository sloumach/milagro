<template>
    <div class="auth-page" :class="currentLang === 'en' ? 'ltr' : 'rtl'">
        <!-- Title container with description -->
        <div class="title-section">
            <h1 class="auth-title">
                <span v-if="currentLang === 'en'">Verify OTP</span>
                <span v-else>التحقق من رمز OTP</span>
                <img src="../../../../public/assets/img/star.png" class="title-star" alt="star" />
            </h1>
            
            <!-- Moved description texts here -->
            <div class="description-text">
                <p class="primary-text">
                    {{ currentLang === 'en' 
                        ? 'Enter code sent to your number' 
                        : 'أدخل الرمز المرسل إلى بريدك' 
                    }}
                </p>
                <p class="secondary-text">
                    {{ currentLang === 'en' 
                        ? 'We sent it to the number ######## ' 
                        : 'لقد أرسلنا إلى الرقم #######' 
                    }}
                </p>
            </div>
        </div>

        <!-- Form container -->
        <div class="auth-container">
            <form class="auth-form" @submit.prevent="handleSubmit">
                <div class="form-group">
                    <label>
                        {{ currentLang === 'en' ? 'Enter OTP code' : 'أدخل رمز OTP' }}
                    </label>
                    <input 
                        type="text" 
                        v-model="otpCode"
                        maxlength="6"
                        pattern="\d*"
                    />
                    <a href="#" class="resend-link" @click.prevent="resendOTP">
                        {{ currentLang === 'en' ? 'Resend OTP' : 'إعادة إرسال رمز OTP' }}
                    </a>
                </div>

                <button type="submit" class="submit-btn">
                    {{ currentLang === 'en' ? 'Verify' : 'تحقق' }}
                </button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: 'OtpVerification',
    data() {
        return {
            currentLang: localStorage.getItem('currentLang') || 'en',
            otpCode: ''
        }
    },
    methods: {
        handleSubmit() {
            console.log('OTP submitted:', this.otpCode);
        },
        resendOTP() {
            console.log('Resending OTP');
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
    font-size: 42px;
    display: inline-flex;
    align-items: center;
    gap: 10px;
}

.title-star {
    width: 24px;
    height: 24px;
    margin-top: -20px;
}

.auth-container {
    width: 100%;
    max-width: 460px;
    margin: 0 auto;
}

.description-text {
    margin-top: 20px;
}

.primary-text {
    color: #FFFFFF;
    font-size: 18px;
    margin-bottom: 8px;
}

.secondary-text {
    color: #AA8B7A;
    font-size: 16px;
    margin: 0;
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
    position: relative;
    margin-bottom: 16px;
}

.form-group label {
    color: #FFFFFF;
    font-size: 16px;
}

.form-group input {
    height: 48px;
    background: transparent;
    border: 1px solid #AA8B7A;
    border-radius: 4px;
    padding: 0 16px;
    color: #FFFFFF;
    font-size: 16px;
    text-align: center;
    letter-spacing: 2px;
}

.form-group input:focus {
    outline: none;
    border-color: #FFFFFF;
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

.resend-link {
    color: #AA8B7A;
    text-decoration: underline;
    font-size: 14px;
    cursor: pointer;
    transition: color 0.3s ease;
    position: absolute;
    bottom: -24px;
}

.resend-link:hover {
    color: #FFFFFF;
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
.rtl .form-group input,
.rtl .submit-btn,
.rtl .resend-link {
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
.ltr .form-group input,
.ltr .submit-btn,
.ltr .resend-link {
    font-family: 'Cairo', sans-serif;
}

@media (max-width: 768px) {
    .auth-page {
        padding: 40px 20px;
    }

    .auth-title {
        font-size: 32px;
    }

    .description-text {
        padding: 0 20px;
    }
}
</style> 