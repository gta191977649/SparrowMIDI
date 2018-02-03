
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('recent-midi', require('./components/RecentMidi.vue'));

Vue.component('midi-track', require('./components/MidiTrack.vue'));
Vue.component('search', require('./components/Search.vue'));

const app = new Vue({
    el: '#app'
});
