// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
    apiKey: "AIzaSyBkEYbAihoTdvTjM3XRsD2p9zeqnw3JJKo",
    authDomain: "furrify-ee3bb.firebaseapp.com",
    databaseURL: "https://furrify-ee3bb-default-rtdb.firebaseio.com",
    projectId: "furrify-ee3bb",
    storageBucket: "furrify-ee3bb.appspot.com",
    messagingSenderId: "470684284871",
    appId: "1:470684284871:web:ea38928a3d1d8b5c380be2",
    measurementId: "G-194TTDNMD7"
  };
  
  firebase.initializeApp(firebaseConfig);
  
  // Reference messages collection
  var messagesRef = firebase.database().ref('message');
  
  // Listen for form submit
  document.getElementById('profileForm').addEventListener('submit', submitForm);
  
  // Submit form
  function submitForm(e){
    e.preventDefault();
  
    // Get values
    var petusername = getInputVal('petusername');
  //   var dog = getInputVal('dog');
  //   var cat = getInputVal('cat');
  //   var rabbit = getInputVal('rabbit');
    var petname = getInputVal('petname');
  
    // Save message
    //savemessage(petusername, dog, cat, rabbit, petname);
    savemessage(petusername, petname);
  
    // Show alert
    document.querySelector('.alert').style.display = 'block';
  
    // Hide alert after 3 seconds
    setTimeout(function(){
      document.querySelector('.alert').style.display = 'none';
    },3000);
  
    // Clear form
    document.getElementById('profileForm').reset();
  }
  
  // Function to get get form values
  function getInputVal(id){
    return document.getElementById(id).value;
  }
  
  // Save message to firebase
  function savemessage(petusername, petname){
    //  function savemessage(petusername, dog, cat, rabbit, petname){
    var newmessageRef = messagesRef.push();
    newmessageRef.set({
      petusername: petusername,
      // dog:dog,
      // cat:cat,
      // rabbit:rabbit,
      petname: petname
    });
  }