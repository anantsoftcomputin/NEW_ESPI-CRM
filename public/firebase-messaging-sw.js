/*
Give the service worker access to Firebase Messaging.
Note that you can only use Firebase Messaging here, other Firebase libraries are not available in the service worker.
*/
importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-messaging.js');
   
/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
* New configuration for app@pulseservice.com
*/
firebase.initializeApp({
        apiKey: "AIzaSyAqL3O7-cgoFMxtuknhZRWC-jC3oGfHc9I",
        authDomain: "espi-crm.firebaseapp.com",
        databaseURL: "https://XXXX.firebaseio.com",
        projectId: "espi-crm",
        storageBucket: "espi-crm.appspot.com",
        messagingSenderId: "291781615758",
        appId: "1:291781615758:web:f8ae5478fbfe9983f969df",
        measurementId: "G-T0YPSL5YYH"
    });
  
/*
Retrieve an instance of Firebase Messaging so that it can handle background messages.
*/
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(payload) {
    console.log(
        "[firebase-messaging-sw.js] Received background message ",
        payload,
    );
    /* Customize notification here */
    const notificationTitle = "Background Message Title";
    const notificationOptions = {
        body: "Background Message body.",
        icon: "/itwonders-web-logo.png",
    };
  
    return self.registration.showNotification(
        notificationTitle,
        notificationOptions,
    );
});