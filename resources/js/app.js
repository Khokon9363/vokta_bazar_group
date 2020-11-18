/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Router from './routes.js';

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/voktabazar/ExampleComponent.vue').default);
Vue.component('navbar-component', require('./components/voktabazar/NavBarComponent.vue').default);
Vue.component('home-component', require('./components/voktabazar/HomeComponent.vue').default);
Vue.component('about-component', require('./components/voktabazar/AboutComponent.vue').default);
Vue.component('contact-component', require('./components/voktabazar/ContactComponent.vue').default);

Vue.component('sidenav-component', require('./components/admin/SideNavComponent.vue').default);
Vue.component('dashboard-component', require('./components/admin/DashboardComponent.vue').default);
Vue.component('aboutus-component', require('./components/admin/AboutUsComponent.vue').default);
Vue.component('email-component', require('./components/admin/EmailsComponent.vue').default);
Vue.component('manageblog-component', require('./components/admin/ManagaBlogsComponent.vue').default);
Vue.component('sociallinks-component', require('./components/admin/SocialLinksComponent.vue').default);
Vue.component('users-component', require('./components/admin/UsersComponent.vue').default);
Vue.component('profile-component', require('./components/admin/ProfileComponent.vue').default);
Vue.component('live-chat-component', require('./components/admin/LiveChatComponent.vue').default);

import Paginate from 'vuejs-paginate'
Vue.component('paginate', Paginate)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router : Router,
});
