function replaceContent() {
    // 'tum_kitaplar' class'ına sahip div'i seç
    const container = document.querySelector('.tum_kitaplar');
    
    // Eğer container varsa, içeriğini temizle ve formu ekle
    if (container) {
        container.innerHTML = `
            <form action="index.php" method="get">
                <div class ="container_filtreleme">
                    <input type="text" name="yayinevi" placeholder="yayınevi giriniz">
                    <input type="text" name="tur" placeholder="tür giriniz">
                    <button type="submit" class="button">GÖNDER</button>
                </div>
            </form>
        `;
    }
}