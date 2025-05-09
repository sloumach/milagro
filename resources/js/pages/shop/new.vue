<template>
    <div class="profile-page" :class="currentLang === 'en' ? 'ltr' : 'rtl'">
        <div class="profile-container">
            <!-- Title -->
            <h1 class="profile-title">
                {{ currentLang === 'en' ? 'Categories' : 'الفئات' }}
                <img src="../../../../public/assets/img/star.png" class="title-star" alt="star" />
            </h1>

            <div class="profile-layout">
                <!-- Mobile Tabs -->
                <div v-if="isMobile" class="mobile-profile-tabs">
                    <router-link
                        to="/shop/new"
                        class="mobile-profile-tab"
                        :class="{ active: $route.path === '/shop/new' }"
                    >{{ currentLang === 'en' ? 'New' : 'جديد' }}</router-link>
                    <router-link
                        to="/shop/boxes"
                        class="mobile-profile-tab"
                        :class="{ active: $route.path === '/shop/boxes' }"
                    >{{ currentLang === 'en' ? 'Boxes' : 'تشكيلة البوكسات' }}</router-link>
                    <router-link
                        to="/shop/occasions"
                        class="mobile-profile-tab"
                        :class="{ active: $route.path === '/shop/occasions' }"
                    >{{ currentLang === 'en' ? 'Occasions' : 'مناسباتكم' }}</router-link>
                    <router-link
                        to="/shop/canope"
                        class="mobile-profile-tab"
                        :class="{ active: $route.path === '/shop/canope' }"
                    >{{ currentLang === 'en' ? 'Savory & Canapes' : 'سبشل سولتيز' }}</router-link>
                    <div class="mobile-profile-tab">
                        {{ currentLang === 'en' ? 'Milagro Giveaway' : 'توزيعات ميلاقرو' }}
                    </div>
                </div>

                <!-- Desktop Sidebar -->
                <div v-else class="profile-sidebar">
                    <div class="sidebar-item" :class="{ active: activeTab === 'info' }">
                        <router-link to="/shop/new" class="sidebar-link">
                            {{ currentLang === 'en' ? 'New' : 'جديد' }}
                        </router-link>
                    </div>
                    <div class="sidebar-item">
                        <router-link to="/shop/boxes" class="sidebar-link">
                            {{ currentLang === 'en' ? 'Boxes' : 'تشكيلة البوكسات' }}
                        </router-link>
                    </div>
                    <div class="sidebar-item">
                        <router-link to="/shop/occasions" class="sidebar-link">
                            {{ currentLang === 'en' ? 'Occasions' : 'مناسباتكم' }}
                        </router-link>
                    </div>
                    <div class="sidebar-item">
                        <router-link to="/shop/canope" class="sidebar-link">
                            {{ currentLang === 'en' ? 'Savory & Canapes' : 'سبشل سولتيز' }}
                        </router-link>
                    </div>
                    <div class="sidebar-item">
                        {{ currentLang === 'en' ? 'Milagro Giveaway' : 'توزيعات ميلاقرو' }}
                    </div>
                </div>

                <!-- Form Content -->
                <div class="profile-content">
                  
                </div>
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
            },
            isMobile: false
        }
    },
    methods: {
        handleSubmit() {
            console.log('Form submitted:', this.form);
        },
        checkMobile() {
            this.isMobile = window.innerWidth <= 480;
        }
    },
    mounted() {
        this.checkMobile();
        window.addEventListener('resize', this.checkMobile);
    },
    created() {
        this.$root.$on('languageChanged', (lang) => {
            this.currentLang = lang;
        });
    },
    beforeDestroy() {
        window.removeEventListener('resize', this.checkMobile);
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
    width: 100%;
}

.ltr .sidebar-item.active::after {
    content: "";
    position: absolute;
    bottom: -12px;
    left: -158px;
    right: 0;
    height: 2px;
    background: #AA8B7A;
    width: 100%;
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
.title-star {
    width: 24px;
    height: 24px;
    position: relative;
    top: -12px;
}
@media (max-width: 480px) {
    .profile-page {
        padding: 20px 12px;
    }

    .profile-title {
        font-size: 30px;
        margin-bottom: 25px;
        top: -25px;
    }

    .title-star {
        width: 14px;
        height: 14px;
        top: -8px;
    }

    .profile-layout {
        gap: 20px;
        top: -20px;
    }

    .mobile-profile-tabs {
        display: flex;
        flex-direction: row;
        gap: 10px;
        overflow-x: auto;
        padding: 0 10px 18px 10px;
        margin: 0 0 10px 0;
        width: 97vw;
        box-sizing: border-box;
    }

    .mobile-profile-tabs::-webkit-scrollbar {
        display: none;
    }

    .mobile-profile-tab {
        flex: 0 0 auto;
        padding: 7px 22px;
        border: 1px solid #AA8B7A;
        border-radius: 7px;
        background: transparent;
        color: #AA8B7A;
        font-size: 18px;
        font-family: 'Philosopher', serif;
        text-decoration: none;
        text-align: center;
        transition: background 0.2s, color 0.2s;
        outline: none;
        margin-bottom: 0;
        margin-top: 0;
        cursor: pointer;
    }

    .mobile-profile-tab.active {
        background: #AA8B7A;
        color: #ffffff;
        font-weight: 600;
        border: 1px solid #AA8B7A;
    }

    .mobile-profile-tab {
        color: #ffffff !important;
        font-weight: 400 !important;
        border: 1px solid #AA8B7A !important;
    }

    /* Hide desktop sidebar in mobile */
    .profile-sidebar {
        display: none;
    }
}

/* Tablet Specific Styles */
@media screen and (min-width: 768px) and (max-width: 1024px) {
    .profile-page {
        padding: 40px 60px;
        min-height: calc(100vh - 180px);
    }

    .profile-container {
        max-width: 1000px;
    }

    .profile-title {
        font-size: 36px;
        top: -35px;
    }

    .title-star {
        width: 20px;
        height: 20px;
        top: -10px;
    }

    .profile-layout {
        gap: 40px;
        top: -25px;
    }

    .profile-sidebar {
        width: 180px;
    }

    .sidebar-item {
        font-size: 18px;
        margin-bottom: 14px;
    }

    .rtl .sidebar-item.active::after {
        right: -120px;
        width: 130%;
    }

    .ltr .sidebar-item.active::after {
        left: -120px;
        width: 140%;
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

    .profile-content {
        flex: 1;
        padding-right: 20px;
    }

    .profile-form {
        max-width: 420px;
    }
}
</style>