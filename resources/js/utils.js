import localForage from "localforage";
import moment from "moment";
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

window.setLocale = function(locale) {
    moment.locale(locale);
    console.log('locale set to ' + locale);
};

// Convert date to yyyy-mm-dd date string
window.formatDate = function(date) {
    let year = date.toLocaleString("default", { year: "numeric" });
    let month = date.toLocaleString("default", { month: "2-digit" });
    let day = date.toLocaleString("default", { day: "2-digit" });
    let formattedDate = year + "-" + month + "-" + day;

    return formattedDate;
}

// Convert time to 24h format
window.convertFrom12To24Format = function(time) {
    let convertedTime = moment(time, ["h:mm A"]).format("HH:mm");
    return convertedTime;
}

window.isAfterTenPm = function(hour) {
    let convertedHour = moment(hour, 'HH:mm');
    let hourToCompare = moment('22:00', 'HH:mm');
    if(locale === 'en') {
        convertedHour = moment(convertFrom12To24Format(hour), 'HH:mm');
    }
    return convertedHour.isAfter(hourToCompare);
}
