<template>
    <div class="profile-page" :class="currentLang === 'en' ? 'ltr' : 'rtl'">
        <div class="profile-container">
            <!-- Title -->
            <h1 class="profile-title">
                {{ currentLang === 'en' ? 'My Profile' : 'ملفي الشخصي' }}
            </h1>

            <div class="profile-layout">
                <!-- Sidebar -->
                <div class="profile-sidebar">
                    <div class="sidebar-item">
                        <router-link to="/account/profile" class="sidebar-link">
                            {{ currentLang === 'en' ? 'My Information' : 'معلوماتي' }}
                        </router-link>
                    </div>
                    <div class="sidebar-item">
                        <router-link to="/account/addresses" class="sidebar-link">
                            {{ currentLang === 'en' ? 'My Addresses' : 'عناويني' }}
                        </router-link>
                    </div>
                    <div class="sidebar-item" :class="{ active: true }">
                        <router-link to="/account/orders" class="sidebar-link">
                            {{ currentLang === 'en' ? 'My Orders' : 'طلباتي' }}
                        </router-link>
                    </div>
                    <div class="sidebar-item">
                        {{ currentLang === 'en' ? 'Log Out' : 'تسجيل الخروج' }}
                    </div>
                </div>

                <!-- Orders Content -->
                <div class="profile-content">
                    <div v-if="orders.length === 0" class="empty-orders">
                        <img src="../../../../public/assets/img/orders-icon.png" alt="Empty Orders" class="empty-orders-icon" />
                        <p class="empty-orders-text">
                            {{ currentLang === 'en' ? 'Your order list is empty' : 'قائمة طلباتك فارغة' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Orders',
    data() {
        return {
            currentLang: localStorage.getItem('currentLang') || 'en',
            orders: []
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
    width: 114%;
}

.ltr .sidebar-item.active::after {
    content: "";
    position: absolute;
    bottom: -12px;
    left: -158px;
    right: 0;
    height: 2px;
    background: #AA8B7A;
    width: 138%;
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

.sidebar-item:hover {
    color: #AA8B7A;
}

.sidebar-item.active {
    color: #AA8B7A;
}

.profile-content {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 232px;
}

.empty-orders {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 24px;
}

.empty-orders-icon {
    width: 139px;
    height: 139px;

    opacity: 0.8;
}

.empty-orders-text {
    color: #FFFFFF;
    font-size: 24px;
    margin: 0;
}

/* RTL (Arabic) Styles */
.rtl {
    direction: rtl;
}

.rtl .profile-title,
.rtl .empty-orders-text {
    font-family: 'TheSansArabic', sans-serif;
}

.rtl .sidebar-item {
    font-family: 'TheSansArabic', sans-serif;
    text-align: right;
}

/* LTR (English) Styles */
.ltr {
    direction: ltr;
}

.ltr .profile-title,
.ltr .empty-orders-text {
    font-family: 'Philosopher', serif;
}
.ltr .empty-orders-text {
    font-family: 'Cairo', sans-serif !important;
}
.ltr .sidebar-item {
    font-family: 'Cairo', sans-serif;
    text-align: left;
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
}
</style>