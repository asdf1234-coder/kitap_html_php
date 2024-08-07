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
                    <input type="text" name="yazar" placeholder="yazar giriniz">
                    <input type="number" id="price" name="min" min="0" step="0.01" placeholder="min değer giriniz">
                    <input type="number" id="price" name="max" min="0" step="0.01" placeholder="max değer giriniz">
                    <button type="submit" class="button">GÖNDER</button>
                </div>
            </form>
        `;
    }
}