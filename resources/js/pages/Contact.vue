<template>
    <div class="profile-page" :class="currentLang === 'en' ? 'ltr' : 'rtl'">
        <div class="profile-container">
           
            <div class="orders-navigation">
                <router-link to="/contact" class="nav-link">
                    <span v-if="currentLang === 'en'">
                        <span class="white-text">Contact Us</span>
                    </span>
                    <span v-else>
                        <span class="white-text">تواصل معنا</span> 
                    </span>
                    <img src="../../../public/assets/img/arrow-right.png" alt="Arrow" class="arrow-icon" />
                </router-link>
            </div>
            <div class="profile-layout">
                
            
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Profile',
    data() {
        return {
            currentLang: localStorage.getItem('currentLang') || 'en',
            activeTab: 'info',
            form: {
                firstName: '',
                lastName: '',
                email: '',
                phone: ''
            }
        }
    },
    methods: {
        handleSubmit() {
            console.log('Form submitted:', this.form);
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
.profile-page {
    min-height: calc(100vh - 200px);
    background: #212A1E;
    padding: 47px 150px;
}

.profile-container {
    max-width: 1200px;
    margin: 0 auto;
}

.profile-title {
    color: #AA8B7A;
    font-size: 42px;

    position: relative;
    top: -45px;
}

.profile-layout {
    display: flex;
    gap: 60px;
    position: relative;
    top: -32px;
}

.profile-sidebar {
    width: 200px;
    flex-shrink: 0;
}

.sidebar-item {
    color: #FFFFFF;
    padding: 12px 0;
    cursor: pointer;
    transition: color 0.3s ease;
    position: relative;
}

.rtl .sidebar-item.active::after {
    content: "";
    position: absolute;
    bottom: -12px;
    left: 0;
    right: -159px;
    height: 2px;
    background: #AA8B7A;
    width: 123%;
}

.ltr .sidebar-item.active::after {
    content: "";
    position: absolute;
    bottom: -12px;
    left: -158px;
    right: 0;
    height: 2px;
    background: #AA8B7A;
    width: 145%;
}

.ltr .sidebar-item {
    font-family: 'Philosopher', serif !important;
    font-size: 20px;
    padding-bottom: 0px;
    margin-bottom: 16px;
}

.rtl .sidebar-item {
    font-size: 20px;
    padding-bottom: 0px;
    margin-bottom: 16px;
}

.sidebar-item:last-child {
    margin-bottom: 0;
}

.sidebar-item:hover {
    color: #AA8B7A;
}

.sidebar-item.active {
    color: #AA8B7A;
}

.sidebar-item.logout {
    color: #AA8B7A;
    margin-top: 20px;
}

.profile-content {
    flex: 1;
}

.profile-form {
    display: flex;
    flex-direction: column;
    gap: 8px;
    max-width: 460px;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 3px;
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

.rtl .profile-title {
    font-family: 'TheSansArabic', sans-serif;
}

.rtl .sidebar-item,
.rtl .form-group label,
.rtl .form-group input,
.rtl .submit-btn {
    font-family: 'TheSansArabic', sans-serif;
    text-align: right;
}

.rtl .submit-btn {
    text-align: center !important;
}

/* LTR (English) Styles */
.ltr {
    direction: ltr;
}

.ltr .profile-title {
    font-family: 'Philosopher', serif;
}

.ltr .sidebar-item,
.ltr .form-group label,
.ltr .form-group input,
.ltr .submit-btn {
    font-family: 'Cairo', sans-serif;
    text-align: left;
}

.ltr .submit-btn {
    text-align: center !important;
}

@media (max-width: 992px) {
    .profile-page {
        padding: 40px 20px;
    }

    .profile-layout {
        flex-direction: column;
    }

    .profile-sidebar {
        width: 100%;
    }

    .profile-form {
        max-width: 100%;
    }
}

.sidebar-link {
    color: inherit;
    text-decoration: none;
    display: block;
    width: 100%;
}

.router-link-active {
    color: #AA8B7A;
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
</style>