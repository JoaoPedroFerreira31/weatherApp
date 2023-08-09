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
