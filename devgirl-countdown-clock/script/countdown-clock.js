
class DevgirlCountdownClock{
	constructor(name, time) {
		this.countDownDate = new Date(time).getTime();
		this.name = name;
		this.className = document.querySelector('#'+name);
		
		this.countDownDate = new Date(time).getTime();
		this.daysElement = document.querySelector('#'+this.name + ' .days-clock-value');
    this.hoursElement = document.querySelector('#'+this.name + ' .hours-clock-value');
    this.minutesElement = document.querySelector('#'+this.name + ' .mins-clock-value');
    this.secondsElement = document.querySelector('#'+this.name + ' .secs-clock-value');
		
	}
	
	

	start() {
    this.interval = setInterval(() => {
      let now = new Date().getTime();
      let distance = this.countDownDate - now;

      let days = Math.floor(distance / (1000 * 60 * 60 * 24));
      let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      let seconds = Math.floor((distance % (1000 * 60)) / 1000);

      document.querySelector('.devgirl-countdown-clock').style.display = 'flex';

      

      if (distance < 0) {
        clearInterval(this.interval);
        this.daysElement.innerHTML = 0;
				this.hoursElement.innerHTML = 0;
				this.minutesElement.innerHTML = 0;
				this.secondsElement.innerHTML = 0;
      } else {
				this.daysElement.innerHTML = days;
				this.hoursElement.innerHTML = hours;
				this.minutesElement.innerHTML = minutes;
				this.secondsElement.innerHTML = seconds;
			}
    }, 1000);
	} // start
		
} //class