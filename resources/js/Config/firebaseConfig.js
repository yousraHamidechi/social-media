import {initializeApp} from 'firebase/app';
import {onSnapshot,doc,getDoc,query,getFirestore,collection, getDocs, where,setDoc,addDoc,orderBy } from 'firebase/firestore';

const firebaseConfig = {
    apiKey: "AIzaSyDg7S5yUFF_rLY5wMY6ImDEPoQACJJxPus",
    authDomain: "social-media-32208.firebaseapp.com",
    projectId: "social-media-32208",
    storageBucket: "social-media-32208.appspot.com",
    messagingSenderId: "81375969330",
    appId: "1:81375969330:web:6dbad01e3e2a6120663c2b"
};

const app = initializeApp(firebaseConfig);

const db = getFirestore(app);



export{db,onSnapshot,doc,getDoc,query,getFirestore,collection, getDocs, where,setDoc,addDoc,orderBy };

