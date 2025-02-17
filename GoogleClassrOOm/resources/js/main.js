/*===== SHOW NAVBAR  =====*/ 
const showNavbar = (toggleId, navId, bodyId, headerId) =>{
    const toggle = document.getElementById(toggleId),
    nav = document.getElementById(navId),
    bodypd = document.getElementById(bodyId),
    headerpd = document.getElementById(headerId)

    // Validate that all variables exist
    if(toggle && nav && bodypd && headerpd){
        toggle.addEventListener('click', ()=>{
            // show navbar
            nav.classList.toggle('show')
            // change icon
            toggle.classList.toggle('bx-x')
            // add padding to body
            bodypd.classList.toggle('body-pd')
            // add padding to header
            headerpd.classList.toggle('body-pd')
        })
    }
}

showNavbar('header-toggle','nav-bar','body-pd','header')

/*===== LINK ACTIVE  =====*/ 
const linkColor = document.querySelectorAll('.nav__link')

function colorLink(){
    if(linkColor){
        linkColor.forEach(l=> l.classList.remove('active'))
        this.classList.add('active')
    }
}
linkColor.forEach(l=> l.addEventListener('click', colorLink))
/*===== END LINK ACTIVE  =====*/ 
const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const backgrounds = $$('.background');

const removeSelectedBackground = () => {
  const selectedBackground = $('.background.selected');

  selectedBackground && selectedBackground.classList.remove('selected');
};

backgrounds.forEach((background) => {
  background.addEventListener('click', () => {
    removeSelectedBackground();

    background.classList.add('selected');
  });
});

const modalBtns = $$('.btn-modal');

modalBtns.forEach((modalBtn) => {
  modalBtn.addEventListener('click', () => {
    removeSelectedBackground();
  });
});
