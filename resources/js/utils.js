import localForage from "localforage";
window.localForage = localForage;

/* Set item in localForage */
window.saveStorage = function(name, data){
    localForage.setItem(name, data).then((value) => {
        return true;
    }).catch((err) => {
        console.log(err);
        return false;
    });
};

// Generate yyyy-mm-dd date string
window.formatDate = function(date) {
    let year = date.toLocaleString("default", { year: "numeric" });
    let month = date.toLocaleString("default", { month: "2-digit" });
    let day = date.toLocaleString("default", { day: "2-digit" });
    let formattedDate = year + "-" + month + "-" + day;

    return formattedDate;
}
