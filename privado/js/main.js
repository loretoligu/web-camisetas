window.addEventListener("load", ()=>{
    const searchButton = document.getElementById("search_button");
    const searchBar = document.getElementById("search_bar");
    const closeSearchBar = document.getElementById("close_search_bar");
    const searchButtonBar = document.getElementById("search_button_bar");

    searchButton.addEventListener("click",()=>{
        searchButton.style.display = "none";
        searchBar.style.display = "flex";
        closeSearchBar.style.display = "flex";
        searchButtonBar.style.display = "flex";
    })

    closeSearchBar.addEventListener("click",closeSearch)
    searchButtonBar.addEventListener("click",closeSearch)

    function closeSearch(){
        searchButton.style.display = "flex";
        searchBar.style.display = "none";
        closeSearchBar.style.display = "none";
        searchButtonBar.style.display = "none";
    }
})