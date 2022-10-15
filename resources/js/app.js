import './bootstrap'

import { createApp } from "vue"

import Login from './components/user/login.vue'
import Search from './components/search/search.vue'

createApp({
    components:{
        Login,
        Search,
    },
}).mount('#app')
