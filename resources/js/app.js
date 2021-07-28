require("./bootstrap");

import Vue from "vue";
// const axios = require('axios').default;
import axios from "axios";

Vue.component(
    "example-component",
    require("./components/exampleComponent.vue").default
);

Vue.component(
    "image-preview",
    require("./components/imagepreview/featureImage.vue").default
);
Vue.component(
    "first-image",
    require("./components/imagepreview/firstImage.vue").default
);
Vue.component(
    "second-image",
    require("./components/imagepreview/secondImage.vue").default
);

Vue.component(
    "category-dropdown",
    require("./components/categoryDropDown.vue").default
);
Vue.component(
    "address-dropdown",
    require("./components/addressDropDown.vue").default
);
Vue.component(
    "message",
    require("./components/message.vue").default
);

const app = new Vue({
    el: "#app"
});
