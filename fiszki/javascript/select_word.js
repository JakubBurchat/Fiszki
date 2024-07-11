function checkIfCorrect(choice)
{   
    const answears = [document.getElementById("ans0"), document.getElementById("ans1"), 
    document.getElementById("ans2"), document.getElementById("ans3")]
    next = document.getElementById("next")
    if (choice == correct) {
        if (hint) {
            points += 0.5
        } else {
            points += 1.0
        }
    } else if (live_mode) {
       lives = lives -1 
    }
    if (!live_mode) {
        for (let i = 0; i < 4; i++) {
            if (i == correct) {
                answears[i].style.backgroundColor = "green";
                answears[i].onclick = null;
                if (cindex < maxindex) {
                    next.innerHTML = 'Następne Słowo'
                    next.addEventListener('click', function() {
                    location.href = 'select_word.php'
                    }, false);
                } else {
                    next.innerHTML = 'Zakończ'
                    next.addEventListener('click', function() {
                    location.href = 'summary.php'
                    }, false);
                    score_saved = 0
                }
            } else {
                answears[i].style.pointerEvents = "none";
                answears[i].style.backgroundColor = "red";
            }
        }
    } else {
        for (let i = 0; i < 4; i++) {
            if (i == correct) {
                answears[i].style.backgroundColor = "green"
                answears[i].onclick = null;
            } else {
                answears[i].style.pointerEvents = "none"
                answears[i].style.backgroundColor = "red"
                if (lives > 0) {
                    next.innerHTML = 'Następne Słowo'
                    next.addEventListener('click', function() {
                    location.href = 'select_word.php'
                    }, false);
                } else {
                    next.innerHTML = 'Zakończ'
                    next.addEventListener('click', function() {
                    location.href = 'summary.php'
                    }, false);
                    score_saved = 0
                }
            }
        }
    }
    next.style.display = "block"
    document.cookie = "points=" + points
    document.cookie = "lives=" + lives
    document.cookie = "score_saved=" + score_saved
}