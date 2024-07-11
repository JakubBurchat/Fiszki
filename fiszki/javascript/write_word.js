function checkIfCorrect()
{   
    field = document.getElementById("answear");
    value = document.getElementById("fname").value;
    var elem = document.getElementById("show_description2");
    elem.onclick = '';
    if (value.toLowerCase() == english) {
        if (hint) {
            points += 0.5
        } else {
            points += 1.0
        }
        elem.className = "correct"    
    } else {
        if (live_mode) {
            lives = lives -1 
        }
        elem.className = "wrong"
    }
    if (!live_mode) {
        if (cindex < maxindex) {
            elem.innerHTML = "Następne Słowo"
            elem.addEventListener('click', function() {
            location.href = 'write_word.php'
            }, false);
        } else {
            elem.innerHTML = "Zakończ"
            elem.addEventListener('click', function() {
            location.href = 'summary.php'
            }, false);
            score_saved = 0
        }
        changeText();
    } else {    
        if (lives > 0) {
            elem.innerHTML = "Następne Słowo"
            elem.addEventListener('click', function() {
            location.href = 'write_word.php'
            }, false);
        } else {
            elem.innerHTML = "Zakończ"
            elem.addEventListener('click', function() {
            location.href = 'summary.php'
            }, false);
            score_saved = 0
        }
        changeText();
    }
    document.cookie = "points=" + points
    document.cookie = "lives=" + lives
    document.cookie = "score_saved=" + score_saved
}