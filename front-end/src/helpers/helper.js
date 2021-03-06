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
    addHttpProtocol(url) {
        if (url.search(/^http[s]?:\/\//) === -1) {
            return 'https://' + url;
        }
        return url;
    },
    fileExistsSocialMedia(socialMediaName) {
        try {
            require(`@/assets/icons/socialMedia/${socialMediaName}.svg`);
            return true;
        } catch (e) {
            return false;
        }
    },
    getSocialMediaLogo(url) {
        const hostname = new URL(this.addHttpProtocol(url)).host.split('.');
        const index = hostname.indexOf('com');
        let iconName = hostname[index - 1];

        if (!this.fileExistsSocialMedia(iconName)) {
            iconName = 'others';
        }
        return require(`@/assets/icons/socialMedia/${iconName}.svg`);
    },
    convertForm(jsonData) {
        const formData = new FormData();
        Object.keys(jsonData).forEach(function (key) {
            formData.append(key, jsonData[key]);
        });
        return formData;
    },
    getUrlMediaType(url) {
        const splitUrl = url.split('.');
        return splitUrl[splitUrl.length - 1];
    }
}