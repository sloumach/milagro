<template>
    <div class="auth-page" :class="currentLang === 'en' ? 'ltr' : 'rtl'">
        <!-- Separate div for title -->
        <div class="title-container">
            <h1 class="auth-title">
                <span v-if="currentLang === 'en'">Create Your Account</span>
                <span v-else>أنشئ حسابك</span>
                <img src="../../../../public/assets/img/star.png" class="title-star" alt="star" />
            </h1>
        </div>

        <!-- Form container -->
        <div class="auth-container">
            <form class="auth-form" @submit.prevent="handleSubmit">
                <!-- First Name -->
                <div class="form-group">
                    <label>
                        {{ currentLang === 'en' ? 'First Name' : 'الاسم الأول' }}
                    </label>
                    <input 
                        type="text" 
                        v-model="form.firstName"
                        :placeholder="currentLang === 'en' ? 'Enter your first name' : 'أدخل اسمك الأول'"
                    />
                </div>

                <!-- Last Name -->
                <div class="form-group">
                    <label>
                        {{ currentLang === 'en' ? 'Last Name' : 'الاسم الأخير' }}
                    </label>
                    <input 
                        type="text" 
                        v-model="form.lastName"
                        :placeholder="currentLang === 'en' ? 'Enter your last name' : 'أدخل اسمك الأخير'"
                    />
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label>
                        {{ currentLang === 'en' ? 'Email' : 'البريد الإلكتروني' }}
                    </label>
                    <input 
                        type="email" 
                        v-model="form.email"
                        :placeholder="currentLang === 'en' ? 'Enter your email' : 'أدخل بريدك الإلكتروني'"
                    />
                </div>

                <!-- Submit Button -->
                <button type="submit" class="submit-btn">
                    {{ currentLang === 'en' ? 'Continue' : 'متابعة' }}
                </button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: 'CreateAccount',
    data() {
        return {
            currentLang: localStorage.getItem('currentLang') || 'en',
            form: {
                firstName: '',
                lastName: '',
                email: ''
            }
        }
    },
    methods: {
        handleSubmit() {
            console.log('Form submitted:', this.form);
        }
    },
    created() {
        // Listen for language changes from the root
        this.$root.$on('languageChanged', (lang) => {
            this.currentLang = lang;
        });
    },
    beforeDestroy() {
        // Clean up the event listener
        this.$root.$off('languageChanged');
    }
}
</script>

<style scoped>
.auth-page {
    min-height: calc(100vh - 200px);
    background: #212A1E;
    padding: 60px 150px; /* Increased padding to match capture */
    display: flex;
    flex-direction: column;
}

/* New title container styles */
.title-container {
    width: 100%;
    margin-bottom: 40px;
}

.auth-title {
    color: #AA8B7A;
    font-size: 55px;
    display: inline-flex; /* Changed to inline-flex */
    align-items: center;
    gap: 2px;
    margin-block-end: 7px;

}

.title-star {
    width: 24px;
    height: 24px;
    margin-top: -20px; /* Adjust star position */
}

/* Form container styles */
.auth-container {
    width: 100%;
    max-width: 460px;
    margin: 0 auto;
}

/* RTL (Arabic) Styles */
.rtl .title-container {
    text-align: right; /* Align title to the right for Arabic */
}

.rtl .auth-title {
    font-family: 'TheSansArabic', sans-serif;
}

/* LTR (English) Styles */
.ltr .title-container {
    text-align: left; /* Align title to the left for English */
}

.ltr .auth-title {
    justify-content: flex-start;
    font-family: 'Philosopher', serif;
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

.form-group input {
    height: 48px;
    background: transparent;
    border: 1px solid #AA8B7A;
    border-radius: 4px;
    padding: 0 16px;
    color: #FFFFFF;
    font-size: 16px;
}

.form-group input:focus {
    outline: none;
    border-color: #FFFFFF;
}

.form-group input::placeholder {
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
    margin-top: 16px;
}

.submit-btn:hover {
    background: #957865;
}

/* RTL (Arabic) Styles */
.rtl {
    direction: rtl;
}

.rtl .auth-title {
    justify-content: flex-end;
    font-family: 'TheSansArabic', sans-serif;
}

.rtl .form-group label,
.rtl .form-group input,
.rtl .submit-btn {
    font-family: 'TheSansArabic', sans-serif;
   
}

/* LTR (English) Styles */
.ltr {
    direction: ltr;
}

.ltr .form-group label,
.ltr .form-group input,
.ltr .submit-btn {
    font-family: 'Cairo', sans-serif;
}

/* Tablet Specific Styles */
@media screen and (min-width: 768px) and (max-width: 1024px) {
    .auth-page {
        padding: 40px 60px;
        min-height: calc(100vh - 180px);
    }

    .title-container {
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

    .form-group input {
        height: 44px;
        font-size: 15px;
        padding: 0 14px;
    }

    .submit-btn {
        height: 44px;
        font-size: 15px;
        margin-top: 14px;
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