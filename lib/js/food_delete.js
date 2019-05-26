document.getElementById("delete").onclick = function(){
    var cfm = window.confirm("本当に削除しますか？");
    if(cfm){
        // OKを押下場合、delete画面に遷移
        location.href = "food_delete.php";
    }
}