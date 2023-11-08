const rg = document.querySelector("#chf_rg")

rg.addEventListener("keyup", event => {
    let start = rg.selectionStart //initial cursor position
    let end = rg.selectionEnd //final cursor position
    //if the start and end positions of the cursor are the same, it means that there is no selection range
    if(start == end) { //this conditional prevents the function call when the user makes a selection range in the input EX:. keys (Ctrl + A)
        formMask_("__.___.___-_", "_", event, start);
    }
})

function formMask_(maskr, charr, event, cursor, specialChar = '') {
    
    const vetMask = maskr.split("") //transform mask into vector to use specific functions, like filter()
    const onlyNumbersOrLetters = rg.value.split("").filter(value => !value.match(/[^\dA-Za-z]/));
    const key = event.keyCode || event.which
    const backspaceAndArrowKeys = [8, 37, 38, 39, 40] //code backspace and arrow keys
    const clickedOnTheBackspaceOrArrowsKeys = backspaceAndArrowKeys.indexOf(key) >= 0
    const charrNoMod = [".", "-", specialChar] //characters that do not change
    const cursorIsCloseToCharrNoMod = charrNoMod.indexOf(vetMask[cursor]) >= 0

    onlyNumbersOrLetters.forEach( (value) => vetMask.splice(vetMask.indexOf(charr), 1, value)) //change '#' to numbers or letters

    rg.value = vetMask.join("")

    if(!clickedOnTheBackspaceOrArrowsKeys && cursorIsCloseToCharrNoMod) { //increment the cursor if it is close to characters that do not change
        rg.setSelectionRange(cursor+1, cursor+1)
    } else {
        rg.setSelectionRange(cursor, cursor)
    }
}
