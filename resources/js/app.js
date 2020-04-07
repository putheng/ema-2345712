import router from './router'
import store from './vuex'

import * as components from './components/globals'
import * as componentsHome from './components'

import Locale from './vue-i18n-locales.generated'
import VueInternationalization from 'vue-i18n'

import { abilitiesPlugin, Can } from '@casl/vue'

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./plugins');
require('./mixins');

require('./bootstrap');
// require('./mixins/interceptors');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('home-page', require('./components/home/HomePage.vue').default);

Object.keys(components).forEach((key) => {
	Vue.component(key, components[key])
})

Object.keys(componentsHome).forEach((key) => {
	Vue.component(key, componentsHome[key])
})
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 Vue.use(VueInternationalization);

const lang = document.documentElement.lang.substr(0, 2);

const i18n = new VueInternationalization({
    locale: lang,
    messages: Locale
});

Vue.use(abilitiesPlugin, store.getters.ability)

Vue.component('Can', Can)

const app = new Vue({
	router: router,
    store: store,
    el: '#app',
    i18n
});
