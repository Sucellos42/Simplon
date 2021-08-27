//pour fermer la boite modale
let modal = null

const openModal = function (e) {
    e.preventDefault()
    //Element cible dans notre lien
    const target = document.querySelector(e.target.getAttribute('href'))
    //aficher la boite modale (retire le display none et le display flex prend le relai donc la boite modale est affichée)
    target.style.display = null;
    //aria hidden passer a true pour rendre visible
    target.removeAttribute('aria-hidden')
    target.setAttribute('aria-modal', 'true')
    modal = target 
    modal.addEventListener('click', closeModal)
    modal.querySelector('.js-modal-close').addEventListener('click', closeModal)
    modal.querySelector('.js-modal-stop').addEventListener('click', stopPropagation)
    
}


const closeModal = function (e) {
    if (modal === null) return
    e.preventDefault()
    window.setTimeout(function () {
        modal.style.display = "none"
        modal = null
    }, 500)
    modal.setAttribute('aria-hidden', 'true')
    modal.removeAttribute('aria-modal')
    modal.removeEventListener('click', closeModal)
    modal.querySelector('.js-modal-close').removeEventListener('click', closeModal)
    modal.querySelector('.js-modal-stop').removeEventListener('click', stopPropagation)
    
    

}


/**
 * 
 * @param {*} e
 * stoppe la propagation de l'évènement vers les parents
 */
const stopPropagation = function (e) {
    e.stopPropagation()
}



//On récupère tout les liens qui vont ouvrir une boîte modale
document.querySelectorAll('.js-modal').forEach(a => {
    a.addEventListener('click', openModal)
    
})
