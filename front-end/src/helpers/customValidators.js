import store from "@/store";

export const customValidators =
    {
        checkUniqueUsername(value) {
            return store.dispatch('checkUsername', value);
        },
        checkUniqueEmail(value) {
            return store.dispatch('checkEmail', value);
        }
    }
