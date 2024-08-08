function showElements() {
    let elements = document.querySelectorAll('.button_div');
    let gizle = document.querySelector('.butonlar_gizli');
    
    gizle.style.visibility = 'visible';
    elements.forEach(element => {
        element.style.visibility = 'visible';
    });
}
function hiddenElements() {
    let elements = document.querySelectorAll('.button_div');
    let gizle = document.querySelector('.butonlar_gizli');
    
    gizle.style.visibility = 'hidden';
    elements.forEach(element => {
        element.style.visibility = 'hidden';
    });
}
