require('./bootstrap');

import { createApp } from 'vue'
import App from './vue/app'

import { library } from '@fortawesome/fontawesome-svg-core'
import { faPlusSquare , faTrash } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";


library.add(faPlusSquare,faTrash)

const app = createApp(App);
app.component('FontAwesomeIcon', FontAwesomeIcon);
app.use(Toast);
app.mount('#app');

// createApp(App).component('FontAwesomeIcon', FontAwesomeIcon).mount('#app')