<template>
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card chat-app">
                <div id="plist" class="people-list">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Search...">
                    </div>
                    <ul class="list-unstyled chat-list mt-2 mb-0">

                        <li class="clearfix">
                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar">
                            <div class="about">
                                <div class="name">Vincent Porter</div>
                                <div class="status"><i class="fa fa-circle offline"></i> left 7 mins ago</div>
                            </div>
                        </li>

                    </ul>
                </div>
                <div class="chat">
                    <div class="chat-header clearfix">
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                                </a>
                                <div class="chat-about">
                                    <h6 class="m-b-0">Aiden Chavez</h6>
                                    <small>Last seen: 2 hours ago</small>
                                </div>
                            </div>
                            <div class="col-lg-6 hidden-sm text-right">
                                <a href="javascript:void(0);" class="btn btn-outline-secondary"><i
                                    class="fa fa-camera"></i></a>
                                <a href="javascript:void(0);" class="btn btn-outline-primary"><i
                                    class="fa fa-image"></i></a>
                                <a href="javascript:void(0);" class="btn btn-outline-info"><i
                                    class="fa fa-cogs"></i></a>
                                <a href="javascript:void(0);" class="btn btn-outline-warning"><i
                                    class="fa fa-question"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="chat-history">
                        <ul class="m-b-0">

                            <li class="clearfix" v-for="message in messagesFormat" :key="message">
                                <div class="message-data">
<!--                                    <span :class="{'message-data-time' : true, 'float-right': conversationProps.first_user_id === message.sender_id }"-->
<!--                                    >{{ message.created_at }}</span>-->
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png"
                                         v-if="senderId != message.sender_id"
                                         alt="avatar">
                                </div>
                                <div :class="{'message' : true,'other-message' : true, 'float-right': senderId == message.sender_id }"
                                > {{ message.content }}
                                </div>
                            </li>

                        </ul>
                    </div>
                    <div class="chat-message clearfix" id="sendMessageForm">
                        <div class="input-group mb-0">
                            <div class="input-group-prepend">
                                <button  type="button" class="btn btn-primary send"  @click="addMessage()" @keyup.enter="addMessage()">
                                    <i data-feather="send" class="d-lg-none"></i>
                                    <span class="d-none text-nowrap d-lg-block">Send</span>
                                </button>
                            </div>
                            <input type="text" v-model="message" @keyup.enter="addMessage()" class="form-control message" placeholder="Type your message" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import {db,onSnapshot,doc,query,collection, getDocs, where,addDoc,orderBy } from '../Config/firebaseConfig'

// Get a list of cities from your database

export default {
    name: "Conversation",

    props:{
        conversationProps:{
            type:Object,
            required:true
        },
        senderId:{
            required:true
        }
    },
    data(){
        return {
            users:[],
            conversion:null,
            messages:[],
            message:null,
            loading:false,
        }
    },
    mounted() {

        // this.getConversationBySerial(this.conversationProps.serial).then(res => {
        //      this.conversion = res.docs.length > 0 ? res.docs[0].data() : null
        // })
        // this.getMessages(this.conversationProps).then(res => {
        //     this.messages = res.docs
        // })
        this.realTimeMessages();


    },
    computed:{
        messagesFormat(){
            return this.messages.map(m => m.data())
        }
    },
    watch: {
        // whenever question changes, this function will run
        messages(newQuestion, oldQuestion) {
            setTimeout(function(){document.querySelector('.chat-history').scrollTo(0,document.querySelector('.chat-history').scrollHeight)}, 100);


        }
    },
    methods:{
        async getConversations(db) {
            const chats = collection(db, 'conversations');
            const chatSnapshot = await getDocs(chats);
            return chatSnapshot.docs.map(doc => doc.data());
        },
        async getConversationBySerial(serial) {
            const chats = collection(db, 'conversations');
            const q = query(chats, where("serial", "==", serial));
            return await getDocs(q);
        },
        async getMessages(conversation) {
            const docRef = collection(db, `conversations/${conversation.serial}/messages`);
            const q = query(docRef);
            return await getDocs(q);
        },
         addMessage() {
            console.log('test')
            if (this.message) {
                addDoc(collection(db, `conversations/${this.conversationProps.serial}/messages`), {
                    sender_id: this.senderId,
                    receiver_id: this.conversationProps.second_user_id === this.senderId ? this.conversationProps.first_user_id : this.conversationProps.second_user_id,
                    content: this.message,
                    created_at : new Date(),
                },{ merge: true }).then(() => {
                   this.message = null;
                   document.querySelector('.chat-history').scrollTo(0,document.querySelector('.chat-history').scrollHeight)

                }).catch(err => {

               });
            }
             console.log(this.messages)

         },
        realTimeMessages(){
            this.loading = true;
            const q = query(collection(db, `conversations/${this.conversationProps.serial}/messages`),orderBy("created_at",'desc'));
            let that = this;
            const unsubscribe = onSnapshot(q, (querySnapshot) => {
                that.messages = querySnapshot.docs.reverse()
                this.loading = false
            });

        }
    }
}
</script>

<style scoped>

.user-chats {
    overflow-y: scroll;
}

</style>
