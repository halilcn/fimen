import store from "@/store";

export const customValidators =
    {
        checkUniqueUsername(value) {
            return store.dispatch('checkUsername', value);
        },
        checkUniqueEmail(value) {
            return store.dispatch('checkEmail', value);
        },
        checkFileSize(fileSize, maxSize) {
            return fileSize < maxSize * 1024 * 1024;
        },
        checkFileType(fileType, requiredType) {
            return fileType === requiredType;
        }
    }
