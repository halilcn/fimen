export const errors =
    {
        required(name) {
            return `${name} alanı boş bırakılamaz.`;
        },
        email() {
            return `Geçerli e-mail yazılmalıdır.`;
        },
        maxLength(name, count) {
            return `${name} alanı en fazla ${count} karakter olmalıdır.`;
        },
        minLength(name, count) {
            return `${name} alanı en az ${count} karakter olmalıdır.`;
        },
        regex(name) {
            return `${name} alanı uygun değil.`;
        },
        sameAs(name) {
            return `${name} aynı olmalıdır.`;
        }
    }
