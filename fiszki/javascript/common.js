function changeText()
{   
    field = document.getElementById("word");
    let c_word = field.innerHTML;
    if (c_word == polish) {
        field.innerHTML = english;
    } else {
        field.innerHTML = polish;
    }
}

function showDescription()
{   
    field = document.getElementById("description");
    field.style.color = "black";
    hint = true
}