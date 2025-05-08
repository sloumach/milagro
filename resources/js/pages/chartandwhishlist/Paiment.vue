<template>
    <div class="profile-page" :class="currentLang === 'en' ? 'ltr' : 'rtl'">
        <div class="profile-container">
            <!-- Title -->
            <h1 class="profile-title">
                {{ currentLang === 'en' ? 'Payment' : 'الدفع' }}
                <img src="../../../../public/assets/img/star.png" class="title-star" alt="star" />
            </h1>
            <div class="orders-navigation">
                <router-link to="/cart" class="nav-link">
                    <span v-if="currentLang === 'en'">
                        <span class="white-text">Shopping Cart</span> <span class="slash-text">/</span>
                        <span :class="{ 'highlight-text': currentStep === 1 }">Delivery</span> <span
                            class="slash-text">/</span>
                        <span :class="{ 'highlight-text': currentStep === 2 }">Payment</span>
                    </span>
                    <span v-else>
                        <span class="white-text">سلة التسوق</span> <span class="slash-text">/</span>
                        <span :class="{ 'highlight-text': currentStep === 1 }">التوصيل</span> <span
                            class="slash-text">/</span>
                        <span :class="{ 'highlight-text': currentStep === 2 }">الدفع</span>
                    </span>
                    <img src="../../../../public/assets/img/arrow-right.png" alt="Arrow" class="arrow-icon" />
                </router-link>
            </div>

            <div class="payment-layout">
                <!-- Left Side Content -->
                <div class="main-content">
                    <!-- Steps Indicator - Always Visible -->
                    <div class="steps-container">
                        <div class="step" :class="{ 'active': currentStep === 1 }">
                            <div class="step-label">{{ currentLang === 'en' ? 'Delivery' : 'التوصيل' }}</div>
                            <div class="step-number"><span>1</span></div>

                        </div>
                        <div class="step" :class="{ 'active': currentStep === 2 }">
                            <div class="step-label">{{ currentLang === 'en' ? 'Payment' : 'الدفع' }}</div>
                            <div class="step-number"><span>2</span></div>

                        </div>
                        <div class="step" :class="{ 'active': currentStep === 3 }">
                            <div class="step-label">{{ currentLang === 'en' ? 'Confirmation' : 'التأكيد' }}</div>
                            <div class="step-number"><span>3</span></div>

                        </div>
                        <div class="steps-line"></div>
                    </div>

                    <!-- Payment Method Selection -->
                    <div v-if="currentStep === 2" class="payment-method-container">
                        <h2>{{ currentLang === 'en' ? 'Payment method' : 'طريقة الدفع' }}</h2>
                        <p class="payment-subtitle">
                            {{ currentLang === 'en' ? 'Choose your preferred payment method.' : 'اختر طريقة الدفع المفضلة لديك' }}
                        </p>

                        <div class="payment-options">
                            <button class="payment-option apple-pay"
                                :class="{ 'selected': selectedPaymentMethod === 'apple-pay' }"
                                @click="selectPaymentMethod('apple-pay')">
                                <img src="../../../../public/assets/img/homeslider/apple-pay.png" alt="Apple Pay" />
                            </button>

                            <button class="payment-option k-net"
                                :class="{ 'selected': selectedPaymentMethod === 'k-net' }"
                                @click="selectPaymentMethod('k-net')">
                                K-Net
                            </button>

                            <button class="payment-option card"
                                :class="{ 'selected': selectedPaymentMethod === 'card' }"
                                @click="selectPaymentMethod('card')">
                                Visa/Mastercard
                            </button>
                        </div>

                        <button class="confirm-payment-btn" :disabled="!selectedPaymentMethod" @click="confirmPayment">
                            {{ currentLang === 'en' ? 'CONFIRM PAYMENT' : 'تأكيد الدفع' }}
                        </button>
                    </div>

                    <!-- Delivery Form -->
                    <div v-if="currentStep === 1" class="delivery-form">
                        <h2>{{ currentLang === 'en' ? 'Contact Information' : 'معلومات الاتصال' }}</h2>
                        <div class="form-row">
                            <div class="form-group">
                                <input type="text" :placeholder="currentLang === 'en' ? 'First name' : 'الاسم الأول'"
                                    v-model="formData.firstName" />
                            </div>
                            <div class="form-group">
                                <input type="text" :placeholder="currentLang === 'en' ? 'Last name' : 'الاسم الأخير'"
                                    v-model="formData.lastName" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <input type="email"
                                    :placeholder="currentLang === 'en' ? 'Email address' : 'البريد الإلكتروني'"
                                    v-model="formData.email" />
                            </div>
                            <div class="form-group phone-group">
                                <div class="phone-prefix">+965</div>
                                <input type="tel" :placeholder="currentLang === 'en' ? 'Phone number' : 'رقم الهاتف'"
                                    v-model="formData.phone" />
                            </div>
                        </div>

                        <h2 class="section-title">{{ currentLang === 'en' ? 'Delivery Information' : 'معلومات التوصيل' }}</h2>
                        <div class="form-row location-row">
                            <div class="form-group">
                                <select v-model="formData.governorate">
                                    <option value="" disabled selected>{{ currentLang === 'en' ? 'Governorate' : 'المحافظة' }}</option>
                                    <option v-for="gov in governorates" :key="gov.en" :value="gov.en">
                                        {{ currentLang === 'en' ? gov.en : gov.ar }}
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select v-model="formData.area">
                                    <option value="" disabled selected>{{ currentLang === 'en' ? 'Area' : 'المنطقة' }}</option>
                                    <option v-for="area in availableAreas" :key="area.en" :value="area.en">
                                        {{ currentLang === 'en' ? area.en : area.ar }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row address-row">
                            <div class="form-group">
                                <input type="text" :placeholder="currentLang === 'en' ? 'Block' : 'القطعة'"
                                    v-model="formData.block" />
                            </div>
                            <div class="form-group">
                                <input type="text" :placeholder="currentLang === 'en' ? 'St. Name' : 'اسم الشارع'"
                                    v-model="formData.street" />
                            </div>
                        </div>
                        <div class="form-row building-row">
                            <div class="form-group">
                                <input type="text"
                                    :placeholder="currentLang === 'en' ? 'Building Number' : 'رقم المبنى'"
                                    v-model="formData.building" />
                            </div>
                            <div class="form-group">
                                <input type="text"
                                    :placeholder="currentLang === 'en' ? 'Special Directions' : 'إرشادات خاصة'"
                                    v-model="formData.directions" />
                            </div>
                        </div>
                        <div class="form-row delivery-row">
                            <div class="form-group date-group">
                                <input type="text"
                                    :placeholder="currentLang === 'en' ? 'Delivery Date' : 'تاريخ التوصيل'"
                                    v-model="formData.deliveryDateDisplay" readonly
                                    @click="showCalendar = !showCalendar" />
                                <!-- Custom Calendar -->
                                <div v-if="showCalendar" class="custom-calendar">
                                    <div class="calendar-days-header">
                                        <span v-for="day in weekDays" :key="day">{{ day }}</span>
                                    </div>
                                    <div class="calendar-grid">
                                        <div v-for="date in calendarDates" :key="date.day" class="calendar-day" :class="{
                                            'disabled': date.disabled,
                                            'selected': isSelectedDate(date.fullDate),
                                            'today': isToday(date.fullDate)
                                        }" @click="!date.disabled && selectDate(date.fullDate)">
                                            {{ date.day }}
                                        </div>
                                    </div>
                                </div>
                                <input type="date" v-model="formData.deliveryDate" class="hidden-date-input" />
                            </div>
                            <div class="form-group">
                                <select v-model="formData.deliveryTime">
                                    <option value="" disabled selected>{{ currentLang === 'en' ? 'Delivery Time' : 'وقت التوصيل' }}</option>
                                    <option value="morning">{{ currentLang === 'en' ? 'Morning (9 AM - 1 PM)' :'صباحاً(9 ص - 1 م)' }}</option>
                                    <option value="evening">{{ currentLang === 'en' ? 'Evening (4 PM - 8 PM)' : 'مساءً(4 م - 8 م)' }}</option>

                                </select>
                            </div>
                        </div>
                        <button class="proceed-btn" @click="proceedToPayment">
                            {{ currentLang === 'en' ? 'PROCEED TO PAYMENT' : 'المتابعة إلى الدفع' }}
                        </button>
                    </div>

                    <!-- Confirmation/Thank You Page -->
                    <div v-if="currentStep === 3" class="confirmation-container">
                        <div class="thank-you-content">
                            <img src="../../../../public/assets/img/star.png" class="thank-you-star" alt="star" />
                            <h2>{{ currentLang === 'en' ? 'Thank you for your order!' : 'شكرًا لطلبك!' }}</h2>
                            <p class="confirmation-message">
                                {{ currentLang === 'en'
                                    ? 'We have sent you an email'
                                    : 'لقد أرسلنا لك بريدا إلكترونيا بشأن'
                                }}
                                <br>
                                {{ currentLang === 'en'
                                    ? 'regarding your order #198203'
                                    : 'طلبك رقم CTH-198203#'
                                }}
                            </p>
                            <router-link to="/" class="home-button">
                                {{ currentLang === 'en' ? 'Home Page' : 'الصفحة الرئيسية' }}
                            </router-link>
                        </div>
                    </div>
                </div>

                <!-- Order Summary - Always Visible -->
                <div class="order-summary">
                    <h2>{{ currentLang === 'en' ? 'Your Order' : 'طلبك' }}</h2>

                    <!-- Order Items -->
                    <div class="order-items">
                        <div class="order-item">
                            <img src="../../../../public/assets/img/products/details/macaron-1.png" alt="Macaron"
                                class="item-thumbnail" />
                            <div class="item-info">
                                <h3>{{ currentLang === 'en' ? 'Macaron | Mix' : 'الماكرون | مكس' }}</h3>
                                <p class="item-quantity">38 {{ currentLang === 'en' ? 'pcs' : 'حبة' }}</p>
                                <p class="item-quantity">{{ currentLang === 'en' ? 'Quantity: ' : 'الكمية: ' }}1</p>
                                <p class="item-price">27 {{ currentLang === 'en' ? 'KD' : 'د.ك' }}</p>
                            </div>
                        </div>

                        <div class="order-item">
                            <img src="../../../../public/assets/img/products/details/diffuser-123.png" alt="Diffuser"
                                class="item-thumbnail" />
                            <div class="item-info">
                                <h3>{{ currentLang === 'en' ? 'Milagro Diffuser' : 'دفيوزر ميلاقرو' }}</h3>
                                <p class="item-quantity">38 {{ currentLang === 'en' ? 'pcs' : 'حبة' }}</p>
                                <p class="item-quantity">{{ currentLang === 'en' ? 'Quantity: ' : 'الكمية: ' }}1</p>
                                <p class="item-price">13 {{ currentLang === 'en' ? 'KD' : 'د.ك' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="order-total">
                        <p>{{ currentLang === 'en' ? 'Total: ' : 'الإجمالي: ' }}41 {{ currentLang === 'en' ? 'KD' :
                            'د.ك' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Payment',
    data() {
        return {
            currentLang: localStorage.getItem('currentLang') || 'ar',
            showCalendar: false,
            currentMonth: new Date(),
            cartItems: [
                {
                    id: 1,
                    name: 'Luxury Macaron Box',
                    image: '../../../../public/assets/img/macaron.jpg',
                    pieces: '35 pcs',
                    quantity: 1,
                    price: '27.000'
                },
                {
                    id: 2,
                    name: 'Milagro Diffuser',
                    image: '../../../../public/assets/img/diffuser.jpg',
                    pieces: '30 pcs',
                    quantity: 1,
                    price: '13.000'
                }
            ],
            governorates: [
                { en: 'Al Ahmadi', ar: 'الأحمدي' },
                { en: 'Al Farwaniyah', ar: 'الفروانية' },
                { en: 'Al Jahra', ar: 'الجهراء' },
                { en: 'Capital', ar: 'العاصمة' },
                { en: 'Hawalli', ar: 'حولي' },
                { en: 'Mubarak Al-Kabeer', ar: 'مبارك الكبير' }
            ],
            areas: {
                'Al Ahmadi': [
                    { en: 'Mangaf', ar: 'المنقف' },
                    { en: 'Fahaheel', ar: 'الفحيحيل' },
                    { en: 'Abu Halifa', ar: 'أبو حليفة' },
                    { en: 'Mahboula', ar: 'المهبولة' }
                ],
                'Al Farwaniyah': [
                    { en: 'Farwaniya', ar: 'الفروانية' },
                    { en: 'Khaitan', ar: 'خيطان' },
                    { en: 'Abbasiya', ar: 'العباسية' },
                    { en: 'Jleeb Al-Shuyoukh', ar: 'جليب الشيوخ' }
                ],
                'Al Jahra': [
                    { en: 'Jahra', ar: 'الجهراء' },
                    { en: 'Taima', ar: 'تيماء' },
                    { en: 'Sulaibiya', ar: 'الصليبية' },
                    { en: 'Qasr', ar: 'القصر' }
                ],
                'Capital': [
                    { en: 'Kuwait City', ar: 'مدينة الكويت' },
                    { en: 'Dasma', ar: 'الدسمة' },
                    { en: 'Daiya', ar: 'الدعية' },
                    { en: 'Sharq', ar: 'شرق' }
                ],
                'Hawalli': [
                    { en: 'Salmiya', ar: 'السالمية' },
                    { en: 'Hawalli', ar: 'حولي' },
                    { en: 'Jabriya', ar: 'الجابرية' },
                    { en: 'Salwa', ar: 'سلوى' }
                ],
                'Mubarak Al-Kabeer': [
                    { en: 'Sabah Al-Salem', ar: 'صباح السالم' },
                    { en: 'Qurain', ar: 'القرين' },
                    { en: 'Mubarak Al-Kabeer', ar: 'مبارك الكبير' },
                    { en: 'Abu Fatira', ar: 'أبو فطيرة' }
                ]
            },
            formData: {
                firstName: '',
                lastName: '',
                email: '',
                phone: '',
                governorate: '',
                area: '',
                block: '',
                street: '',
                building: '',
                directions: '',
                deliveryDate: '',
                deliveryDateDisplay: '',
                deliveryTime: ''
            },
            currentStep: 1,
            selectedPaymentMethod: null,
        }
    },
    computed: {
        availableAreas() {
            return this.formData.governorate ? this.areas[this.formData.governorate] : []
        },
        subtotal() {
            return this.cartItems.reduce((sum, item) => {
                return sum + (parseFloat(item.price) * item.quantity)
            }, 0).toFixed(3)
        },
        deliveryFee() {
            return '1.000'
        },
        total() {
            return (parseFloat(this.subtotal) + parseFloat(this.deliveryFee)).toFixed(3)
        },
        weekDays() {
            return this.currentLang === 'en'
                ? ['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT']
                : ['أحد', 'إثن', 'ثلا', 'أرب', 'خمي', 'جمع', 'سبت']
        },
        calendarDates() {
            const dates = []
            const firstDay = new Date(this.currentMonth.getFullYear(), this.currentMonth.getMonth(), 1)
            const lastDay = new Date(this.currentMonth.getFullYear(), this.currentMonth.getMonth() + 1, 0)

            // Add empty spaces for days before first day of month
            for (let i = 0; i < firstDay.getDay(); i++) {
                dates.push({ day: '', disabled: true })
            }

            // Add all days of the month
            for (let i = 1; i <= lastDay.getDate(); i++) {
                const date = new Date(this.currentMonth.getFullYear(), this.currentMonth.getMonth(), i)
                dates.push({
                    day: i,
                    fullDate: date,
                    disabled: date < new Date() // Disable past dates
                })
            }

            return dates
        }
    },
    watch: {
        'formData.deliveryDate'(newDate) {
            if (newDate) {
                const date = new Date(newDate);
                this.formData.deliveryDateDisplay = this.formatDate(date);
            } else {
                this.formData.deliveryDateDisplay = '';
            }
        }
    },
    methods: {
        formatDate(date) {
            if (this.currentLang === 'en') {
                const options = { year: 'numeric', month: 'long', day: 'numeric' };
                return date.toLocaleDateString('en-US', options);
            } else {
                const options = { year: 'numeric', month: 'long', day: 'numeric' };
                return date.toLocaleDateString('ar-KW', options);
            }
        },
        proceedToPayment() {
            this.currentStep = 2
            window.scrollTo(0, 0)
        },
        validateForm() {
            // Basic validation
            const required = [
                'firstName',
                'lastName',
                'email',
                'phone',
                'governorate',
                'area',
                'block',
                'street',
                'building',
                'deliveryDate',
                'deliveryTime'
            ]

            for (const field of required) {
                if (!this.formData[field]) {
                    alert(this.currentLang === 'en'
                        ? `Please fill in the ${field.replace(/([A-Z])/g, ' $1').toLowerCase()}`
                        : `الرجاء تعبئة ${this.getArabicFieldName(field)}`)
                    return false
                }
            }

            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
            if (!emailRegex.test(this.formData.email)) {
                alert(this.currentLang === 'en'
                    ? 'Please enter a valid email address'
                    : 'الرجاء إدخال بريد إلكتروني صحيح')
                return false
            }

            // Phone validation (Kuwait number format)
            const phoneRegex = /^[569]\d{7}$/
            if (!phoneRegex.test(this.formData.phone)) {
                alert(this.currentLang === 'en'
                    ? 'Please enter a valid Kuwait phone number'
                    : 'الرجاء إدخال رقم هاتف كويتي صحيح')
                return false
            }

            return true
        },
        getArabicFieldName(field) {
            const arabicFields = {
                firstName: 'الاسم الأول',
                lastName: 'اسم العائلة',
                email: 'البريد الإلكتروني',
                phone: 'رقم الهاتف',
                governorate: 'المحافظة',
                area: 'المنطقة',
                block: 'القطعة',
                street: 'الشارع',
                building: 'رقم المبنى',
                directions: 'الإرشادات الخاصة',
                deliveryDate: 'تاريخ التوصيل',
                deliveryTime: 'وقت التوصيل'
            }
            return arabicFields[field]
        },
        isSelectedDate(date) {
            if (!date || !this.formData.deliveryDate) return false
            return date.toDateString() === new Date(this.formData.deliveryDate).toDateString()
        },
        isToday(date) {
            if (!date) return false
            return date.toDateString() === new Date().toDateString()
        },
        selectDate(date) {
            if (date) {
                this.formData.deliveryDate = date.toISOString().split('T')[0]
                const options = { year: 'numeric', month: 'long', day: 'numeric' }
                this.formData.deliveryDateDisplay = date.toLocaleDateString(
                    this.currentLang === 'en' ? 'en-US' : 'ar-KW',
                    options
                )
            }
            this.showCalendar = false
        },
        selectPaymentMethod(method) {
            this.selectedPaymentMethod = method
        },
        confirmPayment() {
            if (this.selectedPaymentMethod) {
                // Handle payment confirmation
                console.log('Payment confirmed with:', this.selectedPaymentMethod)
                this.currentStep = 3
            }
        }
    },
    created() {
        this.$root.$on('languageChanged', (lang) => {
            this.currentLang = lang
        })
    },
    beforeDestroy() {
        this.$root.$off('languageChanged')
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
    border-radius: 8px;
    padding: 30px;
}

.order-summary h2 {
    color: #FFFFFF;
    font-size: 24px;
    margin-bottom: 30px;
}

.order-items {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.order-item {
    display: flex;
    gap: 20px;
    padding-bottom: 20px;
    border-bottom: 1px solid rgba(170, 139, 122, 0.2);
}

.item-thumbnail {
    width: 100px;
    height: 100px;
    border-radius: 8px;
    object-fit: cover;
}

.item-info {
    flex: 1;
}

.item-info h3 {
    color: #FFFFFF;
    font-size: 18px;
    margin: 0 0 8px 0;
}

.item-quantity {
    color: #AA8B7A;
    font-size: 14px;
    margin: 4px 0;
}

.item-price {
    color: #FFFFFF;
    font-size: 16px;
    margin: 8px 0 0 0;
}

.order-total {
    padding-top: 20px;
}

.order-total p {
    color: #FFFFFF;
    font-size: 18px;
    text-align: right;
    margin: 0;
}

/* RTL Specific Styles */
.rtl .order-summary h2,
.rtl .item-info h3,
.rtl .item-quantity,
.rtl .item-price {
    font-family: 'TheSansArabic', sans-serif;
    text-align: right;
}

.rtl .order-total p {
    text-align: left;
}

/* LTR Specific Styles */
.ltr .order-summary h2 {
    font-family: 'Philosopher', serif;
}

.ltr .item-info h3,
.ltr .item-quantity,
.ltr .item-price {
    font-family: 'Cairo', sans-serif;
    text-align: left;
}

.ltr .order-total p {
    text-align: right;
    font-family: 'Cairo', sans-serif;
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

/* Payment Page Specific Styles */
.payment-layout {
    display: flex;
    gap: 60px;
    margin-top: 20px;
}

.main-content {
    flex: 1;
}

.payment-method-container {
    background: #212A1E;
    border-radius: 8px;
    padding: 40px;
}

.payment-method-container h2 {
    color: #FFFFFF;
    font-size: 32px;
    margin-bottom: 10px;
}

.rtl .payment-method-container h2 {
    font-family: 'TheSansArabic', sans-serif;
}

.ltr .payment-method-container h2 {
    font-family: 'Philosopher', serif;
}

.payment-subtitle {
    color: #AA8B7A;
    font-size: 18px;
    margin-bottom: 40px;
}

.payment-options {
    display: flex;
    flex-direction: column;
    gap: 15px;
    margin-bottom: 30px;
}

.payment-option {
    width: 100%;
    height: 60px;
    background: transparent;
    border: 1px solid #AA8B7A;
    border-radius: 4px;
    color: #FFFFFF;
    font-size: 18px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.payment-option:hover {
    background: rgba(170, 139, 122, 0.1);
}

.payment-option.selected {
    background: #212A1E;
    border-color: #FFFFFF;
}

.payment-option.apple-pay {
    background: #000000;
    border: none;
}

.payment-option.apple-pay img {
    height: 30px;
    object-fit: contain;
}

.confirm-payment-btn {
    width: 100%;
    height: 48px;
    background: #AA8B7A;
    color: #FFFFFF;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
    margin-top: 20px;
}

.confirm-payment-btn:hover {
    background: #957865;
}

.confirm-payment-btn:disabled {
    background: rgba(170, 139, 122, 0.5);
    cursor: not-allowed;
}

.rtl .confirm-payment-btn {
    font-family: 'TheSansArabic', sans-serif;
}

.ltr .confirm-payment-btn {
    font-family: 'Cairo', sans-serif;
}

.delivery-form {
    flex: 1;
    background: #212A1E;
    border-radius: 8px;
    padding: 40px;
    max-width: 800px;
}

.rtl .delivery-form h2 {
    font-family: 'TheSansArabic', sans-serif;
    text-align: right;
}

.delivery-form h2 {
    color: #FFFFFF;
    font-size: 24px;
    margin: 0 0 30px 0;
}

.ltr .delivery-form h2 {
    font-family: 'Philosopher', serif;
    text-align: left;
}

.section-title {
    color: #FFFFFF;
    font-size: 24px;
    margin: 40px 0 30px 0;
}

.form-row {
    display: flex;
    gap: 20px;
    margin-bottom: 20px;
    width: 100%;
}

.form-group {
    flex: 1;
    position: relative;
    width: 100%;
    margin-bottom: 20px;
}

.form-group:last-child {
    margin-bottom: 0;
}

.form-row .form-group {
    margin-bottom: 0;
}

.form-group input,
.form-group select {
    width: 100%;
    height: 48px;
    background: transparent;
    border: 1px solid #AA8B7A;
    border-radius: 4px;
    padding: 0 15px;
    color: #FFFFFF;
    font-size: 16px;
    box-sizing: border-box;
}

.rtl .form-group input,
.rtl .form-group select {
    font-family: 'TheSansArabic', sans-serif;
    text-align: right;
}

.ltr .form-group input,
.ltr .form-group select {
    font-family: 'Cairo', sans-serif;
    text-align: left;
}

.form-group select {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    width: 100%;
    height: 48px;
    background: transparent;
    border: 1px solid #AA8B7A;
    border-radius: 4px;
    padding: 0 15px;
    color: #AA8B7A;
    font-size: 16px;
    cursor: pointer;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%23AA8B7A' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: center right 15px;
}

.rtl .form-group select {
    background-position: center left 15px;
    padding-right: 15px;
    padding-left: 40px;
    text-align: right;
    font-family: 'TheSansArabic', sans-serif;
}

.ltr .form-group select {
    padding-right: 40px;
    padding-left: 15px;
    text-align: left;
    font-family: 'Cairo', sans-serif;
}

.form-group select option {
    background: #212A1E;
    color: #FFFFFF;
    padding: 10px;
    font-size: 16px;
}

.rtl .form-group select option {
    direction: rtl;
    text-align: right;
}

.ltr .form-group select option {
    direction: ltr;
    text-align: left;
}

/* Style for the select when opened */
.form-group select:focus {
    outline: none;
    border-color: #AA8B7A;
}

/* Style for the select options container */
.form-group select::-webkit-listbox {
    background-color: #212A1E;
    border: 1px solid #AA8B7A;
    border-radius: 4px;
}

/* Style for option hover state */
.form-group select option:hover,
.form-group select option:focus,
.form-group select option:active,
.form-group select option:checked {
    background: #2c3828;
}

/* Style for the placeholder option */
.form-group select option[value=""] {
    color: #AA8B7A;
}

/* Remove default arrow in IE */
.form-group select::-ms-expand {
    display: none;
}

.phone-group {
    display: flex;
    align-items: stretch;
    position: relative;
    width: 100%;
}

.phone-prefix {
    display: flex;
    align-items: center;
    justify-content: center;
    background: transparent;
    border: 1px solid #AA8B7A;
    border-right: none;
    border-radius: 4px 0 0 4px;
    color: #AA8B7A;
    padding: 0 15px;
    font-size: 16px;
    min-width: 60px;
    font-family: 'Cairo', sans-serif;
}

.rtl .phone-prefix {
    border-left: 1px solid #AA8B7A;
    border-radius: 0 4px 4px 0;
    border-right: 1px solid #AA8B7A;

}

.ltr .phone-prefix {
    border-left: 1px solid #AA8B7A;
    border-radius: 4px 0 0 4px;
    border-right: 1px solid #AA8B7A;

}

.phone-group input {
    border-left: none;
    border-radius: 0 4px 4px 0;
    padding-left: 15px;
}

.rtl .phone-group input {
    border-right: none;
    border-left: 1px solid #AA8B7A;
    border-radius: 4px 0 0 4px;
    padding-right: 15px;
}

.form-group input::placeholder {
    color: rgba(170, 139, 122, 0.5);
}

.form-group input:focus,
.form-group select:focus {
    outline: none;
    border-color: #FFFFFF;
}

/* RTL Specific Form Styles */
.rtl .form-group select {
    background-position: left 15px center;
    padding-right: 15px;
    padding-left: 40px;
}

.rtl .phone-prefix {
    left: auto;
    right: 15px;
}

.rtl .phone-group input {
    padding-left: 15px;
    padding-right: 60px;
}

.proceed-btn {
    width: 100%;
    height: 48px;
    background: #AA8B7A;
    color: #FFFFFF;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    margin-top: 30px;
    transition: background-color 0.3s;
}

.rtl .proceed-btn {
    font-family: 'TheSansArabic', sans-serif;
}

.ltr .proceed-btn {
    font-family: 'Cairo', sans-serif;
}

.proceed-btn:hover {
    background: #957865;
}

/* Order Summary Styles */
.order-summary {
    width: 400px;
    background: #212A1E;
    border-radius: 8px;
    padding: 30px;
}

/* Responsive Styles */
@media (max-width: 992px) {
    .payment-layout {
        flex-direction: column;
    }

    .form-row {
        flex-direction: column;
        gap: 15px;
    }

    .delivery-form {
        padding: 20px;
    }

    .order-summary {
        width: 100%;
    }
}

.form-group.date-group {
    position: relative;
    cursor: pointer;
}

.form-group.date-group::before {
    content: '';
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 20px;
    height: 20px;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='%23AA8B7A' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Crect x='3' y='4' width='18' height='18' rx='2' ry='2'%3E%3C/rect%3E%3Cline x1='16' y1='2' x2='16' y2='6'%3E%3C/line%3E%3Cline x1='8' y1='2' x2='8' y2='6'%3E%3C/line%3E%3Cline x1='3' y1='10' x2='21' y2='10'%3E%3C/line%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: center;
    pointer-events: none;
}

.ltr .form-group.date-group::before {
    left: 15px;
}

.rtl .form-group.date-group::before {
    right: 15px;
}

.form-group.date-group input[type="text"] {
    cursor: pointer;
    color: #AA8B7A;
}

.form-group.date-group input[type="text"]:not(:placeholder-shown) {
    color: #FFFFFF;
}

.form-group.date-group input[type="text"] {
    padding-left: 45px;
    color: #AA8B7A;
}

.rtl .form-group.date-group input[type="text"] {
    padding-left: 15px;
    padding-right: 45px;
}

/* Hide default calendar icon */
.form-group input[type="date"]::-webkit-calendar-picker-indicator {
    opacity: 0;
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    cursor: pointer;
}

/* Style for date placeholder */
.form-group input[type="date"]::-webkit-datetime-edit-text,
.form-group input[type="date"]::-webkit-datetime-edit-month-field,
.form-group input[type="date"]::-webkit-datetime-edit-day-field,
.form-group input[type="date"]::-webkit-datetime-edit-year-field {
    color: #AA8B7A;
}

.form-group input[type="date"]:valid::-webkit-datetime-edit-text,
.form-group input[type="date"]:valid::-webkit-datetime-edit-month-field,
.form-group input[type="date"]:valid::-webkit-datetime-edit-day-field,
.form-group input[type="date"]:valid::-webkit-datetime-edit-year-field {
    color: #FFFFFF;
}

.hidden-date-input {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    white-space: nowrap;
    border: 0;
}

.steps-container {
    position: relative;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: -48px;
    padding: 20px;
    background: #212A1E;
    border-radius: 8px;
}

.step {
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    z-index: 2;
    gap: 5px;
}

.step-number {
    width: 40px;
    height: 40px;
    transform: rotate(45deg);
    background-color: #FFFFFF;
    border: 2px solid rgba(170, 139, 122, .2);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    color: #212A1E;
}

.step-number span {
    transform: rotate(-45deg);
}

.step.active .step-number {
    background-color: #AA8B7A;
    color: #212A1E;
    border-color: #AA8B7A;
}

.step-label {
    color: #AA8B7A;
    font-size: 14px;
    margin-bottom: 14px;
}

.ltr .steps-line {
    top: 86px;
}

.steps-line {
    position: absolute;
    top: 78px;
    left: 50px;
    right: 50px;
    height: 2px;
    background-color: #AA8B7A;
    opacity: 1.2;
    z-index: 1;
}

/* RTL Support for Steps */
.rtl .step-label {
    font-family: 'TheSansArabic', sans-serif;
}

.ltr .step-label {
    font-family: 'Cairo', sans-serif;
}

/* Update margins for content containers */
.payment-method-container,
.delivery-form {
    margin-top: 20px;
}

.custom-calendar {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: #212A1E;
    border: 1px solid #AA8B7A;
    border-radius: 8px;
    padding: 20px;
    margin-top: 5px;
    z-index: 1000;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.calendar-header {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 1px solid rgba(170, 139, 122, 0.2);
}

.calendar-icon {
    width: 24px;
    height: 24px;
    margin-right: 10px;
}

.calendar-icon img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.calendar-title {
    color: #AA8B7A;
    font-size: 16px;
}

.calendar-days-header {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    text-align: center;
    margin-bottom: 10px;
}

.calendar-days-header span {
    color: #AA8B7A;
    font-size: 12px;
    padding: 5px;
}

.calendar-grid {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 5px;
}

.calendar-day {
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #FFFFFF;
    font-size: 14px;
    cursor: pointer;
    border-radius: 4px;
    transition: background-color 0.2s;
}

.calendar-day:hover:not(.disabled) {
    background: rgba(170, 139, 122, 0.2);
}

.calendar-day.disabled {
    color: rgba(255, 255, 255, 0.3);
    cursor: not-allowed;
}

.calendar-day.selected {
    background: #AA8B7A;
    color: #FFFFFF;
}

.calendar-day.today {
    border: 1px solid #AA8B7A;
}

/* RTL Support */
.rtl .calendar-header {
    flex-direction: row-reverse;
}

.rtl .calendar-icon {
    margin-right: 0;
    margin-left: 10px;
}

.rtl .calendar-title {
    font-family: 'TheSansArabic', sans-serif;
}

.ltr .calendar-title {
    font-family: 'Cairo', sans-serif;
}

/* Hide default calendar input */
.hidden-date-input {
    display: none;
}

.payment-method-container {
    max-width: none;
    margin: 0;
    padding: 40px;
}

.payment-method-container h2 {
    color: #FFFFFF;
    font-size: 32px;
    margin-bottom: 10px;
}

.rtl .payment-method-container h2 {
    font-family: 'TheSansArabic', sans-serif;
}

.ltr .payment-method-container h2 {
    font-family: 'Philosopher', serif;
}

.payment-subtitle {
    color: #AA8B7A;
    font-size: 18px;
    margin-bottom: 40px;
}

.payment-options {
    display: flex;
    flex-direction: column;
    gap: 15px;
    margin-bottom: 30px;
}

.payment-option {
    width: 100%;
    height: 60px;
    background: transparent;
    border: 1px solid #AA8B7A;
    border-radius: 4px;
    color: #FFFFFF;
    font-size: 18px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.payment-option:hover {
    background: rgba(170, 139, 122, 0.1);
}

.payment-option.selected {
    background: #212A1E;
    border-color: #FFFFFF;
}

.payment-option.apple-pay {
    background: #000000;
    border: none;
}

.payment-option.apple-pay img {
    height: 30px;
    object-fit: contain;
}

.confirm-payment-btn {
    width: 100%;
    height: 48px;
    background: #AA8B7A;
    color: #FFFFFF;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
    margin-top: 20px;
}

.confirm-payment-btn:hover {
    background: #957865;
}

.confirm-payment-btn:disabled {
    background: rgba(170, 139, 122, 0.5);
    cursor: not-allowed;
}

.rtl .confirm-payment-btn {
    font-family: 'TheSansArabic', sans-serif;
}

.ltr .confirm-payment-btn {
    font-family: 'Cairo', sans-serif;
}

.confirmation-container {
    background: #212A1E;
    border-radius: 8px;
    padding: 40px;
    margin-top: 20px;
}

.thank-you-content {
    text-align: center;
    padding: 60px 20px;
}

.thank-you-star {
    width: 24px;
    height: 24px;
    margin-bottom: 20px;
}

.thank-you-content h2 {
    color: #AA8B7A;
    font-size: 42px;
    margin-bottom: 20px;
}

.rtl .thank-you-content h2 {
    font-family: 'TheSansArabic', sans-serif;
}

.ltr .thank-you-content h2 {
    font-family: 'Philosopher', serif;
}

.confirmation-message {
    color: #FFFFFF;
    font-size: 18px;
    line-height: 1.6;
    margin-bottom: 40px;
}

.rtl .confirmation-message {
    font-family: 'TheSansArabic', sans-serif;
}

.ltr .confirmation-message {
    font-family: 'Cairo', sans-serif;
}

.home-button {
    display: inline-block;
    background: #AA8B7A;
    color: #FFFFFF;
    padding: 12px 40px;
    border-radius: 4px;
    text-decoration: none;
    font-size: 16px;
    transition: background-color 0.3s;
}

.home-button:hover {
    background: #957865;
}

.rtl .home-button {
    font-family: 'TheSansArabic', sans-serif;
}

.ltr .home-button {
    font-family: 'Cairo', sans-serif;
}

@media (max-width: 480px) {
    .arrow-icon {
        width: 63px;
        height: 12px;
    }
    .nav-link {
        font-size: 16px
    }
    .title-star {
    width: 14px;
    height: 14px;
    }
    .profile-title {
     font-size: 30px;
    }
    .payment-layout {
        margin-top: 1px;
    }
    .step-label {
    color: #FFFFFF;
    font-size: 14px;
    }
    .delivery-form {
        margin-top: 45px;
        padding: 20px;
    }
    .delivery-form h2 {
        color: #fff;
        font-size: 24px;
        font-weight: 400;
    }

    /* Keep form-row items in the same line for specific fields */
    .form-row {
        flex-direction: column;
        gap: 15px;
        margin-bottom: 15px;
    }

    /* Special handling for specific form rows that should stay horizontal */
    .form-row.location-row,
    .form-row.address-row,
    .form-row.building-row,
    .form-row.delivery-row {
        flex-direction: row;
        gap: 10px;
    }

    .form-row.location-row .form-group,
    .form-row.address-row .form-group,
    .form-row.building-row .form-group,
    .form-row.delivery-row .form-group {
        width: 50%;
        margin-bottom: 0;
    }

    /* Style select boxes */
    .form-group select {
        width: 100%;
        height: 42px;
        font-size: 14px;
        padding: 0 12px;
        background-position: right 8px center;
    }

    .rtl .form-group select {
        background-position: left 8px center;
        padding-right: 12px;
        padding-left: 30px;
    }

    /* Adjust input fields */
    .form-group input {
        height: 42px;
        font-size: 14px;
        padding: 0 12px;
    }

    /* Phone group adjustments */
    .phone-group {
        height: 42px;
    }

    .phone-prefix {
        height: 42px;
        font-size: 14px;
        padding: 0 10px;
    }

    /* Date and time inputs */
    .date-group input,
    .form-group select[v-model="formData.deliveryTime"] {
        height: 42px;
        font-size: 14px;
    }

    /* Proceed button */
    .proceed-btn {
        height: 42px;
        font-size: 15px;
        margin-top: 25px;
    }

    /* Calendar adjustments */
    .custom-calendar {
        padding: 15px;
    }

    .calendar-days-header span {
        font-size: 11px;
    }

    .calendar-day {
        height: 25px;
        font-size: 13px;
    }

    .order-summary {
        padding: 0;
    }
}
</style>