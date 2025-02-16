const inputWrapper = document.getElementById('input-wrapper');
const keywordInput = document.getElementById('keyword-input');
const dropdown = document.getElementById('dropdown');
const resultInput = document.getElementById('result');

// Ambil semua data dari dropdown sebagai array
const suggestions = Array.from(dropdown.children).map(item => item.getAttribute('data-value'));
let selectedKeywords = [];

// Tampilkan dropdown saat input difokuskan
keywordInput.addEventListener('focus', () => {
    dropdown.style.display = 'block';
    filterDropdown();
});

// Sembunyikan dropdown ketika klik di luar input-wrapper
document.addEventListener('click', (e) => {
    if (!inputWrapper.contains(e.target)) {
        dropdown.style.display = 'none';
    }
});

// Filter data pada dropdown sesuai teks yang diketik
keywordInput.addEventListener('input', () => {
    filterDropdown();
});

function filterDropdown() {
    const searchTerm = keywordInput.value.toLowerCase();
    Array.from(dropdown.children).forEach(item => {
        item.style.display = item.textContent.toLowerCase().includes(searchTerm) ? 'block' : 'none';
    });
}

// Saat klik salah satu item dropdown, tambahkan sebagai tag
Array.from(dropdown.children).forEach(item => {
    item.addEventListener('click', function() {
        const value = this.getAttribute('data-value');
        if (!selectedKeywords.includes(value)) {
            addTag(value);
            selectedKeywords.push(value);
            updateResult();
        }
        keywordInput.value = '';
        filterDropdown();
        keywordInput.focus();
    });
});

// Tambahkan event listener untuk menangani input koma
keywordInput.addEventListener('keydown', function(e) {
    if (e.key === ',') {
        e.preventDefault();
        let currentValue = keywordInput.value.trim();
        // Jika ada koma di akhir, hapus
        if (currentValue.endsWith(',')) {
            currentValue = currentValue.slice(0, -1).trim();
        }
        if (currentValue) {
            // Cari kecocokan dengan data (case insensitive)
            let suggestion = suggestions.find(s => s.toLowerCase() === currentValue.toLowerCase());
            if (suggestion && !selectedKeywords.includes(suggestion)) {
                addTag(suggestion);
                selectedKeywords.push(suggestion);
                updateResult();
            }
        }
        keywordInput.value = '';
        filterDropdown();
    }
});

// Fungsi untuk membuat elemen tag dan menambahkannya ke input-wrapper
function addTag(text) {
    const tagElem = document.createElement('span');
    tagElem.className = 'tag';
    tagElem.innerHTML = `<span>${text}</span><span class="remove-tag" data-value="${text}">&times;</span>`;
    inputWrapper.insertBefore(tagElem, keywordInput);

    // Event untuk menghapus tag
    tagElem.querySelector('.remove-tag').addEventListener('click', function() {
        const value = this.getAttribute('data-value');
        selectedKeywords = selectedKeywords.filter(item => item !== value);
        tagElem.remove();
        updateResult();
    });
}

// Perbarui nilai hidden input dengan keyword yang dipilih (dipisah dengan koma)
function updateResult() {
    resultInput.value = selectedKeywords.join(', ');
}

// Fokus pada input saat klik pada area input-wrapper
inputWrapper.addEventListener('click', () => {
    keywordInput.focus();
    dropdown.style.display = 'block';
    filterDropdown();
});