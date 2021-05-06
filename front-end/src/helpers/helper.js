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
    }
}