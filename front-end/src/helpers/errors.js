export const errors =
    {
        required(name) {
            if (name) {
                return `${name} alanı boş bırakılamaz.`;
            }
            return 'Boş bırakılamaz.'
        },
        email() {
            return `Geçerli e-mail yazılmalıdır.`;
        },
        maxLength(name, count) {
            if (name) {
                return `${name} alanı en fazla ${count} karakter olmalıdır.`;
            }
            return `En fazla ${count} karakter olmalıdır.`;
        },
        minLength(name, count) {
            if (name) {
                return `${name} alanı en az ${count} karakter olmalıdır.`;
            }
            return `En az ${count} karakter olmalıdır.`;
        },
        minValue(name, count) {
            if (name) {
                return `${name} alanı en az ${count} değerinde olmalıdır.`;
            }
            return `En az ${count} değerinde olmalıdır.`;
        },
        regex(name) {
            if (name) {
                return `${name} alanı uygun değil.`;
            }
            return 'Uygun veriler girilmelidir.'
        },
        sameAs(name) {
            if (name) {
                return `${name} aynı olmalıdır.`;
            }
            return 'Alanlar aynı olmalıdır.'
        },
        numeric(name) {
            if (name) {
                return `${name} alanına sadece sayısal karakterler girilmelidir..`;
            }
            return 'Sadece sayısal karakterler girilmelidir.';
        },
        invalidDate(name) {
            if (name) {
                return `${name} alanı geçersiz tarih olamaz.`;
            }
            return 'Geçersiz tarih olamaz';
        }
    }
