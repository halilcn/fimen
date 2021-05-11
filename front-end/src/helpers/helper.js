export const helper = {
    isNotUndefined(variable) {
        if (typeof variable === 'undefined') {
            return false;
        }
        return variable;
    },
    convertUrlParams(jsonData) {
        return new URLSearchParams(jsonData).toString()
    },
    mobileCutText(text, limit) {
        if (window.screen.width > 768) {
            return text;
        }
        if (text.length > limit) {
            return text.substring(0, limit) + '...';
        }
        return text;
    },
    clearItemsInObject(object) {
        for (const key in object) {
            object[key] = '';
        }
        return object;
    },
    fileExists(file) {
        var myLog = new File([""], file);
        console.log(myLog);
        return true;
    },
    getSocialMediaLogo() {
        const hostname = new URL('https://facebook.com/questions/35664550/vue-js-redirection-to-another-page').hostname.split('.')[0];
        const iconFullUrl = `../assets/icons/socialMedia/${hostname}.svg`;
        let icon = '@/assets/icons/socialMedia/';
        if (this.fileExists(iconFullUrl)) {
            icon += hostname + '.svg';
        } else {
            icon += 'others.svg';
        }
        console.log(require(icon)+'asdasdsad');
        return require(icon);
    }

}