var colorCodes = {
    back:"#fff",
    front:"#888",
    side: "#369",
};
let kontroler, zmiana;
function settings(){
     kontroler = document.getElementById("kontrolervalue").value;
     zmiana = document.getElementById("zmianavalue").value;
    console.log(kontroler,zmiana);
}
export {colorCodes};