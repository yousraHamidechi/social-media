import {initializeApp} from 'firebase/app';
import {onSnapshot,doc,getDoc,query,getFirestore,collection, getDocs, where,setDoc,addDoc,orderBy } from 'firebase/firestore';

const firebaseConfig = {
    apiKey: "AIzaSyD2nYY1fg87Xya0d_eoje_yxlxV_MUyIqM",
    authDomain: "hospital-656b4.firebaseapp.com",
    projectId: "hospital-656b4",
    storageBucket: "hospital-656b4.appspot.com",
    messagingSenderId: "199337787419",
    appId: "1:199337787419:web:5255d5fb984c07d086b8be"
};

const app = initializeApp(firebaseConfig);

const db = getFirestore(app);



export{db,onSnapshot,doc,getDoc,query,getFirestore,collection, getDocs, where,setDoc,addDoc,orderBy };
