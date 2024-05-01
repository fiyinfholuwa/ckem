const modal = document.getElementById('modal')
const overlay = document.getElementById('modal-overlay')
const cancelBtn = document.getElementById('cancel')
const donateBtns = document.getElementsByClassName('donateBtn')

cancelBtn.addEventListener('click', function(){
    modal.style.display = 'none'
})


function showModal(){
    console.log('donateBtn')
    modal.style.display = 'flex'
}