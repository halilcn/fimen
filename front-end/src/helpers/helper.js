export const helper = {
    isNotUndefined(variable) {
        if (typeof variable === 'undefined') {
            return false;
        }
        return variable;
    },
    convertUrlParams(jsonData) {
        return new URLSearchParams(jsonData).toString()
    }
}