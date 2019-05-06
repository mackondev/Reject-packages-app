$(document).ready(function(){
    $(".vertical").keypress(function(event) {
            if(event.keyCode == 13) { 
            textboxes = $("input.vertical");
            debugger;
            currentBoxNumber = textboxes.index(this);
            if (textboxes[currentBoxNumber + 1] != null) {
                nextBox = textboxes[currentBoxNumber + 1]
                nextBox.focus();
                nextBox.select();
                event.preventDefault();
                return false 
                }
            }
        });
    })
    let kontroler, zmiana;
    function settings(){
         kontroler = document.getElementById("kontrolervalue").value;
         zmiana = document.getElementById("zmianavalue").value;
         localStorage.setItem('kontrolerID', kontroler);
         localStorage.setItem('zmianaID', zmiana);
         window.location.href="index.html";
    }
