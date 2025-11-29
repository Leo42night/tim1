-- =========================================
-- TABLE: admin
-- =========================================
CREATE TABLE IF NOT EXISTS admin (
    id BIGSERIAL PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    -- Catatan: panjang password 50 hanya cukup untuk hash MD5/SHA1.
    -- Jika pakai bcrypt/argon, idealnya VARCHAR(255).
    password VARCHAR(100) NOT NULL
);

-- =========================================
-- TABLE: kegiatan
-- =========================================
CREATE TABLE IF NOT EXISTS kegiatan (
    id BIGSERIAL PRIMARY KEY,
    nama_kegiatan VARCHAR(50) NOT NULL,
    tanggal_kegiatan DATE NOT NULL,
    lokasi VARCHAR(50) NOT NULL
);
