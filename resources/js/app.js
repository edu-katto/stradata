import './bootstrap'

import { createApp } from "vue"

import Login from './components/user/login.vue'
import Search from './components/search/search.vue'
import Log from './components/log/searchLog.vue'

createApp({
    components:{
        Login,
        Search,
        Log,
    },
}).mount('#app')
