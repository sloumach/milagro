<template>
    <div class="profile-page" :class="currentLang === 'en' ? 'ltr' : 'rtl'">
        <div class="profile-container">
            <!-- Title -->
            <h1 class="profile-title">
                {{ currentLang === 'en' ? 'My Profile' : 'ملفي الشخصي' }}
                <img src="../../../../public/assets/img/star.png" class="title-star" alt="star" />
            </h1>

            <div class="profile-layout">
                <!-- Mobile Tabs -->
                <div v-if="isMobile" class="mobile-profile-tabs">
                    <router-link
                        to="/account/profile"
                        class="mobile-profile-tab"
                        :class="{ active: $route.path === '/account/profile' }"
                    >{{ currentLang === 'en' ? 'My Information' : 'معلوماتي' }}</router-link>
                    <router-link
                        to="/account/addresses"
                        class="mobile-profile-tab"
                        :class="{ active: $route.path === '/account/addresses' }"
                    >{{ currentLang === 'en' ? 'My Addresses' : 'عناويني' }}</router-link>
                    <router-link
                        to="/account/orders"
                        class="mobile-profile-tab"
                        :class="{ active: $route.path === '/account/orders' }"
                    >{{ currentLang === 'en' ? 'My Orders' : 'طلباتي' }}</router-link>
                    <div class="mobile-profile-tab" @click="logout">
                        {{ currentLang === 'en' ? 'Log Out' : 'تسجيل الخروج' }}
                    </div>
                </div>

                <!-- Desktop Sidebar -->
                <div v-else class="profile-sidebar">
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
                    <div v-if="!orders || orders.length === 0" class="empty-orders">
                        <img src="../../../../public/assets/img/orders-icon.png" alt="Empty Orders" class="empty-orders-icon" />
                        <p class="empty-orders-text">
                            {{ currentLang === 'en' ? 'Your order list is empty' : 'قائمة طلباتك فارغة' }}
                        </p>
                    </div>
                    <div v-else class="orders-list">
                        <div v-for="order in orders" :key="order.id" class="order-card">
                            <div class="order-header">
                                <div class="order-id">
                                    {{ order.id }}
                                    <img src="../../../../public/assets/img/Cart.png" alt="Cart" class="cart-icon" />
                                </div>
                                <div class="order-status">
                                    {{ currentLang === 'en' ? 'Complete' : 'مكتمل' }}
                                </div>
                            </div>
                            <div class="order-items">
                                <div v-for="item in order.items" :key="item.id" class="order-item">
                                    <div class="item-image">
                                        <img :src="item.image" :alt="currentLang === 'en' ? item.nameEn : item.nameAr" />
                                    </div>
                                    <div class="item-details">
                                        <div class="item-name">{{ currentLang === 'en' ? item.nameEn : item.nameAr }}</div>
                                        <div class="item-specs">{{ item.specs }} حبة</div>
                                        <div class="item-quantity">الكمية: {{ item.quantity }}</div>
                                        <div class="item-price">KD {{ item.price }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="order-footer">
                                <div class="order-total">
                                    <span>{{ currentLang === 'en' ? 'Total:' : 'الإجمالي:' }}</span>
                                    <span>KD {{ order.total }}</span>
                                </div>
                                <router-link :to="'/account/orders/' + order.id.replace('#', '')" class="details-btn">
                                    {{ currentLang === 'en' ? 'Details' : 'التفاصيل' }}
                                </router-link>
                            </div>
                        </div>
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
            currentLang: localStorage.getItem('currentLang') || 'ar',
            isMobile: false,
            orders: [
                {
                    id: '#CTH-198203',
                    status: 'complete',
                    items: [
                        {
                            id: 1,
                            nameEn: 'Luxury Macaron Box',
                            nameAr: 'الماكرون | مكس',
                            quantity: 1,
                            specs: '38',
                            price: '27.000',
                            image: '/assets/img/macaron1.png'
                        },
                        {
                            id: 2,
                            nameEn: 'Milagro Diffuser',
                            nameAr: 'دفيوزر ميلاغرو',
                            quantity: 1,
                            specs: '30',
                            price: '11.000',
                            image: '/assets/img/diffuser1.png'
                        }
                    ],
                    total: '38.000'
                },
                {
                    id: '#CTH-671892',
                    status: 'complete',
                    items: [
                        {
                            id: 3,
                            nameEn: 'Luxury Macaron Box',
                            nameAr: 'الماكرون | مكس',
                            quantity: 1,
                            specs: '38',
                            price: '27.000',
                            image: '/assets/img/macaron1.png'
                        },
                        {
                            id: 4,
                            nameEn: 'Milagro Diffuser',
                            nameAr: 'دفيوزر ميلاغرو',
                            quantity: 1,
                            specs: '30',
                            price: '14.000',
                            image: '/assets/img/diffuser1.png'
                        }
                    ],
                    total: '41.000'
                }
            ]
        };
    },
    methods: {
        checkMobile() {
            this.isMobile = window.innerWidth <= 480;
        },
        logout() {
            // Handle logout logic here
            console.log('Logging out...');
        }
    },
    mounted() {
        this.checkMobile();
        window.addEventListener('resize', this.checkMobile);
        this.$root.$on('languageChanged', (lang) => {
            this.currentLang = lang;
        });
    },
    beforeDestroy() {
        window.removeEventListener('resize', this.checkMobile);
        this.$root.$off('languageChanged');
    }
};
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

.empty-orders {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 24px;
    margin-top: 40px;
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

.rtl .profile-title {
    font-family: 'TheSansArabic', sans-serif;
}

.rtl .sidebar-item {
    font-family: 'TheSansArabic', sans-serif;
    text-align: right;
}

.rtl .empty-orders-text {
    font-family: 'TheSansArabic', sans-serif;
}

/* LTR (English) Styles */
.ltr {
    direction: ltr;
}

.ltr .profile-title {
    font-family: 'Philosopher', serif;
}

.ltr .sidebar-item {
    font-family: 'Cairo', sans-serif;
    text-align: left;
}

.ltr .empty-orders-text {
    font-family: 'Cairo', sans-serif;
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

/* Orders List Styles */
.orders-list {
    width: 100%;
    display: flex;
    flex-direction: column;
    gap: 24px;
}

.order-card {
    background: rgba(33, 42, 30, 0.95);
    border-radius: 16px;
    overflow: hidden;
    border: 1px solid rgba(170, 139, 122, 0.2);
}

.order-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 24px;
    background: rgba(33, 42, 30, 0.95);
    border-bottom: 1px solid rgba(170, 139, 122, 0.2);
}

.order-id {
    color: #FFFFFF;
    font-size: 18px;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 8px;
}

.cart-icon {
    width: 20px;
    height: 20px;
    opacity: 0.8;
}

.order-status {
    color: #CCB3A5;
    font-size: 16px;
}

.order-items {
    padding: 24px;
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.order-item {
    display: flex;
    gap: 16px;
    align-items: flex-start;
}

.item-image {
    width: 64px;
    height: 64px;
    border-radius: 8px;
    overflow: hidden;
    background: #FFFFFF;
    flex-shrink: 0;
}

.item-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.item-details {
    flex: 1;
}

.rtl .item-details {
    text-align: right;
}

.ltr .item-details {
    text-align: left;
}

.item-name {
    color: #FFFFFF;
    font-size: 18px;
    margin-bottom: 8px;
}

.item-specs {
    color: #CCB3A5;
    font-size: 16px;
    margin-bottom: 4px;
}

.item-quantity {
    color: #CCB3A5;
    font-size: 16px;
    margin-bottom: 4px;
}

.item-price {
    color: #FFFFFF;
    font-size: 16px;
    font-weight: 500;
    margin-top: 8px;
}

.order-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 24px;
    border-top: 1px solid rgba(170, 139, 122, 0.2);
}

.order-total {
    color: #FFFFFF;
    font-size: 18px;
    display: flex;
    gap: 12px;
    align-items: center;
}

.details-btn {
    background: none;
    border: none;
    color: #CCB3A5;
    font-size: 16px;
    cursor: pointer;
    padding: 4px 8px;
    text-decoration: underline;
}

/* RTL specific styles for orders */
.rtl .order-card {
    text-align: right;
}

.rtl .order-id,
.rtl .order-status,
.rtl .item-name,
.rtl .item-specs,
.rtl .item-quantity,
.rtl .item-price,
.rtl .order-total,
.rtl .details-btn {
    font-family: 'TheSansArabic', sans-serif;
}

/* LTR specific styles for orders */
.ltr .order-card {
    text-align: left;
}
.title-star {
    width: 24px;
    height: 24px;
    position: relative;
    top: -12px;
}
.ltr .order-id,
.ltr .order-status,
.ltr .item-name,
.ltr .item-specs,
.ltr .item-quantity,
.ltr .item-price,
.ltr .order-total,
.ltr .details-btn {
    font-family: 'Cairo', sans-serif;
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
        width: 96vw;
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

    /* Adjust orders list for mobile */
    .orders-list {
        margin-top: 20px;
    }

    .order-card {
        margin: 0 -12px;
        border-radius: 0;
    }

    .order-header {
        padding: 15px;
    }

    .order-items {
        padding: 15px;
    }

    .order-footer {
        padding: 15px;
    }

    .item-name {
        font-size: 16px;
    }

    .item-specs,
    .item-quantity,
    .item-price {
        font-size: 14px;
    }

    .order-total {
        font-size: 16px;
    }
}

/* Tablet Specific Styles */
@media screen and (min-width: 768px) and (max-width: 1024px) {
    .profile-page {
        padding: 40px 60px !important;
        min-height: calc(100vh - 180px);
    }

    .profile-container {
        max-width: 900px;
    }

    .profile-title {
        font-size: 36px;
        top: -35px;
    }

    .title-star {
        width: 20px;
        height: 20px;
        position: relative;
        top: -10px;
    }

    .profile-layout {
        gap: 40px;
        top: -25px;
        display: flex !important;
        flex-direction: row !important;
        align-items: flex-start;
    }

    .profile-sidebar {
        width: 180px !important;
        flex-shrink: 0;
        position: relative;
        top: 12px;
        display: block !important;
    }

    .profile-content {
        position: relative;
        top: 12px;
        flex: 1;
        max-width: calc(100% - 220px);
    }

    .sidebar-item {
        font-size: 18px;
        margin-bottom: 14px;
        padding: 0;
    }

    .rtl .sidebar-item.active::after {
        right: -120px;
        width: 108%;
        bottom: -8px;
    }

    .ltr .sidebar-item.active::after {
        left: -120px;
        width: 128%;
        bottom: -8px;
    }

    /* Empty Orders State */
    .empty-orders {
        margin-top: 0;
        gap: 20px;
    }

    .empty-orders-icon {
        width: 120px;
        height: 120px;
    }

    .empty-orders-text {
        font-size: 22px;
    }

    /* Orders List Adjustments */
    .orders-list {
        gap: 20px;
        margin-top: 0;
    }

    .order-card {
        border-radius: 14px;
    }

    .order-header {
        padding: 16px 20px;
    }

    .order-id {
        font-size: 17px;
    }

    .cart-icon {
        width: 18px;
        height: 18px;
    }

    .order-status {
        font-size: 15px;
    }

    .order-items {
        padding: 20px;
        gap: 16px;
    }

    .order-item {
        gap: 14px;
    }

    .item-image {
        width: 56px;
        height: 56px;
        border-radius: 6px;
    }

    .item-name {
        font-size: 17px;
        margin-bottom: 6px;
    }

    .item-specs,
    .item-quantity {
        font-size: 15px;
        margin-bottom: 3px;
    }

    .item-price {
        font-size: 15px;
        margin-top: 6px;
    }

    .order-footer {
        padding: 16px 20px;
    }

    .order-total {
        font-size: 17px;
        gap: 10px;
    }

    .details-btn {
        font-size: 15px;
        padding: 3px 6px;
    }

    /* Force hide mobile tabs in tablet view */
    .mobile-profile-tabs {
        display: none !important;
    }
}
</style>