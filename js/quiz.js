const Userarray = [];
const Realarray = [];
const Resultarray = [];
const ResultCheck = [];
function userAnswer(soruNo, cevap) {
    Userarray[soruNo] = cevap;
}
function realAnswer(soruNo, cevap) {
    Realarray[soruNo] = cevap;
    ResultCheck[soruNo] = true;
}

Userarray[0]="b";
Realarray[0]="b";
ResultCheck[0]="b";
Resultarray[0]="b";
//console.log(Userarray.includes('undefined'));
var totalTrue = 0;
var totalFalse = 0;
var bool = true;
var btnEnd = document.getElementById("testEnd");
btnEnd.onclick = function endTest() {
    var bool = true;

    for (i = 1; i < Userarray.length; i++) {
        if (typeof Userarray[i] === 'undefined') { bool=false; window.alert("sorular boş geçilemez"); break; }
        
    }
    if (bool) {
        for (i = 1; i < Realarray.length; i++) {
            if (Realarray[i] == Userarray[i] && Userarray[i] != undefined && Realarray[i] != undefined) { totalTrue = totalTrue + 1; Resultarray[i] = 1; }
            else if (Realarray[i] != Userarray[i] && Userarray[i] != undefined && Realarray[i] != undefined) {totalFalse = totalFalse + 1; Resultarray[i] = 0; }
            else { Resultarray[i] = -1 }
        }


        document.getElementById("yaz").innerHTML = Resultarray;
        document.getElementById("yaz2").innerHTML = Userarray;
        document.getElementById("yaz3").innerHTML = Realarray;
        var count = 1;
        var elem = document.querySelectorAll(".choise");
        elem.forEach(element => {

            if (element.classList.contains("active")) {
                if (Resultarray[count] == 1) {
                    element.classList.remove("active");
                    element.classList.add("true");
                    count += 1;
                }
                else if (Resultarray[count] == 0) {
                    element.classList.remove("active");
                    element.classList.add("false");
                    count += 1;
                }

            }
            else {
                element.disabled = true;

            }
        });


    }
    else {
        window.alert("sorular boş geçilemez");
    }

}




 