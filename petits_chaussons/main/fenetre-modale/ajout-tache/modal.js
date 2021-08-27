//regarder la partie du tuto de grafikart pour se balader avec tab dans la fenetre modale

let modal = null


const openModal = function (e) {
    e.preventDefault()
    modal = document.querySelector(e.target.getAttribute('href'))
    modal.style.display = null
    modal.removeAttribute('aria-hidden')
    modal.setAttribute('aria-modal', 'true')
    modal.addEventListener('click', closeModal)
    modal.querySelector('.js-modal-close').addEventListener('click', closeModal)
    modal.querySelector('.js-modal-stop').addEventListener('click', stopPropagation)
}

function closeModal (e) {
    if (modal === null) return
    e.preventDefault()

    //Méthode 1 pour pour pouvoir jouer l'animation de fermeture de boite modale
    window.setTimeout(function () {
        modal.style.display = "none"
        modal = null
    }, 500)
    
    
    modal.setAttribute('aria-hidden', 'true')
    modal.removeEventListener('click', closeModal)
    modal.querySelector('.js-modal-close').removeEventListener('click', closeModal)
    modal.querySelector('.js-modal-stop').removeEventListener('click', stopPropagation)
    //Méthode 2 :au lieu du settimout on peut aussi attendre la fin de l'animation
    // const hideModal = function (){
    //     modal.style.display = "none"
    //     modal.removeEventListener('animationend', hideModal)
    //     modal = null
    // }
}

const stopPropagation = function (e) {
    e.stopPropagation()
}



document.querySelectorAll('.js-modal').forEach(a => {
    a.addEventListener('click', openModal)
})

window.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' || e.key == 'Esc'){
        closeModal(e)
    }
})