<template>
  <div v-if="show" class="modal-overlay" @click.self="closeModal">
    <div class="modal-content" :class="currentLang === 'en' ? 'ltr' : 'rtl'">
      <div class="modal-header">
        <h2>{{ currentLang === 'en' ? 'Contact Us' : 'اتصل بنا' }}</h2>
        <button class="close-button" @click="closeModal">&times;</button>
      </div>

      <div class="contact-info">
        <div class="info-item">
          <div class="icon-container">
            <img src="../../../public/assets/img/phone.png" alt="Phone" class="info-icon" />
          </div>
          <span>{{ currentLang === 'en' ? '+965 99982794' : '99982794 965+' }}</span>
        </div>
        <div class="info-item">
          <div class="icon-container">
            <img src="../../../public/assets/img/email.png" alt="Email" class="info-icon" />
          </div>
          <span>info@milagro.com</span>
        </div>
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

        <div class="form-group">
          <label>{{ currentLang === 'en' ? 'Message' : 'الرسالة' }}</label>
          <textarea v-model="form.message" class="form-control"></textarea>
        </div>

        <button type="submit" class="submit-button">
          {{ currentLang === 'en' ? 'Submit' : 'إرسال' }}
        </button>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: 'ContactModal',
  props: {
    show: {
      type: Boolean,
      default: false
    },
    currentLang: {
      type: String,
      default: 'ar'
    }
  },
  data() {
    return {
      form: {
        firstName: '',
        lastName: '',
        phone: '',
        email: '',
        message: ''
      }
    }
  },
  methods: {
    closeModal() {
      this.$emit('close');
    },
    submitForm() {
      console.log('Form submitted:', this.form);
      this.form = {
        firstName: '',
        lastName: '',
        phone: '',
        email: '',
        message: ''
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
  font-family: 'TheSansArabic', sans-serif;
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

.contact-info {
  display: flex;
  flex-direction: column;
  margin-bottom: 30px;
}

.info-item {
  display: flex;
  align-items: center;
  color: #fff;
  margin-bottom: 11px;
  font-size: 16px;
  font-family: 'Cairo', sans-serif;
}

.icon-container {
  margin-right: 10px;
  width: 25px;
  display: flex;
  justify-content: center;
}

.info-icon {
  width: 20px;
  height: 20px;
  opacity: 0.8;
}

/* RTL Styles */
.rtl {
  direction: rtl;
  text-align: right;
}

.rtl .modal-header {
  flex-direction: row;
}

.rtl .icon-container {
  margin-right: 0;
  margin-left: 10px;
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
.rtl .submit-button {
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
.ltr label,
.ltr .submit-button {
  font-family: 'Cairo', sans-serif;
}

/* Bootstrap-like grid */
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

textarea.form-control {
  height: 60px;
  resize: none;
}

.submit-button {
  background: #AA8B7A;
  color: #212A1E;
  border: none;
  padding: 14px;
  font-size: 18px;
  cursor: pointer;
  width: 100%;
  transition: background-color 0.3s;
  border-radius: 2px;
  font-family: 'TheSansArabic', sans-serif;
}
</style>