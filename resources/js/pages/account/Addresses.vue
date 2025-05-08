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
                    <div class="sidebar-item" >
                        <router-link to="/account/profile" class="sidebar-link">
                            {{ currentLang === 'en' ? 'My Information' : 'معلوماتي' }}
                        </router-link>
                    </div>
                    <div class="sidebar-item" :class="{ active: activeTab === 'info' }">
                        <router-link to="/account/addresses" class="sidebar-link">
                            {{ currentLang === 'en' ? 'My Addresses' : 'عناويني' }}
                        </router-link>
                    </div>
                    <div class="sidebar-item">
                        <router-link to="/account/orders" class="sidebar-link">
                            {{ currentLang === 'en' ? 'My Orders' : 'طلباتي' }}
                        </router-link>
                    </div>
                    <div class="sidebar-item">
                        {{ currentLang === 'en' ? 'Log Out' : 'تسجيل الخروج' }}
                    </div>
                </div>

                <!-- Form Content -->
                <div class="profile-content">
                    <!-- Address List -->
                    <div class="address-list">
                        <div v-for="(address, index) in addresses" :key="index" class="address-item" :class="{ active: activeAddressIndex === index }" @click="selectAddress(index)">
                            <div class="address-icon">
                                <img src="../../../../public/assets/img/home-icon.png" alt="Home" />
                            </div>
                            <div class="address-details">
                                <div class="address-title">
                                    {{ currentLang === 'en' ? `${address.area} - ${address.governorate}` : `${address.area} - ${address.governorate}` }}
                                </div>
                                <div class="address-text">
                                    {{ currentLang === 'en' ? 
                                        `Block: ${address.block}, St Number: ${address.street}, Building Number: ${address.buildingNumber}` : 
                                        `القطعة: ${address.block}، شارع رقم: ${address.street}، رقم المبنى: ${address.buildingNumber}` 
                                    }}
                                </div>
                            </div>
                            <div class="address-actions">
                                <button class="edit-btn" @click="editAddress(index)">
                                    <img src="../../../../public/assets/img/edit-icon.png" alt="Edit" />
                                </button>
                                <button class="delete-btn" @click="deleteAddress(index)">
                                    <img src="../../../../public/assets/img/delete-icon.png" alt="Delete" />
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Add New Address Button -->
                    <button class="add-address-btn" @click="showAddAddressModal = true">
                        {{ currentLang === 'en' ? 'ADD NEW ADDRESS' : 'إضافة عنوان جديد' }}
                    </button>

                    <!-- Add Address Modal -->
                    <div class="modal" v-if="showAddAddressModal">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2>{{ currentLang === 'en' ? 'Add New Address' : 'إضافة عنوان جديد' }}</h2>
                                <button class="close-btn" @click="showAddAddressModal = false">×</button>
                            </div>
                            <form @submit.prevent="handleAddAddress" class="address-form">
                                <!-- Governorate -->
                                <div class="form-group">
                                    <label>{{ currentLang === 'en' ? 'Governorate' : 'المحافظة' }}</label>
                                    <select v-model="newAddress.governorate">
                                        <option value="">{{ currentLang === 'en' ? 'Select Governorate' : 'اختر المحافظة' }}</option>
                                        <!-- Add governorate options -->
                                    </select>
                                </div>

                                <!-- Area -->
                                <div class="form-group">
                                    <label>{{ currentLang === 'en' ? 'Area' : 'المنطقة' }}</label>
                                    <select v-model="newAddress.area">
                                        <option value="">{{ currentLang === 'en' ? 'Select Area' : 'اختر المنطقة' }}</option>
                                        <!-- Add area options -->
                                    </select>
                                </div>

                                <!-- Block -->
                                <div class="form-group">
                                    <label>{{ currentLang === 'en' ? 'Block' : 'القطعة' }}</label>
                                    <input type="text" v-model="newAddress.block" />
                                </div>

                                <!-- Street -->
                                <div class="form-group">
                                    <label>{{ currentLang === 'en' ? 'Street' : 'الشارع' }}</label>
                                    <input type="text" v-model="newAddress.street" />
                                </div>

                                <!-- Building Number -->
                                <div class="form-group">
                                    <label>{{ currentLang === 'en' ? 'Building Number' : 'رقم المبنى' }}</label>
                                    <input type="text" v-model="newAddress.buildingNumber" />
                                </div>

                                <!-- Special Directions -->
                                <div class="form-group">
                                    <label>{{ currentLang === 'en' ? 'Special Directions' : 'إرشادات خاصة' }}</label>
                                    <input type="text" v-model="newAddress.specialDirections" />
                                </div>

                                <button type="submit" class="submit-btn">
                                    {{ currentLang === 'en' ? 'ADD NEW ADDRESS' : 'إضافة العنوان الجديد' }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Addresses',
    data() {
        return {
            currentLang: localStorage.getItem('currentLang') || 'en',
            activeTab: 'info',
            showAddAddressModal: false,
            activeAddressIndex: null,
            rawAddresses: [
                {
                    block: '3',
                    street: '502',
                    buildingNumber: '59'
                },
                {
                    block: '6',
                    street: '502',
                    buildingNumber: '59'
                },
                {
                    block: '6',
                    street: '502',
                    buildingNumber: '59'
                }
            ],
            newAddress: {
                governorate: '',
                area: '',
                block: '',
                street: '',
                buildingNumber: '',
                specialDirections: ''
            },
            isMobile: false
        }
    },
    computed: {
        addresses() {
            return this.rawAddresses.map(address => ({
                ...address,
                governorate: this.currentLang === 'en' ? 'Kuwait' : 'الكويت',
                area: this.getAreaName(address.block)
            }));
        }
    },
    methods: {
        getAreaName(block) {
            if (block === '3') {
                return this.currentLang === 'en' ? 'Sharq' : 'شرق';
            } else {
                return this.currentLang === 'en' ? 'Al-Shamiya' : 'الشامية';
            }
        },
        editAddress(index) {
            // Implement edit functionality
            console.log('Edit address:', this.addresses[index]);
        },
        deleteAddress(index) {
            // Implement delete functionality
            this.rawAddresses.splice(index, 1);
        },
        handleAddAddress() {
            // Add new address to the list
            this.rawAddresses.push({
                block: this.newAddress.block,
                street: this.newAddress.street,
                buildingNumber: this.newAddress.buildingNumber
            });
            // Reset form and close modal
            this.newAddress = {
                governorate: '',
                area: '',
                block: '',
                street: '',
                buildingNumber: '',
                specialDirections: ''
            };
            this.showAddAddressModal = false;
        },
        selectAddress(index) {
            this.activeAddressIndex = index;
        },
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

/* Address List Styles */
.address-list {
    display: flex;
    flex-direction: column;
    gap: 20px;
    margin-bottom: 20px;
}

.address-item {
    display: flex;
    align-items: flex-start;
    gap: 16px;
    padding: 20px;
    background: transparent;
    border-radius: 8px;
    transition: background-color 0.3s ease;
    cursor: pointer;
}

.address-item.active {
    background: #CCB3A5;
}

.address-item:hover {
    background: rgba(204, 179, 165, 0.1);
}

.address-item.active:hover {
    background: #CCB3A5;
}

.address-icon img {
    width: 24px;
    height: 24px;
}

.address-details {
    flex: 1;
}

.address-title {
    color: #FFFFFF;
    font-size: 20px;
    margin-bottom: 8px;
    font-weight: 600;
}

.rtl .address-title,
.rtl .address-text {
    font-family: 'TheSansArabic', sans-serif;
}

.ltr .address-title,
.ltr .address-text {
    font-family: 'Cairo', sans-serif;
}

.address-text {
    color: #FFFFFF;
    font-size: 14px;
    line-height: 1.5;
}

.address-actions {
    display: flex;
    gap: 12px;
}

.edit-btn,
.delete-btn {
    background: none;
    border: none;
    cursor: pointer;
    padding: 4px;
}

.edit-btn img,
.delete-btn img {
    width: 20px;
    height: 20px;
}

/* Add Address Button */
.add-address-btn {
    width: 100%;
    height: 48px;
    background: #AA8B7A;
    border: none;
    border-radius: 4px;
    color: #FFFFFF;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.add-address-btn:hover {
    background: #957865;
}

/* Modal Styles */
.modal {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1000;
}

.modal-content {
    background: #212A1E;
    border-radius: 8px;
    border: 1px solid #AA8B7A;
    padding: 24px 195px;
    width: 100%;
    max-width: 563px;
    max-height: 90vh;
    overflow-y: auto;
}

.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 24px;
}

.modal-header h2 {
    color: #AA8B7A;
    font-size: 24px;
    margin: 0;
}

.close-btn {
    background: none;
    border: none;
    color: #aa8b7a;
    font-size: 24px;
    cursor: pointer;
}

.address-form {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.address-form select {
    height: 40px;
    background: transparent;
    border: 1px solid #AA8B7A;
    border-radius: 4px;
    padding: 0 16px;
    color: #FFFFFF;
    font-size: 16px;
    width: 100%;
}

.address-form select option {
    background: #212A1E;
    color: #FFFFFF;
}

/* RTL specific styles for modal */
.rtl .modal-content {
    text-align: right;
}

.rtl .close-btn {
    margin-right: auto;
    margin-left: 0;
}

/* LTR specific styles for modal */
.ltr .modal-content {
    text-align: left;
}
.ltr .address-form {

    gap: 5px !important;
}
.ltr .close-btn {
    margin-left: auto;
    margin-right: 0;
}

/* Update other font families */
.rtl .modal-header h2,
.rtl .form-group label,
.rtl .form-group input,
.rtl .form-group select,
.rtl .submit-btn,
.rtl .add-address-btn {
    font-family: 'TheSansArabic', sans-serif;
}

.ltr .modal-header h2,
.ltr .form-group label,
.ltr .form-group input,
.ltr .form-group select,
.ltr .submit-btn,
.ltr .add-address-btn {
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

    /* Adjust address list for mobile */
    .address-list {
        margin-top: 20px;
    }

    .address-item {
        padding: 15px;
    }

    .address-title {
        font-size: 16px;
    }

    .address-text {
        font-size: 13px;
    }

    /* Adjust modal for mobile */
    .modal-content {
        padding: 20px;
        margin: 20px;
        max-width: none;
    }
}
</style>