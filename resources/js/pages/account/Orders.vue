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
</style>