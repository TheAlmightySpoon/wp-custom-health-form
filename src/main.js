import Vue from 'vue'
import App from './App.vue'
import VueHtmlToPaper from 'vue-html-to-paper';
import vuetify from './plugins/vuetify'
import axios from 'axios'
import VueAxios from 'vue-axios'
import querystring from 'querystring'

Vue.config.productionTip = false

const options = {
  name: "_blank",
  specs: ["fullscreen=yes", "titlebar=yes", "scrollbars=yes"],
  styles: [
    "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css",
    "https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css",
    "https://unpkg.com/kidlat-css/css/kidlat.css"
  ],
  autoClose: true,
};

Vue.use(VueHtmlToPaper, options);
Vue.use(querystring);
Vue.use(VueAxios, axios);

new Vue({
  vuetify,
  render: h => h(App)
}).$mount('#app')
