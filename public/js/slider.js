///////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////// DIAPORAMA ////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////

class Slider {

    constructor (idSlider) {

        this.container = document.getElementById('slideContainer');
        this.slider = document.getElementById(idSlider);  
        this.timer = null;
        this.slideIndex = -1
        
        this.slides = document.querySelectorAll('#' + idSlider + '> .slide');
        this.taille = this.slides.length;
        this.first = 0;
        this.last = this.taille-1;
        
        this.mainDiapo(); 
    }

    // Fonction principale
    mainDiapo () {
        this.points();
        this.currentSlide();
        this.slider.querySelector('.next').addEventListener('click', this.nextClickEvent.bind(this));
        this.slider.querySelector('.prev').addEventListener('click', this.prevClickEvent.bind(this));

        this.container.querySelector('#pause').addEventListener('click', this.pause.bind(this));
        this.container.querySelector('#resume').addEventListener('click', this.resume.bind(this));       

        this.keyboardEvents();
    }

    //Créer les points sous le diapo 
    points () { 
        this.dotsDiv = document.createElement("div" );
        this.dotsDiv.className = "dotsContainer";
        for (let i = 0; i < this.taille; i++) {
            this.point = document.createElement("span");
            this.point.className = "dot";
            this.point.addEventListener('click', this.gotoSlide.bind(this, i));
            this.dotsDiv.appendChild(this.point);
        }
        this.container.appendChild(this.dotsDiv);
    }


    // Défini la diapo courante 
    currentSlide () {
        clearInterval(this.timer);
        this.slideIndex++;
        this.gotoSlide(this.slideIndex);
    }

    // Passe a la diapo suivante
    nextClickEvent () {
        clearInterval(this.timer);
        this.slideIndex++;
        this.gotoSlide(this.slideIndex);
    }

    // Passe a la diapo précédente 
    prevClickEvent () {
        clearInterval(this.timer);
        this.slideIndex--;
        this.gotoSlide(this.slideIndex);
    }

    // Gère le cas ou on arrive de la dernière diapo à la première et vice versa 
    gotoSlide (n = 0) {
        clearInterval(this.timer);
        this.slideIndex = n
        if(this.slideIndex >= this.taille) {this.slideIndex = this.first}
        if(this.slideIndex <= -1) {this.slideIndex = this.last} 
        for (let i = 0; i < this.slides.length; i++) {
            this.slides[i].style.display = "none";
        }

        let dots = document.getElementsByClassName("dot");
        for (let i = 0; i < dots.length; i++) {
            dots[i].classList.remove("active");
        }

        this.slides[this.slideIndex].style.display = "block";
        dots[this.slideIndex].classList.add("active");
        this.timer = setInterval (this.currentSlide.bind(this), 5000, this.slideIndex)   
    }

    // Met le timer sur pause
    pause () {
        window.clearInterval(this.timer);
    }

    // Relance le timer 
    resume () {
        window.clearInterval(this.timer);
        this.timer = setInterval(this.currentSlide.bind(this), 5000, this.slideIndex);
        
    }
        
    // Gère les évènements clavier
    keyboardEvents () {
        window.addEventListener('keyup', e => {
            if (e.key === 'ArrowRight') {
                this.nextClickEvent();
            } else if (e.key === 'ArrowLeft') {
                this.prevClickEvent();
            }
        })  
    }

}