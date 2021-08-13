const startingMinutes=2;
let time= startingMinutes*60;
const countdownEL=document.getElementById('countdown');
setInterval(updateCountdown,1000);
function updateCountdown(){
	const minutes= Math.floor(time/60);
	
	let seconds= time%60;
	//alert('here');
	if(seconds<10){
     seconds='0'+seconds;
	}
	countdownEL.innerHTML='0'+minutes+':' + seconds;
	time--;
	}