// Modifier avec Ajax pour plus de performance?
// Récupération de la musique en supprimant ses controls.
   var indicevideo=0;
   var musique = document.getElementsByTagName("audio")[indicevideo];
   musique.controls = false;

    // Récupération du bouton qui est sois Play soit Pause.
   var playorpause = document.getElementById("playpause");

    // Gestion du Bouton récupéré ci-dessus.
   musique.addEventListener('play', function() {
      playorpause.title = "pause";
      playorpause.innerHTML = "pause";
      document.getElementById("videotitle").innerHTML = musique.id;
   }, false);

   musique.addEventListener('pause', function() {
      playorpause.title = "play";
      playorpause.innerHTML = "play";
      document.getElementById("videotitle").innerHTML = musique.id;
   }, false);

   musique.addEventListener('ended', function() {
      next();
   }, false);

   init();

   setDisplay();

   // a Voir : play();

   //Initialisation 
   function init(){
      musique.addEventListener('volumechange', updateVolumeDisplay, false);
      musique.addEventListener('durationchange', updateDurationDisplay, false);
      musique.addEventListener('timeupdate', updateCurrentTimeDisplay, false);
      musique.addEventListener('ratechange', updatePlaybackRateDisplay, false);
      musique.addEventListener('progress', updatePercentLoadedDisplay, false);
   }

// Ensembles de fonctions liées aux différents boutons présent dans la page.
    //Fonction pour Play et Pause.
   function play(){
        if (musique.paused || musique.ended) {    
            if (musique.ended){
               musique.currentTime = 0;
            }
            playorpause.title = "pause";
            playorpause.innerHTML = "pause";
            document.getElementById("videotitle").innerHTML = musique.id;
            musique.play();
         } else {
            playorpause.title = "play";
            playorpause.innerHTML = "play" ;
            document.getElementById("videotitle").innerHTML = musique.id;
            musique.pause();
         }
   }


    // Stop la Musique.        
   function stop() {
      musique.currentTime = 0;
      musique.pause();    
    }

    // Coupe le son de la musique.
   function mute() {
        var mute = document.getElementById("mute");
        if (musique.muted) {
            mute.innerHTML = "mute";
            musique.muted = false;
        } else {
            mute.innerHTML = "unmute";
            musique.muted = true;
        }  
        updateMutedDisplay();
   }

   //Augmente ou diminue le volume en fonction d'un d'un argument qui équivaut a + ou -.   
   function volume(value){
        var volume = Math.floor(musique.volume * 10) / 10;
         if (value == "-") {        
            if (volume <= 0.1)
               musique.volume = 0;    
            else
               musique.volume -= 0.1;
         }else{
            if (volume >= 0.9)
               musique.volume = 1;
            else
               musique.volume += 0.1;
         }
   }

   //Augmente ou diminue le volume en fonction d'un argument qui équivaut a + ou -.      
   function vitesse(value) {
      if (value == "-")
         musique.playbackRate -= 1;
      else
         musique.playbackRate += 1;
   }

   function next(){
      if(document.getElementsByTagName("audio")[indicevideo+1]){
         indicevideo++;
         musique=document.getElementsByTagName("audio")[indicevideo];
         playorpause.title = "pause";
         playorpause.innerHTML = "pause";
         init();
         setDisplay();
         play();
      }
   }

   function previous(){
      if(document.getElementsByTagName("audio")[indicevideo-1]){      
         indicevideo--;
         musique=document.getElementsByTagName("audio")[indicevideo];
         playorpause.title = "pause";
         playorpause.innerHTML = "pause";
         init();
         setDisplay();
         play()
      }
   }

           
   
// Affichages des informations et mises à jours des informatons.
   function setDisplay() {
      updateDurationDisplay();
      updateCurrentTimeDisplay();
      updateVolumeDisplay();
      updateMutedDisplay();
      updatePlaybackRateDisplay();
   }

           
   function updateCurrentTimeDisplay() {
      document.getElementById("time").innerHTML = musique.currentTime;       
      var value = 0;
      if (musique.currentTime > 0)
         value = Math.floor((100 / musique.duration) * musique.currentTime);
      var played = document.getElementById("played");
      played.style.width = value + "%";
      played.title = value + "%";
   }


   function updateDurationDisplay() {
      document.getElementById("duration").innerHTML = musique.duration;
   }

   function updateVolumeDisplay() {
      document.getElementById("volume").innerHTML = Math.floor(musique.volume * 10);
   }

   function updateMutedDisplay() {
      document.getElementById("muteValue").innerHTML = musique.muted;
   }


   function updatePlaybackRateDisplay() {
      if (musique.playbackRate != undefined)
         document.getElementById("playbackRate").innerHTML = musique.playbackRate;
      else
         document.getElementById("playbackRate").innerHTML = "Not supported";
   }

   function updatePercentLoadedDisplay() {
      var value;
         if (musique.seekable == undefined)
            value = "Unknown";
         else
            value = 100 * (musique.duration / musique.seekable.end()) + "%";
         document.getElementById("percentLoaded").innerHTML = value;
   }