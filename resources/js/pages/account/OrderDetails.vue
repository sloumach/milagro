<template>
    <div class="profile-page" :class="currentLang === 'en' ? 'ltr' : 'rtl'">
        <div class="profile-container">
            <!-- Title -->
            <h1 class="profile-title">
                {{ currentLang === 'en' ? 'My Profile' : 'ملفي الشخصي' }}
                <img src="../../../../public/assets/img/star.png" class="title-star" alt="star" />
            </h1>

            <!-- Navigation link with arrow -->
            <div class="orders-navigation">
                <router-link to="/account/orders" class="nav-link">
                    <span v-if="currentLang === 'en'">
                        <span class="white-text">My Orders</span> <span class="slash-text">/</span> <span class="highlight-text">Order Details</span>
                    </span>
                    <span v-else>
                        <span class="white-text">طلباتي</span> <span class="slash-text">/</span> <span class="highlight-text">تفاصيل الطلب</span>
                    </span>
                    <img 
                        src="../../../../public/assets/img/arrow-right.png" 
                        alt="Arrow" 
                        class="arrow-icon"
                    />
                </router-link>
            </div>

            <div class="profile-layout">
              

                <!-- Desktop Sidebar -->
                <div v-if="!isMobile" class="profile-sidebar">
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

                <!-- Order Details Content -->
                <div class="profile-content">
                    <div class="order-details">
                        <!-- Status and Order ID Header -->
                        <div class="status-header">
                           
                            <div class="order-id">
                                <img src="../../../../public/assets/img/Cart.png" alt="Cart" class="cart-icon" />
                                <span>{{ currentLang === 'en' ? 'Order ID: #CTH-198203' : 'رقم الطلب: CTH-198203#' }}</span>
                            </div>
                            <div class="status">
                                {{ currentLang === 'en' ? 'Complete' : 'مكتمل' }}
                            </div>
                        </div>
                        <div class="order-date">
                            {{ currentLang === 'en' ? 'Order Date: March 16, 2025 at 9:30 PM' : 'تاريخ الطلب: ١٦ مارس ٢٠٢٥ الساعة ٩:٣٠ مساءً' }}
                        </div>

                        <!-- Order Items -->
                        <div class="section-header">
                            <img src="../../../../public/assets/img/Box.png" alt="Box" class="section-icon" />
                            <h2>{{ currentLang === 'en' ? 'Order Items:' : 'عناصر الطلب:' }}</h2>
                        </div>

                        <div class="order-items">
                            <div class="order-item">
                                <img src="../../../../public/assets/img/macaron1.png" alt="Macaron" class="item-image" />
                                <div class="item-details">
                                    <div class="item-name">{{ currentLang === 'en' ? 'Luxury Macaron Box' : 'الماكرون | مكس' }}</div>
                                    <div class="item-specs">{{ currentLang === 'en' ? '38 pieces' : '٣٨ حبة' }}</div>
                                    <div class="item-quantity">{{ currentLang === 'en' ? 'Quantity: 1' : 'الكمية: ١' }}</div>
                                </div>
                                <div class="item-price">{{ currentLang === 'en' ? '27 KD' : '٢٧ د.ك' }}</div>
                            </div>
                            <div class="order-item">
                                <img src="../../../../public/assets/img/diffuser1.png" alt="Diffuser" class="item-image" />
                                <div class="item-details">
                                    <div class="item-name">{{ currentLang === 'en' ? 'Milagro Diffuser' : 'دفيوزر ميلاغرو' }}</div>
                                    <div class="item-specs">{{ currentLang === 'en' ? '30 pieces' : '٣٠ حبة' }}</div>
                                    <div class="item-quantity">{{ currentLang === 'en' ? 'Quantity: 1' : 'الكمية: ١' }}</div>
                                </div>
                                <div class="item-price">{{ currentLang === 'en' ? '13 KD' : '١٣ د.ك' }}</div>
                            </div>
                        </div>

                        <!-- Delivery Address -->
                        <div class="section-header">
                            <img src="../../../../public/assets/img/Delivery.png" alt="Delivery" class="section-icon" />
                            <h2>{{ currentLang === 'en' ? 'Delivery Address' : 'عنوان التوصيل' }}</h2>
                        </div>
                        <div class="address-details">
                            {{ currentLang === 'en' ? 'Sharq - Kuwait Complex 3, Street No: 502, Building No: 59' : 'شرق - الكويت مجمعة ٣ ، شارع رقم : ٥٠٢ ، مبنى رقم : ٥٩' }}
                        </div>

                        <!-- Order Summary -->
                        <div class="section-header">
                            <img src="../../../../public/assets/img/Summary.png" alt="Summary" class="section-icon" />
                            <h2>{{ currentLang === 'en' ? 'Order Summary:' : 'ملخص الطلب:' }}</h2>
                        </div>
                        <div class="summary-details">
                            <div class="summary-row">
                                <span>{{ currentLang === 'en' ? 'Subtotal' : 'المجموع الفرعي' }}</span>
                                <span>{{ currentLang === 'en' ? '40 KD' : '٤٠ د.ك' }}</span>
                            </div>
                            <div class="summary-row">
                                <span>{{ currentLang === 'en' ? 'Delivery' : 'التوصيل' }}</span>
                                <span>{{ currentLang === 'en' ? '1 KD' : '١ د.ك' }}</span>
                            </div>
                            <div class="summary-row">
                                <span>{{ currentLang === 'en' ? 'Discount' : 'الخصم' }}</span>
                                <span>{{ currentLang === 'en' ? '-3 KD' : '-٣ د.ك' }}</span>
                            </div>
                            <div class="summary-row total">
                                <span>{{ currentLang === 'en' ? 'Total' : 'الإجمالي' }}</span>
                                <span>{{ currentLang === 'en' ? '38 KD' : '٣٨ د.ك' }}</span>
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
    name: 'OrderDetails',
    data() {
        return {
            currentLang: localStorage.getItem('currentLang') || 'ar',
            isMobile: false
        }
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

.order-details {
    color: #FFFFFF;
}

.status-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 8px;
}

.status {
    color: #CCB3A5;
    font-size: 16px;
}

.order-id {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 18px;
}

.cart-icon {
    width: 20px;
    height: 20px;
    opacity: 0.8;
}

.order-date {
    color: #CCB3A5;
    font-size: 14px;
    margin-bottom: 32px;
}

.section-header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 24px;
    margin-top: 32px;
}

.section-icon {
    width: 24px;
    height: 24px;
    opacity: 0.8;
}

.section-header h2 {
    font-size: 18px;
    margin: 0;
    font-weight: normal;
}

.order-items {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.order-item {
    display: flex;
    align-items: flex-start;
    gap: 16px;
}

.item-image {
    width: 64px;
    height: 64px;
    border-radius: 8px;
    background: #FFFFFF;
    order: -1;
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
    font-size: 16px;
    margin-bottom: 8px;
}

.item-specs, .item-quantity {
    color: #CCB3A5;
    font-size: 14px;
    margin-bottom: 4px;
}

.item-price {
    font-size: 16px;
    font-weight: 500;
    margin-left: 16px;
    margin-right: 16px;
}

.address-details {
    color: #CCB3A5;
    font-size: 16px;
    line-height: 1.5;
}

.summary-details {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.summary-row {
    display: flex;
    justify-content: space-between;
    color: #CCB3A5;
    font-size: 16px;
}

.summary-row.total {
    color: #FFFFFF;
    font-weight: 500;
    font-size: 18px;
    margin-top: 8px;
    padding-top: 16px;
    border-top: 1px solid rgba(170, 139, 122, 0.2);
}

/* RTL specific styles */
.rtl {
    direction: rtl;
    font-family: 'TheSansArabic', sans-serif;
}

.rtl .order-id,
.rtl .status,
.rtl .order-date,
.rtl .section-header h2,
.rtl .item-name,
.rtl .item-specs,
.rtl .item-quantity,
.rtl .item-price,
.rtl .address-details,
.rtl .summary-row {
    font-family: 'TheSansArabic', sans-serif;
}

/* LTR specific styles */
.ltr {
    direction: ltr;
    font-family: 'Cairo', sans-serif;
}

.ltr .order-id,
.ltr .status,
.ltr .order-date,
.ltr .section-header h2,
.ltr .item-name,
.ltr .item-specs,
.ltr .item-quantity,
.ltr .item-price,
.ltr .address-details,
.ltr .summary-row {
    font-family: 'Cairo', sans-serif;
}

.sidebar-link {
    color: inherit;
    text-decoration: none;
    display: block;
    width: 100%;
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

.white-text {
    color: #FFFFFF;
}

.highlight-text {
    color: #CCB3A5;
}

.slash-text {
    color: #AA8B7A;
    margin: 0 4px;
}

.rtl .nav-link {
    font-family: 'TheSansArabic', sans-serif;
    justify-content: start;
    flex-direction: row-reverse;
}
.title-star {
    width: 24px;
    height: 24px;
    position: relative;
    top: -12px;
}
.ltr .nav-link {
    font-family: Philosopher, serif !important;
    justify-content: start;
    flex-direction: row-reverse;
}

.nav-link:hover {
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

    /* Adjust order details for mobile */
    .orders-navigation {
        top: -25px;
    }

    .nav-link {
        font-size: 16px;
        gap: 15px;
    }

    .arrow-icon {
        width: 80px;
        height: 12px;
    }

    .order-details {
        margin-top: 20px;
    }

    .status-header {
        margin-bottom: 12px;
    }

    .order-id {
        font-size: 16px;
    }

    .status {
        font-size: 14px;
    }

    .section-header {
        margin-top: 24px;
        margin-bottom: 16px;
    }

    .section-header h2 {
        font-size: 16px;
    }

    .section-icon {
        width: 20px;
        height: 20px;
    }

    .order-items {
        gap: 16px;
    }

    .item-image {
        width: 56px;
        height: 56px;
    }

    .item-name {
        font-size: 14px;
    }

    .item-specs,
    .item-quantity,
    .item-price {
        font-size: 12px;
    }

    .address-details {
        font-size: 14px;
    }

    .summary-row {
        font-size: 14px;
    }

    .summary-row.total {
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
        top: -10px;
    }

    /* Orders Navigation */
    .orders-navigation {
        top: -32px;
        padding: 12px 0;
    }

    .nav-link {
        font-size: 18px;
        gap: 20px;
    }

    .arrow-icon {
        width: 90px;
        height: 13px;
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

    /* Order Details Content */
    .order-details {
        margin-top: -5px;
    }

    .status-header {
        margin-bottom: 6px;
    }

    .order-id {
        font-size: 17px;
        gap: 6px;
    }

    .cart-icon {
        width: 18px;
        height: 18px;
    }

    .status {
        font-size: 15px;
    }

    .order-date {
        font-size: 13px;
        margin-bottom: 28px;
    }

    .section-header {
        gap: 10px;
        margin-bottom: 20px;
        margin-top: 28px;
    }

    .section-icon {
        width: 22px;
        height: 22px;
    }

    .section-header h2 {
        font-size: 17px;
    }

    .order-items {
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

    .item-details {
        flex: 1;
    }

    .item-name {
        font-size: 15px;
        margin-bottom: 6px;
    }

    .item-specs,
    .item-quantity {
        font-size: 13px;
        margin-bottom: 3px;
    }

    .item-price {
        font-size: 15px;
        margin-left: 14px;
        margin-right: 14px;
    }

    .address-details {
        font-size: 15px;
        line-height: 1.4;
    }

    .summary-details {
        gap: 14px;
    }

    .summary-row {
        font-size: 15px;
    }

    .summary-row.total {
        font-size: 17px;
        margin-top: 6px;
        padding-top: 14px;
    }

    /* Force hide mobile tabs in tablet view */
    .mobile-profile-tabs {
        display: none !important;
    }
}
</style>