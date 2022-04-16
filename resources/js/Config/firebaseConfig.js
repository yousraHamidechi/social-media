import {initializeApp} from 'firebase/app';
import {onSnapshot,doc,getDoc,query,getFirestore,collection, getDocs, where,setDoc,addDoc,orderBy } from 'firebase/firestore';

const firebaseConfig = {
    apiKey: "AIzaSyC3XsxRI6_Y_VBwH7KiydiTLS0LK_oy7zw",
    authDomain: "social-media-2-d2433.firebaseapp.com",
    projectId: "social-media-2-d2433",
    storageBucket: "social-media-2-d2433.appspot.com",
    messagingSenderId: "845202964206",
    appId: "1:845202964206:web:dabd3173c1784dfb53bdff"
};

const app = initializeApp(firebaseConfig);

const db = getFirestore(app);



export{db,onSnapshot,doc,getDoc,query,getFirestore,collection, getDocs, where,setDoc,addDoc,orderBy };
