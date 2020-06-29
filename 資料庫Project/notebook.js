function closeNotebook() {
    document.getElementById("innerNotebook").style.display = "none";        //一開始不顯示
}

function openNotebook() {
    document.getElementById("innerNotebook").style.display = "";
}

/*設定點擊書籤的時候,會發生的事情*/
function lable(id) {

    /*當點擊筆記本內頁的紅色書籤(道具)時*/
    if (id == bookmark_item) {
        document.getElementById("bookmark_item").style.marginTop = "1.3%";   //將紅色書籤(道具),位置設在下面(點下去的狀態)
        document.getElementById("bookmark_visit").style.marginTop = "-1%";   //將藍色書籤(景點),位置設在上面(未點下去的狀態)
        document.getElementById("title_item").style.display = "";              //顯示・item字樣
        document.getElementById("title_attraction").style.display = "none";    //隱藏・attraction字樣
    }

    /*當點擊筆記本內頁的藍色書籤(景點)時*/
    else if (id == bookmark_visit) {
        document.getElementById("bookmark_visit").style.marginTop = "1.3%";   //將藍色書籤(景點),位置設在下面(點下去的狀態)
        document.getElementById("bookmark_item").style.marginTop = "-1%";     //將紅色書籤(道具),位置設在上面(未點下去的狀態)
        document.getElementById("title_attraction").style.display = "";         //顯示・attraction字樣
        document.getElementById("title_item").style.display = "none";           //隱藏・item字樣
    }
}

/*初始筆記本內頁狀態*/
function initial() {
    document.getElementById("bookmark_visit").style.marginTop = "1.3%";   //將藍色書籤(景點),位置設在下面(點下去的狀態)
    document.getElementById("bookmark_item").style.marginTop = "-1%";     //將紅色書籤(道具),位置設在上面(未點下去的狀態)
    document.getElementById("innerNotebook").style.display = "none";        //一開始不顯示
    document.getElementById("title_item").style.display = "none";           //隱藏・item字樣
    document.getElementById("title_attraction").style.display = "";         //顯示・attraction字樣
}

window.addEventListener("load", initial, false);