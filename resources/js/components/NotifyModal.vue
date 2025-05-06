<template>
  <div v-if="show" class="modal-overlay" @click.self="closeModal">
    <div class="modal-content" :class="currentLang === 'en' ? 'ltr' : 'rtl'">
      <div class="modal-header">
        <h2>{{ currentLang === 'en' ? 'Notify Me' : 'أعلمني' }}</h2>
        <button class="close-button" @click="closeModal">&times;</button>
      </div>

      <form @submit.prevent="submitForm">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label>{{ currentLang === 'en' ? 'First Name' : 'الاسم الأول' }}</label>
            <input type="text" v-model="form.firstName" class="form-control" />
          </div>
          <div class="form-group col-md-6">
            <label>{{ currentLang === 'en' ? 'Last Name' : 'الاسم الأخير' }}</label>
            <input type="text" v-model="form.lastName" class="form-control" />
          </div>
        </div>

        <div class="form-group">
          <label>{{ currentLang === 'en' ? 'Phone number' : 'رقم الهاتف' }}</label>
          <div class="phone-input-container">
            <div class="country-code">+ 965</div>
            <input type="text" v-model="form.phone" class="form-control phone-field" />
          </div>
        </div>

        <div class="form-group">
          <label>{{ currentLang === 'en' ? 'Email' : 'البريد الإلكتروني' }}</label>
          <input type="email" v-model="form.email" class="form-control" />
        </div>

        <button type="submit" class="submit-button">
          {{ currentLang === 'en' ? 'Notify Me' : 'أعلمني' }}
        </button>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: 'NotifyModal',
  props: {
    show: {
      type: Boolean,
      default: false
    },
    currentLang: {
      type: String,
      default: 'ar'
    },
    productInfo: {
      type: Object,
      default: () => ({})
    }
  },
  data() {
    return {
      form: {
        firstName: '',
        lastName: '',
        phone: '',
        email: ''
      }
    }
  },
  methods: {
    closeModal() {
      this.$emit('close');
    },
    submitForm() {
      console.log('Notification form submitted:', {
        ...this.form,
        product: this.productInfo
      });
      this.form = {
        firstName: '',
        lastName: '',
        phone: '',
        email: ''
      };
      this.closeModal();
    }
  }
}
</script>

<style scoped>
.modal-overlay {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 1000;
  background: rgba(0, 0, 0, 0.5);
}

.modal-content {
  background: #212A1E;
  width: 118%;
  max-width: 672px;
  padding: 22px 50px;
  position: relative;
  border-radius: 10px;
  border: 2px solid #AA8B7A;
}

.modal-header {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  margin-bottom: 25px;
}

.modal-header h2 {
  color: #AA8B7A;
  font-size: 40px;
  font-weight: 600;
  margin: 0;
}

.rtl .modal-header h2 {
  font-family: 'TheSansArabic', sans-serif;
}

.ltr .modal-header h2 {
  font-family: 'Philosopher', serif;
}

.close-button {
  background: none;
  border: none;
  color: #AA8B7A;
  font-size: 40px;
  cursor: pointer;
  padding: 0;
  line-height: 0.7;
}

/* RTL Styles */
.rtl {
  direction: rtl;
  text-align: right;
}

.rtl .modal-header {
  flex-direction: row;
}

.rtl .phone-input-container {
  flex-direction: row;
}

.rtl .country-code {
  border-left: 2px solid #AA8B7A;
  border-right: none;
}

.rtl .form-control,
.rtl label,
.rtl .submit-button,
.rtl .country-code {
  font-family: 'TheSansArabic', sans-serif;
}

/* LTR Styles */
.ltr {
  direction: ltr;
  text-align: left;
}

.ltr .form-group label {
  text-align: left;
}

.ltr .form-control,
.ltr label {
  font-family: 'Cairo', sans-serif;
}

.ltr .submit-button,
.ltr .country-code {
  font-family: 'Philosopher', serif;
}

/* Form Styles */
.form-row {
  display: flex;
  margin-right: -15px;
  margin-left: -15px;
  flex-wrap: wrap;
}

.col-md-6 {
  flex: 0 0 50%;
  max-width: 50%;
  padding-right: 15px;
  padding-left: 15px;
  box-sizing: border-box;
}

.form-group {
  margin-bottom: 20px;
}

.form-group label {
  display: block;
  color: #fff;
  margin-bottom: 8px;
  font-size: 16px;
  text-align: right;
  font-family: 'Cairo', sans-serif;
}

.form-control {
  width: 100%;
  background: transparent;
  border: 2px solid #AA8B7A;
  color: #fff;
  font-size: 16px;
  outline: none;
  border-radius: 5px;
  padding: 12px;
  height: 39px;
  box-sizing: border-box;
}

.phone-input-container {
  display: flex;
  width: 100%;
  border: 2px solid #AA8B7A;
  border-radius: 5px;
  overflow: hidden;
  height: 39px;
  flex-direction: row;
}

.phone-field {
  flex: 1;
  border: none;
  background: transparent;
  color: #fff;
  font-size: 16px;
  outline: none;
  padding: 12px;
  height: 100%;
}

.country-code {
  background: transparent;
  border: none;
  border-right: 2px solid #AA8B7A;
  border-left: none;
  color: #AA8B7A;
  padding: 0 15px;
  width: 100px;
  text-align: center;
  display: flex;
  align-items: center;
  justify-content: center;
  box-sizing: border-box;
}

.submit-button {
  background: #AA8B7A;
  color: #FFFFFF;
  border: none;
  padding: 14px;
  font-size: 18px;
  cursor: pointer;
  width: 100%;
  transition: background-color 0.3s;
  border-radius: 2px;
  font-family: 'TheSansArabic', sans-serif;
}

.submit-button:hover {
  background: #957865;
}
</style> 