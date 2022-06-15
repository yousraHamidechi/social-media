<template>
    <div class="row justify-content-center h-100">
        <div class="col-md-4 col-sm-3 chat">
            <div class="card mb-sm-3 mb-md-0 contacts_card">
                <div class="card-header">
                    <div class="input-group">
                        <input
                            type="text"
                            placeholder="Find a conversation..."
                            name=""
                            class="form-control search"
                        />
                        <div class="input-group-prepend">
                  <span class="input-group-text search_btn"
                  ><i class="fas fa-search"></i
                  ></span>
                        </div>
                    </div>
                </div>
                <div class="card-body contacts_body">
                    <ul class="contacts">
                        <li class="active" v-for="(conversation, key, index) in conversations" :key="conversation.id">
                            <div class="d-flex bd-highlight" @click="chooseConversation(conversation)">
                                <div class="img_cont">
                                    <img src="/assets/images/photo1.png" class="rounded-circle user_img" />
                                    <span class="online_icon"></span>
                                </div>
                                <div class="user_info">
                                    <span>{{ conversation.name }}</span>
                                    <p>Online</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
        <div class="col-md-8 col-xl-6 chat">
            <div class="card">
                <div class="card-header msg_head">
                    <div class="d-flex bd-highlight">
                        <div class="img_cont">
                            <img src="/assets/images/photo1.png" class="rounded-circle user_img" />
                            <span class="online_icon"></span>
                        </div>
                        <div class="user_info" v-if="conversation">
                            <span>{{ conversation.name}}</span>
<!--                            <p>1767 Messages</p>-->
                        </div>
                        <!--<div class="video_cam">
                                            <span><i class="fas fa-video"></i></span>
                                            <span><i class="fas fa-phone"></i></span>
                                        </div>-->
                    </div>
                    <span id="action_menu_btn"
                    ><i class="fas fa-ellipsis-v"></i
                    ></span>
                    <div class="action_menu">
                        <ul>
                            <li><i class="fas fa-user-circle"></i> View profile</li>
                            <li><i class="fas fa-users"></i> Add to close friends</li>
                            <li><i class="fas fa-plus"></i> Add to group</li>
                            <li><i class="fas fa-ban"></i> Block</li>
                        </ul>
                    </div>
                </div>
                <div class="card-body msg_card_body">

                    <div  v-for="message in messagesFormat" :key="message">
                        <div :class="{'d-flex' : true, 'justify-content-end': senderId == message.sender_id, 'mb-4' : true }" v-if="senderId == message.sender_id">
                            <div class="msg_cotainer_send">
                                {{ message.content }}
                                <!--                            <span class="msg_time_send">9:05 AM, Today</span>-->
                            </div>
                            <div class="img_cont_msg">
                                <img src="/assets/images/photo1.png" class="rounded-circle user_img_msg" />
                            </div>
                        </div>
                        <div class="d-flex justify-content-start mb-4" v-else>
                            <div class="img_cont_msg">
                                <img src="/assets/images/profile-pic.png" class="rounded-circle user_img_msg" />
                            </div>
                            <div class="msg_cotainer">
                                {{ message.content }}
<!--                                <span class="msg_time">9:07 AM, Today</span>-->
                            </div>
                        </div>
                    </div>


                </div>
                <div class="card-footer">
                    <div class="input-group">
                        <div class="input-group-append">
                  <span class="input-group-text attach_btn"
                  ><i class="fas fa-paperclip"></i
                  ></span>
                        </div>
                        <textarea
                            v-model="message" @keyup.enter="addMessage()"
                            name=""
                            class="form-control type_msg"
                            placeholder="Type your message..."
                        ></textarea>
                        <div class="input-group-append">
                  <span class="input-group-text send_btn" @click="addMessage()" @keyup.enter="addMessage()"
                  ><i class="fas fa-location-arrow"></i
                  ></span>
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
        conversations:{

        },
        senderId:{
            required:true
        }
    },
    data(){
        return {
            users:[],
            conversation:null,
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
        this.conversation = this.conversations[0]
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
            const docRef = collection(db, `conversations/${conversation.pivot.serial}/messages`);
            const q = query(docRef);
            return await getDocs(q);
        },
         addMessage() {
            if (this.message) {
                addDoc(collection(db, `conversations/${this.conversation.pivot.serial}/messages`), {
                    sender_id: this.senderId,
                    receiver_id: this.conversation.pivot.friend_id === this.senderId ? this.conversation.pivot.user_id : this.conversation.pivot.friend_id,
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
        chooseConversation(conversation)
        {
            console.log(conversation)
            this.conversation = conversation
            this.realTimeMessages()
        },
        realTimeMessages(){
            this.loading = true;
            const q = query(collection(db, `conversations/${this.conversation.pivot.serial}/messages`),orderBy("created_at",'desc'));
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
