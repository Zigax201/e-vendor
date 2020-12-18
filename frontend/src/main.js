import Vue from "vue";
import App from "./App.vue";
import "tailwindcss/tailwind.css";
import router from "./router";
import common from "./common";
window.axios = require("axios");

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

Vue.config.productionTip = false;
Vue.mixin(common);

new Vue({
  router,
  render: (h) => h(App),
}).$mount("#app");
