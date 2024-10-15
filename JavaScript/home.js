let linksShowed = false
// function to show links in the header 
function ShowLinks(){
    if(!linksShowed){
        document.querySelector("#links").style = `animation: show-links .3s;
                                                -webkit-animation: show-links .3s;
                                                visibility: visible;`;
        linksShowed = true;
    }
    else{
        document.querySelector("#links").style = "display: none;";
        linksShowed = false;
    }
}

// function to scroll the products bar right
function scrollRight(arrow,query){
    let bar = document.querySelector(query);
    bar.style = "right:700px";
    arrow.style="display:none";
    let revArrow = document.querySelector(query+" .left-arrow");
    revArrow.style = "display: flex";
}
// function to scroll the products bar left
function scrollingLeft(arrow,query){
    let bar = document.querySelector(query);
    bar.style = "right:0";
    arrow.style="display:none";
    let revArrow = document.querySelector(query+" .right-arrow");
    revArrow.style = "display: flex";
}

function showSearchResult(){
    document.getElementById('search-result').style = "height: fit-content;padding:20px;" ;
    document.getElementById('search-btn').click();
}
