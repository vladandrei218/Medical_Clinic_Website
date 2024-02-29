function openModal(doctorId) {
  var modal = document.getElementById(doctorId + '-modal');
  modal.style.display = 'block';
  document.addEventListener('keydown', closeModalOnEscape);

  modal.scrollIntoView({ behavior: 'smooth', block: 'center' });
}
function closeModal(doctorId) {
  var modal = document.getElementById(doctorId + '-modal');
  modal.style.display = 'none';
  document.removeEventListener('keydown', closeModalOnEscape);
}
function closeModalOnEscape(event) {
  if (event.key === 'Escape') {
    var modals = document.getElementsByClassName('modal');
    for (var i = 0; i < modals.length; i++) {
      modals[i].style.display = 'none';
    }
    document.removeEventListener('keydown', closeModalOnEscape);
  }
}
window.onclick = function (event) {
  if (event.target.classList.contains('modal')) {
    event.target.style.display = 'none';
    document.removeEventListener('keydown', closeModalOnEscape);
  }
};



