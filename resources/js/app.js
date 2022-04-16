require('./bootstrap');
import {createApp} from "vue";
import Conversation from "./Components/Conversation";

const vue = createApp({});




vue.component('conversation',Conversation)

vue.mount('#app');
