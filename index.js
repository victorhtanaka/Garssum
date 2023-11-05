function scrollfunc(x) {
    if (x == 1) {
        window.scroll({
            top: 3800,
            behavior: "smooth",
        });
    } 
    else if (x == 2) {
        window.scroll({
            top: 2860,
            behavior: "smooth",
        });
    }
    else {
        window.scroll({
            top: 1850,
            behavior: "smooth",
        });
    }
}