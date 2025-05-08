<template>
    <div class="profile-page" :class="currentLang === 'en' ? 'ltr' : 'rtl'">
        <div class="profile-container">
            <!-- Title -->
            <h1 class="profile-title">
                {{ currentLang === 'en' ? 'Shopping Cart' : 'سلة التسوق' }}
                <img src="../../../../public/assets/img/star.png" class="title-star" alt="star" />
            </h1>

            <div class="cart-layout">
                <!-- Cart Items -->
                <div class="cart-items">
                    <!-- Cart Item -->
                    <div class="cart-item">
                        <div class="item-image">
                            <img src="../../../../public/assets/img/products/details/macaron-1.png" alt="Luxury Macaron Box" />
                        </div>
                        <div class="item-details">
                            <div class="item-header">
                                <h3>{{ currentLang === 'en' ? 'Luxury Macaron Box' : 'المكرون | مكس' }}</h3>
                                <div class="item-price">27.000 {{ currentLang === 'en' ? 'KD' : 'د.ك' }}</div>
                            </div>
                            <div class="controls-row">
                                <div class="quantity-controls">
                                    <button class="quantity-btn" @click="decrementQuantity(0)">-</button>
                                    <input type="text" v-model="cartItems[0].quantity" readonly />
                                    <button class="quantity-btn" @click="incrementQuantity(0)">+</button>
                                </div>
                                <button class="remove-btn" @click="removeItem(0)">{{ currentLang === 'en' ? 'Remove' : 'إزالة' }}</button>
                            </div>
                        </div>
                    </div>

                    <!-- Cart Item -->
                    <div class="cart-item">
                        <div class="item-image">
                            <img src="../../../../public/assets/img/products/details/diffuser-123.png" alt="Milagro Diffuser" />
                        </div>
                        <div class="item-details">
                            <div class="item-header">
                                <h3>{{ currentLang === 'en' ? 'Milagro Diffuser' : 'دفيوزر ميلاقرو' }}</h3>
                                <div class="item-price">13.000 {{ currentLang === 'en' ? 'KD' : 'د.ك' }}</div>
                            </div>
                            <div class="controls-row">
                                <div class="quantity-controls">
                                    <button class="quantity-btn" @click="decrementQuantity(1)">-</button>
                                    <input type="text" v-model="cartItems[1].quantity" readonly />
                                    <button class="quantity-btn" @click="incrementQuantity(1)">+</button>
                                </div>
                                <button class="remove-btn" @click="removeItem(1)">{{ currentLang === 'en' ? 'Remove' : 'إزالة' }}</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="order-summary">
                    <h2>{{ currentLang === 'en' ? 'Order Summary' : 'ملخص الطلب' }}</h2>
                    <div class="summary-row">
                        <span>{{ currentLang === 'en' ? 'Sub Total' : 'المجموع الفرعي' }}</span>
                        <span>40.000 {{ currentLang === 'en' ? 'KD' : 'د.ك' }}</span>
                    </div>
                    <div class="summary-row">
                        <span>{{ currentLang === 'en' ? 'Delivery' : 'التوصيل' }}</span>
                        <span>1.000 {{ currentLang === 'en' ? 'KD' : 'د.ك' }}</span>
                    </div>
                    <div class="promo-code">
                        <input type="text" :placeholder="currentLang === 'en' ? 'Promo Code' : 'كود الخصم'" />
                    </div>
                    <div class="summary-row total">
                        <span>{{ currentLang === 'en' ? 'Total' : 'الإجمالي' }}</span>
                        <span>41.000 {{ currentLang === 'en' ? 'KD' : 'د.ك' }}</span>
                    </div>
                    <button class="checkout-btn" @click="goToPayment">
                        {{ currentLang === 'en' ? 'CHECKOUT' : 'إتمام الشراء' }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Chart',
    data() {
        return {
            currentLang: localStorage.getItem('currentLang') || 'ar',
            cartItems: [
                { id: 1, quantity: 1 },
                { id: 2, quantity: 1 }
            ]
        }
    },
    methods: {
        incrementQuantity(index) {
            this.cartItems[index].quantity++;
        },
        decrementQuantity(index) {
            if (this.cartItems[index].quantity > 1) {
                this.cartItems[index].quantity--;
            }
        },
        removeItem(index) {
            this.cartItems.splice(index, 1);
        },
        goToPayment() {
            this.$router.push('/payment');
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
.title-star {
    width: 24px;
    height: 24px;
    position: relative;
    top: -14px;
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
    width: 137%;
}

.ltr .sidebar-item.active::after {
    content: "";
    position: absolute;
    bottom: -12px;
    left: -158px;
    right: 0;
    height: 2px;
    background: #AA8B7A;
    width: 158%;
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

/* Products Grid Styles */
.products-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
    padding: 20px 0;
}

.product-card {
    background: rgba(33, 42, 30, 0.95);
    border-radius: 8px;
    overflow: hidden;
    border: 1px solid rgba(170, 139, 122, 0.2);
    transition: transform 0.3s ease;
}

.product-card:hover {
    transform: translateY(-5px);
}

.product-image {
    position: relative;
    width: 100%;
    height: 250px;
    overflow: hidden;
}

.product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.favorite-btn {
    position: absolute;
    top: 12px;
    right: 12px;
    background: none;
    border: none;
    cursor: pointer;
    padding: 0;
    z-index: 2;
}

.favorite-btn img {
    width: 24px;
    height: 24px;
    opacity: 0.8;
}

.favorite-btn.active img {
    filter: none;
    opacity: 1;
}

/* RTL favorite button position */
.rtl .favorite-btn {
    right: auto;
    left: 12px;
}

.product-info {
    padding: 16px;
}

.product-info h3 {
    color: #FFFFFF;
    font-size: 18px;
    margin: 0;
    font-weight: normal;
    margin-bottom: 16px;
}

.info-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 16px;
}

.pieces {
    color: #CCB3A5;
    font-size: 14px;
    margin: 0;
}

.price {
    color: #FFFFFF;
    font-size: 16px;
    font-weight: 500;
}

.add-to-cart {
    width: 100%;
    background: #AA8B7A;
    color: #FFFFFF;
    border: none;
    border-radius: 4px;
    padding: 12px;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.add-to-cart:hover {
    background: #957865;
}

/* RTL specific styles for products */
.rtl .product-info {
    text-align: right;
}

.rtl .product-info h3,
.rtl .pieces,
.rtl .price,
.rtl .add-to-cart {
    font-family: 'TheSansArabic', sans-serif;
}

/* LTR specific styles for products */
.ltr .product-info {
    text-align: left;
}

.ltr .product-info h3 {
    font-family: 'Philosopher', serif;
}

.ltr .pieces,
.ltr .price,
.ltr .add-to-cart {
    font-family: 'Cairo', sans-serif;
}

@media (max-width: 1200px) {
    .products-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .products-grid {
        grid-template-columns: 1fr;
    }
}

.cart-layout {
    display: flex;
    gap: 30px;
    margin-top: -20px;
}

.cart-items {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.cart-item {
    display: flex;
    gap: 20px;
    background: #212A1E;
    
    border-radius: 8px;
    padding: 20px;
}

.item-image {
    width: 150px;
    height: 150px;
    border-radius: 8px;
    overflow: hidden;
}

.item-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.item-details {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 46px;
}

.item-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
}

.item-header h3 {
    color: #FFFFFF;
    font-size: 20px;
    margin: 0;
    flex: 1;
}

.item-price {
    color: #AA8B7A;
    font-size: 18px;
    white-space: nowrap;
}

.controls-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.quantity-controls {
    display: flex;
    align-items: center;
    gap: 10px;
}

.quantity-btn {
    width: 30px;
    height: 30px;
    background: transparent;
    border: 1px solid #AA8B7A;
    color: #AA8B7A;
    border-radius: 4px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
}

.quantity-controls input {
    width: 40px;
    height: 30px;
    background: transparent;
    border: 1px solid #AA8B7A;
    color: #FFFFFF;
    text-align: center;
    border-radius: 4px;
}

.remove-btn {
    background: none;
    border: none;
    color: #AA8B7A;
    cursor: pointer;
    padding: 0;
    font-size: 14px;
    text-decoration: underline;
}

/* Update RTL specific alignment */
.rtl .controls-row {
    flex-direction: row;
}

.order-summary {
    width: 400px;
    background: #212A1E;
    border: 1px solid rgba(170, 139, 122, 0.2);
    border-radius: 8px;
    padding: 30px 56px;
}

.order-summary h2 {
    color: #FFFFFF;
    font-size: 24px;
    margin: 0 0 20px 0;
}

.summary-row {
    display: flex;
    justify-content: space-between;
    color: #FFFFFF;
    margin-bottom: 15px;
}

.promo-code {
    margin: 20px 0;
}

.promo-code input {
    width: 92%;
    height: 40px;
    background: transparent;
    border: 1px solid #AA8B7A;
    border-radius: 4px;
    color: #FFFFFF;
    padding: 0 15px;
}

.total {
    border-top: 1px solid rgba(170, 139, 122, 0.2);
    padding-top: 15px;
    margin-top: 15px;
    font-weight: bold;
}

.checkout-btn {
    width: 100%;
    height: 48px;
    background: #AA8B7A;
    color: #FFFFFF;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    margin-top: 20px;
    transition: background-color 0.3s;
}

.checkout-btn:hover {
    background: #957865;
}

/* RTL Specific Styles */
.rtl .item-details,
.rtl .order-summary {
    text-align: right;
}

.rtl .remove-btn {
    align-self: flex-end;
}

.rtl .item-details h3,
.rtl .item-price,
.rtl .remove-btn,
.rtl .order-summary h2,
.rtl .summary-row,
.rtl .promo-code input,
.rtl .checkout-btn {
    font-family: 'TheSansArabic', sans-serif;
}

/* LTR Specific Styles */
.ltr .item-details,
.ltr .order-summary {
    text-align: left;
}

.ltr .item-details h3 {
    font-family: 'Philosopher', serif;
}

.ltr .item-price,
.ltr .remove-btn,
.ltr .summary-row,
.ltr .promo-code input,
.ltr .checkout-btn {
    font-family: 'Cairo', sans-serif;
}

.ltr .order-summary h2 {
    font-family: 'Philosopher', serif;
}

@media (max-width: 992px) {
    .cart-layout {
        flex-direction: column;
    }

    .order-summary {
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

@media (max-width: 480px) {
    .profile-page {
        padding: 20px 12px;
        min-height: calc(100vh - 100px);
    }

    .profile-title {
        font-size: 22px;
        top: 16px;
        margin-bottom: 47px;
    }

    .title-star {
        width: 16px;
        height: 16px;
        top: -8px;
    }

    .cart-layout {
        margin-top: 0;
        gap: 16px;
    }

    .cart-items {
        gap: 12px;
    }

    .cart-item {
        padding: 12px;
        gap: 12px;
        border: 1px solid rgba(170, 139, 122, 0.2);
        border-radius: 8px;
    }

    .item-image {
        width: 100px;
        height: 100px;
    }

    .item-details {
        gap: 16px;
    }

    .item-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
    }

    .item-header h3 {
        font-size: 16px;
        line-height: 1.2;
    }

    .item-price {
        font-size: 15px;
    }

    .controls-row {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
    }

    .quantity-controls {
        width: 100%;
        justify-content: flex-start;
    }

    .quantity-btn {
        width: 28px;
        height: 28px;
    }

    .quantity-controls input {
        width: 35px;
        height: 28px;
    }

    .remove-btn {
        font-size: 13px;
    }

    .order-summary {
        padding: 20px;
        border-radius: 8px;
        width: 90%;
    }

    .order-summary h2 {
        font-size: 18px;
        margin-bottom: 16px;
    }

    .summary-row {
        font-size: 14px;
        margin-bottom: 12px;
    }

    .promo-code {
        margin: 16px 0;
    }

    .promo-code input {
        width: 91%;
        height: 36px;
        font-size: 14px;
    }

    .total {
        padding-top: 12px;
        margin-top: 12px;
        font-size: 16px;
    }

    .checkout-btn {
        height: 42px;
        font-size: 15px;
        margin-top: 16px;
    }

    /* RTL Mobile Specific */
    .rtl .item-header,
    .rtl .controls-row {
        align-items: flex-end;
    }

    .rtl .quantity-controls {
        justify-content: flex-end;
    }

    /* LTR Mobile Specific */
    .ltr .item-header,
    .ltr .controls-row {
        align-items: flex-start;
    }

    .ltr .quantity-controls {
        justify-content: flex-start;
    }
}
</style>