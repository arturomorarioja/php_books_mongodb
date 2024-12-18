const searchForm = document.querySelector('#frmAuthor');
if (searchForm !== null) {
    searchForm.addEventListener('change', function() {
        this.submit();
    });
}