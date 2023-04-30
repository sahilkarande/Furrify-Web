const firebaseConfig = {
  apiKey: "AIzaSyCMF8eLnzcCsFjTWMIGORDtGFdagGllfN4",
  authDomain: "furrify-skstmk.firebaseapp.com",
  databaseURL: "https://furrify-skstmk-default-rtdb.firebaseio.com",
  projectId: "furrify-skstmk",
  storageBucket: "furrify-skstmk.appspot.com",
  messagingSenderId: "69790689677",
  appId: "1:69790689677:web:7fb93dc2f947fd199875c4"
};

firebase.initializeApp(firebaseConfig);

// Reference messages collection
var messagesRef = firebase.database().ref('message');

// Listen for form submit
document.getElementById('contactform').addEventListener('submit', submitForm);

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
  document.getElementById('contactform').reset();
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