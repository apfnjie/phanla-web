import Vue from "vue";
import store from "~/store";
import router from "~/router";
import i18n from "~/plugins/i18n";
import App from "~/components/App";
import OpenSans from 'typeface-open-sans'
// import SpaceMono from 'typeface-space-mono'
// import Icon from "@mdi/font";

import "~/plugins";
import "~/components";

Vue.config.productionTip = false;

/* eslint-disable no-new */
new Vue({
  i18n,
  store,
  router,
  ...App
});

Vue.use(OpenSans);
