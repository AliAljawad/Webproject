 function updateClock() {
  var now = new Date();
  var date = now.toDateString();
  var time = now.toLocaleTimeString();
  document.getElementById('clock').innerHTML = 
    date + ' ' + time;
}

setInterval(updateClock, 1000); 
