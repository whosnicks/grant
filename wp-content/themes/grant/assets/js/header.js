var toggleOpen = document.getElementById("toggleOpen")
var toggleClose = document.getElementById("toggleClose")
var collapseMenu = document.getElementById("collapseMenu")

function handleClick() {
  collapseMenu.classList.toggle("hidden")
}

toggleOpen.addEventListener("click", handleClick)
toggleClose.addEventListener("click", handleClick)
