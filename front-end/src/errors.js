export const errors =
    {
        required(name) {
            return `${name} alanı boş bırakılamaz.`;
        },
        email() {
            return `Geçerli e-mail yazılmalıdır.`;
        },
        maxLength(name, count) {
            return `${name} alanı en fazla ${count} olmalıdır. `;
        },
        minLength(name, count) {
            return `${name} alanı en az ${count} olmalıdır. `;
        },
        regex(name) {
            return `${name} alanı uygun değil.`;
        }
    }
